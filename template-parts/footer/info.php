<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
<footer id="footer">
	<div class="container">
		<?php if(get_field('profile_linkedin_url','option')){
			?><a href="<?php the_field('profile_linkedin_url','option');?>">
			<i class="fab footer-icon fa-2x fa-linkedin-in"></i></a><?php
			}?>
		<?php if(get_field('profile_github_url','option')){
			?><a href="<?php the_field('profile_github_url','option');?>">
			<i class="fab footer-icon fa-2x fa-github"></i></a><?php
			}?>
		<?php if(get_field('profile_facebook_url','option')){
			?><a href="<?php the_field('profile_facebook_url','option');?>">
			<i class="fab footer-icon fa-2x fa-facebook"></i></a><?php
			}?>
		<?php if(get_field('profile_instagram_url','option')){
			?><a href="<?php the_field('profile_instagram_url','option');?>">
			<i class="fab footer-icon fa-2x fa-instagram"></i></a><?php
			}?>
		<?php if(get_field('profile_other1_url','option')){
			?><a href="<?php the_field('profile_other1_url','option');?>">
			<i class="fas footer-icon fa-2x fa-bars"></i></a><?php
			}?>
		<?php if(get_field('profile_other2_url','option')){
			?><a href="<?php the_field('profile_other2_url','option');?>">
			<i class="fas footer-icon fa-2x fa-bars"></i></a><?php
			}?>
		<?php if(get_field('profile_other3_url','option')){
			?><a href="<?php the_field('profile_other3_url','option');?>">
			<i class="fas footer-icon fa-2x fa-bars"></i></a><?php
			}?>
		<?php if(get_field('socials_resume','option')){
			?><a href="<?php the_field('socials_resume','option');?>">
			<i class="far footer-icon fa-2x fa-file"></i></a><?php
			}?>

			<form method="get" action="/contact" id="contact-button"><button class="contact-button">Contact Me</button></form>

	</div>



  </footer>

</div><!-- .site-info -->