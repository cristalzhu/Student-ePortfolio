<?php
/**
 * WP_Rig\WP_Rig\Editor\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Editor;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function add_theme_support;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'editor';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_add_editor_support' ) );
	}

	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for color palettes.
		 *
		 * To preserve color behavior across themes, use these naming conventions:
		 * - Use primary and secondary color for main variations.
		 * - Use `theme-[color-name]` naming standard for standard colors (red, blue, etc).
		 * - Use `custom-[color-name]` for non-standard colors.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-colors' );
		 */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Duke Navy Blue', 'wp-rig' ),
					'slug'  => 'theme-duke-navy-blue',
					'color' => '#012169',
				),
				array(
					'name'  => __( 'Duke Royal Blue', 'wp-rig' ),
					'slug'  => 'theme-duke-royal-blue',
					'color' => '#00539B',
				),
				array(
					'name'  => __( 'Copper', 'wp-rig' ),
					'slug'  => 'theme-duke-copper',
					'color' => '#C84E00',
				),
				array(
					'name'  => __( 'Persimmon', 'wp-rig' ),
					'slug'  => 'theme-duke-persimmon',
					'color' => '#E89923',
				),
				array(
					'name'  => __( 'Dandelion', 'wp-rig' ),
					'slug'  => 'theme-duke-dandelion',
					'color' => '#FFD960',
				),
				array(
					'name'  => __( 'Piedmont', 'wp-rig' ),
					'slug'  => 'theme-duke-piedmont',
					'color' => '#A1B70D',
				),
				array(
					'name'  => __( 'Eno', 'wp-rig' ),
					'slug'  => 'theme-duke-eno',
					'color' => '#339898',
				),
				array(
					'name'  => __( 'Magnolia', 'wp-rig' ),
					'slug'  => 'theme-duke-magnolia',
					'color' => '#1D6363',
				),
				array(
					'name'  => __( 'Prussian Blue', 'wp-rig' ),
					'slug'  => 'theme-duke-prussian-blue',
					'color' => '#005587',
				),
				array(
					'name'  => __( 'Shale Blue', 'wp-rig' ),
					'slug'  => 'custom-duke-shale-blue',
					'color' => '#0577B1',
				),
				array(
					'name'  => __( 'Ironweed', 'wp-rig' ),
					'slug'  => 'custom-duke-ironweed',
					'color' => '#993399',
				),
				array(
					//
					'name'  => __( 'Hatteras', 'wp-rig' ),
					'slug'  => 'theme-duke-hatteras',
					'color' => '#E2E6ED',
				),
				array(
					'name'  => __( 'Whisper Gray', 'wp-rig' ),
					'slug'  => 'theme-duke-whisper-gray',
					'color' => '#F3F2F1',
				),
				array(
					'name'  => __( 'Ginger Beer', 'wp-rig' ),
					'slug'  => 'theme-duke-ginger-beer',
					'color' => '#FCF7E5',
				),
				array(
					//
					'name'  => __( 'Dogwood', 'wp-rig' ),
					'slug'  => 'theme-duke-dogwood',
					'color' => '#988675',
				),
				array(
					'name'  => __( 'Shackleford', 'wp-rig' ),
					'slug'  => 'theme-duke-shackleford',
					'color' => '#DAD0C6',
				),
				array(
					'name'  => __( 'Cast Iron', 'wp-rig' ),
					'slug'  => 'theme-duke-cast-iron',
					'color' => '#262626',
				),
				array(
					//
					'name'  => __( 'Graphite', 'wp-rig' ),
					'slug'  => 'theme-duke-graphite',
					'color' => '#666666',
				),
				array(
					'name'  => __( 'Granite', 'wp-rig' ),
					'slug'  => 'theme-duke-granite',
					'color' => '#B5B5B5',
				),
				array(
					'name'  => __( 'Limestone', 'wp-rig' ),
					'slug'  => 'theme-duke-limestone',
					'color' => '#E5E5E5',
				),
			)
		);

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'wp-rig' ),
					'shortName' => __( 'S', 'wp-rig' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'wp-rig' ),
					'shortName' => __( 'M', 'wp-rig' ),
					'size'      => 25,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'wp-rig' ),
					'shortName' => __( 'L', 'wp-rig' ),
					'size'      => 31,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'wp-rig' ),
					'shortName' => __( 'XL', 'wp-rig' ),
					'size'      => 39,
					'slug'      => 'larger',
				),
			)
		);
	}
}
