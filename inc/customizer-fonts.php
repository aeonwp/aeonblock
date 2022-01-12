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

if ( ! function_exists( 'aeonblock_font_customize_register' ) ) {
	/**
	 * Add fotn settings and controls for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function aeonblock_font_customize_register( $wp_customize ) {

		$wp_customize->add_setting(
			'aeonblock_title_font',
			array(
				'default'           => 'Manrope',
				'sanitize_callback' => 'aeonblock_sanitize_select',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'aeonblock_title_font',
				array(
					'label'    => __( 'Choose a font for the Site title', 'aeonblock' ),
					'section'  => 'aeonblock_typography_section',
					'type'     => 'select',
					'priority' => 1,
					'choices'  => array(
						'Noto Serif'         => __( 'Noto Serif', 'aeonblock' ),
						'Alegreya'           => __( 'Alegreya', 'aeonblock' ),
						'Alegreya Sans SC'   => __( 'Alegreya Sans SC', 'aeonblock' ),
						'Arimo'              => __( 'Arimo', 'aeonblock' ),
						'Bree Serif'         => __( 'Bree Serif', 'aeonblock' ),
						'Cherry Swash'       => __( 'Cherry Swash', 'aeonblock' ),
						'Cinzel'             => __( 'Cinzel', 'aeonblock' ),
						'Exo 2'              => __( 'Exo 2', 'aeonblock' ),
						'Fondamento'         => __( 'Fondamento', 'aeonblock' ),
						'Gentium Book Basic' => __( 'Gentium Book Basic', 'aeonblock' ),
						'Grand Hotel'        => __( 'Grand Hotel', 'aeonblock' ),
						'Hind'               => __( 'Hind', 'aeonblock' ),
						'Josefin Sans'       => __( 'Josefin Sans', 'aeonblock' ),
						'Karla'              => __( 'Karla', 'aeonblock' ),
						'La Belle Aurore'    => __( 'La Belle Aurore', 'aeonblock' ),
						'Lato'               => __( 'Lato', 'aeonblock' ),
						'Libre Baskerville'  => __( 'Libre Baskerville', 'aeonblock' ),
						'Lobster Two'        => __( 'Lobster Two', 'aeonblock' ),
						'Lora'               => __( 'Lora', 'aeonblock' ),
						'Manrope'               => __( 'Manrope', 'aeonblock' ),
						'Merriweather'       => __( 'Merriweather', 'aeonblock' ),
						'Montserrat'         => __( 'Montserrat', 'aeonblock' ),
						'Muli'               => __( 'Muli', 'aeonblock' ),
						'Noticia Text'       => __( 'Noticia Text', 'aeonblock' ),
						'Noto Sans'          => __( 'Noto Sans', 'aeonblock' ),
						'Open Sans'          => __( 'Open Sans', 'aeonblock' ),
						'Oswald'             => __( 'Oswald', 'aeonblock' ),
						'Pacifico'           => __( 'Pacifico', 'aeonblock' ),
						'Playfair Display'   => __( 'Playfair Display', 'aeonblock' ),
						'Quando'             => __( 'Quando', 'aeonblock' ),
						'Raleway'            => __( 'Raleway', 'aeonblock' ),
						'Roboto Slab'        => __( 'Roboto Slab', 'aeonblock' ),
						'Sorts Mill Goudy'   => __( 'Sorts Mill Goudy', 'aeonblock' ),
						'Tangerine'          => __( 'Tangerine', 'aeonblock' ),
						'Ubuntu'             => __( 'Ubuntu', 'aeonblock' ),
						'Vollkorn'           => __( 'Vollkorn', 'aeonblock' ),

					),
				)
			)
		);

		$wp_customize->add_setting(
			'aeonblock_body_font',
			array(
				'default'           => 'Open Sans',
				'sanitize_callback' => 'aeonblock_sanitize_select',

			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'aeonblock_body_font',
				array(
					'label'    => __( 'Choose a font for the body text', 'aeonblock' ),
					'section'  => 'aeonblock_typography_section',
					'type'     => 'select',
					'priority' => 2,
					'choices'  => array(
						'Noto Serif'         => __( 'Noto Serif', 'aeonblock' ),
						'Alegreya'           => __( 'Alegreya', 'aeonblock' ),
						'Alegreya Sans SC'   => __( 'Alegreya Sans SC', 'aeonblock' ),
						'Arimo'              => __( 'Arimo', 'aeonblock' ),
						'Exo 2'              => __( 'Exo 2', 'aeonblock' ),
						'Gentium Book Basic' => __( 'Gentium Book Basic', 'aeonblock' ),
						'Hind'               => __( 'Hind', 'aeonblock' ),
						'Josefin Sans'       => __( 'Josefin Sans', 'aeonblock' ),
						'Karla'              => __( 'Karla', 'aeonblock' ),
						'Lato'               => __( 'Lato', 'aeonblock' ),
						'Libre Baskerville'  => __( 'Libre Baskerville', 'aeonblock' ),
						'Lora'               => __( 'Lora', 'aeonblock' ),
						'Merriweather'       => __( 'Merriweather', 'aeonblock' ),
						'Montserrat'         => __( 'Montserrat', 'aeonblock' ),
						'Muli'               => __( 'Muli', 'aeonblock' ),
						'Noticia Text'       => __( 'Noticia Text', 'aeonblock' ),
						'Noto Sans'          => __( 'Noto Sans', 'aeonblock' ),
						'Old Standard TT'    => __( 'Old Standard TT', 'aeonblock' ),
						'Open Sans'          => __( 'Open Sans', 'aeonblock' ),
						'Oswald'             => __( 'Oswald', 'aeonblock' ),
						'Raleway'            => __( 'Raleway', 'aeonblock' ),
						'Roboto Slab'        => __( 'Roboto Slab', 'aeonblock' ),
						'Ubuntu'             => __( 'Ubuntu', 'aeonblock' ),
						'Vollkorn'           => __( 'Vollkorn', 'aeonblock' ),
					),
				)
			)
		);
	}
}
add_action( 'customize_register', 'aeonblock_font_customize_register' );

/**
 * Enqueue the list of fonts.
 */
function aeonblock_customizer_fonts() {
	wp_enqueue_style( 'aeonblock_customizer_fonts', 'https://fonts.googleapis.com/css?family=Alegreya:400,700|Alegreya+Sans+SC:400,700|Arimo:400,700|Bree+Serif|Cherry+Swash:400,700|Cinzel:400,700|Exo+2:400,700|Fondamento|Gentium+Book+Basic:400,700|Grand+Hotel|Hind:400,700|Josefin+Sans:400,700|Karla:400,700|La+Belle+Aurore|Lato:400,700|Libre+Baskerville:400,700|Lobster+Two:400,700|Lora:400,700|Manrope:300,400,500,600,700|Merriweather:400,700|Montserrat:400,700|Muli:400,700|Noticia+Text:400,700|Noto+Sans:400,700|Noto+Serif:400,700|Old+Standard+TT:400,700|Open+Sans:400,700|Oswald:400,700|Pacifico|Playfair+Display:400,700|Quando|Raleway:400,700|Roboto+Slab:400,700|Sorts+Mill+Goudy|Tangerine:400,700|Ubuntu:400,700|Vollkorn:400,700', array(), null );
}
add_action( 'customize_controls_print_styles', 'aeonblock_customizer_fonts' );
add_action( 'customize_preview_init', 'aeonblock_customizer_fonts' );

add_action(
	'customize_controls_print_styles',
	function() {
		?>
		<style>
		<?php
		$arr = array( 'Alegreya', 'Alegreya Sans SC', 'Arimo', 'Bree Serif', 'Cherry Swash', 'Cinzel', 'Exo 2', 'Fondamento', 'Gentium Book Basic', 'Grand Hotel', 'Hind', 'Josefin Sans', 'Karla', 'La Belle Aurore', 'Lato', 'Libre Baskerville', 'Lora', 'Manrope', 'Lobster Two', 'Merriweather', 'Montserrat', 'Muli', 'Noticia Text', 'Noto Sans', 'Noto Serif', 'Old Standard TT', 'Open Sans', 'Oswald', 'Pacifico', 'Playfair Display', 'Quando', 'Raleway', 'Roboto Slab', 'Sorts Mill Goudy', 'Tangerine', 'Ubuntu', 'Vollkorn' );

		foreach ( $arr as $font ) {
			echo '.customize-control select option[value*="' . $font . '"] {font-family: ' . $font . '; font-size: 22px;}';
		}
		?>
		</style>
		<?php
	}
);
