<?php
/**
 * WP_Rig\WP_Rig\Custom_Logo\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Custom_Logo;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function add_theme_support;
use function apply_filters;

/**
 * Class for adding custom logo support.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'custom_logo';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_custom_logo_support' ) );
	}

	/**
	 * Adds support for the Custom Logo feature.
	 */
	public function action_add_custom_logo_support() {
		add_theme_support(
			'custom-logo',
			apply_filters(
				'wp_rig_custom_logo_args',
				array(
					'default-image'  => 'https://th.bing.com/th/id/R.6dd64ea46ee23f304be3139434a06e84?rik=vmglq1mJlTF1tg&riu=http%3a%2f%2f1000logos.net%2fwp-content%2fuploads%2f2017%2f11%2fDuke-University-Logo.png&ehk=U0DthDoAbcO4Luqo6jRa24AlJBQj4JfqeTxZINKg7O8%3d&risl=&pid=ImgRaw',
					'height'      => 250,
					'width'       => 250,
					'flex-width'  => false,
					'flex-height' => false,
				)
			)
		);
	}
}
