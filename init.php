<?php
/*
 * Plugin Name: Name of the plugin
 * Description: Description of the plugin
 * Version:     0.1
 * Author:      Author's name
 * Author URI:  Author's page
 * License:     GNU GPL 3
 * Text Domain: slug
*/

// Constants
if ( !defined( 'ABSPATH' ) )    exit;
if ( !defined( 'slug_NAME' ) )  define( 'slug_NAME', 'Name of the plugin' );
if ( !defined( 'slug_SLUG' ) )  define( 'slug_SLUG', 'slug' );
if ( !defined( 'slug_VER' ) )   define( 'slug_VER', '1.0.0' );
if ( !defined( 'slug_FILE' ) )  define( 'slug_FILE', __FILE__ );
if ( !defined( 'slug_URL' ) )   define( 'slug_URL', plugins_url('/', slug_FILE) );
if ( !defined( 'slug_JS' ) )    define( 'slug_JS', slug_URL . 'assets/js/' );
if ( !defined( 'slug_CSS' ) )   define( 'slug_CSS', slug_URL . 'assets/css/' );
if ( !defined( 'slug_IMG' ) )   define( 'slug_IMG', slug_URL . 'assets/images/' );
if ( !defined( 'slug_DIR' ) )   define( 'slug_DIR', plugin_dir_path( slug_FILE ) );
if ( !defined( 'slug_INC' ) )   define( 'slug_INC', slug_DIR . 'includes/' );
if ( !defined( 'slug_TPL' ) )   define( 'slug_TPL', slug_DIR . 'templates/' );

// Included files
include_once slug_INC.'functions.php';

// Enqueue assets
if (!function_exists('slug_enqueue_scripts')) {
    function slug_enqueue_scripts() {
        wp_register_script(slug_SLUG.'_scripts', slug_JS.'scripts.js', array('jquery'), slug_VER, true );
        wp_register_style(slug_SLUG.'_styles', slug_CSS.'styles.css', array(), slug_VER );
        wp_enqueue_script(slug_SLUG.'_scripts');
        wp_enqueue_style(slug_SLUG.'_styles');
    }
    add_action('wp_enqueue_scripts', 'slug_enqueue_scripts', 999);
}

// Enqueue admin assets
if (!function_exists('slug_enqueue_admin_scripts')) {
    function slug_enqueue_admin_scripts() {
        wp_register_script(slug_SLUG.'_admin_scripts', slug_JS.'admin_scripts.js', array('jquery'), slug_VER, true );
        wp_register_style(slug_SLUG.'_admin_styles', slug_CSS.'admin_styles.css', array(), slug_VER );
        wp_enqueue_script(slug_SLUG.'_admin_scripts');
        wp_enqueue_style(slug_SLUG.'_admin_styles');
    }
    add_action('admin_enqueue_scripts', 'slug_enqueue_admin_scripts', 999);
}

// Adding textdomain
if (!function_exists('slug_load_textdomain')) {
    function slug_load_textdomain() {
        load_plugin_textdomain( slug_SLUG, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'slug_load_textdomain' );
}
