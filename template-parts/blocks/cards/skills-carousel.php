<?php
/**
 * Skills Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'skills-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'skills';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$heading = get_field('skills_carousel_heading') ?: 'Skills';
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h1 class="block-carousel-heading">
        <?php echo $heading; ?>
    </h1>
    <?php
echo '<div class="skill-container">';
$skills = get_field('skills_repeater','option');
if( $skills ) {
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
}}}
echo '</div>';
?>
</div>


