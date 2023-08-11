<?php
/**
 * Template part for displaying an expereince's content
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
//Displays Position if available
if (get_field('experience_position')):
    echo "<big><b>Postion: </big></b>";
    the_field('experience_position');
    echo "<br>";
endif;
?>

<?php 
//Displays affiliation if available
if (get_field('experience_affiliation')):
    echo "<big><b>Affiliation: </big></b>";
    the_field('experience_affiliation');
    echo "<br>";
endif;
?>

<?php 
//Displays Location if available
if (get_field('experience_location')):
    echo "<big><b>Location: </big></b>";
    the_field('experience_location');
    echo "<br>";
endif;
?>

<?php 
//Displays Date and calculates a date range
?>
<?php 
if (get_field('experience_end_date') && get_field('experience_start_date')):
	echo "<big><b>Date Range: </big></b>";
	the_field('experience_start_date');
	echo " - ";
	the_field('experience_end_date');

    
	$start_date = date_create(get_field('experience_start_date'));
	$end_date = date_create(get_field('experience_end_date'));
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
elseif(get_field('experience_start_date')):
    echo "<big><b>Dates: </big></b>";
	the_field('experience_start_date');
	echo " -  Present";

    $start_date = date_create(get_field('experience_start_date'));
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
//Displays affiliate website if available
if (get_field('experience_link')):
    echo "<br>";
	echo "<big><b>Website: </big></b>";
endif;
?>
<?php	
$link = get_field('experience_link');
if( $link ): ?>
    <a class="button" href="<?php echo esc_url( $link ); ?>"><?php echo $link ?></a> 
<?php endif; ?>




<?php 
//About section if avialable
?>
<?php 
if (get_field('experience_description')):
    echo "<br><br><h2>Description<br></h2>";
    the_field('experience_description');
	echo '<br>';
endif;
?>


<?php 
//Reflection section
?>
<?php
    if (get_field('experience_reflection') && get_field('experience_reflection_privacy') == 'Public' ):
        echo "<h2>Reflection<br></h2>";
        the_field('experience_reflection');
		echo "<br>";
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