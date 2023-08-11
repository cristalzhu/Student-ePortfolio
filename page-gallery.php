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
wp_enqueue_script( 'gallery', get_stylesheet_directory_uri() . '/assets/js/gallery.min.js' );

wp_rig()->print_styles( 'wp-rig-content' );

?>
    <main id="primary" class="site-main">
    <?php 
$images = get_field('gallery_images','option');

if( $images ): 
    echo '<h1 class="page-title">Gallery</h1>';
?>
    <div class="gallery-page">
    <?php foreach( $images as $image ): ?>
        <div class="container1">
        <img src="<?php echo esc_url($image['sizes']['large']) ?>"
        alt="<?php echo esc_html($image['description'])?>" onclick="onClick(this)" class="modal-hover-opacity">
        <div><b> <?php echo $image['title']; ?> </b></div>
        <div class="caption"> <?php echo $image['caption']; ?> </div>
  </div>
    <?php endforeach; ?>
    <!-- The Modal -->
    <div id="modal01" class="modal" onclick="this.style.display='none'">
        <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    <div class="modal-content">
    <img id="img01">
    <div id="description01"></div>
    </div>
    </div>
     
    </div>
<?php endif; ?>
    </main><!-- #primary -->
<?php

get_footer();

?>





