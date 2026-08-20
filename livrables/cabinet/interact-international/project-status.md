# Interact International — Status

_Last updated: 2026-08-15_
_Source: Interact International folder, Google Drive + corrections from Nacer_

## Corporate Structure

- **Interact International Ltd** (Seychelles IBC) — group holding entity, intended to own IP, brand, and alliance agreements. **Incorporation in progress, not yet complete.**
- **Interact International Advisory Ltd** (Mauritius GBC) — planned operational subsidiary for client mandates, Africa operations, and banking. **Not started.**

Positioning: an Africa-focused strategic project advisory boutique — the independent, conflict-free layer between African infrastructure projects and international financing/industrial capacity. Explicitly not a broker, commission agent, political fixer, or informal intermediary.

Five core service lines (planned): government projects & PPP facilitation, market entry & tender advisory, industrial localization & technology transfer, strategic business missions, project origination & consortium coordination.

## JFABA Alliance

Three-party strategic alliance for Africa: **Interact International** (origination hub, government/institutional access), **JFA Advisory Group** (project finance & capital mobilisation), **BRICS Alliance / iaBRICS** (industrial partners & technology transfer).

**Status: signed.** The four alliance documents (Strategic Alliance Agreement, Non-Circumvention Agreement, NDA, Opportunity Registration Protocol) went through several review rounds (v0–v4) — including critical redlines Interact raised on an undisclosed counterparty substitution and an unverified consortium — before execution.

**Opportunity Registration Protocol tooling**: an Alliance Register (Google Sheet, "JFABA Alliance Register" in the JFABA Drive folder) is now in place to operationalize the Protocol — tracks each opportunity against the 13 Article 9 fields, with formulas auto-computing the 48h acknowledgement/exclusivity window, 10-business-day dispute period, 15-business-day decision and revenue-distribution deadlines, and a 12-month inactivity flag. Includes a Legend & Instructions tab and a Registration Notice template (Schedule A) for the email-based notice process the Protocol actually specifies. Still to do: share the Register with the JF-Africa/Proedobile and External Solutions contacts (need their emails), and consider whether the v4 Protocol's signature block gaps (only Interact International's signature looked genuinely completed when last read) affect whether it should be treated as fully in force.

## Pipeline (planned, not implemented)

No mandate is active yet. The following are opportunities under evaluation / origination, not signed engagements:

- **Chad — PND 2030 Infrastructure Pipeline**: Chad's "Tchad Connexion 2030" plan (USD 30B / 268 projects), with JFA's draft financing proposal targeting 5 projects. Chad has not yet been formally approached by either party.
- **Madagascar — TRIGU Energy Power Project**: 106MW project stalled at 90% civil completion; potential restructuring advisory role, not yet engaged.
- **Ivory Coast**: opportunity folder open, no further detail captured yet.
- **Saint Felix Green Ltd (Mauritius)**: 4.0MWp Solar PV + BESS opportunity, ~MUR 220M, under evaluation.

Priority geography for origination: Chad, Cote d'Ivoire, Guinée Conakry, Burkina Faso, Madagascar, Senegal, Liberia, with longer-term ambition across all 54 AU member states.

## Corporate Website

Now tracked as its own project: see `website-project-status.md` in this folder for goal, deadline, and status log.

**Hosting infrastructure is already set up**, independent of the design direction (still to be worked out as part of that project). `interact-international.com` is registered at Squarespace and stays there (no registrar transfer needed or attempted). On o2switch:
- Added as an addon domain, document root `/home/adna5212/interact-international.com` (outside `public_html`, to keep it isolated as more sites are added to this account)
- Mail routing set to **Remote Mail Exchanger** so o2switch never intercepts mail — Google Workspace (5x MX to Google, DKIM, domain verification, and `sites`/`calendar`/`drive` custom CNAMEs) remains untouched and fully in control of email
- DNS fully cut over: `A` records for `@` and `www` on Squarespace point to `109.234.162.81` (o2switch's shared IP), confirmed resolving

## Status Log

### 2026-08-15
- Corrected status: Seychelles entity incorporation in progress (not complete), Mauritius entity not started
- JFABA Alliance confirmed signed
- All pipeline opportunities (Chad, Madagascar, Ivory Coast, Saint Felix Green) are planned/under evaluation — no active mandate
- Corporate website design direction flagged for a full revisit
- Hosting infrastructure set up on o2switch (addon domain + remote mail exchanger) ahead of the DNS cutover at Squarespace, so the website work can proceed independently of when the design direction is finalized
- DNS cutover confirmed live (A records resolving to o2switch)
- Corporate website spun out into its own tracked project, `website-project-status.md`, with a goal and end-of-August-2026 deadline

### 2026-08-19
- Built the JFABA Opportunity Registration Protocol Alliance Register (Google Sheet, in the JFABA Drive folder): Register tab (13 Article 9 fields + formula-driven deadline/inactivity columns), Legend & Instructions tab, Registration Notice template (Schedule A) tab
- Note: no Google Form/Apps Script automation included — built with Sheets formulas only, since no Sheets-API or Apps Script tooling was available to set up dropdowns, conditional formatting, or automated email digests. Documented as a known limitation directly in the sheet
- Found the signature thread in Gmail ("EXECUTION OF ALLIANCE AGREEMENT DOCUMENTS", 2026-07-02 to 2026-08-03): all four v4 documents appear fully executed as of 2026-08-01 (Ali Mazukabzov/External Solutions LLC sent signed copies; JFA confirmed receipt 2026-08-03). One open point: JFA's own copy in the thread predates the 2026-07-23 wording fixes (Article 9.2 "read" qualifier, NDA notice) — worth confirming they re-signed the exact final text
- Read the thread closely enough to catch a real conflict: Article 9.2 restores a "read" qualifier, meaning JFA/External Solutions/Proedobile get read-only Register access with Interact International (Alliance Coordinator) responsible for updates — not the "any party can add rows" workflow the Legend tab originally described. Fixed: shared the Register as Viewer (not Editor) with legal@jfadvisorygroup.com, directorp@jfadvisorygroup.com, chineduchijioke@proedobile.com, and mazukabzov.ali@mail.ru
- Populated the Register with all 15 Chad opportunities from `Chad_PND2030_Opportunity_Pipeline_Dossier_May2026.docx` (II-TCD-2026-001 through 015, PND Tchad Connexion 2030). Left Status, Priority Date, and Last Updated blank for all of them since none has actually been sent as a formal Registration Notice yet — the dossier's own "REGISTERED" status is internal/aspirational, not an Article 3 filing. Flagged in each row's Notes. Confirm with Nacer before formally registering any of them (which would start real Protocol deadline clocks)
- Built full ORP automation via Google Apps Script (superseding the "no automation" note above), container-bound to the Register: a **Registration Notice Google Form** (Schedule A fields) with an installable trigger that auto-generates the next Ref Code, appends the Register row, and emails the formal notice to the other alliance parties; and a **daily deadline/inactivity digest** email to Nacer covering anything due within 3 days or newly flagged inactive
- Added a **Fiches** tab to the Register (structured columns: Headline, Location, Strategic Rationale, Financing, JFABA Roles, Key Risk, Next Action) and backfilled the 6 Tier-1 Chad fiches from the dossier. Built a gated `project_fiche` area on interact-international.com (private-status posts, custom `alliance_partner` WP role with read-only access, login-gated templates) that auto-syncs from this tab
- The sync had to be redesigned mid-build: o2switch's Tiger Protect WAF challenges inbound POST requests from Google's Cloud IPs (redirect-based bot check Apps Script can't pass), so instead of Apps Script pushing to WordPress, the Apps Script project exposes the fiche data as a token-authenticated web app (`doGet`), and a WP-Cron job (every 30 min, backed by a real cPanel cron hitting wp-cron.php for reliability since pseudo-cron only fires on site visits) pulls and upserts the posts. Verified end-to-end: 15 fiches synced correctly, re-running doesn't duplicate, anonymous visitors get a clean 404, and an `alliance_partner`-role account can query the private posts
- Created WP accounts for the four alliance contacts (legal@jfadvisorygroup.com, directorp@jfadvisorygroup.com, chineduchijioke@proedobile.com, mazukabzov.ali@mail.ru) with the `alliance_partner` role — they'll need to use "Forgot password" on first login since accounts were created without transmitting a password
- Not yet tested live: the Registration Notice form's actual email-sending path (submitting a real test would send a genuine Article 3 notice to all three alliance parties and start a real 48h acknowledgement clock, so this needs a deliberate first real submission rather than a throwaway test)

### 2026-08-20
- Grouped the Project Fiches archive page by country: the Apps Script `doGet()` feed now looks up each fiche's Country from the Register tab and includes it in the payload; `functions.php`'s sync handler stores it as `jfaba_country` post meta; `archive-project_fiche.php` groups the listing under a heading per country instead of a flat list. Redeployed the Apps Script web app to a new version (same URL) and re-ran the sync to backfill the meta onto all 15 existing fiche posts, all correctly tagged Chad. Verified the grouped rendering server-side
- Added a discoverable way for logged-in Alliance Partners to actually reach the gated fiches: an admin bar "Project Fiches" link (`admin_bar_menu` hook, gated on `current_user_can('read_private_posts')`) linking to the archive page. There was previously no on-site navigation to this area at all, since it's deliberately excluded from the public menu. Verified the node appears for an admin and for a real `alliance_partner` account, with the correct URL

### 2026-08-20
- Turned the gated fiches area into a full "Opportunity Register": the archive page now has a filter bar (Country / Size range / Sector) above a card grid, each card linking to its fiche, with a live "Showing N of M" counter — client-side vanilla JS, no dependency, sized for the current ~15-30 record scale
- Extended the Apps Script feed (`doGet()`) to also carry Sector and a parsed numeric `valueUsd` per opportunity (pulled from the Register's Country/Sector/Estimated Value columns), handling both plain and range-formatted values (e.g. "USD 400-700M" → upper bound $700M) and unit suffixes (M/B/K). `functions.php`'s sync now persists these as `jfaba_sector`, `jfaba_value_raw`, `jfaba_value_usd` post meta, backfilled onto all 15 existing fiche posts
- Replaced the admin-bar link with a real, conditional main-nav entry: "Opportunity Register" now appears in the site's primary navigation immediately after "Sectors & Approach", but only for logged-in users with `read_private_posts` — done by filtering the block-theme Navigation block's rendered HTML server-side (`render_block_core/navigation`), so logged-out visitors never see the markup at all, not just a hidden element. Verified directly against the filter (present for an authorized user, absent for anonymous) and via a live anonymous `curl` of the homepage (link absent)
- Brought the Opportunity Registration form on-site: built a new WPForms form ("Opportunity Registration Notice", form ID 67) mirroring the existing Google Form's 7 Schedule A fields, embedded on a new private WP Page (`/opportunity-registration/`, gated the same way as the fiches via `post_status = private`). Refactored the Apps Script intake logic so the Register-append + Ref-Code-generation + Article 3 notice email now live in one shared `registerOpportunity()` function, called by both the original Google Form trigger and a new `doPost()` web endpoint that the on-site form's submission hooks into (`wpforms_process_complete_67` → `wp_remote_post` to the same Apps Script URL used for the pull sync, since this direction is unaffected by the Tiger Protect WAF). The generated Ref Code is shown back to the submitter in the on-screen confirmation
- Added a `dryRun` mode to the new `doPost()` endpoint specifically so the WordPress-to-Apps-Script wiring could be tested end-to-end (confirmed via `curl`: returns a real computed Ref Code with no Register row appended and no email sent) without tripping a real Article 3 notice — the same concern that's kept the Google Form path itself untested live
- Hit and fixed two build snags: the WPForms form initially threw "Undefined array key 'id'" warnings and an intermittent stray honeypot field — traced to the hand-built form JSON missing the top-level `"id"` key that WPForms' builder normally injects (found by diffing against the site's existing Contact Form's stored JSON); fixed by patching the post's content directly after creation, verified clean across repeated renders. Also hit the Apps Script editor's known auto-indent/leftover-content quirk again while retyping `Code.gs` — a stray brace survived a partial edit and caused a real deploy-time syntax error, caught immediately by the deploy dialog and fixed before the next successful deploy
- Not yet tested live: submitting the new on-site Opportunity Registration form for real (would send a genuine Article 3 notice and start a real 48h clock, same deliberate hold as the original Google Form path)
