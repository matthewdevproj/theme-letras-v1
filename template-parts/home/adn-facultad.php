<?php
/**
 * ADN de la Facultad — Sección entre Hero y N.º 01 Noticias
 *
 * @package LetrasFLCH
 */
?>
<section id="adn" class="kg-adn"
         aria-labelledby="adn-title"
         x-data="kgHome()"
         x-init="init()">

	<div class="kg-adn__inner reveal">
		<span class="kg-adn__eyebrow">
			<span class="kg-adn__line"></span>
			<i class="fa-solid fa-feather-pointed" aria-hidden="true"></i>
			ADN de la Facultad
			<span class="kg-adn__line"></span>
		</span>
		<div class="kg-adn__words">
			<template x-for="(w, i) in adn" :key="w">
				<span class="kg-adn__word">
					<span x-text="w"></span>
					<span class="kg-adn__sep" x-show="i < adn.length - 1">&#9670;</span>
				</span>
			</template>
		</div>
	</div>
</section>

<style>
.kg-adn {
	max-width: 1280px;
	margin: 0 auto;
	padding: 84px 2.5rem 0;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.kg-adn__inner {
	text-align: center;
}
.kg-adn__eyebrow {
	display: inline-flex;
	align-items: center;
	gap: 0.625rem;
	font-size: 11.5px;
	font-weight: 700;
	letter-spacing: 0.18em;
	text-transform: uppercase;
	color: var(--gray-dark, #6E6B64);
	margin-bottom: 1.125rem;
}
:root.dark .kg-adn__eyebrow {
	color: rgba(255,255,255,.6);
}
.kg-adn__line {
	width: 1.5rem;
	height: 1px;
	background: var(--kg-gold, #A8861C);
}
:root.dark .kg-adn__line {
	background: var(--gold, #D6B655);
}
.kg-adn__eyebrow i {
	color: var(--kg-gold-text, #8A6D14); /* AA sobre claro */
}
:root.dark .kg-adn__eyebrow i {
	color: var(--gold, #D6B655);
}
.kg-adn__words {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: clamp(20px, 2.6vw, 32px);
	color: var(--ink, #1A2230);
}
:root.dark .kg-adn__words {
	color: #F1F0EC;
}
.kg-adn__word {
	display: inline-flex;
	align-items: center;
}
.kg-adn__sep {
	color: var(--kg-gold-text, #8A6D14); /* AA sobre claro */
	margin: 0 1rem;
	font-size: 0.6em;
	opacity: 0.8;
}
:root.dark .kg-adn__sep {
	color: var(--gold, #D6B655);
}
@media (max-width: 768px) {
	.kg-adn { padding: 48px 1.5rem 0; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
}
</style>
