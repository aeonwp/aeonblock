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

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aeonblock_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'aeonblock_customize_partial_blogname',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'aeonblock_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_panel(
		'aeonblock_panel',
		array(
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'title'      => __( 'AeonBlock Theme Options', 'aeonblock' ),
		)
	);

	/* Primary Color Section Inside Core Color Option */
	$wp_customize->add_setting(
		'aeonblock-accent-color',
		array(
			'default'           => '#024eb9',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aeonblock-accent-color',
			array(
				'label'       => esc_html__( 'Accent Color', 'aeonblock' ),
				'description' => esc_html__( 'Applied to footer, pagination, continue reading, and categories.', 'aeonblock' ),
				'section'     => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'aeonblock-button-color',
		array(
			'default'           => '#024eb9',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aeonblock-button-color',
			array(
				'label'       => esc_html__( 'Button Color', 'aeonblock' ),
				'description' => esc_html__( 'Applied to buttons.', 'aeonblock' ),
				'section'     => 'colors',
			)
		)
	);

	/*Blog Page Options*/
	$wp_customize->add_section(
		'aeonblock_blog_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Blog Section Options', 'aeonblock' ),
			'panel'          => 'aeonblock_panel',
		)
	);

	/*Sidebar Options*/
	$wp_customize->add_setting(
		'aeonblock-sidebar-options',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'aeonblock_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'aeonblock-sidebar-options',
		array(
			'label'       => __( 'Sidebar Options', 'aeonblock' ),
			'description' => __( 'You can manage the individual sidebar for single post by using the post templates.', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'select',
			'choices'     => array(
				'right-sidebar' => __( 'Right sidebar', 'aeonblock' ),
				'left-sidebar'  => __( 'Left sidebar', 'aeonblock' ),
				'no-sidebar'    => __( 'No sidebar', 'aeonblock' ),
				'middle-column' => __( 'No sidebar, content in the middle column', 'aeonblock' ),
			),
		)
	);

	/*Enable Sticky Sidebar*/
	$wp_customize->add_setting(
		'aeonblock-sticky-sidebar',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-sticky-sidebar',
		array(
			'label'       => __( 'Sticky Sidebar', 'aeonblock' ),
			'description' => __( 'Enable Sticky Sidebar', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'checkbox',
		)
	);

	/*Read More Text*/
	$wp_customize->add_setting(
		'aeonblock-read-more-text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => esc_html__( 'Continue Reading', 'aeonblock' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'aeonblock-read-more-text',
		array(
			'label'       => __( 'Continue Reading Text', 'aeonblock' ),
			'description' => __( 'Enter your custom continue reading text. The title will be included after this text.', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'text',
		)
	);

	/* Meta Information */
	$wp_customize->add_setting(
		'aeonblock-blog-meta',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-blog-meta',
		array(
			'label'       => __( 'Meta Options', 'aeonblock' ),
			'description' => __( 'Check to show the date, category, tags etc on blog page.', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'checkbox',
		)
	);

	/*Featured Image*/
	$wp_customize->add_setting(
		'aeonblock-blog-image',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-blog-image',
		array(
			'label'       => __( 'Featured Image', 'aeonblock' ),
			'description' => __( 'Check to show the featured Image.', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'checkbox',
		)
	);

	/*Full Image*/
	$wp_customize->add_setting(
		'aeonblock-blog-full-image',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-blog-full-image',
		array(
			'label'       => __( 'Large Image', 'aeonblock' ),
			'description' => __( 'Check to make the featured image larger.', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'checkbox',
		)
	);

	/*Excerpt Length*/
	$wp_customize->add_setting(
		'aeonblock-blog-excerpt',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 45,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'aeonblock-blog-excerpt',
		array(
			'label'       => __( 'Excerpt Length', 'aeonblock' ),
			'description' => __( 'Enter the length of the excerpt.', 'aeonblock' ),
			'section'     => 'aeonblock_blog_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => -1,
				'step' => 1,
			),
		)
	);

	/*Typography Options */
	$wp_customize->add_section(
		'aeonblock_typography_section',
		array(
			'title' => __( 'Typography Options', 'aeonblock' ),
			'panel' => 'aeonblock_panel',
		)
	);

	/*Font Size*/
	$wp_customize->add_setting(
		'aeonblock-font-size',
		array(
			'default'           => 14,
			'transport'         => 'refresh',
			'sanitize_callback' => 'aeonblock_sanitize_number',
		)
	);

	$wp_customize->add_control(
		'aeonblock-font-size',
		array(
			'label'       => __( 'Font Size', 'aeonblock' ),
			'section'     => 'aeonblock_typography_section',
			'type'        => 'number',
			'description' => __( 'Increase/Decrease the base font size.', 'aeonblock' ),
			'input_attrs' => array(
				'min'  => 14,
				'step' => 1,
			),
		)
	);

	/*Line Height */
	$wp_customize->add_setting(
		'aeonblock-font-line-height',
		array(
			'default'           => 2,
			'transport'         => 'refresh',
			'sanitize_callback' => 'aeonblock_sanitize_number',
		)
	);

	$wp_customize->add_control(
		'aeonblock-font-line-height',
		array(
			'label'       => __( 'Line Height', 'aeonblock' ),
			'section'     => 'aeonblock_typography_section',
			'type'        => 'number',
			'description' => __( 'Increase/Decrease Line Height.', 'aeonblock' ),
			'input_attrs' => array(
				'min'  => '0',
				'step' => '0.1',
			),
		)
	);

	/*Letter Spacing */
	$wp_customize->add_setting(
		'aeonblock-letter-spacing',
		array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'aeonblock_sanitize_number',
		)
	);

	$wp_customize->add_control(
		'aeonblock-letter-spacing',
		array(
			'label'       => __( 'Letter Spacing', 'aeonblock' ),
			'section'     => 'aeonblock_typography_section',
			'type'        => 'number',
			'description' => __( 'Increase/Decrease Letter Spacing.', 'aeonblock' ),
			'input_attrs' => array(
				'min'  => '-20',
				'max'  => '4',
				'step' => '1',
			),
		)
	);

	/*Footer*/
	$wp_customize->add_section(
		'aeonblock_footer_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Footer Options', 'aeonblock' ),
			'panel'          => 'aeonblock_panel',
		)
	);

	/*Copyright Text*/
	$wp_customize->add_setting(
		'aeonblock-copyright-text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => esc_html__( 'All Rights Reserved', 'aeonblock' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'aeonblock-copyright-text',
		array(
			'label'       => __( 'Copyright Text', 'aeonblock' ),
			'description' => __( 'Enter your own copyright text.', 'aeonblock' ),
			'section'     => 'aeonblock_footer_section',
			'type'        => 'text',
		)
	);

	/*Go to Top*/
	$wp_customize->add_setting(
		'aeonblock-go-to-top',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-go-to-top',
		array(
			'label'       => __( 'Go To Top', 'aeonblock' ),
			'description' => __( 'Enable/Disable go to top in the footer.', 'aeonblock' ),
			'section'     => 'aeonblock_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Extras*/
	$wp_customize->add_section(
		'aeonblock_extra_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Extra Options', 'aeonblock' ),
			'panel'          => 'aeonblock_panel',
		)
	);

	/*Breadcrumb Options*/
	$wp_customize->add_setting(
		'aeonblock-breadcrumb-option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-breadcrumb-option',
		array(
			'label'       => __( 'Breadcrumb Option', 'aeonblock' ),
			'description' => __( 'Show/Hide breadcrumbs.', 'aeonblock' ),
			'section'     => 'aeonblock_extra_section',
			'type'        => 'checkbox',
		)
	);

	/*Pagination Options*/
	$wp_customize->add_setting(
		'aeonblock-pagination-type',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 'numeric',
			'sanitize_callback' => 'aeonblock_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'aeonblock-pagination-type',
		array(
			'choices'     => array(
				'default' => __( 'Next and Previous', 'aeonblock' ),
				'numeric' => __( 'Numeric', 'aeonblock' ),
			),
			'label'       => __( 'Pagination Option', 'aeonblock' ),
			'description' => __( 'Select the pagination type.', 'aeonblock' ),
			'section'     => 'aeonblock_extra_section',
			'type'        => 'select',
		)
	);

	/*Related Post Options*/
	$wp_customize->add_setting(
		'aeonblock-related-post',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'aeonblock_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'aeonblock-related-post',
		array(
			'label'       => __( 'Related Posts', 'aeonblock' ),
			'description' => __( 'Enable related posts below the post content.', 'aeonblock' ),
			'section'     => 'aeonblock_extra_section',
			'type'        => 'checkbox',
		)
	);

	require get_template_directory() . '/inc/customizer-about.php';
}
add_action( 'customize_register', 'aeonblock_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aeonblock_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aeonblock_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aeonblock_customize_preview_js() {
	wp_enqueue_script( 'aeonblock-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aeonblock_customize_preview_js' );
