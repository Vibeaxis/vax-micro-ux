=== VAX Micro UX ===
Contributors: vibeaxis
Tags: ux, back to top, accessibility, performance
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

No-JS “Back to Top” for long posts. Mobile-first. Native smooth scroll. Respects reduced motion. Zero settings.

== Description ==
Most “Back to Top” widgets ship 30KB to do a native anchor jump. This one doesn’t.

**VAX Micro UX** adds a small Back-to-Top button **only on long posts** (default: 900+ words). It’s **mobile-first**, ships **zero JavaScript**, uses CSS `scroll-behavior` (and **disables** it for `prefers-reduced-motion`), and includes an inline SVG icon that inherits your theme color.

- **Plugin homepage:** https://vibeaxis.com/plugins/vax-micro-ux/
- **GitHub (latest ZIP):** https://github.com/ViableOutreach/vax-micro-ux/releases/latest/download/vax-micro-ux.zip

Privacy-friendly by default: no tracking, no remote calls, no options table writes.

== Installation ==
1. **Download** the ZIP from GitHub:  
   https://github.com/ViableOutreach/vax-micro-ux/releases/latest/download/vax-micro-ux.zip
2. In WordPress, go to **Plugins → Add New → Upload Plugin**, choose the ZIP, and **Activate**.
3. View a long post on mobile (or narrow your browser). The button appears bottom-right.

== Frequently Asked Questions ==

= Can I change the word threshold or colors? =
Yes—use filters (in your theme or an mu-plugin):

```php
add_filter('vax_backtop_min_words', fn()=>1200);        // default 900
add_filter('vax_backtop_mobile_breakpoint', fn()=>768); // default 900px
add_filter('vax_backtop_bg', fn()=> '#ffd400');         // button bg
add_filter('vax_backtop_fg', fn()=> '#000000');         // arrow color
= Does it load JavaScript? =
No. It uses an anchor and CSS. If your theme ignores wp_body_open, the link still jumps to the top (0,0) gracefully.

= Which hooks does it use? =
wp_body_open, wp_footer, and wp_enqueue_scripts.

== Screenshots ==

Mobile “Back to Top” button (bottom-right).

== Changelog ==
= 1.0.3 =

Meta: “Tested up to” uses major.minor (6.8) for wp.org compatibility.

UI: inline SVG uses fill="currentColor"; focus-visible ring; small hover polish.

= 1.0.2 =

Fix: arrow visibility + reduced-motion handling clarified.

= 1.0.0 =

Initial release.

== Upgrade Notice ==
= 1.0.3 =
Arrow is visible on dark themes; metadata cleaned up. Safe to update.

== Links ==

Homepage: https://vibeaxis.com/plugins/vax-micro-ux/

GitHub: https://github.com/Vibeaxis/vax-micro-ux

Direct ZIP: https://github.com/vibeaxis/vax-micro-ux/releases/latest/download/vax-micro-ux.zip