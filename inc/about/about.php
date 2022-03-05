<?php
/**
 * Added aeon Page.
*/

/**
 * Add a new page under Appearance
 */
function aeon_menu() {
	add_theme_page( __( 'Aeon Block Options', 'aeonblock' ), __( 'Aeon Block Options', 'aeonblock' ), 'edit_theme_options', 'aeon-theme', 'aeon_page' );
}
add_action( 'admin_menu', 'aeon_menu' );

/**
 * Enqueue styles for the help page.
 */
function aeon_admin_scripts( $hook ) {
	if ( 'appearance_page_aeon-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'aeon-admin-style', get_template_directory_uri() . '/inc/about/about.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'aeon_admin_scripts' );

/**
 * Add the theme page
 */
function aeon_page() {
	?>
	<div class="das-wrap">
		<div class="aeon-panel">
			<div class="aeon-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/inc/about/images/aeonblock-logo.png' ); ?>" alt="Logo">
			</div>
			<a href="https://checkout.freemius.com/mode/dialog/theme/9988/plan/16803/licenses/1/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $49.99', 'aeonblock' ); ?></a>
			<p>
			<?php esc_html_e( 'Accessibility Ready WordPress theme. Now, your website is accessible to everyone. Use this theme today.', 'aeonblock' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'aeonblock' ); ?></a>
		</div>

		<div class="aeon-panel">
			<div class="aeon-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'aeonblock' ); ?></h3>
				</div>
				<a href="https://aeonwp.com/aeonblock" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'View Details - Click Here', 'aeonblock' ); ?></a>
			</div>
		</div>
		<div class="aeon-panel">
			<div class="aeon-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'aeonblock' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/aeonblock/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'aeonblock' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
