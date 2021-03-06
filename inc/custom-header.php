<?php
/**
 * Custom Header for AeonBlock
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses aeonblock_header_style()
 */
function aeonblock_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'aeonblock_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '#000',
				'width'              => 2200,
				'height'             => 450,
				'flex-height'        => true,
				'wp-head-callback'   => 'aeonblock_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'aeonblock_custom_header_setup' );

if ( ! function_exists( 'aeonblock_header_style' ) ) {
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see aeonblock_custom_header_setup().
	 */
	function aeonblock_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) {
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
			// If the user has set a custom color for the text use that.
		} else {
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			<?php
		}
		?>
		</style>
		<?php
	}
}
