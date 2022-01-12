<?php
/**
 * Left Sidebar
 *
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonBlock Theme
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside role="complementary" class="secondary left-sidebar">
    <div class="blog-sidebar">
	<?php
	aeonblock_about_user();
	dynamic_sidebar( 'sidebar-1' );
	?>
</div>
</aside><!-- #secondary -->
