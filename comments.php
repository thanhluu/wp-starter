<?php
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php comments_number( __( '0 comments', 'wp-starter' ),  __( '1 comments', 'wp-starter' ), __( '% comments', 'wp-starter' ) ); ?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h4 class="screen-reader-text"><?php _e( 'Comment navigation', 'wp-starter' ); ?></h4>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'wp-starter' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'wp-starter' ) ); ?></div>

			</div>
		</nav>
		<?php endif; ?>

		<div class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'div',
					'short_ping' => true,
				) );
			?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h4 class="screen-reader-text"><?php _e( 'Comment navigation', 'wp-starter' ); ?></h4>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'wp-starter' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'wp-starter' ) ); ?></div>

			</div>
		</nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<div class="alert alert-warning"><?php _e( 'Comments are closed.', 'wp-starter' ); ?></div>
	<?php endif; ?>

	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields =  array(
		  'author' =>
		    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'wp-starter' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		    '" class="form-control"' . $aria_req . ' /></p>',
		  'email' =>
		    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'wp-starter' ) . '</label> ' .
		    ( $req ? '<span class="required">*</span>' : '' ) .
		    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		    '" class="form-control"' . $aria_req . ' /></p>',
		  'url' =>
		    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'wp-starter' ) . '</label>' .
		    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		    '" class="form-control" /></p>',
		);
		$comments_args = array(
			'logged_in_as' => '',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'class_submit' => 'btn btn-default',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	  	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'wp-starter' ) . '</label><textarea id="comment" name="comment" class="form-control" rows="5" aria-required="true"></textarea></p>',
		);
		comment_form( $comments_args );
	?>

</section>
