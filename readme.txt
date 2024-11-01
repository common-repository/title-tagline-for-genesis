=== Title Tagline for Genesis ===
Contributors: phpbits
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FMKC2SLPTULP8
Tags: genesis, genesis framework, title, title tagline, genesis title tagline, below title
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add title tagline text below your post title on your Genesis Framework powered WordPress sites.

== Description ==

<strong>This plugin will only work if you are using <a href="http://goo.gl/rL2pPZ" target="_blank" rel="nofollow">Genesis Framework or Child Themes</a>.</strong>

<h3>Extra Tagline below Post Title</h3>
Improve your blog post readability by adding title tagline below your post title which can be added easily via custom metabox available on the post edit dashboard page.

<h3>Allow Tagline on Page or Custom Post Types</h3>
Of course you can add tagline on pages and post types too. Just add the filter below on your functions.php with the post type you'll want to be added. Easy!
<pre>add_filter( 'genesis_title_tagline_post_types', 'genesis_add_title_tagline_post_types' );
function genesis_add_title_tagline_post_types( $types ){
 	$types[] = 'page';
 	$types[] = 'custom_post_type';
 	return $types;
}</pre>

<h3>Styling</h3>
If you need to add custom css to title tagline, you can use something like this one which changes the opacity.
<pre>.entry-title-tagline{ opacity: 0.8; }</pre>

<strong>More information</strong>

* Follow the developer <a href="https://twitter.com/phpbits" target="_blank">@Twitter</a>
* Other <a href="https://phpbits.net/plugins/">Genesis Framework Compatible WordPress plugins</a>

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the full directory into your wp-content/plugins directory
2. Activate the plugin at the plugin administration page
3. Go edit any post and you'll get "Title Tagline" metabox below the editor
4. I hope you'll love this plugin :)

== Frequently Asked Questions ==


== Screenshots ==

1. Metabox

== Changelog ==

= 1.0 =
* Initial Plugin release

== Upgrade Notice ==

= 1.0 =
* Initial Plugin release
