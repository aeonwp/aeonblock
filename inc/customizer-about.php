<?php
/**
 * About section customizer options.
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */

$wp_customize->add_section(
	'aeonblock_about',
	array(
		'title' => __( 'About Section', 'aeonblock' ),
		'panel' => 'aeonblock_panel',
	)
);

$wp_customize->selective_refresh->add_partial(
	'aeonblock-enable-about',
	array(
		'selector'        => '.about-me',
		'render_callback' => 'aeonblock_about_user',
	)
);

$wp_customize->add_setting(
	'aeonblock-enable-about',
	array(
		'sanitize_callback' => 'aeonblock_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'aeonblock-enable-about',
	array(
		'type'        => 'checkbox',
		'label'       => __( 'Check this box to enable the About section.', 'aeonblock' ),
		'description' => __( 'This section is displayed at the top of the sidebar on the homepage. It shows the users gravatar and Biographical Info. The content is generated from the users settings.', 'aeonblock' ),
		'section'     => 'aeonblock_about',
	)
);

// Create a list of users.
$users  = get_users();
$output = array();
foreach ( (array) $users as $user ) {
	$output[ $user->ID ] = $user->display_name;
}

$wp_customize->add_setting(
	'aeonblock_about_user',
	array(
		'sanitize_callback' => 'aeonblock_sanitize_select',
	)
);

$wp_customize->add_control(
	'aeonblock_about_user',
	array(
		'type'    => 'select',
		'label'   => __( 'Select which user to feature in the About section', 'aeonblock' ),
		'section' => 'aeonblock_about',
		'choices' => $output,
	)
);

$wp_customize->add_setting(
	'aeonblock-about-gravatar',
	array(
		'sanitize_callback' => 'aeonblock_sanitize_select',
		'default'           => 'circle',
	)
);

$wp_customize->add_control(
	'aeonblock-about-gravatar',
	array(
		'type'    => 'select',
		'label'   => __( 'Select Gravatar style', 'aeonblock' ),
		'section' => 'aeonblock_about',
		'choices' => array(
			'circle' => __( 'Circle (Default)', 'aeonblock' ),
			'square' => __( 'Square', 'aeonblock' ),
			'hide'   => __( 'Hide Gravatar', 'aeonblock' ),
		),
	)
);
