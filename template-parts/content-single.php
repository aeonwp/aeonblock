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
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-details-post  post-wrapper' ); ?>>
	<div class="single-blog">
	<?php
		if ( has_post_thumbnail() ) {
			?>
			<div class="featured-wrapper">
				<div class="post-thumbnail blog-img">
					<?php the_post_thumbnail( 'small' ); ?>
				</div>
			</div>
			<?php
		}
	?>
	<div class="blog-content">
		<header class="entry-header">

			<ul class="blog-meta entry-meta clearfix">
				<li>
					<span class="posted-in">
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . ' " rel="category tag">' . esc_html( $categories[0]->name ) . '</a>';
						}
						?>
					</span>
				</li>
			</ul>
			<?php
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
			<ul class="blog-meta entry-meta clearfix">
				<li><span class="author vcard">
					<?php
					echo aeonblock_get_svg( array( 'icon' => 'user' ) );
					?>
					<i class="fa fa-user" aria-hidden="true"></i> 
					<?php aeonblock_posted_by(); ?></span>
				</li>
				<li>
					<?php
					echo aeonblock_get_svg( array( 'icon' => 'clock' ) );
					aeonblock_posted_on();
					?>
				</li>
			</ul>
		</header>
	
	
		<div class="entry-content blog-details-content">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aeonblock' ),
					'after'  => '</div>',
				)
			);
			?>

			<?php if ( has_tag() ) { ?>
				<footer class="entry-footer blog-details-tag-share">
					<div class="blog-details-tag">
						<div class="sidebar-widget">
							<ul class="sidebar-tag">
								<li><?php the_tags(); ?></li>
							</ul>
						</div>
					</div>
				</footer><!-- .entry-footer -->
			<?php } ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
