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
