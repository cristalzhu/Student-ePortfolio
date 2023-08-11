<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<!-- <div class="site-info"> -->
<div id="footerhp">

		<div class="leftcol">
			<a href="https://eportfolio.ddev.site/contact/"><h1>Contact Me</h1></a>
            <p>
			<?php if (get_field('contact_phone','option')) {
				echo '<i class="fas footer-icon fa-2x fa-phone contact_icons flip_phone"></i>';
				the_field('contact_phone','option');
			}
	 		?>
			</p>

			<p><i class="far footer-icon fa-2x fa-envelope contact_icons"></i>
			<?php the_field('contact_email','option'); ?>
			</p>

			<p>
			<?php if (get_field('contact_address','option')) {
				echo '<i class="fas footer-icon fa-2x fa-map-marker-alt contact_icons"></i>';
				the_field('contact_address','option');
			}
	 		?>
			</p>

			<a href="//localhost:8181/?page_id=12"><p><i class="far footer-icon fa-2x fa-file contact_icons"></i> Link to my Resume</p></a>

			<div class="container">

				<a href="<?php the_field('profile_linkedin_url','option');?>">
				<i class="fab footer-icon fa-2x fa-linkedin-in"></i>

				<a href="<?php the_field('profile_github_url','option');?>">
				<i class="fab footer-icon fa-2x fa-github"></i>

				<a href="<?php the_field('profile_facebook_url','option');?>">
				<i class="fab footer-icon fa-2x fa-facebook"></i>

				<a href="<?php the_field('profile_instagram_url','option');?>">
				<i class="fab footer-icon fa-2x fa-instagram"></i>
				</a>
			</div>


		</div>

		<div class="rightcol">
			<h2>Leave a Message!</h2>

			<div class="contact-form" >
				<form action="/contact-form-action" name=""contact-form">
				<label for="fname">Name</label>
				<input type="text" id="fname" name="fname" placeholder="James Duke">
				<label for="vieweremail">Email</label>
				<input type="email" id="vieweremail" name="Email" placeholder="duke@duke.edu">
				<label for="subject">Subject</label>
				<input type="text" id="subject" name="subject">

				<label for="message">Message</label>
    			<textarea id="message" name="message" placeholder="Write A Message..."></textarea>

				<input type="submit" name="Submit" />
				</form>
			</div>
		</div>
</div>
<!-- </div> -->
<!-- .site-info -->

