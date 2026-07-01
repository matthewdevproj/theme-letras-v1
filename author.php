<?php
/**
 * Perfil de docente / investigador — spec "Portada FLCH Kingster".
 *
 * Portada gradiente + avatar superpuesto, líneas de investigación,
 * publicaciones recientes (WP_Query del autor) y aside de indicadores.
 * Sin ACF: departamento/ORCID/líneas/proyectos/citas vienen de usermeta
 * simple (ver letras_flch_user_profile_fields() en functions.php).
 *
 * @package LetrasFLCH
 */

get_header();

$letras_flch_author_id     = get_queried_object_id();
$letras_flch_author_name   = get_the_author_meta( 'display_name', $letras_flch_author_id );
$letras_flch_departamento  = get_the_author_meta( 'letras_departamento', $letras_flch_author_id );
$letras_flch_bio           = get_the_author_meta( 'description', $letras_flch_author_id );
$letras_flch_orcid         = get_the_author_meta( 'letras_orcid', $letras_flch_author_id );
$letras_flch_lineas_raw    = get_the_author_meta( 'letras_lineas_investigacion', $letras_flch_author_id );
$letras_flch_lineas        = $letras_flch_lineas_raw ? array_filter( array_map( 'trim', explode( ',', $letras_flch_lineas_raw ) ) ) : array();
$letras_flch_proyectos     = get_the_author_meta( 'letras_proyectos', $letras_flch_author_id );
$letras_flch_citas         = get_the_author_meta( 'letras_citas', $letras_flch_author_id );

$letras_flch_pubs_query = new WP_Query( array(
    'author'         => $letras_flch_author_id,
    'post_type'      => 'post',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
) );

$letras_flch_schema = array(
    '@context' => 'https://schema.org',
    '@type'    => 'Person',
    'name'     => $letras_flch_author_name,
    'url'      => get_author_posts_url( $letras_flch_author_id ),
);
if ( $letras_flch_departamento ) {
    $letras_flch_schema['affiliation'] = array( '@type' => 'Organization', 'name' => $letras_flch_departamento );
}
if ( $letras_flch_bio ) {
    $letras_flch_schema['description'] = wp_strip_all_tags( $letras_flch_bio );
}
?>
<script type="application/ld+json"><?php echo wp_json_encode( $letras_flch_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); ?></script>

<main id="main" class="site-main" role="main" tabindex="-1">

	<section class="kg-authorpage">
		<div class="kg-authorpage__cover"></div>

		<div class="kg-container">
			<div class="kg-authorpage__header">
				<div class="kg-authorpage__avatar">
					<?php echo get_avatar( $letras_flch_author_id, 118 ); ?>
				</div>
				<div class="kg-authorpage__id">
					<h1 class="kg-authorpage__name"><?php echo esc_html( $letras_flch_author_name ); ?></h1>
					<?php if ( $letras_flch_departamento ) : ?>
						<p class="kg-authorpage__dept"><?php echo esc_html( $letras_flch_departamento ); ?></p>
					<?php endif; ?>
				</div>
				<div class="kg-authorpage__actions">
					<a href="mailto:<?php echo esc_attr( get_the_author_meta( 'user_email', $letras_flch_author_id ) ); ?>" class="kg-btn kg-btn--gold">
						<i class="fa-solid fa-envelope" aria-hidden="true"></i> <?php esc_html_e( 'Contacto', 'letrasflch' ); ?>
					</a>
					<?php if ( $letras_flch_orcid ) : ?>
						<a href="<?php echo esc_url( $letras_flch_orcid ); ?>" target="_blank" rel="noopener noreferrer" class="kg-btn kg-btn--outline">
							<i class="fa-brands fa-orcid" style="color:#A6CE39;" aria-hidden="true"></i> ORCID
						</a>
					<?php endif; ?>
				</div>
			</div>

			<div class="kg-single__grid">
				<div>
					<?php if ( $letras_flch_lineas ) : ?>
						<h2 class="kg-authorpage__section-title"><?php esc_html_e( 'Líneas de investigación', 'letrasflch' ); ?></h2>
						<div class="kg-authorpage__tags">
							<?php foreach ( $letras_flch_lineas as $linea ) : ?>
								<span class="kg-authorpage__tag"><?php echo esc_html( $linea ); ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $letras_flch_bio ) : ?>
						<h2 class="kg-authorpage__section-title"><?php esc_html_e( 'Sobre', 'letrasflch' ); ?></h2>
						<div class="kg-single__content"><p><?php echo esc_html( $letras_flch_bio ); ?></p></div>
					<?php endif; ?>

					<?php if ( $letras_flch_pubs_query->have_posts() ) : ?>
						<h2 class="kg-authorpage__section-title"><?php esc_html_e( 'Publicaciones recientes', 'letrasflch' ); ?></h2>
						<div class="kg-authorpage__pubs">
							<?php while ( $letras_flch_pubs_query->have_posts() ) : $letras_flch_pubs_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="kg-authorpage__pub">
									<i class="fa-regular fa-file-lines" aria-hidden="true"></i>
									<span>
										<span class="kg-authorpage__pub-title"><?php the_title(); ?></span>
										<span class="kg-authorpage__pub-meta"><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></span>
									</span>
								</a>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
				</div>

				<aside class="kg-single__sidebar">
					<?php if ( $letras_flch_proyectos !== '' || $letras_flch_citas !== '' ) : ?>
						<div class="kg-authorpage__stats">
							<div class="kg-authorpage__stats-title"><?php esc_html_e( 'Indicadores', 'letrasflch' ); ?></div>
							<div class="kg-authorpage__stat">
								<div class="kg-authorpage__stat-value"><?php echo absint( $letras_flch_pubs_query->found_posts ); ?></div>
								<div class="kg-authorpage__stat-label"><?php esc_html_e( 'Publicaciones', 'letrasflch' ); ?></div>
							</div>
							<?php if ( $letras_flch_proyectos !== '' ) : ?>
								<div class="kg-authorpage__stat">
									<div class="kg-authorpage__stat-value"><?php echo absint( $letras_flch_proyectos ); ?></div>
									<div class="kg-authorpage__stat-label"><?php esc_html_e( 'Proyectos activos', 'letrasflch' ); ?></div>
								</div>
							<?php endif; ?>
							<?php if ( $letras_flch_citas !== '' ) : ?>
								<div class="kg-authorpage__stat">
									<div class="kg-authorpage__stat-value"><?php echo absint( $letras_flch_citas ); ?></div>
									<div class="kg-authorpage__stat-label"><?php esc_html_e( 'Citas', 'letrasflch' ); ?></div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</aside>
			</div>
		</div>
	</section>

</main>

<style>
.kg-authorpage__cover {
	height: 120px;
	background: linear-gradient(105deg, var(--kg-night, #0E2742), var(--kg-azul-bright, #2457A6));
}
.kg-authorpage__header {
	display: flex; align-items: flex-end; gap: 22px; flex-wrap: wrap;
	margin-top: -46px; padding-bottom: 28px;
}
.kg-authorpage__avatar {
	width: 118px; height: 118px; border-radius: 18px; overflow: hidden;
	background: var(--kg-soft, #F4F1E9);
	border: 4px solid var(--kg-panel, #fff);
	box-shadow: 0 6px 20px rgba(0,0,0,.12);
	flex: none;
}
.kg-authorpage__avatar img { width: 100%; height: 100%; object-fit: cover; display: block; }
.kg-authorpage__id { flex: 1; min-width: 200px; }
.kg-authorpage__name {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	font-size: 30px; margin: 0 0 4px;
}
.kg-authorpage__dept { font-size: 14px; color: var(--kg-muted, #5E6675); margin: 0; }
.kg-authorpage__actions { display: flex; gap: 10px; flex-wrap: wrap; }

.kg-authorpage__section-title {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	font-size: 20px; margin: 28px 0 14px;
}
.kg-authorpage__tags { display: flex; flex-wrap: wrap; gap: 9px; }
.kg-authorpage__tag {
	font-size: 12.5px; font-weight: 600; color: var(--kg-azul, #143B63);
	background: rgba(36,87,166,.1); padding: 7px 14px; border-radius: 999px;
}

.kg-authorpage__pubs { display: flex; flex-direction: column; }
.kg-authorpage__pub {
	display: flex; align-items: center; gap: 13px; padding: 14px 0;
	border-bottom: 1px solid var(--kg-line, rgba(26,34,48,.12));
	text-decoration: none; color: var(--kg-ink, #1A2230);
}
.kg-authorpage__pub i { color: var(--kg-gold, #A8861C); font-size: 15px; }
.kg-authorpage__pub-title {
	display: block; font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600; font-size: 15.5px;
}
.kg-authorpage__pub-meta { display: block; font-size: 12.5px; color: var(--kg-muted, #5E6675); margin-top: 2px; }

.kg-authorpage__stats { background: var(--kg-soft, #F4F1E9); border-radius: 10px; padding: 20px; }
.kg-authorpage__stats-title {
	font-size: 11px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
	color: var(--kg-muted, #5E6675); margin-bottom: 14px;
}
.kg-authorpage__stat { margin-bottom: 14px; }
.kg-authorpage__stat:last-child { margin-bottom: 0; }
.kg-authorpage__stat-value {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	font-size: 26px; color: var(--kg-azul, #143B63); line-height: 1;
}
.kg-authorpage__stat-label { font-size: 11.5px; color: var(--kg-muted, #5E6675); margin-top: 4px; }
</style>

<?php get_footer(); ?>
