# Interact International Corporate Website — Status

_Last updated: 2026-08-15_

## Goal / Objective

Build the Interact ecosystem's online presence and drive traffic and opportunities.

## Description

Build the corporate website of Interact International, as well as its advisory and its technology branches' websites. Intended to provide visibility for all of Cabinet's projects.

## Current Phase

**Parent site (interact-international.com) is live** with the Sovereign Green design system applied and all 5 pages published. Advisory and technology branch sites remain a deferred Phase 2 (see below), not started.

## Completed

- SSH access set up to the o2switch account (key-based, WP-CLI available)
- MySQL database and user created and privileged
- WordPress core installed via WP-CLI at `interact-international.com`, title "Interact International Corporate portal"
- Pretty permalinks and REST API confirmed working
- **Child theme built and deployed** (`interact-international-child`, based on Twenty Twenty-Five): applies `design-system/theme.json` (Pine/Gold/Ivory palette, Source Serif 4 + Inter, self-hosted fonts), verified live in rendered CSS
- **All 5 pages built and published** with native Gutenberg blocks, using the existing Website Build Pack copy: Home (set as front page), Services, Sectors & Approach, About, Contact
- **Contact form wired up** via WPForms Lite (Name/Email/Message, honeypot spam protection, notifications to `admin@interact-international.com`) — built via WPForms' internal API since WP-CLI has no native command for it; structurally verified (fields render, submits via AJAX) but **actual email delivery not yet confirmed** — needs a real test submission from Nacer
- Rank Math SEO installed and active; WordPress core's built-in sitemap confirmed working at `/wp-sitemap.xml` (Rank Math's own sitemap route needs its setup wizard completed in wp-admin before it takes over)
- Navigation menu and footer built (footer: "Interact International LLC (Wyoming) © 2026", Privacy Policy link, contact email)
- Privacy Policy page finished and published (was draft boilerplate, now real content)
- Default Sample Page removed
- Content decisions confirmed with Nacer: stay generic on JFA/BRICS Alliance naming, stay generic on named mandates (Chad/Madagascar), footer entity is Interact International LLC (Wyoming)
- All pages verified returning HTTP 200, fonts verified loading (not falling back to system fonts), no "discourage search engines" setting active
- **Fixed after Nacer's first visual review caught real layout bugs**: sections were capped at a narrow 720px width instead of spanning the viewport (missing `align:full` on the color-band wrappers), the theme was auto-printing a duplicate unstyled page title above every page's own hero, the pull-quote's gold accent border was stuck at the browser's edge instead of next to the text, and the contact form's submit button was WPForms' default blue instead of brand pine green. All four fixed and re-verified visually via actual browser screenshots (desktop 1440px and mobile ~390px) across all 5 pages, not just HTML inspection

## Open items for Nacer

- **Confirm the contact form actually delivers email** to `admin@interact-international.com` (or specify a different address) — submit one real test enquiry via the live site
- **Rank Math setup wizard** not yet run (needs wp-admin login) — WP core's sitemap already works as a fallback in the meantime
- **No founder photo** on the About page yet — not blocking, can be added anytime
- **No real photography anywhere on the site** — every reference site Nacer shared (Ourama, Consulting Success, Wellness by Myhra) uses large real photography prominently; our brand guidelines explicitly reject generic/stock imagery in favor of documentary Africa photography, which nobody has sourced yet. This is a real gap worth closing, but needs real photo assets, not something to fabricate.
- Submit the sitemap to Google Search Console (needs Nacer's Search Console access)

## In Progress / Up Next

- Phase 2 (no deadline): Interact Technologies site, AI/drone capability hubs, gated Intelligence Extranet, Multisite network — explicitly deferred, see `design-system/README.md`

## Deadline

End of August 2026

## Status Log

### 2026-08-15
- Project created: build the corporate website of Interact International plus its advisory and technology branches' websites
- Goal: build the Interact ecosystem's online presence and drive traffic and opportunities
- Deadline set: end of August 2026
- Hosting infrastructure already in place ahead of this kickoff: `interact-international.com` set up as an addon domain on o2switch with mail routing kept on Google Workspace (see this theme's main `project-status.md` for the hosting details)
- SSH access configured (key-based) to enable WP-CLI management
- WordPress core installed on the parent domain, database provisioned, permalinks and REST API confirmed working
- Admin username set to a non-default value (`iiportal_mgr`) rather than `admin`; DB and admin credentials stored in `.env`, rotated once after initial generation
- Site fully built out: child theme applying the Sovereign Green design system, all 5 pages (Home/Services/Sectors & Approach/About/Contact) published with real copy, working contact form, nav/footer, Privacy Policy finished, Rank Math + WPForms installed, WP core sitemap confirmed working
- Confirmed with Nacer: generic (not named) language for JFA/BRICS Alliance and for Chad/Madagascar mandates; footer legal entity is Interact International LLC (Wyoming)
- Remaining before full launch sign-off: real email-delivery test on the contact form, Rank Math setup wizard, founder photo (optional), Search Console submission

### 2026-08-16
- Nacer's first visual review of the live site found it "far from professional and responsive" — a real bug, not a false alarm: every section was boxed at 720px width with large white margins instead of spanning the viewport, and the page title was duplicated (theme auto-title + our own on-brand hero heading)
- Root cause: the parent theme's `page.html` template auto-prints `wp:post-title`, and none of our section wrappers declared `align:full`, so they defaulted to the constrained 720px content width
- Fixed: added a `templates/page.html` override in the child theme (drops the auto title/featured-image), added `align:full`/`align:wide` to every section wrapper across all 5 pages, fixed a pull-quote border that ended up pinned to the browser edge once its wrapper went full-width, and restyled WPForms' default blue submit button to match the brand
- Verified via actual browser screenshots (not just HTML inspection) at desktop (1440px) and mobile (~390px) across all 5 pages — confirmed full-bleed sections, correct type, no duplicate titles, correctly stacked/scaled mobile layout
- Nacer also shared 3 consulting-firm reference sites (Ourama, Consulting Success, Wellness by Myhra); the clearest gap versus these references is that our site has no real photography anywhere, while brand guidelines reject stock/generic imagery — flagged as an open item needing real assets, not fabricated ones
