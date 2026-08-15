---
name: o2switch-hosting
description: Skill for managing the o2switch (cPanel) hosting account end-to-end via its UAPI: domains and subdomains, DNS zones, email accounts, MySQL databases, file management, cron jobs, SSL certificates, and backups. Triggers when the user asks things like "manage my o2switch hosting", "check my o2switch domains", "list my subdomains", "create an email account on o2switch", "add a subdomain", "check my o2switch databases", "set up a cron job on o2switch", "check SSL certificates on o2switch", "manage the Interact International website hosting", "do a hosting audit", or any request to inspect or change anything on the o2switch cPanel account.
---

# Skill: o2switch Hosting Management

## Mission

Give Claude direct, safe operational control over Nacer's o2switch (cPanel) hosting account through its UAPI — including the account hosting the Interact International website — so hosting tasks (domains, DNS, email, databases, files, cron, SSL, backups) can be handled by natural-language request instead of the cPanel UI. Because this is a live account holding real client work, every state-changing action is confirmed before it runs.

---

## Background: how o2switch's API works

o2switch does not have its own proprietary REST API. It is standard cPanel/WHM hosting, managed through cPanel's own **UAPI** (the modern, recommended interface — avoid legacy API1/API2 unless UAPI has no equivalent).

Authentication is a per-account cPanel API Token, created in cPanel under Security → "Manage API Tokens." Requests carry a custom header:

```
Authorization: cpanel <username>:<TOKEN_VALUE>
```

and target the account's own cPanel hostname (found in the cPanel welcome email or cPanel URL, e.g. `something.o2switch.net`) on port 2083:

```
https://<hostname>:2083/execute/<Module>/<function>?param=value
```

If the cPanel version supports scoped tokens, recommend Nacer create the token with the minimum ACLs needed rather than full account access.

---

## Phase 1: Load credentials, never surface them

1. Confirm `O2SWITCH_CPANEL_HOST`, `O2SWITCH_CPANEL_USER`, and `O2SWITCH_CPANEL_TOKEN` are set in `.env` (a presence check only, e.g. `test -n`). Never `cat .env` or print the values.
2. This harness does not persist shell state between Bash calls, so every curl call must be one self-contained command that sources `.env` and calls curl in the same invocation:
   ```bash
   set -a; source .env; set +a; curl -sS --max-time 30 \
     -H "Authorization: cpanel ${O2SWITCH_CPANEL_USER}:${O2SWITCH_CPANEL_TOKEN}" \
     "https://${O2SWITCH_CPANEL_HOST}:2083/execute/<Module>/<function>?param=value"
   ```
   Reference the credentials by variable name only in every command — never inline the literal token value, and never let it appear in a printed/logged message.
3. If any variable is empty, stop and tell Nacer to fill it into `.env` directly. Never ask him to paste a token into chat.

---

## Phase 2: Discover before acting

For any request, first run the relevant read-only UAPI calls to learn the current state. Never assume a domain, database, mailbox, or cron entry's exact name — always resolve it from a fresh list call first:

- `DomainInfo::list_domains` — domains on the account
- `SubDomain::listsubdomains` — subdomains
- `DNS::parse_zone` / zone editor calls — current DNS records for a domain
- `Mysql::list_databases`, `Mysql::list_users` — databases and DB users
- `Email::list_pops`, `Email::list_forwarders` — mailboxes and forwarders
- `Cron::list_cron` — cron jobs
- `SSL::list_certs` — installed SSL certificates and expiry
- `Fileman::list_files` — file/directory listings

---

## Phase 3: Verify unfamiliar UAPI calls before first use

Before constructing a call to a module/function not already verified earlier in this session, check https://api.docs.cpanel.net/openapi/cpanel/operation/ for that module/function to confirm its exact name, required/optional parameters, and response shape. Do not guess parameters from memory. Once verified in a session, it's fine to reuse without re-checking the docs again in that same session.

---

## Phase 4: Classify the operation — read vs write

**Read (run freely, no confirmation needed):** listing domains/subdomains, viewing DNS zone contents, listing databases/db users, listing email accounts/quotas/forwarders, listing cron jobs, listing SSL certs and expiry, listing/viewing files, checking disk/bandwidth usage, listing backups.

**Write / destructive (always confirm first, no exceptions):** creating or deleting a domain/subdomain, any DNS record add/edit/delete, creating/deleting/modifying an email account, forwarder, or password, creating/deleting a database or db user or changing privileges, creating/editing/deleting a cron job, writing/moving/deleting/chmod-ing files, installing/removing an SSL cert, restoring or deleting a backup, suspending the account. This applies even to "just create a test X" requests.

---

## Phase 5: Execute

- Use the curl template from Phase 1, always with `--max-time 30`.
- Check the UAPI response's status/error fields before declaring success — confirm the exact response shape from the Phase 3 docs check rather than assuming.
- Pretty-print JSON with `jq` if available, otherwise fall back to `python3 -m json.tool`.
- Treat timeouts as failures, not something to silently retry.

---

## Phase 6: Confirmation protocol for write operations

Before running any write/destructive call, present it like this and wait for an explicit go-ahead in a separate message:

```
Here's what I'm about to do on o2switch:
- Action: [plain-language description]
- Module/function: [Module::function]
- Target: [domain/db/mailbox/etc.]
- Parameters: [params]

Proceed?
```

For the highest-risk operations — deleting a domain/database/mailbox, restoring or deleting a backup, deleting DNS records, deleting files — add an explicit line stating exactly what will be lost or overwritten. For DNS zone edits specifically, always fetch and display the current record(s) first so Nacer sees a clear before/after, not just the proposed new value.

---

## Phase 7: Present results

Present discovery output (domain lists, DB lists, mailbox lists, cron tables, SSL expiry, etc.) as concise Markdown tables. If Nacer asks for a hosting audit or status report, offer to save it under `livrables/cabinet/interact-international/` — only on request, don't auto-save every lookup.

---

## Important rules

- Never print, log, or commit the token value. Never `cat .env`. Reference variables by name only in every command.
- Every write/destructive UAPI call requires explicit confirmation first — no exceptions.
- Read/list/status calls run freely.
- Never guess a UAPI function's parameters — verify against api.docs.cpanel.net before the first use of that function in a session.
- Before any DNS zone edit, always show the current record(s) and a clear before/after.
- Treat backup restores and domain/database/mailbox deletions as highest risk — restate exactly what's affected before proceeding.
- This is a live account with real client work on it (Interact International). When in doubt, ask rather than assume.
- No em dashes.
- Communicate in English by default, unless Nacer asks otherwise.
