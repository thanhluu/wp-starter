<?php
/*
* Template Name: Page Right Sidebar
*/

get_header(); ?>
<header class="page-header">
	<div class="container">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</div>
</header>
<div class="container">
	<div class="row">
		<div class="<?php wp_starter_primary_column_class(); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="page-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wp-starter' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wp-starter' ) . ' </span>%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
							?>
						</div>

						<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					<?php endwhile; ?>
				</main>
			</div>
		</div>
		<div class="<?php wp_starter_secondary_column_class(); ?>">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
