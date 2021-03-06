<?php
/**
 * Search results page.
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

get_header();

/** Left sidebar */
get_sidebar( 'left' );

?>
	<main id="primary" role="main">
		<div class="single-blog-post">
			<?php
			if ( have_posts() ) {
				?>
				<div class="search-title-box">
					<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'aeonblock' ), '<span>' . get_search_query() . '</span>' );
					?>
					</h1>
				</div>
				<?php
				/* Start the Loop */
				while ( have_posts() ) {
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					*/
					get_template_part( 'template-parts/content' );
				}
					/**
					 * AeonBlock_post_navigation hook.
					 *
					 * @since AeonBlock 1.0.0
					 *
					 * @hooked aeonblock_posts_navigation -  10
					 */
					do_action( 'aeonblock_action_navigation' );

			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
			?>
		</div>
	</main><!-- #primary -->
<?php
get_sidebar();

get_footer();
