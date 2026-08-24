=== Promos Lite ===

Contributors: templatesell
Theme URI: https://www.templatesell.com/item/promos-plus/
Author URI: https://www.templatesell.com/
Tags: grid-layout, one-column, two-columns, three-columns, four-columns, left-sidebar, right-sidebar, custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, footer-widgets, custom-colors, custom-header, editor-style, rtl-language-support, theme-options, blog, news
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 7.1
Stable tag: 1.0.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A perfect theme for blog and magazine site. This theme has search option, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. It comes with primary color option to change the whole site color with a single click. 

== Description ==

A perfect theme for blog and magazine site. This theme has search option, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. It comes with primary color option to change the whole site color with a single click. 

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Changelog ==
= 1.0.2 - August 24 2026 =

Fixed
* The child claimed the handle 'promos-fonts', which the parent already uses for its own bundled fonts.css. A child's enqueue callback runs first, so the child's registration won and the parent's was discarded - and the child's URL supplies only Karla and Playfair Display. The parent's stylesheet asks for Lato in six rules and Lora in four, and neither face was being served at all; measured in the browser, they were simply not declared. The child's faces have their own handle now, so both stylesheets load
* css/bootstrap.css was enqueued twice by this file, once as 'bootstrap-css' and again as 'grid-css' - the same stylesheet under two handles - so every page downloaded 184 KB of Bootstrap twice. 'grid-css' is the parent's own handle, so registering it here also replaced the parent's version with a hard-coded '4.5.0'. The parent enqueues that file already and the child needs neither line
* 'bootstrap-css' carried '' as its version, which WordPress treats as a string rather than as "no version", so that copy went out as bootstrap.css?ver=7.1
* The child stylesheet was enqueued under the handle 'promos-blog-style' - a different theme's name, copied in along with the rest of the file
* The parent's 'promos-style' handle was registered here with no version, so WordPress substituted its own and the parent stylesheet was served as style.css?ver=7.1. It carries the parent's version now. The handle does still have to be registered here, because the parent enqueues it with get_stylesheet_uri(), which on a child install resolves to this theme's style.css
* $parent_style was assigned and never used
* The child theme's text domain was loaded without being told where its language files are
* style.css lists custom-background as a theme tag, but the theme never called add_theme_support() for it, so the Background control never appeared in the Customizer and the tag was a claim the theme did not honour

Other
* Added languages/promos-lite.pot
* Tested up to WordPress 7.1

= 1.0.1 - July 12 2022 =
* Remove commented codes

= 1.0.0 - July 11 2022 =
* Initial Submission

== Credits ==
Promos Lite is a child theme of Promos by, Template Sell.
Promos Lite is distributed under the terms of the GNU GPL v2 or later.

Promos is free WordPress theme by, Template Sell.
Promos is distributed under the terms of the GNU GPL v2 or later.

* Karla, Copyright (c) Jonathan Barnbrook and Marta Bernstein, [SIL Open Font License 1.1](https://scripts.sil.org/OFL) - fetched and cached locally by the bundled WPTT webfont loader

== Screenshot Images [CCO License] ==
Image for theme screenshot, Copyright Joe deSousa
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/pretty-isolated-T14MLGJHIR

Image for theme screenshot, Copyright Mary
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/tulip-flowers-YXW7KMHAOB

Image for theme screenshot, Copyright Marina Pershina
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/essentialoil-cosmeticoil-YWGBUF1QKI

Image for theme screenshot, Copyright Revac Film's&Photography
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/flower-bloom-RGRMFSY573

== Library/External Sources ==
* Webfont loader  https://github.com/WPTT/webfont-loader https://github.com/WPTT/webfont-loader/blob/master/LICENSE
