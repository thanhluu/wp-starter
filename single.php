<?php get_header(); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="<?php wp_starter_primary_column_class(); ?>">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
				<?php endif; ?>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<div class="entry-meta d-flex align-items-center my-3">
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
		</div>
	</div>
</div>
<?php get_footer(); ?>
