<?php
/**
 * Documentation for AeonBlock
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Add the menu item under Appearance, themes.
 */
function aeonblock_menu() {
	add_theme_page( __( 'About AeonBlock', 'aeonblock' ), __( 'About AeonBlock', 'aeonblock' ), 'edit_theme_options', 'aeonblock-theme', 'aeonblock_page' );
}
add_action( 'admin_menu', 'aeonblock_menu' );

/**
 * Enqueue styles for the help page.
 */
function aeonblock_admin_scripts( $hook ) {
	if ( 'appearance_page_aeonblock-theme' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'aeonblock-admin-style', get_template_directory_uri() . '/css/admin.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'aeonblock_admin_scripts' );

/**
 * Add the theme page
 */
function aeonblock_page() {
	?>
	<div class="wrap">
		<div class="welcome-panel aeon-panel">
			<div class="welcome-panel-content">
				<img class="aeonlogo" src="<?php echo esc_url( get_template_directory_uri() . '/images/aeonwp.png' ); ?>" alt="" height="130px">
				<div class="aeontitle"><h1><?php esc_html_e( 'AeonBlock', 'aeonblock' ); ?></h1>
					<br>
					<b><?php esc_html_e( 'Thank you for chosing AeonBlock', 'aeonblock' ); ?></b><br>
				</div>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'Frequently asked questions', 'aeonblock' ); ?></h2>
				<h3><?php esc_html_e( 'Where can I get support for the theme?', 'aeonblock' ); ?></h3>
				<?php _e( 'You are welcome to post your questions in the <a href="https://wordpress.org/support/theme/aeonblock/">support forum</a>.', 'aeonblock' ); ?>
				<h3><?php esc_html_e( 'How do I use the About section?', 'aeonblock' ); ?></h3>
				<?php _e( 'You need to have an active sidebar, and enable the option in the customzer.', 'aeonblock' ); ?><br>
				<?php _e( 'To show your biography, you need to add the content in your WordPress user profile.', 'aeonblock' ); ?><br>
				<h3><?php esc_html_e( 'Can you add more features?', 'aeonblock' ); ?></h3>
				<?php esc_html_e( 'The Plus version of the theme has additional features.', 'aeonblock' ); ?> <?php _e( 'You can learn more about the premium version of the theme here: <a href="https://aeonwp.com/aeonblock-plus/">AeonBlock Plus</a>.', 'aeonblock' ); ?><br>
				<?php _e( 'We also offer a <a href="https://aeonwp.com/services/">customization service</a>. ', 'aeonblock' ); ?><br>
				<h3><?php esc_html_e( 'Where can I download demo content?', 'aeonblock' ); ?></h3>
				<?php _e( 'You can download the demo content on our <a href="https://aeonwp.com/aeonblock/#demo">website</a>.', 'aeonblock' ); ?>
				<br>
				<br>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'Have you built something awesome with AeonBlock?', 'aeonblock' ); ?></h2>
				<br>
				<?php esc_html_e( 'We would love to see what you have created!', 'aeonblock' ); ?>
				<?php esc_html_e( 'If you would like your website to be featured on our blog, please email us at aeonwpofficial@gmail.com', 'aeonblock' ); ?>
				<br>
				<br>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'If you like the theme, please leave a review', 'aeonblock' ); ?></h2><br>
				<a href="https://wordpress.org/support/theme/aeonblock/reviews/#new-post"><?php esc_html_e( 'Rate this theme', 'aeonblock' ); ?></a>
				<br><br>
			</div>
		</div>
		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h2><?php esc_html_e( 'More themes', 'aeonblock' ); ?></h2><br>
				<a href="https://aeonwp.com/aeonaccess-plus/"><?php esc_html_e( 'AeonAccess is available in a premium and free version.', 'aeonblock' ); ?></a><br><br>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/access.jpg' ); ?>" alt="" height="300px">
				<br><br>
			</div>
		</div>
	</div>
	<?php
}
