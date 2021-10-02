<?php
// REMOVE WP EMOJI: Custom JavaScript is not allowed.
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Disable admin bar: Custom JavaScript is not allowed.
add_filter('show_admin_bar', 'is_blog_admin');

// Disable WP Embed: Custom JavaScript is not allowed.
add_action('init', 'disable_wp_embed');
function disable_wp_embed() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}
// Disable JQuery: Custom JavaScript is not allowed.
add_action('init', 'disable_jquery');
function disable_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
	}
}
// Disable Block Library CSS: The attribute 'href' in tag 'link rel=stylesheet for fonts' is set to the invalid value.
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css' );
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
}
?>