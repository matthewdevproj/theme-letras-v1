<?php
/**
 * Template part: Noticias + Accesos rápidos — spec "Portada FLCH Kingster".
 *
 * Destacada + laterales con paginación por puntos (noticias reales de la
 * categoría "noticias", en páginas de 3) + columna "Accesos rápidos".
 *
 * SSR + mejora progresiva (auditoría P0): antes TODO el contenido era
 * Alpine (x-text / x-for) → el HTML servido llegaba vacío (sección hueca
 * para buscadores y sin JS). Ahora la PRIMERA página (destacada + 2
 * laterales) se imprime en PHP con enlaces reales; Alpine solo toma el
 * control cuando el usuario pagina (patrón "booted"): al primer click en
 * un punto se oculta el bloque SSR y los templates x-if entran. Sin JS:
 * la página 1 se ve completa. Con JS sin interacción: idéntico, sin
 * doble render ni parpadeo.
 *
 * @package LetrasFLCH
 */
$letras_flch_quicklinks = letras_flch_quicklinks_data();

/* Primera página de noticias (misma consulta y mismos campos que
   letras_flch_localize_news(), para que SSR y Alpine coincidan 1:1). */
$letras_flch_ssr_news = array();
$letras_flch_news_q = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'category_name'  => 'noticias',
) );
if ( $letras_flch_news_q->have_posts() ) {
	while ( $letras_flch_news_q->have_posts() ) {
		$letras_flch_news_q->the_post();
		$letras_flch_cats = get_the_category();
		$letras_flch_thumb = get_the_post_thumbnail_url( get_the_ID(), 'card-thumbnail' );
		if ( ! $letras_flch_thumb && function_exists( 'letras_flch_news_fallback_img' ) ) {
			$letras_flch_thumb = letras_flch_news_fallback_img( get_the_ID() );
		}
		$letras_flch_ssr_news[] = array(
			'cat'     => ! empty( $letras_flch_cats ) ? $letras_flch_cats[0]->name : 'Noticias',
			'date'    => get_the_date( 'j F Y' ),
			'iso'     => get_the_date( 'c' ),
			'title'   => get_the_title(),
			'excerpt' => wp_trim_words( get_the_excerpt(), 20, '...' ),
			'img'     => $letras_flch_thumb,
			'url'     => get_permalink(),
		);
	}
	wp_reset_postdata();
}
?>
<div class="kg-div kg-reveal" aria-hidden="true"><span class="kg-div__num">03</span><span class="kg-div__lbl">Actualidad</span><span class="kg-div__line"></span></div>
<section id="noticias" class="kg-noticias kg-sec kg-sec--tight" x-data="kgHome()" x-init="init()">
	<div x-data="{ booted: false }">
		<div class="kg-sec__head kg-reveal">
			<h2 class="kg-sec__title">Noticias y novedades</h2>
			<a href="<?php echo esc_url( home_url( '/noticias' ) ); ?>" class="kg-sec__action kg-noticias__all">Ver todas <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
		</div>

		<?php if ( $letras_flch_ssr_news ) : ?>
		<div class="kg-noticias__ssr" :class="booted ? 'kg-hidden' : ''">
			<a href="<?php echo esc_url( $letras_flch_ssr_news[0]['url'] ); ?>" class="kg-noticias__featured kg-reveal">
				<div class="kg-noticias__featured-img">
					<img src="<?php echo esc_url( $letras_flch_ssr_news[0]['img'] ); ?>" alt="<?php echo esc_attr( $letras_flch_ssr_news[0]['title'] ); ?>" loading="lazy">
				</div>
				<div class="kg-noticias__featured-meta">
					<span class="kg-noticias__cat"><?php echo esc_html( $letras_flch_ssr_news[0]['cat'] ); ?></span>
					<time class="kg-noticias__date" datetime="<?php echo esc_attr( $letras_flch_ssr_news[0]['iso'] ); ?>"><?php echo esc_html( $letras_flch_ssr_news[0]['date'] ); ?></time>
				</div>
				<h3 class="kg-noticias__featured-title"><?php echo esc_html( $letras_flch_ssr_news[0]['title'] ); ?></h3>
				<p class="kg-noticias__featured-excerpt"><?php echo esc_html( $letras_flch_ssr_news[0]['excerpt'] ); ?></p>
			</a>
			<div class="kg-noticias__list">
				<?php foreach ( array_slice( $letras_flch_ssr_news, 1 ) as $letras_flch_n ) : ?>
				<a href="<?php echo esc_url( $letras_flch_n['url'] ); ?>" class="kg-sidenews">
					<div class="kg-sidenews__thumb"><img src="<?php echo esc_url( $letras_flch_n['img'] ); ?>" alt="<?php echo esc_attr( $letras_flch_n['title'] ); ?>" loading="lazy"></div>
					<div class="kg-sidenews__body">
						<div class="kg-sidenews__meta">
							<span class="kg-sidenews__cat"><?php echo esc_html( $letras_flch_n['cat'] ); ?></span>
							<time class="kg-sidenews__date" datetime="<?php echo esc_attr( $letras_flch_n['iso'] ); ?>"><?php echo esc_html( $letras_flch_n['date'] ); ?></time>
						</div>
						<h4 class="kg-sidenews__title"><?php echo esc_html( $letras_flch_n['title'] ); ?></h4>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
		<?php else : ?>
		<div class="kg-noticias__empty kg-reveal">
			<i class="fa-regular fa-newspaper" aria-hidden="true"></i>
			<p class="kg-noticias__empty-title">Sin noticias por el momento</p>
			<p class="kg-noticias__empty-desc">Todavía no hay publicaciones en esta categoría. Vuelve pronto o revisa los accesos rápidos.</p>
		</div>
		<?php endif; ?>

		<template x-if="booted && newsPages()[newsPage] && newsPages()[newsPage][0]">
			<a :href="newsPages()[newsPage][0].url" class="kg-noticias__featured kg-reveal">
				<div class="kg-noticias__featured-img">
					<img :src="newsPages()[newsPage][0].img" :alt="newsPages()[newsPage][0].title" loading="lazy">
				</div>
				<div class="kg-noticias__featured-meta">
					<span class="kg-noticias__cat" x-text="newsPages()[newsPage][0].cat"></span>
					<span class="kg-noticias__date" x-text="newsPages()[newsPage][0].date"></span>
				</div>
				<h3 class="kg-noticias__featured-title" x-text="newsPages()[newsPage][0].title"></h3>
				<p class="kg-noticias__featured-excerpt" x-text="newsPages()[newsPage][0].excerpt"></p>
			</a>
		</template>

		<div class="kg-noticias__list" :class="!booted ? 'kg-hidden' : ''">
			<template x-for="n in (booted && newsPages()[newsPage]) ? newsPages()[newsPage].slice(1) : []" :key="n.id">
				<a :href="n.url" class="kg-sidenews">
					<div class="kg-sidenews__thumb"><img :src="n.img" :alt="n.title" loading="lazy"></div>
					<div class="kg-sidenews__body">
						<div class="kg-sidenews__meta">
							<span class="kg-sidenews__cat" x-text="n.cat"></span>
							<span class="kg-sidenews__date" x-text="n.date"></span>
						</div>
						<h4 class="kg-sidenews__title" x-text="n.title"></h4>
					</div>
				</a>
			</template>
		</div>

		<div class="kg-noticias__dots" role="tablist" aria-label="Página de noticias">
			<template x-for="(page, i) in newsPages()" :key="i">
				<button type="button" role="tab" :aria-selected="newsPage === i ? 'true' : 'false'" @click="booted = true; goNewsPage(i)" :class="newsPage === i ? 'is-active' : ''" class="kg-noticias__dot" :aria-label="'Página ' + (i + 1)"></button>
			</template>
		</div>
	</div>

	<!-- Accesos rápidos -->
	<div class="kg-quicklinks kg-reveal">
		<div class="kg-quicklinks__head">
			<i class="fa-solid fa-link" aria-hidden="true"></i>
			<h3>Accesos rápidos</h3>
		</div>
		<div class="kg-quicklinks__list">
			<?php foreach ( $letras_flch_quicklinks as $link ) : ?>
				<a href="<?php echo esc_url( $link['href'] ); ?>" class="kg-quicklinks__item">
					<i class="<?php echo esc_attr( $link['icon'] ); ?>" aria-hidden="true"></i>
					<?php echo esc_html( $link['title'] ); ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<style>
.kg-noticias {
	display: grid;
	grid-template-columns: 1.6fr 1fr;
	gap: 46px;
	align-items: start;
	padding-bottom: 90px;
}
.kg-noticias__all { font-size: 13.5px; font-weight: 700; color: var(--kg-azul, #143B63); text-decoration: none; white-space: nowrap; transition: color .2s ease; }
.kg-noticias__all:hover { color: var(--kg-gold-text, #8A6D14); } /* AA */

/* Estado vacío: si la categoría "noticias" queda sin publicaciones. */
.kg-noticias__empty {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	text-align: center;
	gap: 12px;
	min-height: 320px;
	padding: 40px 32px;
	border: 1.5px dashed var(--kg-line, rgba(26,34,48,.18));
	border-radius: 14px;
	background: var(--kg-soft, #F4F1E9);
}
.kg-noticias__empty i {
	font-size: 32px;
	color: var(--kg-muted, #5E6675);
	margin-bottom: 4px;
}
.kg-noticias__empty-title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600; font-size: 19px; color: var(--kg-ink, #1A2230); margin: 0;
}
.kg-noticias__empty-desc {
	font-size: 13.5px; color: var(--kg-muted, #5E6675); max-width: 360px; margin: 0;
}

.kg-noticias__featured { display: block; text-decoration: none; color: var(--kg-ink, #1A2230); margin-bottom: 24px; cursor: pointer; }
.kg-noticias__featured-img { aspect-ratio: 16/8; border-radius: 12px; overflow: hidden; background: var(--kg-soft, #F4F1E9); margin-bottom: 16px; }
.kg-noticias__featured-img img { display: block; width: 100%; height: 100%; object-fit: cover; }
.kg-noticias__featured-meta { display: flex; align-items: center; gap: 11px; margin-bottom: 9px; }
.kg-noticias__cat { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #fff; background: var(--kg-azul, #143B63); padding: 4px 10px; border-radius: 4px; }
.kg-noticias__date { font-size: 12.5px; color: var(--kg-muted, #5E6675); }
.kg-noticias__featured-title { font-family: var(--font-display, 'Newsreader', serif); font-weight: 600; font-size: 25px; line-height: 1.15; margin: 0 0 8px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; /* P0: titulares RR largos */ }
.kg-noticias__featured-excerpt { font-size: 14.5px; line-height: 1.6; color: var(--kg-muted, #5E6675); margin: 0; }

.kg-noticias__list { display: flex; flex-direction: column; gap: 16px; min-height: 300px; }
.kg-sidenews {
	position: relative;
	display: flex; gap: 15px; align-items: center;
	text-decoration: none; color: var(--kg-ink, #1A2230); cursor: pointer;
	border-bottom: 1px solid var(--kg-line, rgba(26,34,48,.12)); padding-bottom: 16px;
	transition: opacity .2s ease;
}
.kg-sidenews:hover { opacity: .85; }
.kg-sidenews::before {
	content: ""; position: absolute; left: -2px; top: 14px; bottom: 14px; width: 2px;
	background: var(--kg-gold2, #D6B655); transform: scaleY(0); transform-origin: top;
	transition: transform .3s cubic-bezier(.16,1,.3,1);
}
.kg-sidenews:hover::before { transform: scaleY(1); }
.kg-sidenews__thumb { width: 96px; height: 74px; flex: none; border-radius: 8px; overflow: hidden; background: var(--kg-soft, #F4F1E9); }
.kg-sidenews__thumb img { display: block; width: 100%; height: 100%; object-fit: cover; }
.kg-sidenews__meta { display: flex; align-items: center; gap: 9px; margin-bottom: 6px; }
.kg-sidenews__cat { font-size: 10px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--kg-gold-text, #8A6D14); } /* AA */
.kg-sidenews__date { font-size: 11.5px; color: var(--kg-muted, #5E6675); }
.kg-sidenews__title { font-family: var(--font-display, 'Newsreader', serif); font-weight: 600; font-size: 17px; line-height: 1.2; margin: 0; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; /* P0: titulares RR largos */ }

.kg-noticias__dots { display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 22px; }
.kg-noticias__dot {
	width: 9px; height: 9px; border-radius: 999px; border: none; background: var(--kg-line, rgba(26,34,48,.12));
	cursor: pointer; padding: 0;
	transition: width .3s cubic-bezier(.16,1,.3,1), background-color .2s ease;
}
.kg-noticias__dot.is-active { width: 26px; background: var(--kg-gold, #A8861C); }

.kg-quicklinks { background: var(--kg-azuld, #0E2A48); border-radius: 14px; overflow: hidden;  display: flex; flex-direction: column;}
.kg-quicklinks__head {
	padding: 24px 26px; border-bottom: 1px solid rgba(255,255,255,.12);
	display: flex; align-items: center; gap: 11px;
}
.kg-quicklinks__head i { color: var(--kg-gold2, #D6B655); }
.kg-quicklinks__head h3 { font-family: var(--font-display, 'Newsreader', serif); font-weight: 600; font-size: 22px; color: #fff; margin: 0; }
.kg-quicklinks__list { display: flex; flex-direction: column; flex: 1; }
.kg-quicklinks__item {
	display: flex; align-items: center; gap: 13px;
	padding: 16px 26px; text-decoration: none; color: rgba(255,255,255,.85);
	font-weight: 600; font-size: 14.5px;
	border-bottom: 1px solid rgba(255,255,255,.09);
	transition: background-color .2s ease, color .2s ease, padding-left .2s ease;
}
.kg-quicklinks__item:last-child { border-bottom: none; }
.kg-quicklinks__item i { color: var(--kg-gold2, #D6B655); width: 18px; font-size: 14px; }
.kg-quicklinks__item:hover { background: rgba(255,255,255,.06); color: var(--kg-gold2, #D6B655); padding-left: 32px; }

@media (max-width: 1024px) {
	.kg-noticias { grid-template-columns: 1fr; gap: 40px; }
}
</style>
