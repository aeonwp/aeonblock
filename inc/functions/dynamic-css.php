<?php
/**
 * File aeonblock.
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * Dynamic css
 *
 * @since AeonBlock 1.0.0
 */

if ( ! function_exists( 'aeonblock_dynamic_css' ) ) {
	/**
	 * Dynamic CSS
	 *
	 *  @since AeonBlock 1.0.0
	 */
	function aeonblock_dynamic_css() {

		/* Get and escape theme options */
		$aeonblock_body_font           = esc_attr( get_theme_mod( 'aeonblock_body_font', 'Open Sans' ) );
		$aeonblock_title_font          = esc_attr( get_theme_mod( 'aeonblock_title_font', 'Manrope' ) );
		$aeonblock_font_size           = absint( get_theme_mod( 'aeonblock-font-size', 14 ) );
		$aeonblock_font_line_height    = esc_attr( get_theme_mod( 'aeonblock-font-line-height', 2 ) );
		$aeonblock_font_letter_spacing = absint( get_theme_mod( 'aeonblock-letter-spacing', 0 ) );
		$aeonblock_about_gravatar      = esc_attr( get_theme_mod( 'aeonblock-about-gravatar', 'circle' ) );
		$aeonblock_accent_color        = esc_attr( get_theme_mod( 'aeonblock-accent-color', '#000c29' ) );
		$aeonblock_button_color        = esc_attr( get_theme_mod( 'aeonblock-button-color', '#54d6eb' ) );
		$custom_css                   = '';

		/* Typography Section */

		if ( ! empty( $aeonblock_body_font ) ) {
			$custom_css .= "body { font-family: '{$aeonblock_body_font}', BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }";
		}

		if ( ! empty( $aeonblock_title_font ) ) {
			$custom_css .= ".site-title { font-family: '{$aeonblock_title_font}', BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }";
		}

		if ( ! empty( $aeonblock_title_font ) ) {
			$custom_css .= "h1, h2, h3, h4, h5, h6{ font-family: '{$aeonblock_title_font}', BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }";
		}
		
		if ( ! empty( $aeonblock_title_font ) ) {
			$custom_css .= ".main-navigation a{ font-family: '{$aeonblock_title_font}', BlinkMacSystemFont, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }";
		}

		if ( ! empty( $aeonblock_font_size ) ) {
			$custom_css .= "body, input { font-size: {$aeonblock_font_size}px; }";
			if ( 14 == $aeonblock_font_size ) {
				$custom_css .= '.widget_search .search-form .search-field { height: 46px; } ';
			}
		}

		if ( ! empty( $aeonblock_font_line_height ) ) {
			$custom_css .= "body { line-height: {$aeonblock_font_line_height}; }";
		}

		if ( ! empty( $aeonblock_font_letter_spacing ) ) {
			$custom_css .= "body { letter-spacing: {$aeonblock_font_letter_spacing}px; }";
		}

		/* About section */
		if ( 'square' === $aeonblock_about_gravatar ) {
			$custom_css .= '.about-me-description a img { border-radius: 2px; }';
		} elseif ( 'hide' === $aeonblock_about_gravatar ) {
			$custom_css .= '.about-me-description a { display: none; }';
		}

		if ( ! empty( $aeonblock_accent_color ) ) {
			$custom_css .= ' button:hover,
				input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover,
				button:active,
				button:focus,
				input[type="button"]:active,
				input[type="button"]:focus,
				input[type="reset"]:active,
				input[type="reset"]:focus,
				input[type="submit"]:active,
				input[type="submit"]:focus,
				#mobile-menu-toggle:hover, #mobile-menu-toggle:focus,
				.aeonblock-pagination .page-numbers.current,	.aeonblock-pagination .page-numbers:hover,
				.posts-navigation a:hover, .posts-navigation a:focus,
				.entry-header .entry-meta li .posted-in a:focus,
				.entry-header .entry-meta li .posted-in a:hover,
				.entry-footer .more-link:hover,	.entry-footer .more-link:focus,
				.site-footer {
					background: ' . $aeonblock_accent_color . ';
				}';

				$custom_css .= ' .aeonblock-pagination .page-numbers,
				.posts-navigation a,
				#mobile-menu-toggle,
				.entry-footer .more-link, .entry-footer .more-link:hover, .entry-footer .more-link:focus,
				.widget_search .search-field:focus, .widget_search .search-field:hover,
				input[type="text"]:focus,
				input[type="email"]:focus,
				input[type="url"]:focus,
				input[type="password"]:focus,
				input[type="search"]:focus,
				input[type="number"]:focus,
				input[type="tel"]:focus,
				input[type="range"]:focus,
				input[type="date"]:focus,
				input[type="month"]:focus,
				input[type="week"]:focus,
				input[type="time"]:focus,
				input[type="datetime"]:focus,
				input[type="datetime-local"]:focus,
				input[type="color"]:focus,
				textarea:focus,
				input[type="text"]:hover,
				input[type="email"]:hover,
				input[type="url"]:hover,
				input[type="password"]:hover,
				input[type="search"]:hover,
				input[type="number"]:hover,
				input[type="tel"]:hover,
				input[type="range"]:hover,
				input[type="date"]:hover,
				input[type="month"]:hover,
				input[type="week"]:hover,
				input[type="time"]:hover,
				input[type="datetime"]:hover,
				input[type="datetime-local"]:hover,
				input[type="color"]:hover,
				textarea:hover
				{
					border-color: ' . $aeonblock_accent_color . ';
				}';
		}

		if ( ! empty( $aeonblock_button_color ) ) {
			$custom_css .= ' button, input[type="button"], input[type="reset"], input[type="submit"], #toTop {
				background: ' . $aeonblock_button_color . ';
			}';
		}

		wp_add_inline_style( 'aeonblock-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'aeonblock_dynamic_css', 99 );
