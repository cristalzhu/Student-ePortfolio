<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();
wp_enqueue_script( 'accordion', get_stylesheet_directory_uri() . '/assets/js/accordion.min.js' );

// Use grid layout if blog index is displayed.
if ( is_home() ) {
	wp_rig()->print_styles('wp-rig-content', 'wp-rig-front-page' );
} else {
	wp_rig()->print_styles( 'wp-rig-content' );
}

?>
	<main id="primary" class="site-main">
		<?php

			?><?php get_template_part( 'template-parts/header/branding' ); ?>

		<?php

		get_template_part( 'template-parts/content/pagination' );
		echo "<br>";
		echo '<div class="container">'; ?>

		<a href="<?php echo esc_url( home_url() . '/clubs/') ?>" class="no-link"> <h1>Clubs</h1> </a>
		<?php get_template_part( 'template-parts/content/carousel', null, array('post_type' => 'club')); ?>

		<a href="<?php echo esc_url( home_url() ).'/experiences/' ?>" class="no-link"> <h1>Experiences</h1> </a>
		<?php get_template_part( 'template-parts/content/carousel', null, array('post_type' => 'experiences')); ?>

		<a href="<?php echo esc_url( home_url() ).'/interest/' ?>" class="no-link"> <h1>Interests</h1> </a>
		<?php get_template_part( 'template-parts/content/carousel', null, array('post_type' => 'interest')); ?>
		<a href="<?php echo esc_url( home_url() ).'/project/' ?>" class="no-link"> <h1>Projects</h1> </a>
		<?php get_template_part( 'template-parts/content/carousel', null, array('post_type' => 'project'));
		echo '</div>';
		?>

<?php
if (is_front_page() ) {
	echo '<div class="course-container">';
echo '<h1>Relevant Courses</h1>';
$courses = get_field('courses_repeater','option');
if( $courses ) {
    echo '<ul class="course">';
    foreach( $courses as $course ) {
        $name = $course['courses_text'];
        echo '<li class="course-single">';
            echo '<big>';
			echo($name);
			echo '</big>';
			echo '<br><br>';
        echo '</li>';
    }
    echo '</ul>';
}
echo '</div class>';
?>


<?php
echo '<div class="skill-container">';
$skills = get_field('skills_repeater','option');
if( $skills ) {
	echo '<h1>Skills</h1>';
	$counter = 0;
	foreach( $skills as $skill ) {
		$counter++;
        $name = $skill['skill_name'];
		$description = $skill['skill_description'];
		$image = $skill["skill_image"];
		if($counter%2==1){
			echo '<button class="accordion accordion-blue">';
			echo '<h3>';
			echo $name;
			echo '</h3>';
	echo '</button>';
	echo '<div class=panel>';
		echo '<div class=panel-inner>';
			  echo $description;
			?>
			<div class='skill-image'>
			<img src="<?php echo $image; ?>">
			</div>
			<?php
		echo '</div>';
	echo '</div>';
		}else{
		echo '<button class="accordion accordion-white">';
				echo '<h3>';
				echo $name;
				echo '</h3>';
		echo '</button>';
		echo '<div class=panel>';
			echo '<div class=panel-inner>';
  				echo $description;
				?>
				<div class='skill-image'>
				<img src="<?php echo $image;?> ">
				</div>
				<?php
			echo '</div>';
		echo '</div>';
}}}}
echo '</div>';
?>

<?php
$images = get_field('gallery_images','option');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)
if( $images ):
    echo '<a href="/gallery/" class="no-link"><h1>Gallery</h1> </a>';
?>
    <div class='front-page-gallery'>
        <?php foreach( $images as $image ): ?>
            <div >
                <div class="item" ><img class="front-page-gallery-pic" src="<?php echo esc_url($image['sizes']['large']); ?>"  />
                <?php if ($image['title']){
                    echo '<big><b>';
					echo '<div>';
                    echo $image['title'];
					echo '</div>';
                    echo '</big></b>';
                } ?></div>
        </div>
        <?php endforeach; ?>
        </div>
<?php endif; ?>

	</main><!-- #primary -->
<?php
get_footer();
