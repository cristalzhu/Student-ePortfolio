<?php
/**
 * WP_Rig\WP_Rig\Scripts\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Scripts;

use WP_Rig\WP_Rig\Component_Interface;

use function wp_enqueue_script;
use function wp_enqueue_style;
use function get_theme_file_uri;
use function get_theme_file_path;

/**
 * Class for managing scripts integration.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'scripts';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	/**
	 * Enqueues Slick JavaScript and styles.
	 */
	public function action_enqueue_slick() {
		wp_enqueue_script(
			'wp-rig-slick-script',
			get_theme_file_uri( '/assets/js/carousel.min.js' ),
			array(),
			'',
			false
		);
		wp_script_add_data( 'wp-rig-slick-script', 'defer', true );
		wp_script_add_data( 'wp-rig-slick-script', 'precache', true );

		wp_enqueue_style( 'wp-rig-slick', get_theme_file_uri( '/assets/css/vendor/slick.css' ), array(), null );
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function action_enqueue_accordion() {
		wp_enqueue_script(
			'wp-rig-accordion-script',
			get_theme_file_uri( '/assets/js/accordion.min.js' ),
			array(),
			'',
			false
		);
		wp_script_add_data( 'wp-rig-accordion-script', 'defer', true );
		wp_script_add_data( 'wp-rig-accordion-script', 'precache', true );
	}

	public function initialize() {
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_slick' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_accordion' ) );
	}

}