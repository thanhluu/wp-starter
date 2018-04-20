<?php
/*
* Template Name: Blog Full Width
*/

get_header(); ?>
<header class="page-header">
	<div class="container">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</div>
</header>
<div id="content" class="site-content">
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<?php
					$custom_query_args = array( 'post_type' => 'post' );
					$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$custom_query = new WP_Query( $custom_query_args );
					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $custom_query;
				?>
				<?php if ( $custom_query->have_posts() ) : ?>
					<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php wp_starter_posts_navigation(); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
				<?php
					wp_reset_postdata();
					$wp_query = NULL;
					$wp_query = $temp_query;
				?>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>
