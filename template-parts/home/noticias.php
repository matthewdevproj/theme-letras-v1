<?php
/**
 * Sección Noticias Destacadas — Portada FLCH
 *
 * Layout editorial de dos columnas: destacada (1.5fr) + lista lateral (1fr).
 * Filtrado por pestañas de categoría (Alpine). Modal de lectura rápida.
 *
 * @package LetrasFLCH
 */
?>

<section id="noticias" class="flch-noticias"
         x-data="flchHome()"
         x-init="init()">

	<div class="flch-noticias__container">

		<!-- Header -->
		<div class="flch-noticias__header">
			<div>
				<div class="flch-noticias__eyebrow">
					<span class="flch-noticias__eyebrow-num">N.º 01 —</span>
					Actualidad · categoría «Noticias»
				</div>
				<h2 class="flch-noticias__title">Noticias destacadas</h2>
			</div>
			<a href="<?php echo esc_url(home_url('/noticias')); ?>" class="flch-noticias__all-link">
				Ver todas las publicaciones
				<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>

		<!-- Filter buttons -->
		<div class="flch-noticias__tabs" role="group" aria-label="Filtrar noticias por categoría">
			<template x-for="t in newsCats" :key="t">
				<button @click="newsFilter = t"
					class="flch-noticias__tab"
					:class="newsFilter === t ? 'is-active' : ''"
					:aria-pressed="newsFilter === t ? 'true' : 'false'">
					<span x-text="t"></span>
					<span class="flch-noticias__tab-count" x-text="newsCount(t)"></span>
				</button>
			</template>
		</div>

		<!-- Grid two-column -->
		<div class="flch-noticias__grid">

			<!-- Featured card -->
			<template x-if="filteredNews()[0]">
				<a :href="filteredNews()[0].url"
				   class="flch-noticias__featured">
					<div class="flch-noticias__featured-img">
						<img :src="filteredNews()[0].img"
							 :alt="filteredNews()[0].title"
							 loading="lazy">
						<span class="flch-noticias__featured-cat" x-text="filteredNews()[0].cat"></span>
					</div>
					<div class="flch-noticias__featured-body">
						<time class="flch-noticias__date">
							<i class="fa-regular fa-calendar" aria-hidden="true"></i>
							<span x-text="filteredNews()[0].date"></span>
						</time>
						<h3 class="flch-noticias__featured-title" x-text="filteredNews()[0].title"></h3>
						<p class="flch-noticias__featured-excerpt" x-text="filteredNews()[0].excerpt"></p>
						<span class="flch-noticias__read-more">
							Leer más <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
						</span>
					</div>
				</a>
			</template>

			<!-- Side list -->
			<div class="flch-noticias__list">
				<template x-for="n in filteredNews().slice(1,4)" :key="n.id">
					<a :href="n.url"
					   class="flch-noticias__list-item">
						<div class="flch-noticias__list-thumb">
							<img :src="n.img" :alt="n.title" loading="lazy">
						</div>
						<div class="flch-noticias__list-body">
							<div class="flch-noticias__list-meta">
								<span class="flch-noticias__list-cat" x-text="n.cat"></span>
								<span class="flch-noticias__list-dot" aria-hidden="true"></span>
								<span class="flch-noticias__list-date" x-text="n.date"></span>
							</div>
							<h4 class="flch-noticias__list-title" x-text="n.title"></h4>
						</div>
					</a>
				</template>
			</div>

		</div>

		<!-- Load more -->
		<div class="flch-noticias__more">
			<a href="<?php echo esc_url(home_url('/noticias')); ?>"
			   class="flch-noticias__more-btn">
				Ver todas las noticias
				<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>

	</div>

	<!-- ═══ Modal ═══ -->
	<div class="flch-noticias__modal-overlay"
		 x-show="modal"
		 @click.self="modal = null"
		 @keydown.escape.window="modal = null"
		 @keydown.tab.window="trapFocus($event)"
		 x-cloak
		 role="dialog"
		 aria-modal="true"
		 :aria-label="modal?.title || 'Noticia'">
		<div class="flch-noticias__modal"
			 x-show="modal"
			 x-ref="modalPanel"
			 x-transition:enter="flch-modal-enter"
			 x-transition:enter-start="flch-modal-enter-start"
			 x-transition:enter-end="flch-modal-enter-end">
			<button class="flch-noticias__modal-close"
					@click="modal = null"
					aria-label="Cerrar">
				<i class="fa-solid fa-xmark"></i>
			</button>
			<template x-if="modal">
				<article>
					<div class="flch-noticias__modal-img">
						<img :src="modal.img" :alt="modal.title">
						<span class="flch-noticias__modal-cat" x-text="modal.cat"></span>
					</div>
					<div class="flch-noticias__modal-body">
						<time class="flch-noticias__date" x-text="modal.date"></time>
						<h3 class="flch-noticias__modal-title" x-text="modal.title"></h3>
						<p class="flch-noticias__modal-text" x-text="modal.excerpt"></p>
						<p class="flch-noticias__modal-text">— Artículo de prueba. Integrar con el contenido real del post de WordPress.</p>
					</div>
				</article>
			</template>
		</div>
	</div>

</section>
