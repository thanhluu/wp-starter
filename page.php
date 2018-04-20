<?php get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
				<div class="page-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wp-starter' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="sr-only">' . __( 'Page', 'wp-starter' ) . ' </span>%',
							'separator'   => '<span class="sr-only">, </span>',
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
<?php get_footer(); ?>
