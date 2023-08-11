<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="entry-content">
	<p><?php the_field('Description','Reflection');?><p>

	<?php
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-rig' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-rig' ),
			'after'  => '</div>',
		)
	);
	?>
</div><!-- .entry-content -->

<div class="section">
<?php 
//About section if available
?>
<?php 
if (get_field('interest_description')):
    echo "<h2>Description<br></h2>";
    the_field('interest_description');
    echo "<br>";
endif;
?>


<?php 
//Reflection section
?>
<?php
    if (get_field('interest_reflection') && get_field('interest_reflection_privacy') == 'Public' ):
        echo "<h2>Reflection<br></h2>";
        the_field('interest_reflection');
    endif; 
?>

<?php
if (get_field('additional')){
	echo "<br><br><h2>Additional Information</h2>";
	the_field('additional');
	echo '<div class="embed-container">';
	the_field('embed');
	echo '</div>';
}
?>
</div>