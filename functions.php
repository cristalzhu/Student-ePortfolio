<?php
/**
 * WP Rig functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_rig
 */

define( 'WP_RIG_MINIMUM_WP_VERSION', '4.5' );
define( 'WP_RIG_MINIMUM_PHP_VERSION', '7.0' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], WP_RIG_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), WP_RIG_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Setup autoloader (via Composer or custom).
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require get_template_directory() . '/vendor/autoload.php';
} else {
	/**
	 * Custom autoloader function for theme classes.
	 *
	 * @access private
	 *
	 * @param string $class_name Class name to load.
	 * @return bool True if the class was loaded, false otherwise.
	 */
	function _wp_rig_autoload( $class_name ) {
		$namespace = 'WP_Rig\WP_Rig';

		if ( strpos( $class_name, $namespace . '\\' ) !== 0 ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/inc';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
	spl_autoload_register( '_wp_rig_autoload' );
}

// Load the `wp_rig()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'WP_Rig\WP_Rig\wp_rig' );

//add font awesome
add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );
function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_60fff86f5992a',
		'title' => 'Clubs Carousel',
		'fields' => array(
			array(
				'key' => 'field_60fff872ba26b',
				'label' => 'Clubs Carousel Heading',
				'name' => 'clubs_carousel_heading',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/clubs-carousel',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	endif;

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_610044b2b4dcd',
			'title' => 'Courses Carousel',
			'fields' => array(
				array(
					'key' => 'field_610044b2b8dd6',
					'label' => 'Courses Carousel Heading',
					'name' => 'courses_carousel_heading',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/courses-carousel',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		acf_add_local_field_group(array(
			'key' => 'group_6100432bc8184',
			'title' => 'Experiences Carousel',
			'fields' => array(
				array(
					'key' => 'field_6100432bcb876',
					'label' => 'Experiences Carousel Heading',
					'name' => 'experiences_carousel_heading',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/experiences-carousel',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		acf_add_local_field_group(array(
			'key' => 'group_610044e64ac0b',
			'title' => 'Gallery Carousel',
			'fields' => array(
				array(
					'key' => 'field_610044e64fd10',
					'label' => 'Gallery Carousel Heading',
					'name' => 'gallery_carousel_heading',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/gallery-carousel',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		acf_add_local_field_group(array(
			'key' => 'group_6100445ce386a',
			'title' => 'Interests Carousel',
			'fields' => array(
				array(
					'key' => 'field_6100445ce75ee',
					'label' => 'Interests Carousel Heading',
					'name' => 'interests_carousel_heading',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/interests-carousel',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		acf_add_local_field_group(array(
			'key' => 'group_6100442279221',
			'title' => 'Projects Carousel',
			'fields' => array(
				array(
					'key' => 'field_610044227c2ab',
					'label' => 'Projects Carousel Heading',
					'name' => 'projects_carousel_heading',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/projects-carousel',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		acf_add_local_field_group(array(
			'key' => 'group_6100445f48694',
			'title' => 'Skills Carousel',
			'fields' => array(
				array(
					'key' => 'field_6100445f4e3ed',
					'label' => 'Skills Carousel Heading',
					'name' => 'skills_carousel_heading',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/skills-carousel',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		endif;

	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page(array(
            'page_title'    => 'Gallery',
            'menu_title'    => 'Gallery',
            'menu_slug'     => 'gallery',
            'capability'    => 'edit_posts',
            "has_archive" => true,
            'icon_url'      => 'dashicons-format-gallery',
            'position'      => 40,
            'redirect'      => true
        ));

		acf_add_options_page(array(
			'page_title' 	=> 'Courses, Skills, Socials, Contact',
			'menu_title'	=> 'Courses, Skills, Socials, Contact',
			'menu_slug' 	=> 'relevant_information',
			'capability'	=> 'edit_posts',
			'icon_url' 		=> 'dashicons-rest-api',
			'position'		=> 50,
			'redirect'		=> true
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Courses',
			'menu_title'	=> 'Courses',
			'parent_slug'	=> 'relevant_information',
			'menu_slug'		=> 'courses_information'
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Skills',
			'menu_title'	=> 'Skills',
			'parent_slug'	=> 'relevant_information',
			'menu_slug'		=> 'skills_information'
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Socials',
			'menu_title'	=> 'Socials',
			'parent_slug'	=> 'relevant_information',
			'menu_slug'		=> 'socials_information'
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Contact Information',
			'menu_title'	=> 'Contact Information',
			'parent_slug'	=> 'relevant_information',
			'menu_slug'		=> 'contact_information'
		));
	}
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_60fef61a4c324',
            'title' => 'Gallery',
            'fields' => array(
                array(
                    'key' => 'field_60fef61ecf424',
                    'label' => '',
                    'name' => 'gallery_images',
                    'type' => 'gallery',
                    'instructions' => 'Add images or media items to your gallery. Click on an image to add a title and a description. ',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'insert' => 'append',
                    'library' => 'all',
                    'min' => '',
                    'max' => '',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'gallery',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
        
        endif;

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_60f19648e43dc',
		'title' => 'Relevant Courses',
		'fields' => array(
			array(
				'key' => 'field_60f5a09569e1a',
				'label' => '',
				'name' => 'courses_repeater',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 30,
				'layout' => 'box',
				'button_label' => 'Add Course',
				'sub_fields' => array(
					array(
						'key' => 'field_60f5a13669e1b',
						'label' => 'Courses',
						'name' => 'courses_text',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),	
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'courses_information',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_60f5b777f1e8a',
		'title' => 'Skills',
		'fields' => array(
			array(
				'key' => 'field_60f5b77d03ec3',
				'label' => '',
				'name' => 'skills_repeater',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 30,
				'layout' => 'row',
				'button_label' => 'Add Skill',
				'sub_fields' => array(
					array(
						'key' => 'field_60f5b7b803ec4',
						'label' => 'Skill',
						'name' => 'skill_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_60f5b7d503ec5',
						'label' => 'Description',
						'name' => 'skill_description',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => 'wpautop',
					),
					array(
						'key' => 'field_60f5b7eb03ec6',
						'label' => 'Image',
						'name' => 'skill_image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'skills_information',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'box',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));


	acf_add_local_field_group(array(
			'key' => 'group_60f19648e43da',
			'title' => 'Socials',
			'fields' => array(
				array(
					'key' => 'field_60f1965419cd5',
					'label' => 'Linkedin URL',
					'name' => 'profile_linkedin_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_60f1967319cd6',
					'label' => 'Github URL',
					'name' => 'profile_github_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_60f1969519cd7',
					'label' => 'Facebook URL',
					'name' => 'profile_facebook_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_60f196a419cd8',
					'label' => 'Instagram URL',
					'name' => 'profile_instagram_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_60f196a419cb2',
					'label' => 'Other Social URL 1',
					'name' => 'profile_other1_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
					array(
						'key' => 'field_60f196a419ch4',
						'label' => 'Other Social URL 2',
						'name' => 'profile_other2_url',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
					),
					array(
						'key' => 'field_60f196a419cz5',
						'label' => 'Other Social URL 3',
						'name' => 'profile_other3_url',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
					),
				array(
					'key' => 'field_60f7252f99e82',
					'label' => 'Resume',
					'name' => 'socials_resume',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'socials_information',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		acf_add_local_field_group(array(
			'key' => 'group_60f5e13b78694',
			'title' => 'Contact Information',
			'fields' => array(
				array(
					'key' => 'field_60f5e143b96bf',
					'label' => 'Name',
					'name' => 'contact_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_60f5e1dfb96c0',
					'label' => 'Email',
					'name' => 'contact_email',
					'type' => 'email',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_60f5e1edb96c1',
					'label' => 'Phone Number',
					'name' => 'contact_phone',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_60f5e20fb96c2',
					'label' => 'Address',
					'name' => 'contact_address',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'contact_information',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		endif;

		if ( class_exists( 'WPForms_Template', false ) ) :
			/**
			 * Contact Form
			 * Template for WPForms.
			 */
			class WPForms_Template_contact_form extends WPForms_Template {
			
				/**
				 * Primary class constructor.
				 *
				 * @since 1.0.0
				 */
				public function init() {
			
					// Template name
					$this->name = 'Contact Form';
			
					// Template slug
					$this->slug = 'contact_form';
			
					// Template description
					$this->description = '';
			
					// Template field and settings
					$this->data = array (
				'fields' => array (
					1 => array (
						'id' => '1',
						'type' => 'name',
						'label' => 'Name',
						'format' => 'first-last',
						'required' => '1',
						'size' => 'medium',
					),
					2 => array (
						'id' => '2',
						'type' => 'email',
						'label' => 'Email',
						'required' => '1',
						'size' => 'medium',
					),
					3 => array (
						'id' => '3',
						'type' => 'textarea',
						'label' => 'Message',
						'size' => 'medium',
						'limit_count' => '1',
						'limit_mode' => 'characters',
					),
				),
				'field_id' => 4,
				'settings' => array (
					'form_title' => 'Contact Form',
					'submit_text' => 'Submit',
					'submit_text_processing' => 'Sending...',
					'antispam' => '1',
					'notification_enable' => '1',
					'notifications' => array (
						1 => array (
							'email' => '',
							'subject' => 'New Contact Form Entry',
							'sender_name' => 'eportfolio',
							'sender_address' => '{admin_email}',
							'message' => '{all_fields}',
						),
					),
					'confirmations' => array (
						1 => array (
							'type' => 'message',
							'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
							'message_scroll' => '1',
							'page' => '2',
						),
					),
				),
				'meta' => array (
					'template' => 'contact_form',
				),
			);
				}
			}
			new WPForms_Template_contact_form();
			endif;

			/**
 * Custom shortcode to display WPForms form entries in table view.
 *
 * Basic usage: [wpforms_entries_table id="FORMID"].
 * 
 * Possible shortcode attributes:
 * id (required)  Form ID of which to show entries.
 * user           User ID, or "current" to default to current logged in user.
 * fields         Comma separated list of form field IDs.
 * number         Number of entries to show, defaults to 30.
 * 
 * @link https://wpforms.com/developers/how-to-display-form-entries/
 *
 * Realtime counts could be delayed due to any caching setup on the site
 *
 * @param array $atts Shortcode attributes.
 * 
 * @return string
 */
function wpf_entries_table( $atts ) {
 
    // Pull ID shortcode attributes.
    $atts = shortcode_atts(
        [
            'id'     => '20',
            'user'   => '',
            'fields' => '',
            'number' => '',
        ],
        $atts
    );
 
    // Check for an ID attribute (required) and that WPForms is in fact
    // installed and activated.
    if ( empty( $atts['id'] ) || ! function_exists( 'wpforms' ) ) {
        return;
    }
 
    // Get the form, from the ID provided in the shortcode.
    $form = wpforms()->form->get( absint( $atts['id'] ) );
 
    // If the form doesn't exists, abort.
    if ( empty( $form ) ) {
        return;
    }
 
    // Pull and format the form data out of the form object.
    $form_data = ! empty( $form->post_content ) ? wpforms_decode( $form->post_content ) : '';
 
    // Check to see if we are showing all allowed fields, or only specific ones.
    $form_field_ids = isset( $atts['fields'] ) && $atts['fields'] !== '' ? explode( ',', str_replace( ' ', '', $atts['fields'] ) ) : [];
 
    // Setup the form fields.
    if ( empty( $form_field_ids ) ) {
        $form_fields = $form_data['fields'];
    } else {
        $form_fields = [];
        foreach ( $form_field_ids as $field_id ) {
            if ( isset( $form_data['fields'][ $field_id ] ) ) {
                $form_fields[ $field_id ] = $form_data['fields'][ $field_id ];
            }
        }
    }
 
    if ( empty( $form_fields ) ) {
        return;
    }
 
    // Here we define what the types of form fields we do NOT want to include,
    // instead they should be ignored entirely.
    $form_fields_disallow = apply_filters( 'wpforms_frontend_entries_table_disallow', [ 'divider', 'html', 'pagebreak', 'captcha' ] );
 
    // Loop through all form fields and remove any field types not allowed.
    foreach ( $form_fields as $field_id => $form_field ) {
        if ( in_array( $form_field['type'], $form_fields_disallow, true ) ) {
            unset( $form_fields[ $field_id ] );
        }
    }
 
    $entries_args = [
        'form_id' => absint( $atts['id'] ),
    ];
 
    // Narrow entries by user if user_id shortcode attribute was used.
    if ( ! empty( $atts['user'] ) ) {
        if ( $atts['user'] === 'current' && is_user_logged_in() ) {
            $entries_args['user_id'] = get_current_user_id();
        } else {
            $entries_args['user_id'] = absint( $atts['user'] );
        }
    }
 
    // Number of entries to show. If empty, defaults to 30.
    if ( ! empty( $atts['number'] ) ) {
        $entries_args['number'] = absint( $atts['number'] );
    }
 
    // Get all entries for the form, according to arguments defined.
    // There are many options available to query entries. To see more, check out
    // the get_entries() function inside class-entry.php (https://a.cl.ly/bLuGnkGx).
    $entries = wpforms()->entry->get_entries( $entries_args );
 
    if ( empty( $entries ) ) {
        return '<p>No entries found.</p>';
    }
 
    ob_start();
 
    echo '<table class="wpforms-frontend-entries">';
 
        echo '<thead><tr>';
 
            // Loop through the form data so we can output form field names in
            // the table header.
            foreach ( $form_fields as $form_field ) {
 
                // Output the form field name/label.
                echo '<th>';
                    echo esc_html( sanitize_text_field( $form_field['label'] ) );
                echo '</th>';
            }
 
        echo '</tr></thead>';
 
        echo '<tbody>';
 
            // Now, loop through all the form entries.
            foreach ( $entries as $entry ) {
 
                echo '<tr>';
 
                // Entry field values are in JSON, so we need to decode.
                $entry_fields = json_decode( $entry->fields, true );
 
                foreach ( $form_fields as $form_field ) {
 
                    echo '<td>';
 
                        foreach ( $entry_fields as $entry_field ) {
                            if ( absint( $entry_field['id'] ) === absint( $form_field['id'] ) ) {
                                echo apply_filters( 'wpforms_html_field_value', wp_strip_all_tags( $entry_field['value'] ), $entry_field, $form_data, 'entry-frontend-table' );
                                break;
                            }
                        }
 
                    echo '</td>';
                }
 
                echo '</tr>';
            }
 
        echo '</tbody>';
 
    echo '</table>';
 
    $output = ob_get_clean();
 
    return $output;
}
add_shortcode( 'wpforms_entries_table', 'wpf_entries_table' );

function wpsh_remove_dashboard_widgets() {

	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
	remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
	remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
	remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
	remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
}
add_action( 'wp_dashboard_setup', 'wpsh_remove_dashboard_widgets' );
add_filter( 'wpforms_admin_dashboardwidget', '__return_false' );

// Remove Elementor Overview widget
function disable_elementor_dashboard_overview_widget() {
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 40);

// remove WooCommerce Dashboard Status widgets
function remove_dashboard_widgets(){
remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');    
}
add_action('wp_user_dashboard_setup', 'remove_dashboard_widgets', 20);
add_action('wp_dashboard_setup', 'remove_dashboard_widgets', 20);

// Remove Site Health from the Dashboard
add_action(
    'wp_dashboard_setup',
    function () {
        global $wp_meta_boxes;
        unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
    }
 );

 // One column dashboard
function single_column( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'single_column' );
 
function one_column_dashboard(){
	return 1;
}
add_filter( 'get_user_option_screen_layout_dashboard', 'one_column_dashboard' );

// Create custom WordPress admin dashboard items

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'DASHBOARD', 'custom_dashboard_help');
}
function custom_dashboard_help() {
	// ROW WITH HEADING	
	echo '
	<div class="default-container">
	<h2>Main Shortcuts</h2>
	<hr>
	<p>This section includes shortcuts to the main features of the portfolio website.</p>
		</div>';
	
// COLUMNS WITH SHORTCUTS	
	echo '<div class="icon-container"> 
	  <div class="column"><a href="/wp-admin/customize.php?return=%2Fwp-admin%2F" class="edit-menu" id="appearance-dash">Appearance</a></div>
  	  <div class="column"><a href="/wp-admin/edit.php?post_type=club" class="add" id="club-dash">Edit Clubs</a></div>
  	  <div class="column "><a href="/wp-admin/edit.php?post_type=experiences" class="add" id="experience-dash">Edit Experiences</a></div>
	  <div class="column"><a href="/wp-admin/edit.php?post_type=project" class="edit-posts" id="project-dash">Edit Projects</a></div>
	  <div class="column"><a href="/wp-admin/edit.php?post_type=interest" class="add" id="interest-dash">Edit Interests</a></div>
	  <div class<div class="column"><a href="/wp-admin/admin.php?page=gallery" class="edit-products" id="gallery-dash">Edit Gallery</a></div>
	  <div class="column"><a href="/wp-admin/admin.php?page=courses_information" class="add" id="course-dash">Edit Courses</a></div>
	  <div class="column"><a href="/wp-admin/admin.php?page=skills_information" class="edit-orders" id="skill-dash">Edit Skills</a></div>
  </div>';
  
	// ROW WITH HEADING	
	echo '<div class="default-container"><h2>Instructions</h2><hr></div>';
	// COLUMNS WITH VIDEOS	AHHHHHHHHHHHHHHHHHHHHHHHHHHH
	echo '<div class="instructions">
  <ul class="disc">
  <li>Use the sidebar on the left or the shortcut above to select appearance and then select site identity</li>
  <ul class="circle">
  <li>Add your profile picture under logo</li>
  <li>Write down your full name as the site title</li>
  <li>Write a few sentences introducing yourself in the tagline</li>
  <li>Make sure "Display Site Title and Tagline" is checked</li>
  <li>Optional: Add your profile picture or another picture of yourself as the site icon</li>
  </ul>
  '?><img class="instructions-image" src="<?php echo get_template_directory_uri() . '/assets/images/appearance.png'; ?>" /><?php echo'
  <li>Use the sidebar on the left or the shortcut above to select appearance and then select colors</li>
  <ul class="circle">
  <li>Set the header text color to #000000 (Black)</li>
  <li>Set the background color to #efefef (White)</li>
  </ul>
  '?><img id="colors-image" src="<?php echo get_template_directory_uri() . '/assets/images/colors.png'; ?>" /><?php echo'
  <li>Use the sidebar on the left or the shortcuts above to create and edit pages for the different post types</li>
  <ul class="circle">
  <li>Ex. Go to clubs and then select add new. Fill in the fields and remember to take advantage of the reflection and extra information fields. It is highly recommended you add a featured image. Once you are finished, click on publish.</li>
  '?><img class="instructions-image" src="<?php echo get_template_directory_uri() . '/assets/images/clubs.png'; ?>" /><?php echo'
  <li>Use the gallery page to add images that are meaninful to you. Click on an image to add a title, caption, alt text, and description.</li>
  '?><img class="instructions-image" src="<?php echo get_template_directory_uri() . '/assets/images/gallery.png'; ?>" /><?php echo'
  <li>Do not forget to add your courses, skills, socials, and contact information. </li>
  '?><img class="instructions-image" src="<?php echo get_template_directory_uri() . '/assets/images/courses.png'; ?>" /><?php echo'
  </ul>
  </ul>
</div>';
  
	// COLUMN WITH CONTACT FORM	
	echo '<div class="default-container">
	<h2>CONTACT US</h2><hr>
	<p>Phone: (919) 684-2200 | 334 Blackwell Street Suite 1100 Durham, NC 27701 | Internal: Duke Box 104100</p>
		</div>';
	
// Don’rtemove this one here below	
}

// Add custom dashboard with styles

add_action('admin_head', 'custom_dashboard');
function custom_dashboard() {

  echo '<style>
 @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap");

/* Make dashboard full width */
#wpbody-content #dashboard-widgets #postbox-container-1 {
    width: 100%;
}

/* Remove default dashboard column border */
.postbox {
border: none;
}

/* Customize columns */
.icon-container p { /* regular text */
	font-size: 16px;
	text-align: center;
}  
hr { /* divider */
  height: 3px;
  background: #ebebeb;
  border: none;
  outline: none;
  width:20%;
  margin:1em auto;
  position: relative;
}
iframe {
margin-bottom: 1em;
}
.icon-container { /* customize icon shortcut columns. Add or remove 1fr for adding or removing columns */
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr; / * four columns */
  padding: 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.instructions{
	margin:0px 20px;
}
ul.disc {
	list-style-type: disc;
	font-size: 20px;
  }
  ul.circle{
	list-style-type: circle;
	font-size: 18px;
	list-style-position: inside;
  }
  .instructions-image{
  width:50%;
  height:auto;
  padding-bottom:1em;
}
#colors-image{
	width:20%;
	height:auto;
	padding-bottom:1em;
}

.default-container {  /* customize heading and contact form containers */
  display: grid;
  grid-template-columns: 1fr ; /* one column */
  padding: 20px 20px 0px 20px;
  text-align: center;
  font-family: "Ubuntu", sans-serif;
}
.column, .video-column {
 box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

@media (max-width: 520px) { /* for screens up to 520px. Modifies all container types */
  .icon-container, .video-container, .default-container {
    grid-template-columns: none;
	padding: 0px;
  }
}
@media (min-width: 521px) and (max-width: 767px) { /* for screens between 521 and 775px. Modifies only icon shortcut columns */
  .icon-container {
    grid-template-columns: 1fr 1fr;
	padding: 0px;
  }
}
@media (min-width: 768px) and (max-width: 990px) { /* for screens between 786 and 990px. Modifies only icon shortcut columns */
  .icon-container {
    grid-template-columns: 1fr 1fr 1fr;
	padding: 0px;
  }
}
    .column, .video-column { /* customize icon shortcut columns */
      background: #fff; 
	  color: #000;
	  padding: 30px; 
	  transition: background-color 0.5s ease;
	  text-transform: uppercase;
	  font-family: "Ubuntu", sans-serif;
	  font-size: 16px;
	  text-align: center;
	  text-decoration: none;
	  margin: 3%;
    } 
	.column:hover, .video-column:hover {  /* customize icon shortcut and video column hover style */
	background: #f9f9f9;
	}
	  .video-column { /* customize video columns */
	  padding: 10px 10px 20px 10px; 
    } 
		.column a, .video-column a { /* link colors */
	color: #000 !important;
	text-decoration: none;
	}
	
	/* SHORTCUT ICON CUSROMIZATION. It uses Dashicons, see here https://developer.wordpress.org/resource/dashicons/#menu-alt */
	
	.edit-pages:before { /* Edit pages */
	font-family: "dashicons"; 
	content: "\f123";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-posts:before { /* Edit posts */
	font-family: "dashicons"; 
	content: "\f109";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.add:before { /* Add icon */
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-menu:before { /* Navigation icon */
	font-family: "dashicons"; 
	content: "\f329";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-orders:before { /* Orders icon */
	font-family: "dashicons"; 
	content: "\f163";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	.edit-products:before { /* Products icon */
	font-family: "dashicons"; 
	content: "\f174";
	font-size: 34px;
	margin-right: 7px;
	display: block;
	color: #2681B0;
	}
	#appearance-dash:before{
		font-family: "dashicons"; 
		content: "\f100";
	}
	#club-dash:before{
		font-family: "dashicons"; 
		content: "\f307";
	}
	#experience-dash:before{
		font-family: "dashicons"; 
		content: "\f336";
	}
	#project-dash:before{
		font-family: "dashicons"; 
		content: "\f183";
	}
	#interest-dash:before{
		font-family: "dashicons"; 
		content: "\f487";
	}
	#course-dash:before{
		font-family: "dashicons"; 
		content: "\f16e";
	}
	#skill-dash:before{
		font-family: "dashicons"; 
		content: "\f155";
	}
	#gallery-dash:before{
		font-family: "dashicons"; 
		content: "\f161";
	}
  </style>';
}

function create_page($title_of_the_page,$content,$parent_id = NULL ) 
{
    $objPage = get_page_by_title($title_of_the_page, 'OBJECT', 'page');
    if( ! empty( $objPage ) )
    {
        //echo "Page already exists:" . $title_of_the_page . "<br/>";
        return $objPage->ID;
    }
    
    $page_id = wp_insert_post(
            array(
            'comment_status' => 'close',
            'ping_status'    => 'close',
            'post_author'    => 1,
            'post_title'     => ucwords($title_of_the_page),
            'post_name'      => strtolower(str_replace(' ', '-', trim($title_of_the_page))),
            'post_status'    => 'publish',
            'post_content'   => $content,
            'post_type'      => 'page',
            'post_parent'    =>  $parent_id //'id_of_the_parent_page_if_it_available'
            )
        );
    //echo "Created page_id=". $page_id." for page '".$title_of_the_page. "'<br/>";
    return $page_id;
}

create_page( 'Programmed Home', 'This is a bit about me');
create_page( 'Gallery', 'Test');
create_page('Contact', 'Test');


// Edit admin interface

function hide_menu() {
	/* DASHBOARD */
	remove_menu_page( 'about.php' ); // WordPress menu
	remove_submenu_page( 'index.php', 'update-core.php');  // Update

	/* WP DEFAULT MENUS */
	remove_menu_page( 'edit-comments.php' ); //Comments
	//remove_menu_page( 'plugins.php' ); //Plugins
	remove_menu_page( 'tools.php' ); //Tools
	remove_menu_page( 'users.php' ); //Users
	remove_menu_page( 'edit.php' ); //Posts
	remove_menu_page( 'upload.php' ); //Media
	//remove_menu_page( 'edit.php?post_type=page' ); //Pages
	//remove_menu_page( 'options-general.php' ); //Settings

   /* APPEARANCE SUBMENUS */
	 remove_submenu_page( 'themes.php', 'widgets.php' ); // hide Widgets
	 remove_submenu_page( 'themes.php', 'nav-menus.php' ); // hide Menus
	 remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
	 remove_submenu_page('themes.php', 'theme-editor.php'); // hide Theme editor
	 remove_submenu_page('themes.php', 'header'); // hide Theme editor
   }
add_action('admin_head', 'hide_menu');

// Remove frontend admin bar items
function remove_admin_bar_items($wp_admin_bar) {
 // Plugin related admin-bar items
 // WordPress Core Items 
 $wp_admin_bar->remove_node('updates');
 $wp_admin_bar->remove_node('comments');
 $wp_admin_bar->remove_node('new-content');
 $wp_admin_bar->remove_node('wp-logo');
 $wp_admin_bar->remove_node('customize');
}
add_action('admin_bar_menu', 'remove_admin_bar_items', 999);

function numag_remove_sections( $wp_customize ) {

	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('nav_menus');
	$wp_customize->remove_section('widgets');
	$wp_customize->remove_section('custom_css');	
	//$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('static_front_page');	 
	//$wp_customize->remove_section('title_tagline');	
}
add_action( 'customize_register', 'numag_remove_sections');
/*Only use this function if we want the individual pages to show the defualt photo too
function default_image ($post_id){
	// Add Featured Image to Post
	$image_url        = 'https://breakthrough.org/wp-content/uploads/2018/10/default-placeholder-image.png'; // Define the image URL here
	$image_name       = 'default_image.png';
	$upload_dir       = wp_upload_dir(); // Set upload folder
	$image_data       = file_get_contents($image_url); // Get image data
	$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
	$filename         = basename( $unique_file_name ); // Create image file name
 
	// Check folder permission and define file location
	if( wp_mkdir_p( $upload_dir['path'] ) ) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}
 
	// Create the image  file on the server
	file_put_contents( $file, $image_data );
 
	// Check image file type
	$wp_filetype = wp_check_filetype( $filename, null );
 
	// Set attachment data
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => sanitize_file_name( $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);
 
	// Create the attachment
	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
 
	// Include image.php
	require_once(ABSPATH . 'wp-admin/includes/image.php');
 
	// Define attachment metadata
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
 
	// Assign metadata to attachment
	wp_update_attachment_metadata( $attach_id, $attach_data );
 
	// And finally assign featured image to post
	set_post_thumbnail( $post_id, $attach_id );
 }
 add_action( 'wp-insert-post' , 'default_image');*/
