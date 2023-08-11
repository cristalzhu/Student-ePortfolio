<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;
use WP_Query;

wp_rig()->print_styles( 'wp-rig-carousel' );

wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'jquery', 'http://code.jquery.com/jquery-migrate-1.2.1.min.js' );
wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/vendor/slick.min.js' );

wp_enqueue_script( 'carousel', get_stylesheet_directory_uri() . '/assets/js/carousel.min.js' );

if ( $args['post_type'] ) {
  //echo $args['post_type'];
}

$args = array(
	'post_type' => $args['post_type'],
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
);

$loop = new WP_Query( $args );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<div class="carousel">
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<div class="carousel-card">
		<style>
    	a { color: #000000; } /* CSS link color */
  	</style>
		<a class="carousel-title" href="<?php the_permalink();?>"> <?php the_title(); ?> </a>
		<?php 
		if (has_post_thumbnail()){
			the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'card-image' ) );
		} 
		else{
			echo '<img src="https://returntofreedom.org/store/wp-content/uploads/default-placeholder.png">';
			//echo '<img src="https://icon-library.com/images/image-placeholder-icon/image-placeholder-icon-5.jpg">';
			/*$home = home_url();
			$path = '/wp-content/themes/eportfolio-theme-dev/assets/images/placeholder-image.png';
			$image_url = $home . $path;
			echo '<img src= "" + $image_url>';*/
		}
		?>
  		</div>

		  <?php endwhile; // end of the loop. ?>

	</div>




	<?php
		wp_reset_postdata();
	?>
</article>
