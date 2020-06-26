<?php

/*
 * Plugin Name: WP Code Snippet
 * Plugin URI: https://kamal.pw/wp-code-snippet
 * Description: The plugin for share code snippets in page, post or anywhere in your website
 * Version: 1.0
 * Author: Kamal Hosen
 * Author URI: https: //kamal.pw/
 * Text Domain: code-snippet
 * Domain Path: /languages/
 * License: GNU General Public License v2 or later
 */

if ( !defined( 'ABSPATH' ) ) {
    exit();
}
require_once __DIR__ . '/vendor/autoload.php';


if ( !class_exists( 'Code_Snippet' ) ) {
    class Code_Snippet {

        public function __construct() {
            $this->define_constants();
            add_action( 'wp_enqueue_scripts', [$this, 'cs_scripts_enqueue'] );
            new \Kamal\CodeSnippet\Blocks\Code_block();
           if(!is_admin()){
               new \Kamal\CodeSnippet\Shortcode\Shortcode();
           }
           add_action('plugins_loaded', [$this, 'boot_carbon_fields']);
           //\Carbon_Fields\Carbon_Fields::boot();
        }

        public function boot_carbon_fields()
        {
            \Carbon_Fields\Carbon_Fields::boot();
        }

        public static function init() {

            static $instance = false;

            if ( !$instance ) {
                $instance = new self();
            }

            return $instance;
        }

        public function define_constants() {
            define( 'CS_VERSION', '1.0.0' );
            define( 'CS_FILE', __FILE__ );
            define( 'CS_PATH', __DIR__ );
            define( 'CS_URL', plugins_url( '', CS_FILE ) );
            define( 'CS_ASSETS', CS_URL . '/assets' );
        }

        public function cs_scripts_enqueue() {
            wp_enqueue_style( 'prism-css', CS_ASSETS . '/css/prism.css' );
            wp_enqueue_script( 'prism-js', CS_ASSETS . '/js/prism.js', array(), CS_VERSION, true );
        
        }

    }
}

function codeSnippet_init() {
    return Code_Snippet::init();
}

codeSnippet_init();


