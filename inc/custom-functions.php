<?php
/**
 * File aeonblock.
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! function_exists( 'aeonblock_about_user' ) ) {
	/**
	 * Displays the About section.
	 */
	function aeonblock_about_user() {
		$enable_about = absint( get_theme_mod( 'aeonblock-enable-about', 0 ) );

		if ( 1 == $enable_about ) {

			$about_users = absint( get_theme_mod( 'aeonblock_about_user' ) );

			$aeonblock_featured_user = get_user_by( 'ID', $about_users );
			if ( ! empty( $aeonblock_featured_user ) && is_front_page() && ! is_paged() ) {
				echo '<section class="widget about-me">';
				echo '<h2 class="widget-title">';
				esc_html_e( 'About ', 'aeonblock' );
				if ( count_user_posts( $aeonblock_featured_user->ID ) ) {
					echo '<a href="' . esc_url( get_author_posts_url( $aeonblock_featured_user->ID ) ) . '">' .
						esc_html( $aeonblock_featured_user->display_name ) . '</a>';
				} else {
					echo esc_html( $aeonblock_featured_user->display_name );
				}
				echo '</h2>';
				echo '<div class="about-me-description textwidget">';
				echo '<a href="' . esc_url( get_author_posts_url( $aeonblock_featured_user->ID ) ) . '">' .
					get_avatar( $aeonblock_featured_user->user_email, 300 ) . '<span class="screen-reader-text">' . esc_html( $aeonblock_featured_user->display_name ) . '</span></a>';

				echo '<p>' . esc_html( get_user_meta( $aeonblock_featured_user->ID, 'description', true ) )
					. '</p></div>';
			}
			echo '</section>';
		}
	}
}

if ( ! function_exists( 'aeonblock_breadcrumb' ) ) {
	/**
	 * AeonBlock Breadcrumb
	 *
	 * @since AeonBlock 1.0.0
	 */
	function aeonblock_breadcrumb() {
		if ( ! is_front_page() && get_theme_mod( 'aeonblock-breadcrumb-option', 1 ) == 1 ) {
			echo '<div class="breadcrumb">';
			aeonblock_breadcrumb_trail();
			echo '</div>';
		}
	}
}
add_action( 'aeonblock_breadcrumb_hook', 'aeonblock_breadcrumb', 10 );

/**
 * AeonBlock Excerpt Length
 *
 * @since AeonBlock 1.0.0
 *
 * @param int $length Length of the excerpt.
 */
function aeonblock_excerpt_length( $length ) {
	if ( ! is_admin() ) {
		return absint( get_theme_mod( 'aeonblock-blog-excerpt', 45 ) );
	}
}
add_filter( 'excerpt_length', 'aeonblock_excerpt_length', 999 );

/**
 * AeonBlock Add Body Class
 *
 * @since AeonBlock 1.0.0
 *
 * @param string $classes CSS body classes.
 */
function aeonblock_custom_class( $classes ) {
	$classes[] = 'pt-sticky-sidebar';

	$sidebar = get_theme_mod( 'aeonblock-sidebar-options' );
	if ( 'no-sidebar' === $sidebar ) {
		$classes[] = 'no-sidebar';
	} elseif ( 'left-sidebar' === $sidebar ) {
		$classes[] = 'has-left-sidebar';
	} elseif ( 'middle-column' === $sidebar ) {
		$classes[] = 'middle-column';
	} else {
		$classes[] = 'has-right-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'aeonblock_custom_class' );

if ( ! function_exists( 'aeonblock_go_to_top' ) ) {
	/**
	 * Go to Top
	 *
	 * @since AeonBlock 1.0.0
	 */
	function aeonblock_go_to_top() {
		if ( get_theme_mod( 'aeonblock-go-to-top', 1 ) == 1 ) {
			?>
			<a id="toTop" class="go-to-top" href="#">
				<?php echo aeonblock_get_svg( array( 'icon' => 'angle-double-up' ) ); ?>
				<span class="screen-reader-text"><?php esc_html_e( 'Go to top', 'aeonblock' ); ?></span>
			</a>
			<?php
		}
	}
	add_action( 'aeonblock_go_to_top_hook', 'aeonblock_go_to_top', 20 );
}

/**
 * Jetpack Top Posts widget Image size.
 *
 * @since AeonBlock 1.0.0
 *
 * @param array $get_image_options Jetpack top post settings.
 */
function aeonblock_custom_thumb_size( $get_image_options ) {
	$get_image_options['avatar_size'] = 600;
	return $get_image_options;
}
add_filter( 'jetpack_top_posts_widget_image_options', 'aeonblock_custom_thumb_size' );


if ( ! function_exists( 'aeonblock_posts_navigation' ) ) {
	/**
	 * Post Navigation Function
	 *
	 * @since AeonBlock 1.0.0
	 */
	function aeonblock_posts_navigation() {
		$aeonblock_pagination_option = get_theme_mod( 'aeonblock-pagination-type', 'numeric' );

		if ( 'default' === $aeonblock_pagination_option ) {
			the_posts_navigation(
				array(
					'prev_text' => __( '&laquo; Prev', 'aeonblock' ),
					'next_text' => __( 'Next &raquo;', 'aeonblock' ),
				)
			);

		} else {
			echo "<div class='aeonblock-pagination'>";
			the_posts_pagination(
				array(
					'prev_text' => __( '&laquo; Prev', 'aeonblock' ),
					'next_text' => __( 'Next &raquo;', 'aeonblock' ),
				)
			);
			echo '</div>';
		}
	}
}
add_action( 'aeonblock_action_navigation', 'aeonblock_posts_navigation', 10 );

if ( ! function_exists( 'aeonblock_related_post' ) ) {
	/**
	 * Display related posts from same category
	 *
	 * @since AeonBlock 1.0.0
	 *
	 * @param int $post_id ID of the Post.
	 * @return void
	 */
	function aeonblock_related_post( $post_id ) {
		if ( 0 == get_theme_mod( 'aeonblock-related-post', 1 ) ) {
			return;
		}

		$categories = get_the_category( $post_id );
		if ( $categories ) {
			$category_ids = array();
			$category     = get_category( $category_ids );
			$categories   = get_the_category( $post_id );
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
			$count = $category->category_count;
			if ( $count > 1 ) {
				?>
				<div class="related-pots-block">
				<h2 class="widget-title"><?php esc_html_e( 'Related Posts', 'aeonblock' ); ?></h2>
				<ul class="related-post-entries clear">
					<?php
					$aeonblock_cat_post_args = array(
						'category__in'        => $category_ids,
						'post__not_in'        => array( $post_id ),
						'post_type'           => 'post',
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
					);

					$aeonblock_featured_query = new WP_Query( $aeonblock_cat_post_args );

					while ( $aeonblock_featured_query->have_posts() ) {
						$aeonblock_featured_query->the_post();
						?>
						<li>
							<?php
							if ( has_post_thumbnail() ) {
								?>
								<figure class="widget-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'small' ); ?>
									</a>
								</figure>
								<?php
							}
							?>
							<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</li>
						<?php
					}
					wp_reset_postdata();
					?>
				</ul>
				</div> <!-- .related-post-block -->
				<?php
			}
		}
	}
}
add_action( 'aeonblock_related_posts', 'aeonblock_related_post', 10, 1 );
