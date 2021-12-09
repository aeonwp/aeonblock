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
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
</div><!-- #content -->

<div class="site-footer">
	<?php
	if ( has_nav_menu( 'social' ) ) {
		?>
			<nav class="social-icons-footer footer-social-menu-navigation" aria-label="<?php esc_attr_e( 'Social', 'aeonblock' ); ?>" role="navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_class'     => 'aeonblock-menu-social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' . aeonblock_get_svg( array( 'icon' => 'chain' ) ),
						'container'      => false,
					)
				);
				?>
			</nav>
		<?php
	}
	?>
	<footer id="colophon" role="contentinfo">
		<div class="copyright">
			<?php echo wp_kses_post( get_theme_mod( 'aeonblock-copyright-text', __( 'All Rights Reserved', 'aeonblock' ) ) ); ?>
		</div>

		<div class="site-info">
			<div class="wp-credits">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'aeonblock' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'aeonblock' ), 'WordPress' );
			?>
			</a>
			</div>
			<div class="author-credits">
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'aeonblock' ), 'AeonBlock', '<a href="https://aeonwp.com/">AeonWP</a>' );
			?>
			</div>
		</div><!-- .site-info -->
		<?php
		/**
		 * Go to Top Option.
		 */
		do_action( 'aeonblock_go_to_top_hook' );
		?>
	</footer><!-- #colophon -->
</div>
<?php wp_footer(); ?>
</body>
</html>
