<?php
/**
 * Template Name: Left Sidebar
 * Template Post Type: post
 *
 * File aeonblock.
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
/** Left sidebar */
get_sidebar( 'left' );
?>
	<main id="primary" role="main">
		<?php
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		} // End of the loop.
		?>
	</main><!-- #primary -->
<?php

/** Show the sidebar below the content on small widths. */
get_sidebar();

get_footer();
