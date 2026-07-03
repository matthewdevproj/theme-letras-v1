<?php
/**
 * Template part: "Somos una de las facultades…" — spec "Portada FLCH Kingster".
 *
 * Banda navy oscura con foto del decano (sin logo) y fachada de fondo a
 * opacidad 0.12; reveal direccional (foto entra desde la izquierda, texto
 * desde la derecha).
 *
 * @package LetrasFLCH
 */
?>
<section class="kg-somos" aria-label="Sobre la Facultad">
	<div class="kg-somos__bg"
	     style="background-image:url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/IMG_1556-scaled.webp')"
	     aria-hidden="true"></div>
	<div class="kg-somos__grid">
		<div class="kg-reveal kg-rL">
			<img src="https://letras.unmsm.edu.pe/wp-content/uploads/2026/03/8X0A1490.jpg"
			     alt="Decano de la Facultad de Letras y Ciencias Humanas"
			     loading="lazy"
			     class="kg-somos__photo">
		</div>
		<div class="kg-reveal kg-rR">
			<p class="kg-somos__lead">Somos una de las facultades de humanidades más influyentes del país: diez escuelas, decenas de grupos y líneas de investigación.</p>
			<p class="kg-somos__desc">Fundada con la propia Universidad Nacional Mayor de San Marcos en 1551, la Facultad de Letras y Ciencias Humanas ha sido cuna de escritores, lingüistas, filósofos y comunicadores que han transformado la cultura y la academia del Perú y la región.</p>
			<a href="https://letras.unmsm.edu.pe/historia/" class="kg-somos__link">Conoce nuestra historia <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
		</div>
	</div>
</section>

<style>
.kg-somos {
	background: var(--kg-night, #0E2742);
	color: #fff;
	margin-top: 104px;
	position: relative;
	overflow: hidden;
}
.kg-somos__bg {
	position: absolute; inset: 0; z-index: 0;
	background-size: cover; background-position: center;
	opacity: .12;
}
.kg-somos__grid {
	position: relative; z-index: 1;
	max-width: var(--kg-container, 1200px);
	margin: 0 auto;
	padding: 84px 28px;
	display: grid;
	grid-template-columns: .85fr 1.15fr;
	gap: 54px;
	align-items: center;
}
.kg-somos__photo {
	width: 100%; max-width: 460px; height: auto;
	object-fit: contain; border-radius: 14px; display: block;
	box-shadow: 0 18px 40px rgba(8,18,32,.32);
}
.kg-somos__lead {
	font-family: var(--font-display, 'Newsreader', serif);
	font-size: clamp(20px, 2.2vw, 27px); line-height: 1.45; color: #fff;
	margin: 0 0 20px;
}
.kg-somos__desc {
	font-size: 15px; line-height: 1.7; color: rgba(255,255,255,.74);
	margin: 0 0 28px; max-width: 46em;
}
.kg-somos__link {
	display: inline-flex; align-items: center; gap: 11px;
	color: var(--kg-gold2, #D6B655); text-decoration: none; font-weight: 700; font-size: 15px;
	transition: gap .2s ease;
}
.kg-somos__link:hover { gap: 15px; }

@media (max-width: 1024px) {
	.kg-somos__grid { grid-template-columns: 1fr; gap: 32px; }
}
</style>
