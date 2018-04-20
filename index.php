<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="<?php wp_starter_primary_column_class(); ?>">
			<div id="primary" class="content-area">
				<?php if ( is_archive() ) : ?>
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			<?php elseif ( is_search() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wp-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php elseif ( is_404() ) : ?>
				<h1 class="page-title"><?php _e( 'Nothing Found', 'wp-starter' ); ?></h1>
			<?php elseif ( is_home() && ! is_front_page() ) : ?>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			<?php endif; ?>
				<main id="main" class="site-main" role="main">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php wp_starter_posts_navigation(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
				</main>
			</div>
		</div>
		<div class="<?php wp_starter_secondary_column_class(); ?>">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
