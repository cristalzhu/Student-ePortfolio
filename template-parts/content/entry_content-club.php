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

<?php //<img src="<?php the_field('club_image-logo'); " alt="" />?>

<?php 
//Displays Position if available
if (get_field('club_position')):
    echo "<big><b>Position: </big></b>";
    the_field('club_position');
    echo "<br>";
endif;
?>

<?php 
//Displays Date and calculates a date range
?>
<?php 
if (get_field('club_end-date') && get_field('club_date-started')):
	echo "<big><b>Date Range: </big></b>";
	the_field('club_date-started');
	echo " - ";
	the_field('club_end-date');

    
	$start_date = date_create(get_field('club_date-started'));
	$end_date = date_create(get_field('club_end-date'));
	$timeline = date_diff($start_date, $end_date);

	if ($timeline->format('%r') !== '-')
	{
		$doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals 

		$format = array(); 
		if($timeline->y !== 0) { 
			$format[] = "%y ".$doPlural($timeline->y, "year"); 
		} 
		if($timeline->m !== 0) { 
			$format[] = "%m ".$doPlural($timeline->m, "month"); 
		} 
		if($timeline->d !== 0) { 
			$format[] = "%d ".$doPlural($timeline->d, "day"); 
		} 
	
		if(count($format) > 1) { 
			$format = array_shift($format).", ".array_shift($format); 
		} else { 
			$format = array_pop($format); 
		} 
		 
		echo " (" . $timeline->format($format) . ")"; 
	

	}
	else{
		echo " ** Invalid date range. Please change the start or end date**";
	}
elseif(get_field('club_date-started')):
    echo "<big><b>Dates: </big></b>";
	the_field('club_date-started');
	echo " -  Present";

    $start_date = date_create(get_field('club_date-started'));
	$end_date = date_create(date("l"));
	$timeline = date_diff($start_date, $end_date);

	if ($timeline->format('%r') !== '-')
	{
		$doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals 

		$format = array(); 
		if($timeline->y !== 0) { 
			$format[] = "%y ".$doPlural($timeline->y, "year"); 
		} 
		if($timeline->m !== 0) { 
			$format[] = "%m ".$doPlural($timeline->m, "month"); 
		} 
		if($timeline->d !== 0) { 
			$format[] = "%d ".$doPlural($timeline->d, "day"); 
		} 
	
		if(count($format) > 1) { 
			$format = array_shift($format).", ".array_shift($format); 
		} else { 
			$format = array_pop($format); 
		} 
		 
		echo " (" . $timeline->format($format) . " +)"; 
	

	}
	else{
		echo " ** Invalid date range. Please change the start or end date**";
	}
endif;
?>

<?php 
//Displays site link if available
if (get_field('club_website')):
    echo "<br>";
	echo "<big><b>Website: </big></b>";
endif;
?>
<?php	
$link = get_field('club_website');
if( $link ): ?>
    <a class="button" href="<?php echo esc_url( $link ); ?>"><?php echo $link ?></a> 
<?php endif; ?>

<?php 
//Description section if avialable
?>
<?php 
if (get_field('club_description')):
    echo "<br><br><h2>Description</h2>";
    the_field('club_description');
endif;
?>

<?php 
//Achievements and Results section
?>
<?php 
if( get_field('club_reflection') && get_field('club_reflection_privacy') == 'Public' ) {
    echo "<br><h2>Reflection</h2>";
    the_field('club_reflection');
}
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



