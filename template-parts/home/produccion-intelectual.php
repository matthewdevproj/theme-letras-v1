<?php
/**
 * Sección N.º 04 — Producción intelectual
 *
 * Áreas de investigación, grupos de estudio y producción
 * académica de la Facultad.
 *
 * @package LetrasFLCH
 */
?>
<section id="produccion" class="flch-produccion"
		 aria-labelledby="produccion-title"
		 x-data="flchHome()"
		 x-init="init()">

	<div class="flch-produccion__container">

		<div class="flch-produccion__header reveal">
			<div>
				<div class="flch-produccion__eyebrow">
					<span class="flch-produccion__eyebrow-num">N.º 04 —</span>
					Investigación · creación
				</div>
				<h2 class="flch-produccion__title" id="produccion-title">
					Producción <span class="flch-produccion__title-accent">intelectual</span>
				</h2>
			</div>
			<p class="flch-produccion__subtitle">
				La FLCH genera conocimiento en humanidades, lenguas, comunicación y arte.
				Conoce nuestras líneas de investigación y producción académica.
			</p>
		</div>

		<div class="flch-produccion__grid reveal">
			<article class="flch-produccion__card">
				<div class="flch-produccion__card-icon">
					<i class="fa-solid fa-feather" aria-hidden="true"></i>
				</div>
				<h3 class="flch-produccion__card-title">Literatura y crítica</h3>
				<p class="flch-produccion__card-desc">Creación literaria, teoría y crítica de la literatura peruana y latinoamericana.</p>
			</article>
			<article class="flch-produccion__card">
				<div class="flch-produccion__card-icon">
					<i class="fa-solid fa-language" aria-hidden="true"></i>
				</div>
				<h3 class="flch-produccion__card-title">Lingüística y lenguas</h3>
				<p class="flch-produccion__card-desc">Estudio de lenguas originarias, contacto lingüístico y políticas del lenguaje.</p>
			</article>
			<article class="flch-produccion__card">
				<div class="flch-produccion__card-icon">
					<i class="fa-solid fa-radio" aria-hidden="true"></i>
				</div>
				<h3 class="flch-produccion__card-title">Comunicación y medios</h3>
				<p class="flch-produccion__card-desc">Periodismo, comunicación digital, medios audiovisuales y cultura mediática.</p>
			</article>
			<article class="flch-produccion__card">
				<div class="flch-produccion__card-icon">
					<i class="fa-solid fa-landmark" aria-hidden="true"></i>
				</div>
				<h3 class="flch-produccion__card-title">Historia y patrimonio</h3>
				<p class="flch-produccion__card-desc">Conservación, restauración y gestión del patrimonio cultural material e inmaterial.</p>
			</article>
			<article class="flch-produccion__card">
				<div class="flch-produccion__card-icon">
					<i class="fa-solid fa-brain" aria-hidden="true"></i>
				</div>
				<h3 class="flch-produccion__card-title">Filosofía y pensamiento</h3>
				<p class="flch-produccion__card-desc">Ética, filosofía política, estética e historia de las ideas en el mundo contemporáneo.</p>
			</article>
			<article class="flch-produccion__card">
				<div class="flch-produccion__card-icon">
					<i class="fa-solid fa-music" aria-hidden="true"></i>
				</div>
				<h3 class="flch-produccion__card-title">Arte y performance</h3>
				<p class="flch-produccion__card-desc">Historia del arte, danza, teatro y expresiones performativas como objeto de estudio.</p>
			</article>
		</div>

		<div class="flch-produccion__cta reveal">
			<a href="https://letras.unmsm.edu.pe/investigacion/"
			   class="flch-produccion__cta-link"
			   target="_blank" rel="noopener noreferrer">
				Explorar producción académica
				<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>

	</div>
</section>

<style>
/* ── Producción intelectual ───────────────────────────── */
.flch-produccion {
	padding: 90px 0 80px;
	background: var(--flch-surface-soft, #F7F5EF);
}
:root.dark .flch-produccion {
	background: #0B1A2E;
}

.flch-produccion__container {
	max-width: var(--container-max, 1300px);
	margin: 0 auto;
	padding: 0 2.5rem;
}

.flch-produccion__header {
	display:         flex;
	align-items:     flex-end;
	justify-content: space-between;
	gap:             28px;
	flex-wrap:       wrap;
	margin-bottom:   48px;
}

.flch-produccion__eyebrow {
	font-size:      12px;
	font-weight:    700;
	letter-spacing: .16em;
	text-transform: uppercase;
	color:          var(--flch-gold, #A8861C);
	margin-bottom:  12px;
}

.flch-produccion__eyebrow-num {
	opacity: 0.6;
}

.flch-produccion__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      clamp(32px, 4vw, 50px);
	font-weight:    600;
	line-height:    1.1;
	letter-spacing: -.02em;
	color:          var(--ink, #1A2230);
	margin:         0;
}
:root.dark .flch-produccion__title {
	color: #F1F0EC;
}

.flch-produccion__title-accent {
	color: var(--flch-gold, #A8861C);
}

.flch-produccion__subtitle {
	font-size:    16px;
	line-height:  1.6;
	color:        var(--gray-dark, #6E6B64);
	max-width:    28em;
	margin:       0;
}
:root.dark .flch-produccion__subtitle {
	color: rgba(255,255,255,.6);
}

.flch-produccion__grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 24px;
}

@media (max-width: 1024px) {
	.flch-produccion__grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

@media (max-width: 600px) {
	.flch-produccion__grid {
		grid-template-columns: 1fr;
	}
}

.flch-produccion__card {
	background:      var(--flch-surface, #FFFFFF);
	border:          1px solid var(--flch-border, rgba(0,0,0,.08));
	border-radius:   16px;
	padding:         28px 24px;
	transition:      all .3s ease;
}
:root.dark .flch-produccion__card {
	background: rgba(13,39,71,.4);
	border-color: rgba(255,255,255,.08);
}

.flch-produccion__card:hover {
	transform:       translateY(-4px);
	box-shadow:      0 16px 40px rgba(8,18,32,.12);
}
:root.dark .flch-produccion__card:hover {
	box-shadow: 0 16px 40px rgba(0,0,0,.3);
}

.flch-produccion__card-icon {
	display:         flex;
	align-items:     center;
	justify-content: center;
	width:           48px;
	height:          48px;
	border-radius:   12px;
	background:      rgba(168,134,28,.1);
	color:           var(--flch-gold, #A8861C);
	font-size:       20px;
	margin-bottom:   18px;
}

.flch-produccion__card-title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      1.2rem;
	font-weight:    600;
	line-height:    1.3;
	color:          var(--ink, #1A2230);
	margin:         0 0 10px;
}
:root.dark .flch-produccion__card-title {
	color: #F1F0EC;
}

.flch-produccion__card-desc {
	font-size:    14px;
	line-height:  1.6;
	color:        var(--gray-dark, #6E6B64);
	margin:       0;
}
:root.dark .flch-produccion__card-desc {
	color: rgba(255,255,255,.65);
}

.flch-produccion__cta {
	text-align: center;
	margin-top: 44px;
}

.flch-produccion__cta-link {
	display:         inline-flex;
	align-items:     center;
	gap:             10px;
	font-size:       15px;
	font-weight:     700;
	color:           var(--flch-gold, #A8861C);
	text-decoration: none;
	border-bottom:   1px solid currentColor;
	padding-bottom:  4px;
	transition:      gap .3s ease;
}

.flch-produccion__cta-link:hover i {
	transform: translateX(4px);
}

.flch-produccion__cta-link i {
	font-size: 13px;
	transition: transform .3s ease;
}

@media (max-width: 768px) {
	.flch-produccion {
		padding: 60px 0 50px;
	}
	.flch-produccion__container {
		padding: 0 1.25rem;
	}
	.flch-produccion__header {
		margin-bottom: 32px;
	}
}

@media (prefers-reduced-motion: reduce) {
	.flch-produccion__card { transition: none; }
	.flch-produccion__cta-link i { transition: none; }
	.reveal { opacity: 1 !important; transform: none !important; transition: none !important; }
}
</style>
