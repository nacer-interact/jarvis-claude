# Interact International WordPress child theme

Source for the `interact-international-child` theme deployed at `wp-content/themes/interact-international-child/` on the live site (Twenty Twenty-Five parent).

## Files

- `style.css` — child theme header
- `theme.json` — Sovereign Green design system, copied from `../theme.json` with the Space Grotesk font family removed (not used on this site — that's the Interact Technologies sub-brand font)
- `functions.php` — enqueues parent + child stylesheets
- `parts/footer.html` — custom footer template part (legal entity line, Privacy Policy link, contact email)

## Not included: font files

`assets/fonts/Inter-VariableFont.woff2` and `assets/fonts/SourceSerif4-VariableFont.woff2` are required by `theme.json` but not committed here (binary assets). Fetch them the same way used to build this theme and the design system style guide:

```
curl -sS "https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@600&family=Inter:wght@400;600&display=swap" -A "Mozilla/5.0" -o fonts.css
```

Then extract the "latin" subset woff2 URLs from that CSS (unicode-range `U+0000-00FF...`) and download them into `assets/fonts/` with the filenames above.
