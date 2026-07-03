<?php
/**
 * Template part: Noticias + Accesos rápidos — spec "Portada FLCH Kingster".
 *
 * Destacada + 3 laterales con paginación por puntos (noticias reales de la
 * categoría "noticias", en páginas de 3) + columna "Accesos rápidos".
 *
 * @package LetrasFLCH
 */
$letras_flch_quicklinks = letras_flch_quicklinks_data();
?>
<div class="kg-div kg-reveal" aria-hidden="true"><span class="kg-div__num">03</span><span class="kg-div__lbl">Actualidad</span><span class="kg-div__line"></span></div>
<section id="noticias" class="kg-noticias kg-sec kg-sec--tight" x-data="kgHome()" x-init="init()">
	<div>
		<div class="kg-sec__head kg-reveal">
			<h2 class="kg-sec__title">Noticias y novedades</h2>
			<a href="<?php echo esc_url( home_url( '/noticias' ) ); ?>" class="kg-noticias__all">Ver todas</a>
		</div>

		<template x-if="newsPages()[newsPage] && newsPages()[newsPage][0]">
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

		<div class="kg-noticias__list">
			<template x-for="n in newsPages()[newsPage] ? newsPages()[newsPage].slice(1) : []" :key="n.id">
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
				<button type="button" role="tab" :aria-selected="newsPage === i ? 'true' : 'false'" @click="goNewsPage(i)" :class="newsPage === i ? 'is-active' : ''" class="kg-noticias__dot" :aria-label="'Página ' + (i + 1)"></button>
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
.kg-noticias__all:hover { color: var(--kg-gold, #A8861C); }

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
.kg-sidenews__cat { font-size: 10px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--kg-gold, #A8861C); }
.kg-sidenews__date { font-size: 11.5px; color: var(--kg-muted, #5E6675); }
.kg-sidenews__title { font-family: var(--font-display, 'Newsreader', serif); font-weight: 600; font-size: 17px; line-height: 1.2; margin: 0; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; /* P0: titulares RR largos */ }

.kg-noticias__dots { display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 22px; }
.kg-noticias__dot {
	width: 9px; height: 9px; border-radius: 999px; border: none; background: var(--kg-line, rgba(26,34,48,.12));
	cursor: pointer; padding: 0;
	transition: width .3s cubic-bezier(.16,1,.3,1), background-color .2s ease;
}
.kg-noticias__dot.is-active { width: 26px; background: var(--kg-gold, #A8861C); }

.kg-quicklinks { background: var(--kg-azuld, #0E2A48); border-radius: 14px; overflow: hidden; }
.kg-quicklinks__head {
	padding: 24px 26px; border-bottom: 1px solid rgba(255,255,255,.12);
	display: flex; align-items: center; gap: 11px;
}
.kg-quicklinks__head i { color: var(--kg-gold2, #D6B655); }
.kg-quicklinks__head h3 { font-family: var(--font-display, 'Newsreader', serif); font-weight: 600; font-size: 22px; color: #fff; margin: 0; }
.kg-quicklinks__list { display: flex; flex-direction: column; }
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
