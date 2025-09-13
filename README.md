# vax-micro-ux
VAX Micro UX (our new “Back to Top” that ships zero JS) is the first in a line of plugins designed to be aggressively unexciting.
# VAX Micro UX — Back to Top (No JS)

A tiny, accessible **Back to Top** for long posts. **Zero JavaScript**, mobile-first, native smooth scroll, respects **reduced motion**.

- **Download:** [Latest ZIP](https://github.com/Vibeaxis/vax-micro-ux/releases/latest/download/vax-micro-ux.zip)
- **WordPress.org:** https://wordpress.org/plugins/vax-micro-ux/

## Why
Stop shipping 30KB of ego to do an anchor jump. Use the platform:
- anchor → jump
- CSS `scroll-behavior` → smooth (disabled for reduced motion)
- inline SVG `fill="currentColor"` → theme controls the icon

## Install
1. Upload `vax-micro-ux.zip` to **Plugins → Add New → Upload**.
2. Activate.
3. On **long posts** (default ≥ 900 words), a small button appears bottom-right on mobile.

## Customize (filters)
```php
add_filter('vax_backtop_min_words', fn()=>1200);
add_filter('vax_backtop_mobile_breakpoint', fn()=>768);
add_filter('vax_backtop_bg', fn()=> '#ffd400');
add_filter('vax_backtop_fg', fn()=> '#000000');
Accessibility
Real link + aria-label, keyboard focus ring via :focus-visible, honors prefers-reduced-motion.

License
GPL-2.0-or-later. See LICENSE.
