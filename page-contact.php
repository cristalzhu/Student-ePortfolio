<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();
wp_rig()->print_styles( 'wp-rig-content' );

?>
    <main id="primary" class="site-main">
  <?php
  echo '<h1 class="page-title">Contact Information</h1>';
  ?>
  <div class="contact-page">
  <?php
            the_custom_logo();
            echo '<h2>';
            the_field('contact_name','option');
            echo '</h2>';
            //echo '<i class="far footer-icon fa-2x fa-envelope contact_icons"></i>';
            the_field('contact_email','option');
            echo '<br><br>';
           // echo '<i class="fas footer-icon fa-2x fa-phone contact_icons flip_phone"></i>';
            the_field('contact_phone','option');
            echo '<br><br>';
            //echo '<i class="fas footer-icon fa-2x fa-map-marker-alt contact_icons"></i>';
            the_field('contact_address','option');
        ?>
        
  </div>
    </main><!-- #primary -->

<?php
get_footer();
?>


