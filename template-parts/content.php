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

$read_more           = get_theme_mod( 'aeonblock-read-more-text', __( 'Continue Reading', 'aeonblock' ) );
$blog_meta           = get_theme_mod( 'aeonblock-blog-meta', 1 );
$blog_featured_image = get_theme_mod( 'aeonblock-blog-image', 1 );
$featured_image_full = get_theme_mod( 'aeonblock-blog-full-image', 0 );
$blog_full_image     = ( $featured_image_full == 0 ) ? '' : 'blog-full-image';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog single-blog-post' ); ?>>
	
        <?php
		if ( has_post_thumbnail() && $blog_featured_image == 1 ) {
			?>
			<div class="featured-wrapper <?php echo esc_attr( $blog_full_image ); ?>">
				<div class="post-thumbnail blog-img">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'small' ); ?>
					</a>
				</div>
			</div>
			<?php
		}
		?>
        
		<div class="blog-content">
			<header class="entry-header">
				<?php
				if ( $blog_meta == 1 ) {
					?>
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
				<?php }

					if ( is_singular() ) {
						the_title( '<h1 class="title entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>
				<?php

				if ( $blog_meta == 1 ) {
					?>
					<ul class="blog-meta entry-meta clearfix">
						<li>
							<?php
							echo aeonblock_get_svg( array( 'icon' => 'clock' ) );
							aeonblock_posted_on();
							?>
						</li>
						<li><span class="post-comments">
							<?php
							echo aeonblock_get_svg( array( 'icon' => 'comments' ) ) . ' ';
							comments_number();
							?>
						</span></li>
					</ul>
					<?php
				}
				 ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>
		<?php
			if ( ! empty( $read_more ) ) {
				?>
				<footer class="blog-btn entry-footer">
				<a class="blog-btn-link" href="<?php the_permalink(); ?>"><?php echo esc_html( $read_more ); ?> 
					<span class="screen-reader-text"><?php the_title(); ?></span>
					<?php echo aeonblock_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
				</a>
				</footer><!-- .entry-footer -->
				<?php
			}
		?>
</article><!-- #post-<?php the_ID(); ?> -->

