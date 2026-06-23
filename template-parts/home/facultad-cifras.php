<?php
/**
 * Sección N.º 06 — Facultad en cifras
 *
 * Estadísticas clave de la facultad con contadores animados.
 *
 * @package LetrasFLCH
 */
?>
<section id="cifras" class="flch-cifras"
		 aria-labelledby="cifras-title"
		 x-data="flchHome()"
		 x-init="init()">

	<div class="flch-cifras__bg"
		 role="img"
		 aria-label="Ceremonia institucional de la Facultad"></div>
	<div class="flch-cifras__overlay" aria-hidden="true"></div>

	<div class="flch-cifras__content">
		<div class="flch-cifras__container">

			<div class="flch-cifras__header reveal">
				<div class="flch-cifras__eyebrow">
					<span class="flch-cifras__eyebrow-num">N.º 06 —</span>
					La facultad en datos
				</div>
				<h2 class="flch-cifras__title" id="cifras-title">
					Facultad en <span class="flch-cifras__title-accent">cifras</span>
				</h2>
			</div>

			<div class="flch-cifras__grid reveal">
				<div class="flch-cifras__stat">
					<i class="fa-solid fa-landmark" aria-hidden="true"></i>
					<span class="flch-cifras__stat-value" x-data="{n:0,c:0}" x-init="setInterval(function(){if(c<1551){c+=5;n=c}else{n=1551}},10)" x-text="n">0</span>
					<span class="flch-cifras__stat-label">Años de historia</span>
				</div>
				<div class="flch-cifras__stat">
					<i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
					<span class="flch-cifras__stat-value">10</span>
					<span class="flch-cifras__stat-label">Escuelas profesionales</span>
				</div>
				<div class="flch-cifras__stat">
					<i class="fa-solid fa-users" aria-hidden="true"></i>
					<span class="flch-cifras__stat-value">3000+</span>
					<span class="flch-cifras__stat-label">Estudiantes</span>
				</div>
				<div class="flch-cifras__stat">
					<i class="fa-solid fa-chalkboard-user" aria-hidden="true"></i>
					<span class="flch-cifras__stat-value">400+</span>
					<span class="flch-cifras__stat-label">Docentes</span>
				</div>
				<div class="flch-cifras__stat">
					<i class="fa-solid fa-book" aria-hidden="true"></i>
					<span class="flch-cifras__stat-value">5</span>
					<span class="flch-cifras__stat-label">Bibliotecas especializadas</span>
				</div>
				<div class="flch-cifras__stat">
					<i class="fa-solid fa-flask" aria-hidden="true"></i>
					<span class="flch-cifras__stat-value">15+</span>
					<span class="flch-cifras__stat-label">Grupos de investigación</span>
				</div>
			</div>

		</div>
	</div>
</section>

<style>
/* ── Facultad en cifras ───────────────────────────────── */
.flch-cifras {
	position:    relative;
	overflow:    hidden;
	font-family: var(--font-body, 'Hanken Grotesk', sans-serif);
	isolation:   isolate;
	background:  var(--flch-surface-soft, #F7F5EF);
}

.flch-cifras__bg {
	display:             none;
	position:            absolute;
	inset:               0;
	z-index:             1;
	background-image:    url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/IMG_1556-scaled.jpg');
	background-size:     cover;
	background-position: center 50%;
}
:root.dark .flch-cifras__bg {
	display: block;
}

.flch-cifras__bg::after {
	content:  '';
	position: absolute;
	inset:    0;
	background: linear-gradient(
		100deg,
		rgba(8,18,32,.92) 0%,
		rgba(10,24,42,.78) 50%,
		rgba(12,30,52,.50) 100%
	);
	z-index: 1;
}

.flch-cifras__overlay {
	display: none;
	position: absolute; inset: 0;
	background: radial-gradient(circle at 70% 30%, transparent 30%, rgba(0,0,0,.2) 100%);
	z-index: 2; pointer-events: none;
}
:root.dark .flch-cifras__overlay {
	display: block;
}

.flch-cifras__content {
	position: relative;
	z-index:  3;
	padding:  100px 0;
}

.flch-cifras__container {
	max-width: var(--container-max, 1300px);
	margin: 0 auto;
	padding: 0 2.5rem;
}

.flch-cifras__header {
	margin-bottom: 48px;
}

.flch-cifras__eyebrow {
	font-size:      12px;
	font-weight:    700;
	letter-spacing: .16em;
	text-transform: uppercase;
	color:          var(--flch-gold, #A8861C);
	margin-bottom:  12px;
}
:root.dark .flch-cifras__eyebrow {
	color: var(--gold, #D6B655);
}

.flch-cifras__eyebrow-num {
	opacity: 0.6;
}

.flch-cifras__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      clamp(32px, 4vw, 50px);
	font-weight:    600;
	line-height:    1.1;
	letter-spacing: -.02em;
	color:          var(--ink, #1A2230);
	margin:         0;
}
:root.dark .flch-cifras__title {
	color: #fff;
}

.flch-cifras__title-accent {
	color: var(--flch-gold, #A8861C);
}
:root.dark .flch-cifras__title-accent {
	color: var(--gold, #D6B655);
}

.flch-cifras__grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 32px;
}

@media (max-width: 768px) {
	.flch-cifras__grid {
		grid-template-columns: repeat(2, 1fr);
		gap: 24px;
	}
}

@media (max-width: 480px) {
	.flch-cifras__grid {
		grid-template-columns: 1fr;
	}
}

.flch-cifras__stat {
	display:         flex;
	flex-direction:  column;
	align-items:     center;
	text-align:      center;
	padding:         28px 16px;
	background:      var(--flch-surface, #FFFFFF);
	border:          1px solid var(--flch-border, rgba(0,0,0,.08));
	border-radius:   16px;
}
:root.dark .flch-cifras__stat {
	background:      rgba(255,255,255,.06);
	border:          1px solid rgba(255,255,255,.1);
	backdrop-filter: blur(6px);
}

.flch-cifras__stat i {
	font-size:      26px;
	color:          var(--flch-gold, #A8861C);
	margin-bottom:  16px;
}
:root.dark .flch-cifras__stat i {
	color: var(--gold, #D6B655);
}

.flch-cifras__stat-value {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      clamp(32px, 3.5vw, 48px);
	font-weight:    700;
	line-height:    1.1;
	color:          var(--ink, #1A2230);
	margin-bottom:  6px;
}
:root.dark .flch-cifras__stat-value {
	color: #fff;
}

.flch-cifras__stat-label {
	font-size:      13px;
	font-weight:    600;
	letter-spacing: .04em;
	text-transform: uppercase;
	color:          var(--gray-dark, #6E6B64);
}
:root.dark .flch-cifras__stat-label {
	color: rgba(255,255,255,.6);
}

@media (max-width: 768px) {
	.flch-cifras__content {
		padding: 64px 0;
	}
	.flch-cifras__container {
		padding: 0 1.25rem;
	}
}

@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; transition: none !important; }
}
</style>
