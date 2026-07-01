<?php
/**
 * Sección N.º 03 — Investigación y producción académica
 *
 * @package LetrasFLCH
 */
?>
<section id="investigacion" class="kg-research"
         aria-labelledby="investigacion-title"
         x-data="kgHome()"
         x-init="init()">

	<span class="kg-research__deco" aria-hidden="true">&#182;</span>

	<div class="kg-research__inner">
		<div class="kg-research__header reveal">
			<div>
				<h2 class="kg-research__title" id="investigacion-title">Grupos de investigaci&oacute;n</h2>
			</div>
			<p class="kg-research__desc">Conoce nuestros grupos de investigaci&oacute;n.</p>
		</div>

		<div class="kg-research__bottom reveal">
			<div class="kg-research__lineas">
				<div class="kg-research__lineas-list">
					<template x-for="l in lineas" :key="l">
						<span class="kg-research__tag"><i class="fa-solid fa-circle"></i><span x-text="l"></span></span>
					</template>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
.kg-research {
	position: relative;
	overflow: hidden;
	color: #fff;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
	background: linear-gradient(160deg, #0A1B2E 0%, #0E2742 100%);
	border-top: 1px solid rgba(255,255,255,.1);
	margin-top: 5.5rem;
}
.kg-research__deco {
	position: absolute;
	left: -3vw;
	bottom: -10vh;
	font-family: var(--font-display, 'Newsreader', serif);
	font-style: italic;
	font-size: 42vh;
	line-height: 1;
	color: rgba(255,255,255,.03);
	pointer-events: none;
	user-select: none;
}
.kg-research__inner {
	position: relative;
	max-width: 1280px;
	margin: 0 auto;
	padding: 92px 2.5rem;
}
.kg-research__header {
	display: flex;
	align-items: flex-end;
	justify-content: space-between;
	gap: 1.75rem;
	flex-wrap: wrap;
	margin-bottom: 3rem;
}
.kg-research__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.16em;
	text-transform: uppercase;
	color: var(--gold, #D6B655);
	margin-bottom: 14px;
}
.kg-research__num {
	opacity: 0.6;
}
.kg-research__title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	line-height: 1;
	letter-spacing: -0.02em;
	font-size: clamp(34px, 4.2vw, 54px);
	max-width: 16ch;
	margin: 0;
}
.kg-research__desc {
	font-size: 16.5px;
	line-height: 1.7;
	color: rgba(255,255,255,.7);
	max-width: 28em;
	margin: 0;
}
.kg-research__grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 1.25rem;
	margin-bottom: 2.5rem;
}
@media (max-width: 1024px) {
	.kg-research__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
	.kg-research__grid { grid-template-columns: 1fr; }
}
.kg-research__card {
	display: flex;
	flex-direction: column;
	background: rgba(255,255,255,.04);
	border: 1px solid rgba(255,255,255,.1);
	border-radius: 16px;
	padding: 1.625rem;
	min-height: 208px;
	text-decoration: none;
	color: #fff;
	transition: all .3s ease;
}
.kg-research__card:hover {
	background: rgba(255,255,255,.08);
	border-color: var(--gold, #D6B655);
	transform: translateY(-6px);
}
.kg-research__card-icon {
	width: 50px;
	height: 50px;
	border-radius: 13px;
	background: rgba(214,182,85,.15);
	color: var(--gold, #D6B655);
	display: grid;
	place-items: center;
	font-size: 1.25rem;
	margin-bottom: 1.125rem;
}
.kg-research__card-title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: 1.25rem;
	font-weight: 600;
	line-height: 1.3;
	margin: 0 0 0.5rem;
}
.kg-research__card-desc {
	font-size: 13.5px;
	line-height: 1.4;
	color: rgba(255,255,255,.6);
	flex: 1;
}
.kg-research__card-cta {
	font-size: 12.5px;
	font-weight: 700;
	color: var(--gold, #D6B655);
	display: inline-flex;
	align-items: center;
	gap: 0.5rem;
	margin-top: 14px;
}
.kg-research__card-cta i {
	font-size: 11px;
}
.kg-research__bottom {
	display: block;
}
.kg-research__subtitle {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: 23px;
	font-weight: 600;
	margin: 0 0 1.125rem;
}
.kg-research__lineas {
	background: rgba(255,255,255,.04);
	border: 1px solid rgba(255,255,255,.1);
	border-radius: 16px;
	padding: 1.625rem;
}
.kg-research__lineas-list {
	display: flex;
	flex-wrap: wrap;
	gap: 0.625rem;
}
.kg-research__tag {
	display: inline-flex;
	align-items: center;
	gap: 0.5rem;
	border: 1px solid rgba(255,255,255,.2);
	border-radius: 999px;
	padding: 0.5rem 14px;
	font-size: 13px;
	font-weight: 600;
	transition: border-color .3s ease;
}
.kg-research__tag:hover {
	border-color: var(--gold, #D6B655);
}
.kg-research__tag i {
	font-size: 5px;
	color: var(--gold, #D6B655);
}
@media (max-width: 768px) {
	.kg-research__inner { padding: 60px 1.5rem; }
	.kg-research__header { margin-bottom: 2rem; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
	.kg-research__card { transition: none; }
	.kg-research__tag { transition: none; }
}
</style>
