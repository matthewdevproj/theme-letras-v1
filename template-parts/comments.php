<?php
/**
 * Template part: Comentarios.
 *
 * Incluido desde single.php vía comments_template('/template-parts/comments.php').
 * El título ("Comentarios") ya lo imprime single.php antes de este include;
 * aquí solo va la lista, la paginación y el formulario.
 *
 * @package LetrasFLCH
 */

if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
	<ol class="kg-comments__list" style="list-style:none;margin:0;padding:0;">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'avatar_size' => 42,
			'short_ping'  => true,
			'callback'    => function ( $comment, $args, $depth ) {
				$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
				?>
				<<?php echo esc_attr( $tag ); ?> <?php comment_class( 'kg-comment' ); ?> id="comment-<?php comment_ID(); ?>" style="display:flex;gap:14px;">
					<div style="flex:none;"><?php echo get_avatar( $comment, 42, '', '', array( 'class' => 'kg-comment__avatar' ) ); ?></div>
					<div style="flex:1;min-width:0;">
						<div class="kg-comment__meta">
							<strong><?php comment_author(); ?></strong> ·
							<time datetime="<?php comment_time( 'c' ); ?>"><?php
								printf( esc_html__( 'hace %s', 'letrasflch' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) );
							?></time>
						</div>
						<?php if ( '0' === $comment->comment_approved ) : ?>
							<p class="kg-comment__body" style="font-style:italic;color:var(--kg-muted);"><?php esc_html_e( 'Tu comentario está pendiente de moderación.', 'letrasflch' ); ?></p>
						<?php else : ?>
							<div class="kg-comment__body"><?php comment_text(); ?></div>
						<?php endif; ?>
						<?php
						comment_reply_link( array_merge( $args, array(
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
							'reply_text' => '<i class="fa-solid fa-reply" aria-hidden="true"></i> ' . esc_html__( 'Responder', 'letrasflch' ),
							'class'      => 'kg-comment__reply',
						) ) );
						?>
					</div>
				</<?php echo esc_attr( $tag ); ?>>
				<?php
			},
		) );
		?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="kg-comments__pagination" aria-label="<?php esc_attr_e( 'Navegación de comentarios', 'letrasflch' ); ?>" style="display:flex;justify-content:space-between;margin-top:20px;font-size:13px;font-weight:600;">
			<div><?php previous_comments_link( esc_html__( '← Anteriores', 'letrasflch' ) ); ?></div>
			<div><?php next_comments_link( esc_html__( 'Siguientes →', 'letrasflch' ) ); ?></div>
		</nav>
	<?php endif; ?>
<?php endif; ?>

<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p style="color:var(--kg-muted);"><?php esc_html_e( 'Los comentarios están cerrados.', 'letrasflch' ); ?></p>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div style="margin-top:28px;">
		<?php
		comment_form( array(
			'title_reply'        => esc_html__( 'Deja un comentario', 'letrasflch' ),
			'title_reply_before' => '<h4 style="font-family:var(--font-display,\'Newsreader\',serif);font-weight:600;font-size:17px;margin:0 0 14px;">',
			'title_reply_after'  => '</h4>',
			'comment_field'      => '<p style="margin:0 0 14px;"><textarea id="comment" name="comment" class="kg-input" style="min-height:100px;resize:vertical;" placeholder="' . esc_attr__( 'Escribe tu comentario…', 'letrasflch' ) . '" required></textarea></p>',
			'class_submit'       => 'kg-btn kg-btn--gold',
			'label_submit'       => esc_html__( 'Publicar', 'letrasflch' ),
		) );
		?>
	</div>
<?php endif; ?>
