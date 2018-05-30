	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<?php printf( __( 'Copyright &copy; %1$s by %2$s.', 'wp-starter' ), esc_attr( date( 'Y' ) ), '<a href="' . home_url() . '" rel="designer">' . get_bloginfo( 'name' ) . '</a>' ); ?>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'wp-starter' ), '<a href="https://www.makiplace.com">WP Starter</a>', '<a href="https://www.makiplace.com" rel="designer">MakiPlace</a>' ); ?><br>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-starter' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'wp-starter' ), 'WordPress' ); ?></a>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
