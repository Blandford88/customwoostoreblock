<?php
/**
 * Plugin Name: WooCommerce Products Gutenberg Block
 * Description: A custom Gutenberg block to display WooCommerce products.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: woocommerce-products-block
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constants.
define( 'WCPB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WCPB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue block assets.
function wcpb_enqueue_block_assets() {
    // Enqueue frontend styles.
    wp_enqueue_style(
        'wcpb-frontend-style',
        WCPB_PLUGIN_URL . 'build/style.css',
        array(),
        filemtime( WCPB_PLUGIN_DIR . 'build/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'wcpb_enqueue_block_assets' );

// Enqueue block editor assets.
function wcpb_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'wcpb-block-editor',
        WCPB_PLUGIN_URL . 'build/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
        filemtime( WCPB_PLUGIN_DIR . 'build/block.js' ),
        true
    );

    wp_enqueue_style(
        'wcpb-editor-style',
        WCPB_PLUGIN_URL . 'build/editor.css',
        array( 'wp-edit-blocks' ),
        filemtime( WCPB_PLUGIN_DIR . 'build/editor.css' )
    );
}
add_action( 'enqueue_block_editor_assets', 'wcpb_enqueue_block_editor_assets' );
