<?php
/**
 * Template part: Hero de portada — spec "Portada FLCH Kingster".
 *
 * Solo el hero (foto + overlay + parallax GSAP + eyebrow/H1/subtítulo/2 CTAs).
 * La tarjeta de "Accesos / Centros de producción" vive aparte en
 * template-parts/home/accesos.php, montada sobre el borde inferior de esta
 * sección desde front-page.php.
 *
 * @package LetrasFLCH
 */
?>
<section class="kg-hero" id="kgHero" aria-label="Hero principal — Facultad de Letras y Ciencias Humanas">

	<div class="kg-hero__bg"
		 style="background-image:url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/DJI_0007-Trim-frame-at-0m5s.webp')"
		 role="img"
		 aria-label="Vista aérea del campus universitario"></div>
	<div class="kg-hero__overlay" aria-hidden="true"></div>

	<div class="kg-hero__content">
		<div class="kg-hero__container">

			<div class="kg-hero__eyebrow">La Decana de América · desde 1551</div>

			<h1 class="kg-hero__title">
				Facultad de <span class="kg-hero__title-gold">Letras</span> y Ciencias Humanas
			</h1>

			<p class="kg-hero__tagline">
				Nueve siglos de humanidades, investigación y cultura. Diez escuelas profesionales que forman a quienes piensan y escriben el Perú.
			</p>

			<div class="kg-hero__cta-row">
				<a href="#escuelas" class="kg-btn kg-btn--gold">
					Conoce las Escuelas <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</a>
				<a href="https://letras.unmsm.edu.pe/horarios-flch.php" class="kg-btn kg-btn--outline-light">
					Horarios 2026-I
				</a>
			</div>

		</div>
	</div>
</section>

<style>
.kg-hero {
	position:      relative;
	overflow:      hidden;
	background:    var(--kg-night, #0E2742);
	color:         #fff;
	font-family:   var(--font-body, 'Hanken Grotesk', sans-serif);
	isolation:     isolate;
}

.kg-hero__bg {
	position:            absolute;
	inset:               -8% 0;
	background-size:     cover;
	background-position: center 30%;
	z-index:             1;
	will-change:         transform;
}
.kg-hero__bg::after {
	content: '';
	position: absolute;
	inset: 0;
	background: linear-gradient(
		95deg,
		rgba(10,21,38,.94) 0%,
		rgba(12,30,52,.74) 46%,
		rgba(12,30,52,.30) 100%
	);
}

.kg-hero__overlay {
	position: absolute; inset: 0;
	background: radial-gradient(ellipse at 50% 30%, transparent 20%, rgba(0,0,0,.35) 100%);
	z-index: 2; pointer-events: none;
}

.kg-hero__content {
	position:    relative;
	z-index:     5;
	max-width:   var(--kg-container, 1200px);
	margin:      0 auto;
	padding:     110px 28px 170px;
	min-height:  76vh;
	display:     flex;
	align-items: center;
}

.kg-hero__container {
	max-width: 640px;
}

.kg-hero__eyebrow {
	font-size:      18px;
	font-weight:    600;
	letter-spacing: .02em;
	color:          rgba(255,255,255,.86);
	margin-bottom:  14px;
}

.kg-hero__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-weight:    600;
	font-size:      clamp(40px, 5.6vw, 76px);
	line-height:    0.98;
	letter-spacing: -.02em;
	color:          #fff;
	margin:         0 0 14px;
	text-wrap:      balance;
}
.kg-hero__title-gold {
	color:       var(--kg-gold2, #D6B655);
	font-style:  normal;
	font-weight: 500;
}

.kg-hero__tagline {
	font-size:   clamp(15px, 1.5vw, 18px);
	line-height: 1.6;
	color:       rgba(255,255,255,.82);
	max-width:   34em;
	margin:      0 0 26px;
}

.kg-hero__cta-row {
	display:   flex;
	flex-wrap: wrap;
	gap:       13px;
}

@media (max-width: 760px) {
	.kg-hero__content {
		padding: 64px 22px 110px;
		min-height: auto;
		text-align: center;
	}
	.kg-hero__container { max-width: none; }
	.kg-hero__cta-row { justify-content: center; }
	.kg-hero__title { font-size: clamp(32px, 9vw, 46px); }
	.kg-hero__tagline { font-size: 15px; }
}

@media (max-width: 480px) {
	.kg-hero__content { padding: 48px 18px 96px; }
	.kg-hero__title { font-size: clamp(29px, 8.5vw, 38px); }
	.kg-hero__cta-row a { flex: 1; justify-content: center; }
}

@media (prefers-reduced-motion: reduce) {
	.kg-hero__bg { transform: none !important; }
}
</style>
