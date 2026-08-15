# Interact International Design System v2.0 — "Sovereign Green"

_Date: 2026-08-15_
_Supersedes: `Interact_International_Brand_Guidelines.docx` (v1.0, June 2026) and the August 2026 WordPress Design System Starter, reconciled into one system._

This is the rebuild described in `design-system-audit.md`. It keeps everything that audit called out as genuinely strong (brand foundation, color psychology, logo, voice, accessibility discipline) and fixes what it called out as broken (two token architectures, WordPress-only scope, unresolved placeholders, no real source of truth).

## What changed from the old system

| Problem (from the audit) | Fix |
|---|---|
| Two token architectures (flat CSS vs. layered `theme.json`) never reconciled | One master source, `tokens.json`, with primitive → semantic → brand → capability → state layers. Every other file in this folder is generated from it. |
| Everything assumed WordPress | `tokens.json` is platform-neutral. `tokens.css` (web) and `tokens.mobile.json` (native/React Native) are both generated from it, so a future mobile app pulls the same values as the website. |
| Interact Technologies' accent color and heading font still "PLACEHOLDER" | Resolved. Tech Cyan `#128C97` chosen because it's the only candidate that clears the WCAG 3:1 non-text/UI contrast threshold on white, ivory, *and* pine simultaneously — see `tokens.json` → `brand.technology._decision` for the full rationale. Space Grotesk heading font confirmed as final. |
| AI/drone "capability accent" tokens still placeholder | Resolved: Indigo `#4A4E9E` (AI), Rust `#B0562E` (drone) — both contrast-checked, both documented as light-surface/wayfinding-only. |
| State colors ("to define") | Resolved: success/warning/error/info, all contrast-checked, all documented as fill+icon-only (never as text color alone), matching the existing Gold rule rather than inventing a new pattern. |
| Icon set never chosen | Resolved: **Phosphor Icons** (MIT license, consistent stroke weight, ships as SVG and as React/React Native/Flutter packages — same icons work on web and mobile). |
| No real design-tool source of truth | No Figma access from this session, so the practical equivalent was built instead: a living, interactive style guide (`style-guide.html`, published separately) that shows every token in actual use — colors, type scale, spacing, buttons, cards, tags, state banners. If/when Figma access is set up, `tokens.json` is the file to import as variables. |

## Files in this folder

- `tokens.json` — the single source of truth. Edit this, not the generated files.
- `tokens.css` — web output (CSS custom properties + base component classes).
- `tokens.mobile.json` — flat, platform-neutral output for a native/React Native build.
- `theme.json` — WordPress global styles, reconciled with the resolved tokens.
- `style-technology.json` — WordPress style variation for Interact Technologies (formerly placeholder, now final).

## Open item carried over, not yet resolved

The audit flagged a **superseded Navy `#1F355E` + Gold "II monogram" identity** that appeared in the original website prototype and LinkedIn launch pack — inconsistent with this system. This rebuild did not touch that; it still needs a decision: check whether any navy material is live publicly, and if so, replace it with Sovereign Green assets.

## Using this system

**Web (current WordPress site):** load `tokens.css`, or apply `theme.json` / `style-technology.json` directly to the block theme.

**Mobile (future app):** consume `tokens.mobile.json` directly as style constants, or map its values to native color/font resources (iOS `UIColor`/`Color`, Android `colors.xml`/Compose `Color`).

**Any new platform:** treat `tokens.json` as the only place values are allowed to originate. If a new value is needed, add it there first, contrast-check it if it's a color, and only then use it downstream.
