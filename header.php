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
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header id="masthead" class="site-header">
		<!-- Start Header Branding -->
		<div class="site-branding">
			<?php
			the_custom_logo();

			if ( is_front_page() && is_home() ) {
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			} else {
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			}

			$aeonblock_description = get_bloginfo( 'description', 'display' );
			if ( $aeonblock_description || is_customize_preview() ) {
				?>
				<p class="site-description"><?php echo $aeonblock_description; /* WPCS: xss ok. */ ?></p>
				<?php
			}
			?>
		</div>
		<!-- End Header Branding -->
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		?>
		<!-- Main Menu -->
		<nav id="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header', 'aeonblock' ); ?>" class="main-navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
		<button id="mobile-menu-toggle" aria-controls="main-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'aeonblock' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'main-menu',
				'depth'          => 2,
				'container'      => 'ul',
			)
		);
		?>
		</nav><!-- #site-navigation -->
		<?php
	}else{ ?>
	  <nav id="site-navigation" role="navigation" class="main-navigation">
		<ul id="main-menu">
		<?php
			wp_list_pages(array('depth' => 0, 'title_li' => ''));
			?>
		</ul>
	</nav>
	<?php }
	?>
</header><!-- #masthead -->
<?php
if ( has_header_image() ) {
	the_custom_header_markup();
}

do_action( 'aeonblock_breadcrumb_hook' );
?>

<div id="content" class="blog-wrapper">
