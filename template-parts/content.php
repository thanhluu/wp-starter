<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4' ); ?>>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-thumbnail"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a></div>
<?php endif; ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a class="text-dark text-decoration-none" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta d-flex align-items-center small my-2">
			<?php wp_starter_entry_meta(); ?>
		</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-starter' ) ); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wp-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>
