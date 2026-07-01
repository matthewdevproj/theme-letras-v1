<?php
/**
 * Sección N.º 06 — Admisión (CTA)
 *
 * @package LetrasFLCH
 */
?>
<section id="admision" class="kg-cta"
         aria-labelledby="admision-title"
         x-data="kgHome()"
         x-init="init()">

	<div class="kg-cta__card reveal">
		<div class="kg-cta__content">
			<span class="kg-cta__eyebrow">N.&#186; 06 — Admisi&oacute;n</span>
			<h2 class="kg-cta__title" id="admision-title">Forma parte de la Decana de Am&eacute;rica</h2>
			<p class="kg-cta__desc">Conoce el proceso de admisi&oacute;n y las carreras que ofrecemos en la Facultad de Letras y Ciencias Humanas. &iexcl;Tu futuro comienza aqu&iacute;!</p>
			<div class="kg-cta__actions">
				<a href="https://admision.unmsm.edu.pe/" target="_blank" rel="noopener noreferrer" class="kg-btn kg-btn--gold">
					<i class="fa-solid fa-arrow-right-to-bracket" aria-hidden="true"></i>
					Proceso de Admisi&oacute;n
				</a>
				<a href="https://letras.unmsm.edu.pe/carreras/" class="kg-btn kg-btn--outline">
					Conoce las carreras
					<i class="fa-solid fa-chevron-right kg-icon-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<div class="kg-cta__deco" aria-hidden="true">
			<i class="fa-solid fa-graduation-cap"></i>
		</div>
	</div>
</section>

<style>
.kg-cta {
	max-width: 1280px;
	margin: 0 auto;
	padding: 60px 2.5rem 0;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
}
.kg-cta__card {
	position: relative;
	overflow: hidden;
	border-radius: 20px;
	background: linear-gradient(135deg, #0E2742 0%, #143B63 50%, #2457A6 100%);
	color: #fff;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 3rem 3.5rem;
}
@media (max-width: 768px) {
	.kg-cta__card { flex-direction: column; padding: 2rem 1.5rem; text-align: center; }
}
.kg-cta__content {
	position: relative;
	z-index: 1;
	max-width: 640px;
}
.kg-cta__eyebrow {
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 0.18em;
	text-transform: uppercase;
	color: var(--gold, #D6B655);
	margin-bottom: 0.75rem;
	display: inline-block;
}
.kg-cta__title {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: clamp(26px, 3.6vw, 38px);
	font-weight: 600;
	line-height: 1.1;
	color: #fff;
	margin: 0 0 0.75rem;
}
.kg-cta__desc {
	font-size: 15px;
	line-height: 1.6;
	color: rgba(255,255,255,.8);
	margin: 0 0 1.5rem;
}
.kg-cta__actions {
	display: flex;
	flex-wrap: wrap;
	gap: 12px;
}
@media (max-width: 768px) {
	.kg-cta__actions { justify-content: center; }
}
.kg-cta__deco {
	flex-shrink: 0;
	font-size: clamp(64px, 10vw, 120px);
	color: rgba(255,255,255,.06);
	position: relative;
	z-index: 1;
	margin-left: 2rem;
}
@media (max-width: 1024px) {
	.kg-cta__deco { display: none; }
}
@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; }
}
</style>
