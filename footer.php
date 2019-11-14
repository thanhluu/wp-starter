	</div>

	<footer class="site-footer bg-light py-4 small text-center text-muted">
		<div class="container">
			<div class="site-info">
				<?php printf( __( 'Copyright &copy; %1$s by %2$s.', 'wp-starter' ), esc_attr( date( 'Y' ) ), '<a class="text-dark" href="' . home_url() . '" rel="designer">' . get_bloginfo( 'name' ) . '</a>' ); ?>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'wp-starter' ), '<a class="text-dark" href="https://www.workevo.com">WP Starter</a>', '<a class="text-dark" href="https://www.workevo.com" rel="designer">Workevo</a>' ); ?><br>
				<a class="text-dark" href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-starter' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'wp-starter' ), 'WordPress' ); ?></a>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
