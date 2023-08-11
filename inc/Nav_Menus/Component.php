<?php
/**
 * WP_Rig\WP_Rig\Nav_Menus\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Nav_Menus;
use WP_Query;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use WP_Post;
use function add_action;
use function add_filter;
use function register_nav_menus;
use function esc_html__;
use function has_nav_menu;
use function wp_nav_menu;

/**
 * Class for managing navigation menus.
 *
 * Exposes template tags:
 * * `wp_rig()->is_primary_nav_menu_active()`
 * * `wp_rig()->display_primary_nav_menu( array $args = array() )`
 */
class Component implements Component_Interface, Templating_Component_Interface {

	const PRIMARY_NAV_MENU_SLUG = 'primary';

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'nav_menus';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', array( $this, 'action_register_nav_menus' ) );
		add_filter( 'walker_nav_menu_start_el', array( $this, 'filter_primary_nav_menu_dropdown_symbol' ), 10, 4 );
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return array(
			'is_primary_nav_menu_active' => array( $this, 'is_primary_nav_menu_active' ),
			'display_primary_nav_menu'   => array( $this, 'display_primary_nav_menu' ),
		);
	}

	/**
	 * Registers the navigation menus.
	 */
	public function action_register_nav_menus() {
		register_nav_menus(
			array(
				static::PRIMARY_NAV_MENU_SLUG => esc_html__( 'Primary', 'wp-rig' ),
			)
		);
	}

	/**
	 * Adds a dropdown symbol to nav menu items with children.
	 *
	 * Adds the dropdown markup after the menu link element,
	 * before the submenu.
	 *
	 * Javascript converts the symbol to a toggle button.
	 *
	 * @TODO:
	 * - This doesn't work for the page menu because it
	 *   doesn't have a similar filter. So the dropdown symbol
	 *   is only being added for page menus if JS is enabled.
	 *   Create a ticket to add to core?
	 *
	 * @param string  $item_output The menu item's starting HTML output.
	 * @param WP_Post $item        Menu item data object.
	 * @param int     $depth       Depth of menu item. Used for padding.
	 * @param object  $args        An object of wp_nav_menu() arguments.
	 * @return string Modified nav menu HTML.
	 */
	public function filter_primary_nav_menu_dropdown_symbol( string $item_output, WP_Post $item, int $depth, $args ) : string {

		// Only for our primary menu location.
		if ( empty( $args->theme_location ) || static::PRIMARY_NAV_MENU_SLUG !== $args->theme_location ) {
			return $item_output;
		}

		// Add the dropdown for items that have children.
		if ( ! empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
			return $item_output . '<span class="dropdown"><i class="dropdown-symbol"></i></span>';
		}

		return $item_output;
	}

	/**
	 * Checks whether the primary navigation menu is active.
	 *
	 * @return bool True if the primary navigation menu is active, false otherwise.
	 */
	public function is_primary_nav_menu_active() : bool {
		return (bool) has_nav_menu( static::PRIMARY_NAV_MENU_SLUG );
	}



	/**
	 * Displays the primary navigation menu.
	 *
	 * @param array $args Optional. Array of arguments. See `wp_nav_menu()` documentation for a list of supported
	 *                    arguments.
	 */
	public function display_primary_nav_menu( array $args = array() ) {

		if ( ! isset( $args['container'] ) ) {
			$args['container'] = '';
		}

		$args['theme_location'] = static::PRIMARY_NAV_MENU_SLUG;

		$custom_menu_items = array (
			'home' => array(
			'label' => 'Home',
			'path' => '',
			),
		);
		
		//check if any clubs published
		$query = new WP_Query(array(
			'post_type' => 'club',
			'post_status' => 'publish',
			'order_by' => 'title',
		));
		if( $query->have_posts() ){
			$custom_menu_items += array('clubs' => array(
				'label' => 'Clubs',
				'path' => '/clubs',
				),
			);
		} 
		else {
		}
		wp_reset_postdata();

		//check if any experiences published
		$query = new WP_Query(array(
			'post_type' => 'experiences',
			'post_status' => 'publish',
			'order_by' => 'title',
		));
		if( $query->have_posts() ){
			$custom_menu_items += array('experiences' => array(
				'label' => 'Experiences',
				'path' => '/experiences',
				),
			);
		} 
		else {
		}
		wp_reset_postdata();

		//check if any interests published
		$query = new WP_Query(array(
			'post_type' => 'interest',
			'post_status' => 'publish',
			'order_by' => 'title',
		));
		if( $query->have_posts() ){
			$custom_menu_items += array('interests' => array(
				'label' => 'Interests',
				'path' => '/interest',
				),
			);
		} 
		else {
		}
		wp_reset_postdata();

		//check if any projects published
		$query = new WP_Query(array(
			'post_type' => 'project',
			'post_status' => 'publish',
			'order_by' => 'title',
		));
		if( $query->have_posts() ){
			$custom_menu_items += array('projects' => array(
				'label' => 'Projects',
				'path' => '/project',
				), 
			);
		} 
		else {
		}
		wp_reset_postdata();

		/*check if any gallery items published
		$query = new WP_Query(array(
			'post_type' => 'gallery',
			'post_status' => 'publish',
			'order_by' => 'title',
		));
		if( $query->have_posts() ){
			$custom_menu_items += array('gallery' => array(
				'label' => 'Gallery',
				'path' => '/gallery',
				), 
			);
		} 
		else {
		}
		wp_reset_postdata();*/

		$images = get_field('gallery_images','option');
		//echo $images;
		if ($images){
			$custom_menu_items += array('gallery' => array(
				'label' => 'Gallery',
				'path' => '/gallery',
				), 
			);
		}
			
		// Get the current page URL, remove trailing slash
		$current_url = rtrim(("$_SERVER[REQUEST_URI]"), "/");
			
		$custom_menu = '<ul id="primary-menu" class="menu">';
			
		foreach ( $custom_menu_items as $key => $item ) {
			
			// Define the full path for the menu item link
			$menu_item_link = esc_url( home_url() ) . $item['path'];
			
			// Add default menu item classes array
			$classList = ['menu-item'];
			
			// Add active class for if on the current menu item page
			if($item['path'] == strval($current_url)){
			$classList[] = 'active';
			}
			
			// Create and populate the custom menu
			$custom_menu .= '<li id="menu-item-' . $key . '" class="' . implode(" ", $classList) . '">';
			$custom_menu .= '<a href="' . $menu_item_link . '">' . $item['label'] . '</a>';
			$custom_menu .= '</li>';
		}
			
		$custom_menu .= '</ul>'; 
		echo $custom_menu;


		//Prevents other menu from being created in admin when commented out
		//wp_nav_menu( $args );
	}
}
