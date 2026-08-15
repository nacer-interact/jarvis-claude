# Interact International — Design System Audit

_Date: 2026-08-15_
_Source: Interact International Drive material (Brand Guidelines, logo assets, `sovereign-green.css`, WordPress Design System Starter, website prototype, LinkedIn pack) + UI/UX industry best-practice review_

## What's genuinely strong

- **Brand foundation is well-articulated**: clear mission, positioning ("advisor, not broker"), personality table, disciplined voice/messaging guide with an approved/avoid vocabulary list.
- **Color system is properly executed, not just picked**: five colors (Pine `#11392B`, Gold `#C9A24B`, Sage `#6E8B7B`, Ink `#1A1F1C`, Ivory `#F7F4EC`), each with hex/RGB/CMYK/Pantone, a stated 60/30/10 usage proportion, and actual calculated WCAG contrast ratios, including a self-caught gotcha ("gold on pine ≈ 4.0:1, large text/non-text only, never body copy").
- **Logo process was real, not arbitrary**: four concepts explored (Pillars & Bridge, Convergence, Gateway, Bridge Span) before landing on Pillars & Bridge, a mark that conceptually encodes the company's positioning. Shipped in all standard variants: primary, reversed, monochrome, stacked, mark-only, favicon.
- **Governance instincts are good**: versioned document, "single source of truth" folder rule, one-line pre-publish check.
- **Accessibility is first-class, not an afterthought**: WCAG 2.2 AA target, contrast pairs computed, visible focus ring token, minimum touch target size, reduced-motion respect.

## Critical problems

1. **Two incompatible brand systems currently coexist, never reconciled.** The official system (Brand Guidelines, real logo SVGs, `sovereign-green.css`) is Pine Green + Gold. The actual built website prototype (`index.html`) and the LinkedIn launch pack (created the same day, ~2 hours earlier) use a different **Navy `#1F355E` + Gold `#B48A3A`, "II monogram"** identity — which the brand guidelines explicitly call out as "the generic finance default we deliberately avoid." Worth checking whether any navy material is actually live publicly (LinkedIn page, a published site) separate from the redesign.
2. **Two different token architectures, not reconciled.** `sovereign-green.css` (June) is flat, single-tier (`--ii-pine`, `--ii-gold` used directly). The August WordPress spec introduces a proper 4-layer model (Global → Semantic → Brand → Capability/State) but was never backported to the CSS file or brand guidelines.
3. **Nothing is platform-agnostic, despite the multi-platform goal.** Every artifact assumes WordPress (`theme.json`, WP block registrations, CSS custom properties tied to a WP theme). No design-token distribution layer, no mobile-specific guidance (native component mapping, touch interaction patterns beyond touch-target size, app icon spec, dark mode).
4. **No actual design tool source of truth exists.** The August doc's "Handoff notes" say Figma should mirror the token layers, but nothing indicates a Figma library was actually built. The system lives entirely in documents and code snippets.
5. **Iconography was never actually chosen** — guidance says "pick one outline set" (Tabler/Feather/Phosphor) but no selection was made.
6. **Two sub-brand tokens are still placeholders from August, unresolved**: Interact Technologies' accent color (`#0E7C86`) and heading typeface (`Space Grotesk`), both tagged PLACEHOLDER.

## Minor notes

- Type scale is hand-picked pixel values, not a mathematical ramp — not wrong for an editorial brand, but worth a deliberate decision if rebuilt.
- No dark mode consideration anywhere.
- Photography and motion direction (documentary, real-Africa imagery, flat/no-gradients, restrained motion) are well-specified and worth carrying forward.

## Bottom line

The brand thinking (positioning, color psychology, logo concept, voice) is solid and worth keeping. What needs rebuilding is the system engineering: one reconciled token architecture, a real multi-platform token pipeline, an actual component library in a design tool, resolved sub-brand placeholders, and a decision on the navy/II-monogram materials if live anywhere.
