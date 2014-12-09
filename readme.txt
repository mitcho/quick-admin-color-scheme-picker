=== Quick admin color scheme picker ===
Contributors: mitchoyoshitaka, nacin, koop
Author: mitcho (Michael 芳貴 Erlewine)
Author URI: http://mitcho.com/
Donate link: https://tinyurl.com/donatetomitcho
Tags: admin, admin color, UI, color, color scheme, customization, Sara Cannon
Requires at least: 3.3
Tested up to: 4.0.1
Stable tag: 0.7

Lets you quickly switch between admin color schemes from the "howdy menu." Happy Birthday Sara Cannon!

[Contribute to development on GitHub.](https://github.com/mitcho/quick-admin-color-scheme-picker)

== Description ==

Lets you quickly switch between admin color schemes from the "howdy menu." Happy Birthday Sara Cannon!

== Screenshots ==

1. The admin color scheme picker in the "howdy menu."
2. Fully compatible with WordPress 3.3.

== Changelog ==

= 0.7 =
* Code cleanup; rm support for WP < 3.3

= 0.6 =
* Use `user_meta` instead of user options. Plays better with the user profile screen. Props nacin.
* Align color swatches better. The angel may be in the policy, but the devil is in the details.

= 0.5 =
* Only display the menu if `is_admin()`. Props koop.

= 0.4 =
* Update to work with WP 3.3, post-[19230](http://core.trac.wordpress.org/changeset/19230). Hopefully this will be the last of the 3.3 fixes...
* Now using `add_menu` instead of `add_note`, following a stern warning from nacin.

= 0.3 =
* Update to work with WP 3.3's admin bar, at least as of beta 2.

= 0.2 =
* Code cleanup. Props nacin.

= 0.1 =
* First commit
