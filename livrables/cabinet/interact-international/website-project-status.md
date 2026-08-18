# Interact International Corporate Website — Status

_Last updated: 2026-08-17_

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
- **Do a final read-through of the live site** now that the redesign is published — About's new company-focused copy, Sectors & Approach's icon cards, and the new photography across Home/Services/Sectors & Approach
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

### 2026-08-15
- Built an interactive design-review prototype (Claude Artifact, not touching WordPress) reproducing all 5 pages with a white/ivory background toggle, to iterate on design feedback safely before touching the live site
- Improved the Sectors & Approach page: icon-based sector cards, "Where we work" stat callouts and country tags, 2x2 "Why Interact International" cards
- Reworked the About page: added "Who we are" and "What we stand for" sections; per Nacer's follow-up, removed the Leadership section entirely (didn't fit as a solo/small-team advisory) and replaced it with a "How we work" 3-step process section (Origination / Structuring / Execution)
- Sourced and added real, properly-licensed stock photography (standard Unsplash License, verified non-premium) across the prototype: an Addis Ababa skyline on Home, a diverse team/office photo on Services, a solar/energy installation on Sectors & Approach — chosen to be generic and documentary rather than staged as fake "team" or "client" photos, per brand guidelines' anti-stock-cliché rules and Nacer's explicit call for real (not AI-generated) images
- All images optimized (resized/compressed via CDN params, WebP, ~200-440KB each) and embedded in the prototype
- Prototype published/updated at the same Artifact URL for Nacer's review: https://claude.ai/code/artifact/1ee836e6-d216-49cb-a65a-52aeae8f52e6
- **Approved and ported to the live WordPress site.** In doing so, discovered the live site was further behind the prototype than expected: About was still the original personal-founder bio (from before the company-focused rewrite), and Sectors & Approach still had the old plain pill-tag/list layout — neither had actually been updated after the very first full-width layout-bug fix. Ported the full current state to live:
  - About (id=9): replaced the personal bio with the company-focused "Who we are" / "What we stand for" / "How we work" (3-step) content, no Leadership section
  - Sectors & Approach (id=8): replaced plain pill tags and list with icon-based sector cards, "Where we work" stat callouts + country tags, and the 2x2 "Why Interact International" icon cards
  - Home (id=6) and Services (id=7): added the photo bands (content otherwise already matched the prototype)
  - Added the new component CSS (photo bands, sector cards, geo-split stats, why-grid, step cards) to the child theme's `style.css`, deployed via SSH, and bumped the theme version (1.0.1 → 1.1.0) after discovering the hardcoded `?ver=` query string was serving a browser-cached copy of the old stylesheet
  - Uploaded the 3 photos to the WP media library (attachment IDs 21-23) and referenced them via their live `/wp-content/uploads/` URLs rather than inlining base64 (unlike the prototype, which embeds images directly since Artifacts can't reference external files)
  - New grid/card sections and photo bands use Gutenberg's Custom HTML block (`wp:html`) rather than native blocks, since they need the icon SVGs and CSS classes the design calls for; everything else uses native blocks as before
  - Verified live via browser screenshots on desktop: all 4 pages render correctly, icons/photos load, no layout regressions
- Photo bands resized to match the width of the surrounding text/card content (1140px, centered) instead of bleeding full viewport width, on Nacer's request. Bumped the child theme version twice more (1.1.0 → 1.2.0) to bust browser-cached CSS
- **Fixed a real mobile-nav bug, caught by Nacer on his phone**: the mobile menu overlay had zero inset padding, so menu items and the close button rendered flush against (and effectively past) the screen edge. Root cause: `theme.json`'s root padding top/bottom was set to unitless `"0"` instead of `"0px"`; WordPress turns that into a CSS custom property (`--wp--style--root--padding-top: 0`), and when a unitless `0` custom property is substituted into a `clamp()` argument, browsers treat the entire `padding` shorthand as invalid and drop it to `0` — this broke the nav overlay's inset specifically since that's the one place core CSS uses `clamp(1rem, var(--wp--style--root--padding-*), 20rem)`. Fixed by giving both values explicit units (`"0px"`) in `theme.json`, confirmed via isolated JS reproduction before and after
- Footer contact address changed from `nacer.adamou@interact-international.com` to `contact@interact-international.com`, on all pages and in the prototype
- Site title simplified from "Interact International Corporate portal" to "Interact International" (`wp option update blogname`) — updates automatically everywhere via the dynamic site-title block; also updated the prototype's static header brand text to match

### 2026-08-17
- Applied the "no white background" version to all 5 live pages, matching the prototype's ivory toggle. Several content sections (Home's "What we do", all 5 Services rows, Sectors' "Priority sectors" and "Why Interact International", About's "Who we are" and "How we work", Contact's form) were previously sitting directly on the theme's default white body background rather than a colored band; wrapped each in a full-bleed ivory `wp:group` so they read as proper bands like the rest of the site
- Also gave the site header an ivory background (previously white) via a new CSS rule targeting `header.wp-block-template-part`, for consistency
- Bumped the child theme version again (1.2.0 → 1.3.0) to bust cached CSS
- Verified live across all 5 pages via browser screenshots: no white sections remain anywhere
- **Found and fixed a real bug, caught by Nacer**: thin white slivers were visible between every top-level section (header/hero, hero/stats, stats/next section, etc.). Root cause: WordPress applies a default 24px `margin-block-start` between all top-level children of the page content wrapper (`:root :where(.is-layout-constrained) > *`); this always existed but was invisible while the header and gaps were both white. Once the header became ivory, the gap no longer matched either neighboring band and showed as a stray white line. Fixed by zeroing that margin specifically for direct children of the page's content wrapper (`.wp-block-post-content-is-layout-constrained > *`), leaving normal block-gap spacing intact everywhere else on the page. Bumped the child theme version again (1.3.0 → 1.4.0). Verified seamless across all 5 pages
- Contact page's on-page email (separate from the footer) updated from `nacer.adamou@interact-international.com` to `contact@interact-international.com`, per Nacer's follow-up request
- **Same block-gap bug, second location**: Nacer caught a remaining white sliver before the footer (and flagged possible remnants near the header/images too). The previous fix only patched gaps *within* the page content wrapper; WordPress applies the identical 24px `margin-block-start` rule one level up as well, between `<header>`, `<main>`, and `<footer>` as siblings of `.wp-site-blocks`. Extended the same override to that wrapper's direct children. Bumped the child theme version again (1.4.0 → 1.5.0). Verified seamless header-to-hero, section-to-section, and CTA-to-footer transitions on Home and Contact
