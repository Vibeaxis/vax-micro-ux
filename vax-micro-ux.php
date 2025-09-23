<?php
/*
Plugin Name: VAX Micro UX
Description: No-JS “Back to Top” button for long posts. Mobile-only by default. Native smooth scroll. Zero dependencies.
Version: 1.0.3
Author: VibeAxis
Author URI: https://vibeaxis.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 5.8
Tested up to: 6.8
Requires PHP: 7.4
Text Domain: vax-micro-ux
*/

if (!defined('ABSPATH')) exit;

function vaxmu_min_words(){ return (int) apply_filters('vax_backtop_min_words', 900); }
function vaxmu_breakpoint(){ return (int) apply_filters('vax_backtop_mobile_breakpoint', 900); }
function vaxmu_bg(){ return apply_filters('vax_backtop_bg', '#0a0a0a'); }
function vaxmu_fg(){ return apply_filters('vax_backtop_fg', '#ffffff'); }

add_action('wp_body_open', function () {
  if (!function_exists('is_singular') || !is_singular('post')) return;
  echo '<div id="va-top" aria-hidden="true"></div>';
}, 5);

add_action('wp_footer', function () {
  if (!is_singular('post') || is_admin() || is_feed()) return;
  global $post; if (!$post) return;

  $word_count = str_word_count( wp_strip_all_tags( $post->post_content ) );
  if ($word_count < max(0, vaxmu_min_words())) return;

  echo '<a href="#va-top" class="va-backtop" aria-label="'.esc_attr__('Back to top','vax-micro-ux').'">'
     . '<svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 5l-7 7h4v7h6v-7h4l-7-7z"/></svg>'
     . '</a>';
}, 99);

add_action('wp_enqueue_scripts', function(){
  if (!is_singular('post')) return;

  wp_register_style('vax-micro-ux', false, [], '1.0.3');
  wp_enqueue_style('vax-micro-ux');

  $bp = vaxmu_breakpoint(); $bg = vaxmu_bg(); $fg = vaxmu_fg();
  $css = "
  html{scroll-behavior:smooth}
  @media (prefers-reduced-motion:reduce){html{scroll-behavior:auto}}
  .va-backtop{
    position:fixed; right:max(16px, env(safe-area-inset-right));
    bottom:max(16px, calc(env(safe-area-inset-bottom) + 16px));
    width:44px;height:44px;border-radius:999px; display:grid; place-items:center;
    z-index:9999; background:{$bg}; color:{$fg}; text-decoration:none;
    border:1px solid rgba(255,255,255,.08); box-shadow:0 6px 20px rgba(0,0,0,.25)
  }
  .va-backtop svg{display:block}
  .va-backtop svg path{fill:currentColor}
  .va-backtop:focus-visible{outline:2px solid currentColor; outline-offset:2px}
  .va-backtop:hover{opacity:.95}
  @media (min-width: {$bp}px){ .va-backtop{ display:none } }
  ";
  wp_add_inline_style('vax-micro-ux', $css);
}, 20);
require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
$vxmu_update = Puc_v4_Factory::buildUpdateChecker(
  'https://github.com/vibeaxis/vibeaxis-micro-ux/',
  __FILE__,
  'vibeaxis-micro-ux'
);
$vxmu_update->setBranch('main'); // or 'master'
