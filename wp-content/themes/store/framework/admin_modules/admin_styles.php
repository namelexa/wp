<?php
/**
* Enqueue Scripts for Admin
*/
function store_custom_wp_admin_style() {
wp_enqueue_style( 'store-admin_css', get_template_directory_uri() . '/assets/theme-styles/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'store_custom_wp_admin_style' );
