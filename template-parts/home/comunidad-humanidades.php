<?php
/**
 * Sección N.º 07 — Comunidad de humanidades
 *
 * Vida universitaria, extensión cultural y comunidad FLCH.
 *
 * @package LetrasFLCH
 */
?>
<section id="comunidad" class="flch-comunidad"
		 aria-labelledby="comunidad-title"
		 x-data="flchHome()"
		 x-init="init()">

	<div class="flch-comunidad__bg"
		 role="img"
		 aria-label="Estudiantes en la biblioteca central"></div>
	<div class="flch-comunidad__overlay" aria-hidden="true"></div>

	<div class="flch-comunidad__content">
		<div class="flch-comunidad__container">

			<div class="flch-comunidad__header reveal">
				<div class="flch-comunidad__eyebrow">
					<span class="flch-comunidad__eyebrow-num">N.º 07 —</span>
					Vida y comunidad
				</div>
				<h2 class="flch-comunidad__title" id="comunidad-title">
					Comunidad de <span class="flch-comunidad__title-accent">humanidades</span>
				</h2>
			</div>

			<p class="flch-comunidad__desc reveal">
				Más que una facultad, somos una comunidad que piensa, crea y transforma.
				Estudiantes, docentes y egresados construyen día a día el legado humanístico
				de San Marcos.
			</p>

			<div class="flch-comunidad__grid reveal">
				<a href="https://www.facebook.com/letrassanmarcos" target="_blank" rel="noopener noreferrer" class="flch-comunidad__card">
					<i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
					<span class="flch-comunidad__card-title">Facebook</span>
					<span class="flch-comunidad__card-desc">Noticias y eventos</span>
				</a>
				<a href="https://www.instagram.com/letrasunmsm/" target="_blank" rel="noopener noreferrer" class="flch-comunidad__card">
					<i class="fa-brands fa-instagram" aria-hidden="true"></i>
					<span class="flch-comunidad__card-title">Instagram</span>
					<span class="flch-comunidad__card-desc">Galería y comunidad</span>
				</a>
				<a href="https://www.youtube.com/@LetrasTV-p9j" target="_blank" rel="noopener noreferrer" class="flch-comunidad__card">
					<i class="fa-brands fa-youtube" aria-hidden="true"></i>
					<span class="flch-comunidad__card-title">YouTube</span>
					<span class="flch-comunidad__card-desc">Conferencias y cultura</span>
				</a>
				<a href="https://pe.linkedin.com/school/letrasunmsm/" target="_blank" rel="noopener noreferrer" class="flch-comunidad__card">
					<i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
					<span class="flch-comunidad__card-title">LinkedIn</span>
					<span class="flch-comunidad__card-desc">Red profesional</span>
				</a>
			</div>

			<div class="flch-comunidad__events reveal">
				<h3 class="flch-comunidad__events-title">Próximos eventos</h3>
				<div class="flch-comunidad__events-grid">
					<div class="flch-comunidad__event">
						<span class="flch-comunidad__event-date">Jun</span>
						<span class="flch-comunidad__event-day">28</span>
						<div class="flch-comunidad__event-body">
							<span class="flch-comunidad__event-name">Coloquio de Literatura Peruana</span>
							<span class="flch-comunidad__event-meta">Auditorio · 10:00 a.m.</span>
						</div>
					</div>
					<div class="flch-comunidad__event">
						<span class="flch-comunidad__event-date">Jul</span>
						<span class="flch-comunidad__event-day">05</span>
						<div class="flch-comunidad__event-body">
							<span class="flch-comunidad__event-name">Taller de Lenguas Originarias</span>
							<span class="flch-comunidad__event-meta">CEID · 3:00 p.m.</span>
						</div>
					</div>
					<div class="flch-comunidad__event">
						<span class="flch-comunidad__event-date">Jul</span>
						<span class="flch-comunidad__event-day">12</span>
						<div class="flch-comunidad__event-body">
							<span class="flch-comunidad__event-name">Conferencia: Inteligencia Artificial y Humanidades</span>
							<span class="flch-comunidad__event-meta">Virtual · 6:00 p.m.</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<style>
/* ── Comunidad de humanidades ─────────────────────────── */
.flch-comunidad {
	position:    relative;
	overflow:    hidden;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
	isolation:   isolate;
	background:  var(--flch-surface, #FFFFFF);
}

.flch-comunidad__bg {
	display:             none;
	position:            absolute;
	inset:               0;
	z-index:             1;
	background-image:    url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/IMG_1565-scaled.jpg');
	background-size:     cover;
	background-position: center 40%;
}
:root.dark .flch-comunidad__bg {
	display: block;
}

.flch-comunidad__bg::after {
	content:  '';
	position: absolute;
	inset:    0;
	background: linear-gradient(
		100deg,
		rgba(8,18,32,.90) 0%,
		rgba(10,24,42,.75) 50%,
		rgba(12,30,52,.45) 100%
	);
	z-index: 1;
}

.flch-comunidad__overlay {
	display: none;
	position: absolute; inset: 0;
	background: radial-gradient(circle at 40% 60%, transparent 25%, rgba(0,0,0,.15) 100%);
	z-index: 2; pointer-events: none;
}
:root.dark .flch-comunidad__overlay {
	display: block;
}

.flch-comunidad__content {
	position: relative;
	z-index:  3;
	padding:  100px 0;
}

.flch-comunidad__container {
	max-width: var(--container-max, 1300px);
	margin: 0 auto;
	padding: 0 2.5rem;
}

.flch-comunidad__header {
	margin-bottom: 20px;
}

.flch-comunidad__eyebrow {
	font-size:      12px;
	font-weight:    700;
	letter-spacing: .16em;
	text-transform: uppercase;
	color:          var(--flch-gold, #A8861C);
	margin-bottom:  12px;
}
:root.dark .flch-comunidad__eyebrow {
	color: var(--gold, #D6B655);
}

.flch-comunidad__eyebrow-num {
	opacity: 0.6;
}

.flch-comunidad__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      clamp(32px, 4vw, 50px);
	font-weight:    600;
	line-height:    1.1;
	letter-spacing: -.02em;
	color:          var(--ink, #1A2230);
	margin:         0;
}
:root.dark .flch-comunidad__title {
	color: #fff;
}

.flch-comunidad__title-accent {
	color: var(--flch-gold, #A8861C);
}
:root.dark .flch-comunidad__title-accent {
	color: var(--gold, #D6B655);
}

.flch-comunidad__desc {
	font-size:     clamp(15px, 1.3vw, 18px);
	line-height:   1.7;
	color:         var(--gray-dark, #6E6B64);
	max-width:     36em;
	margin-bottom: 44px;
}
:root.dark .flch-comunidad__desc {
	color: rgba(255,255,255,.8);
}

.flch-comunidad__grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
	margin-bottom: 56px;
}

@media (max-width: 768px) {
	.flch-comunidad__grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

@media (max-width: 480px) {
	.flch-comunidad__grid {
		grid-template-columns: 1fr;
	}
}

.flch-comunidad__card {
	display:         flex;
	flex-direction:  column;
	align-items:     center;
	text-align:      center;
	padding:         28px 16px;
	background:      var(--flch-surface-soft, #F7F5EF);
	border:          1px solid var(--flch-border, rgba(0,0,0,.08));
	border-radius:   16px;
	text-decoration: none;
	color:           var(--ink, #1A2230);
	transition:      all .3s ease;
}
:root.dark .flch-comunidad__card {
	background:      rgba(255,255,255,.06);
	border:          1px solid rgba(255,255,255,.1);
	backdrop-filter: blur(6px);
	color:           #fff;
}

.flch-comunidad__card:hover {
	background: rgba(168,134,28,.06);
	transform:  translateY(-4px);
}
:root.dark .flch-comunidad__card:hover {
	background: rgba(255,255,255,.12);
}

.flch-comunidad__card i {
	font-size:      28px;
	color:          var(--flch-gold, #A8861C);
	margin-bottom:  14px;
}
:root.dark .flch-comunidad__card i {
	color: var(--gold, #D6B655);
}

.flch-comunidad__card-title {
	font-family:   var(--font-display, 'Newsreader', serif);
	font-size:     1.15rem;
	font-weight:   600;
	margin-bottom: 4px;
}

.flch-comunidad__card-desc {
	font-size: 13px;
	color:     var(--gray-dark, #6E6B64);
}
:root.dark .flch-comunidad__card-desc {
	color: rgba(255,255,255,.6);
}

.flch-comunidad__events {
	border-top: 1px solid var(--flch-border, rgba(0,0,0,.08));
	padding-top: 40px;
}
:root.dark .flch-comunidad__events {
	border-top-color: rgba(255,255,255,.1);
}

.flch-comunidad__events-title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      1.4rem;
	font-weight:    600;
	color:          var(--flch-gold, #A8861C);
	margin:         0 0 24px;
}
:root.dark .flch-comunidad__events-title {
	color: var(--gold, #D6B655);
}

.flch-comunidad__events-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 20px;
}

@media (max-width: 768px) {
	.flch-comunidad__events-grid {
		grid-template-columns: 1fr;
	}
}

.flch-comunidad__event {
	display:         flex;
	gap:             16px;
	background:      var(--flch-surface-soft, #F7F5EF);
	border:          1px solid var(--flch-border, rgba(0,0,0,.08));
	border-radius:   14px;
	padding:         18px;
}
:root.dark .flch-comunidad__event {
	background: rgba(255,255,255,.04);
	border:     1px solid rgba(255,255,255,.08);
}

.flch-comunidad__event-date {
	font-size:      10px;
	font-weight:    700;
	letter-spacing: .12em;
	text-transform: uppercase;
	color:          var(--flch-gold, #A8861C);
	display:        block;
	line-height:    1;
}
:root.dark .flch-comunidad__event-date {
	color: var(--gold, #D6B655);
}

.flch-comunidad__event-day {
	font-family:   var(--font-display, 'Newsreader', serif);
	font-size:     24px;
	font-weight:   700;
	color:         var(--ink, #1A2230);
	display:       block;
	line-height:   1;
	margin-top:    2px;
}
:root.dark .flch-comunidad__event-day {
	color: #fff;
}

.flch-comunidad__event-body {
	flex: 1;
}

.flch-comunidad__event-name {
	font-size:      14px;
	font-weight:    600;
	color:          var(--ink, #1A2230);
	display:        block;
	margin-bottom:  4px;
}
:root.dark .flch-comunidad__event-name {
	color: #fff;
}

.flch-comunidad__event-meta {
	font-size:  12.5px;
	color:      var(--gray-dark, #6E6B64);
}
:root.dark .flch-comunidad__event-meta {
	color: rgba(255,255,255,.55);
}

@media (max-width: 768px) {
	.flch-comunidad__content {
		padding: 64px 0;
	}
	.flch-comunidad__container {
		padding: 0 1.25rem;
	}
	.flch-comunidad__desc {
		margin-bottom: 32px;
	}
	.flch-comunidad__events-grid {
		gap: 14px;
	}
}

@media (prefers-reduced-motion: reduce) {
	.flch-comunidad__card { transition: none; }
	.reveal { opacity: 1 !important; transform: none !important; transition: none !important; }
}
</style>
