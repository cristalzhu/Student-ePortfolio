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

wp_rig()->print_styles( 'wp-rig-archive' );

?>

<div class="archive">

      <div id="primary" class="site-main">
		  <?php
		  if ( have_posts() ) {
			get_template_part( 'template-parts/content/page_header' );
			get_template_part( 'template-parts/content/pagination' );
			} else {
			get_template_part( 'template-parts/content/error' );
			} ?>
		<div class="archive-grid">
       	 	<?php while ( have_posts() ) : the_post(); // standard WordPress loop. ?>

		<div class="card">
			<a href="<?php the_permalink();?>" class="archive-title"> <h3><?php the_title(); ?> </h3></a>
			<?php 
			if (has_post_thumbnail()){
				the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'card-image' ) );
			} 
			else{
				echo 'no';
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

		</div><!-- #main -->


</div><!-- .container -->

<?php get_footer(); ?>
