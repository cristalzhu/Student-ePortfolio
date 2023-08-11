<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="entry-content">
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

<?php 
$images = get_field('photos');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $images ): ?>
    <div>
        <?php foreach( $images as $image ): ?>
            <div>
                <div class="item" ><img src="<?php echo $image['sizes']['large']; ?>"  /></div>
                <?php if ($image['title']){echo "Title: " . $image['title'];} ?>
                <?php if ($image['caption']){echo "</br>Caption: " . $image['caption'];} ?>
                <?php if ($image['description']){echo "</br>Description: " .$image['description'];} ?>
		</div>
        <?php endforeach; ?>
		</div>
<?php endif; ?>

