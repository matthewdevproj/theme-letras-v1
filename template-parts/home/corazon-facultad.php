<?php
/**
 * Sección N.º 03 — El corazón de la Facultad
 *
 * Fachada histórica como fondo, declaración institucional
 * y pilares que definen la identidad de la FLCH.
 *
 * @package LetrasFLCH
 */
?>
<section id="corazon" class="flch-corazon"
		 aria-labelledby="corazon-title"
		 x-data="flchHome()"
		 x-init="init()">

	<div class="flch-corazon__bg"
		 role="img"
		 aria-label="Fachada histórica de la Facultad de Letras"></div>
	<div class="flch-corazon__overlay" aria-hidden="true"></div>

	<div class="flch-corazon__content">
		<div class="flch-corazon__container">

			<div class="flch-corazon__eyebrow reveal">
				<span class="flch-corazon__eyebrow-num">N.º 03 —</span>
				Identidad institucional
			</div>

			<h2 class="flch-corazon__title reveal" id="corazon-title">
				El corazón de la <span class="flch-corazon__title-accent">Facultad</span>
			</h2>

			<p class="flch-corazon__desc reveal">
				Desde 1551, la Facultad de Letras y Ciencias Humanas es el alma humanística
				de la Universidad Nacional Mayor de San Marcos. Aquí el pensamiento crítico,
				la creación cultural y la investigación convergen para formar profesionales
				comprometidos con la sociedad.
			</p>

			<div class="flch-corazon__pillars reveal">
				<div class="flch-corazon__pillar">
					<i class="fa-solid fa-book-open" aria-hidden="true"></i>
					<span class="flch-corazon__pillar-label">Humanidades</span>
				</div>
				<div class="flch-corazon__pillar">
					<i class="fa-solid fa-microscope" aria-hidden="true"></i>
					<span class="flch-corazon__pillar-label">Investigación</span>
				</div>
				<div class="flch-corazon__pillar">
					<i class="fa-solid fa-handshake" aria-hidden="true"></i>
					<span class="flch-corazon__pillar-label">Compromiso social</span>
				</div>
				<div class="flch-corazon__pillar">
					<i class="fa-solid fa-globe" aria-hidden="true"></i>
					<span class="flch-corazon__pillar-label">Proyección global</span>
				</div>
			</div>

		</div>
	</div>
</section>

<style>
/* ── Corazón de la Facultad ───────────────────────────── */
.flch-corazon {
	position:      relative;
	overflow:      hidden;
	min-height:    90vh;
	display:       flex;
	align-items:   center;
	color:         #fff;
	font-family:   var(--font-body, 'Hanken Grotesk', sans-serif);
	isolation:     isolate;
}

.flch-corazon__bg {
	position:            absolute;
	inset:               0;
	z-index:             1;
	background-image:    url('https://letras.unmsm.edu.pe/wp-content/uploads/2025/12/DJI_0018-Trim-frame-at-0m2s.jpg');
	background-size:     cover;
	background-position: center 40%;
}

.flch-corazon__bg::after {
	content:  '';
	position: absolute;
	inset:    0;
	background: linear-gradient(
		95deg,
		rgba(8,18,32,.92) 0%,
		rgba(10,24,42,.70) 50%,
		rgba(12,30,52,.40) 100%
	);
	z-index: 1;
}

.flch-corazon__overlay {
	position: absolute; inset: 0;
	background: radial-gradient(circle at 30% 50%, transparent 20%, rgba(0,0,0,.25) 100%);
	z-index: 2; pointer-events: none;
}

.flch-corazon__content {
	position: relative;
	z-index:  3;
	width:    100%;
	max-width: var(--container-max, 1300px);
	margin:   0 auto;
	padding:  120px 2.5rem;
}

.flch-corazon__container {
	max-width: 800px;
}

.flch-corazon__eyebrow {
	font-size:      12px;
	font-weight:    700;
	letter-spacing: .16em;
	text-transform: uppercase;
	color:          var(--gold, #D6B655);
	margin-bottom:  16px;
}

.flch-corazon__eyebrow-num {
	opacity: 0.6;
}

.flch-corazon__title {
	font-family:    var(--font-display, 'Newsreader', serif);
	font-size:      clamp(38px, 5vw, 64px);
	font-weight:    600;
	line-height:    1.08;
	letter-spacing: -.02em;
	color:          #fff;
	margin:         0 0 24px;
	max-width:      14ch;
}

.flch-corazon__title-accent {
	color: var(--gold, #D6B655);
}

.flch-corazon__desc {
	font-size:     clamp(16px, 1.4vw, 19px);
	line-height:   1.75;
	color:         rgba(255,255,255,.82);
	max-width:     42em;
	margin-bottom: 44px;
}

.flch-corazon__pillars {
	display:         flex;
	flex-wrap:       wrap;
	gap:             32px;
	padding-top:     36px;
	border-top:      1px solid rgba(255,255,255,.12);
}

.flch-corazon__pillar {
	display:     flex;
	align-items: center;
	gap:         12px;
	font-size:   14px;
	font-weight: 600;
	letter-spacing: .03em;
	text-transform: uppercase;
	color:       rgba(255,255,255,.7);
}

.flch-corazon__pillar i {
	font-size: 18px;
	width:     22px;
	text-align: center;
	color:     var(--gold, #D6B655);
}

@media (max-width: 768px) {
	.flch-corazon__content {
		padding: 80px 1.5rem;
	}
	.flch-corazon__pillars {
		gap: 20px;
	}
}

@media (max-width: 480px) {
	.flch-corazon {
		min-height: 70vh;
	}
	.flch-corazon__pillar {
		font-size: 12px;
	}
}

@media (prefers-reduced-motion: reduce) {
	.reveal { opacity: 1 !important; transform: none !important; transition: none !important; }
}
</style>
