<?php
/**
 * Courses Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'courses-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'courses';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$heading = get_field('courses_carousel_heading') ?: 'Courses';
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h1 class="block-carousel-heading">
        <?php echo $heading; ?>
    </h1>
    <?php
    echo '<div class="course-container">';
$courses = get_field('courses_repeater','option');
if( $courses ) {
    echo '<ul class="course">';
    foreach( $courses as $course ) {
        $name = $course['courses_text'];
        echo '<li>';
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
</div>