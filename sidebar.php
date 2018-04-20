<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WP Starter
 * @since WP Starter 1.0.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<?php endif; ?>
