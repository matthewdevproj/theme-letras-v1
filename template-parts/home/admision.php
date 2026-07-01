<?php
/**
 * Template part: Admisión — spec "Portada FLCH Kingster".
 *
 * Split real: foto panorámica + panel navy oscuro con texto y 1 CTA.
 *
 * @package LetrasFLCH
 */
?>
<section id="admision" class="kg-sec" aria-labelledby="admision-title">
	<div class="kg-apply kg-reveal">
		<div class="kg-apply__photo"
		     style="background-image:url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/IMG_1565-scaled.webp')"
		     role="img" aria-label="Estudiantes de la Facultad de Letras y Ciencias Humanas"></div>
		<div class="kg-apply__panel">
			<span class="kg-apply__glyph" aria-hidden="true">&amp;</span>
			<h2 class="kg-apply__title" id="admision-title">Admisión 2026</h2>
			<div class="kg-apply__lead">Las inscripciones están abiertas</div>
			<p class="kg-apply__desc">No solo damos formación: acompañamos a cada estudiante a descubrir el campo de las humanidades que lo apasiona y a liderarlo. Conoce las modalidades, perfiles y el cronograma de las diez escuelas profesionales.</p>
			<div class="kg-apply__actions">
				<a href="https://admision.unmsm.edu.pe/" target="_blank" rel="noopener noreferrer" class="kg-btn kg-btn--gold">
					Postula ahora <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</section>

<style>
.kg-apply {
	display: grid;
	grid-template-columns: 1fr 1fr;
	border-radius: 16px;
	overflow: hidden;
	box-shadow: 0 22px 50px rgba(8,18,32,.14);
}
.kg-apply__photo {
	position: relative;
	min-height: 380px;
	background: var(--kg-night, #0E2742);
	background-size: cover;
	background-position: center;
}
.kg-apply__panel {
	background: var(--kg-azuld, #0E2A48);
	color: #fff;
	padding: 54px 50px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	position: relative;
	overflow: hidden;
}
.kg-apply__glyph {
	position: absolute; right: -20px; bottom: -50px;
	font-family: var(--font-display, 'Newsreader', serif);
	font-style: italic; font-size: 200px; opacity: .07;
}
.kg-apply__title {
	position: relative;
	font-family: var(--font-display, 'Newsreader', serif);
	color: #fff;
	font-weight: 600; font-size: clamp(28px, 3vw, 40px); line-height: 1.05;
	margin: 0 0 8px;
}
.kg-apply__lead {
	position: relative;
	color: var(--kg-gold2, #D6B655); font-weight: 600; font-size: 15px; margin-bottom: 18px;
}
.kg-apply__desc {
	position: relative;
	font-size: 15px; line-height: 1.65; color: rgba(255,255,255,.82);
	margin: 0 0 28px; max-width: 30em;
}
.kg-apply__actions { position: relative; display: flex; flex-wrap: wrap; gap: 12px; }

@media (max-width: 1024px) {
	.kg-apply { grid-template-columns: 1fr; }
	.kg-apply__photo { min-height: 260px; }
}
</style>
