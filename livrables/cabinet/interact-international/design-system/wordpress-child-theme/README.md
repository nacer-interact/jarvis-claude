# Interact International WordPress child theme

Source for the `interact-international-child` theme deployed at `wp-content/themes/interact-international-child/` on the live site (Twenty Twenty-Five parent).

## Files

- `style.css` — child theme header, plus CSS overrides for WPForms (its default blue submit button doesn't inherit theme.json, so it's restyled to match the brand buttons here)
- `theme.json` — Sovereign Green design system, copied from `../theme.json` with the Space Grotesk font family removed (not used on this site — that's the Interact Technologies sub-brand font)
- `functions.php` — enqueues parent + child stylesheets
- `parts/footer.html` — custom footer template part (legal entity line, Privacy Policy link, contact email)
- `templates/page.html` — overrides the parent's default page template, which auto-prints `wp:post-featured-image` and `wp:post-title` above the page content. Every page here supplies its own on-brand hero/heading already, so the auto title was a duplicate, unstyled heading; this override removes both blocks and keeps only `wp:post-content`.
- `pages/*.html` — archived copy of each live page's actual published block content (Home, Services, Sectors & Approach, About, Contact), for reference/reproducibility. Note: every top-level section that should show a full-bleed background color needs `"align":"full"` (and the `alignfull` class on its wrapper `<div>`) — the parent's `page.html` wraps `wp:post-content` in a constrained layout, so without an explicit full/wide alignment a section is capped at the 720px content width instead of spanning the viewport. This was the source of the "boxed, not full-width" bug found in the first version of these pages.

## Not included: font files

`assets/fonts/Inter-VariableFont.woff2` and `assets/fonts/SourceSerif4-VariableFont.woff2` are required by `theme.json` but not committed here (binary assets). Fetch them the same way used to build this theme and the design system style guide:

```
curl -sS "https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@600&family=Inter:wght@400;600&display=swap" -A "Mozilla/5.0" -o fonts.css
```

Then extract the "latin" subset woff2 URLs from that CSS (unicode-range `U+0000-00FF...`) and download them into `assets/fonts/` with the filenames above.
