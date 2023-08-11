<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

	<footer id="colophon" class="site-footer">
	<?php if (is_front_page()) {
        get_template_part( 'template-parts/footer/hpfooter' );
        get_template_part( 'template-parts/footer/footer-widgets' );
     }
     else {
        get_template_part( 'template-parts/footer/footer-widgets' );
        get_template_part( 'template-parts/footer/info' );
     } ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
