<?php
/**
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

			?>
			<div class="custom-post-pagination">
				<?php
				    $prevPost = get_previous_post(true);
				    if ($prevPost) {
				        $args = [
				            'posts_per_page' => 1,
				            'include' => $prevPost->ID,
				        ];
				        $prevPost = get_posts($args);
				        foreach ($prevPost as $post) {
				            setup_postdata($post); ?>
								<div class="previous-post">
									<div class="blog-pagination-post">
										<div class="post-thumb">
										<a href="<?php the_permalink(); ?>">
											<?php echo aeonblock_get_svg( array( 'icon' => 'arrow-left' ) ); ?>
											<?php the_post_thumbnail('thumbnail'); ?>
										</a>
										</div>
										<div class="post-content">
											<h2 class="title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2>
											<span class="date"><?php echo get_the_date('F j, Y'); ?></span>
										</div>
									</div>
								</div>
							<?php wp_reset_postdata();
				        } //end foreach
				    } // end if

				    $nextPost = get_next_post(true);
				    if ($nextPost) {
				        $args = [
				            'posts_per_page' => 1,
				            'include' => $nextPost->ID,
				        ];
				        $nextPost = get_posts($args);
				        foreach ($nextPost as $post) {
				            setup_postdata($post); ?>
								<div class="next-post">
									<div class="blog-pagination-post">
										<div class="post-content">
											<h2 class="title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2>
											<span class="date"><?php echo get_the_date('F j, Y'); ?></span>
										</div>
										<div class="post-thumb">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?>
												<?php echo aeonblock_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
											</a>
										</div>
									</div>
								</div>
								<?php wp_reset_postdata();
				        } //end foreach
				    }// end if
				?>
			</div>
			<?php

			/**
			* AeonBlock_related_posts hook
			*
			* @since AeonBlock Plus 1.0.0
			*
			* @hooked aeonblock_related_posts -  10
			*/
			do_action( 'aeonblock_related_posts', get_the_ID() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		} // End of the loop.
		?>
	</main><!-- #primary -->

<?php
get_sidebar();

get_footer();
