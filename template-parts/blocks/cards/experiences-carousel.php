<?php
/**
 * Experiences Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'experiences-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'experiences';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    //$className .= ' align' . $block['align'];
    $className .= ' alignfull';
}
// Load values and assign defaults.
$heading = get_field('experiences_carousel_heading') ?: 'Experiences';
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <h1 class="block-carousel-heading">
        <?php echo $heading; ?>
    </h1>
    <?php get_template_part( 'template-parts/content/carousel', null, array('post_type' => 'experiences')); ?>
</div>