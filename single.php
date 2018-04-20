<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="<?php wp_starter_primary_column_class(); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
					<?php endif; ?>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

							<div class="entry-meta">
								<?php wp_starter_entry_meta(); ?>
							</div>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'wp-starter' ),
									'after'  => '</div>',
								) );
							?>
						</div>
						<?php wp_starter_entry_footer(); ?>
					</article>

					<?php if ( '' !== get_the_author_meta( 'description' ) ) { get_template_part( 'template-parts/biography' ); } ?>

					<?php the_post_navigation(); ?>

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
