<?php
/**
 * Template part: Banner carrusel de noticias destacadas — spec "Portada FLCH Kingster".
 *
 * Carrusel Splide (autoplay 6s, pausa en hover/focus, navegación por puntos
 * y teclado). Datos: las 3 noticias reales más recientes de la categoría
 * "noticias" (mismo criterio que template-parts/home/noticias.php).
 *
 * @package LetrasFLCH
 */
$letras_flch_banner_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'category_name'  => 'noticias',
) );

if ( ! $letras_flch_banner_query->have_posts() ) {
	return;
}
?>
<section id="destacadas" aria-labelledby="destacadas-title" class="kg-sec kg-banner">
	<header class="kg-banner__head kg-reveal">
		<div>
			<p class="kg-banner__eyebrow">Lo más reciente</p>
			<h2 id="destacadas-title" class="kg-banner__title">Noticias destacadas</h2>
		</div>
		<div class="kg-banner__nav">
			<button type="button" class="kg-revnav kg-banner__prev" aria-label="Noticia anterior"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
			<button type="button" class="kg-revnav kg-banner__next" aria-label="Noticia siguiente"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
		</div>
	</header>

	<div class="kg-banner__splide splide kg-reveal" aria-label="Noticias destacadas">
		<div class="splide__track">
			<ul class="splide__list">
				<?php while ( $letras_flch_banner_query->have_posts() ) : $letras_flch_banner_query->the_post();
					$cats = get_the_category();
					$cat_name = ! empty( $cats ) ? $cats[0]->name : 'Noticias';
					$img = get_the_post_thumbnail_url( get_the_ID(), 'archive-featured' );
					if ( ! $img ) {
						/* Pool determinista (auditoría P0): evita que varios
						   slides sin imagen destacada repitan la misma foto. */
						$img = letras_flch_news_fallback_img( get_the_ID() );
					}
				?>
					<li class="splide__slide">
						<article class="kg-banner__slide" style="background-image:url('<?php echo esc_url( $img ); ?>')">
							<div class="kg-banner__scrim" aria-hidden="true"></div>
							<div class="kg-banner__body">
								<div class="kg-banner__meta">
									<span class="kg-banner__cat"><i class="fa-solid fa-star" aria-hidden="true"></i> <?php echo esc_html( $cat_name ); ?></span>
									<time class="kg-banner__date"><i class="fa-regular fa-calendar" aria-hidden="true"></i> <?php echo esc_html( get_the_date( 'j F Y' ) ); ?></time>
								</div>
								<h3 class="kg-banner__slide-title"><?php the_title(); ?></h3>
								<p class="kg-banner__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24, '…' ) ); ?></p>
								<a href="<?php the_permalink(); ?>" class="kg-banner__cta" aria-label="<?php echo esc_attr( 'Leer noticia: ' . get_the_title() ); ?>">Leer noticia <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
							</div>
						</article>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</section>

<style>
.kg-banner__head {
	display: flex; align-items: flex-end; justify-content: space-between;
	gap: 20px; flex-wrap: wrap;
	border-bottom: 2px solid var(--kg-azul, #143B63);
	padding-bottom: 14px; margin-bottom: 24px;
}
.kg-banner__eyebrow {
	font-size: 12.5px; font-weight: 700; letter-spacing: .14em; text-transform: uppercase;
	color: var(--kg-gold, #A8861C); margin: 0 0 8px;
}
.kg-banner__title {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	font-size: clamp(28px, 3.2vw, 42px); line-height: 1; margin: 0;
}

.kg-banner__splide {
	position: relative; border-radius: 18px; overflow: hidden; min-height: 340px;
	box-shadow: 0 1px 3px rgba(8,18,32,.05), 0 18px 44px rgba(8,18,32,.12);
}
.kg-banner__slide {
	position: relative; min-height: 340px;
	background-size: cover; background-position: center;
	display: flex; align-items: flex-end;
}
.kg-banner__scrim {
	position: absolute; inset: 0;
	background: linear-gradient(90deg, rgba(8,19,32,.94) 0%, rgba(8,19,32,.74) 44%, rgba(8,19,32,.20) 100%);
}
.kg-banner__body {
	position: relative; z-index: 2; max-width: 620px; padding: clamp(36px,5vw,58px);
}
.kg-banner__meta { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; flex-wrap: wrap; }
.kg-banner__cat {
	display: inline-flex; align-items: center; gap: 7px;
	font-size: 11px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
	color: #231d05; background: var(--kg-gold2, #D6B655); padding: 5px 12px; border-radius: 999px;
}
.kg-banner__date {
	font-size: 12.5px; font-weight: 600; color: rgba(255,255,255,.7);
	display: inline-flex; align-items: center; gap: 7px;
}
.kg-banner__date i { color: var(--kg-gold2, #D6B655); font-size: 11px; }
.kg-banner__slide-title {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	font-size: clamp(25px, 3vw, 38px); line-height: 1.1; color: #fff; margin: 0 0 12px;
	/* Auditoría P0: titulares administrativos (RR N° …) de 200+ caracteres
	   aplastaban el slide. 3 líneas máximo; el título completo vive en el
	   single y en el aria-label del CTA. */
	display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
}
.kg-banner__excerpt { font-size: 15px; line-height: 1.6; color: rgba(255,255,255,.84); margin: 0 0 24px; max-width: 42em; }
.kg-banner__cta {
	display: inline-flex; align-items: center; gap: 9px;
	background: var(--kg-gold, #A8861C); color: #231d05; text-decoration: none;
	font-weight: 700; font-size: 14px; padding: 13px 26px; border-radius: 999px;
	transition: filter .2s ease, gap .2s ease;
}
.kg-banner__cta:hover { filter: brightness(1.08); gap: 13px; }

/* Paginación Splide → puntos dorados spec Kingster */
.kg-banner__splide .splide__pagination {
	position: absolute; right: clamp(36px,5vw,58px); bottom: 24px; z-index: 4;
	display: flex; gap: 9px; justify-content: flex-end;
}
.kg-banner__splide .splide__pagination__page {
	width: 9px; height: 9px; border-radius: 999px; border: none;
	background: rgba(255,255,255,.45); opacity: 1;
	transition: width .3s cubic-bezier(.16,1,.3,1), background-color .2s ease;
}
.kg-banner__splide .splide__pagination__page.is-active {
	width: 24px; background: var(--kg-gold2, #D6B655); transform: none;
}
</style>
