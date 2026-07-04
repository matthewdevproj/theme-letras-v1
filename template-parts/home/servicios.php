<?php
/**
 * Template part: Servicios (4 con icono) — spec "Portada FLCH Kingster".
 *
 * @package LetrasFLCH
 */
$letras_flch_servicios = array(
	array(
		'icon' => 'fa-solid fa-graduation-cap',
		'title' => 'Diez escuelas',
		'desc'  => 'Programas de pregrado en humanidades, lenguas, arte y ciencias de la comunicación.',
		'href'  => '#escuelas',
		'cta'   => 'Conoce las escuelas',
	),
	array(
		'icon' => 'fa-solid fa-flask',
		'title' => 'Investigación',
		'desc'  => 'Institutos, grupos y proyectos que producen conocimiento humanístico de frontera.',
		'href'  => 'https://letras.unmsm.edu.pe/unidad-de-investigacion/',
		'cta'   => 'Conoce la investigación',
	),
	array(
		'icon' => 'fa-solid fa-book-open',
		'title' => 'Producción editorial',
		'desc'  => 'Revistas académicas indexadas con más de medio siglo de trayectoria.',
		'href'  => '#revistas',
		'cta'   => 'Conoce las revistas',
	),
	array(
		'icon' => 'fa-solid fa-masks-theater',
		'title' => 'Vida cultural',
		'desc'  => 'Cine, teatro, recitales y actividades que hacen de la Facultad un espacio vivo.',
		'href'  => 'https://letras.unmsm.edu.pe/cine-club-san-marcos/',
		'cta'   => 'Conoce la vida cultural',
	),
);
?>
<section class="kg-serv-sec" aria-label="Servicios de la Facultad">
	<div class="kg-serv">
		<?php foreach ( $letras_flch_servicios as $s ) : ?>
			<div class="kg-reveal kg-serv-card">
				<i class="<?php echo esc_attr( $s['icon'] ); ?> kg-serv-ic" aria-hidden="true"></i>
				<h3 class="kg-serv-title"><?php echo esc_html( $s['title'] ); ?></h3>
				<p class="kg-serv-desc"><?php echo esc_html( $s['desc'] ); ?></p>
				<a href="<?php echo esc_url( $s['href'] ); ?>" class="kg-serv-link"><?php echo esc_html( $s['cta'] ); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<style>
.kg-serv-sec { background: var(--kg-azuld, #0E2A48); color: #fff; }
.kg-serv {
	max-width: var(--kg-container, 1200px);
	margin: 0 auto;
	padding: 70px 28px;
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 30px;
}
.kg-serv-ic {
	color: var(--kg-gold2, #D6B655);
	font-size: 30px;
	transition: transform .3s cubic-bezier(.16,1,.3,1), color .2s ease;
}
.kg-serv-card:hover .kg-serv-ic { transform: translateY(-4px) scale(1.08); }
.kg-serv-title {
	font-family: var(--font-display, 'Newsreader', serif);
	color: #fff;
	font-weight: 600; font-size: 20px; margin: 18px 0 9px;
}
.kg-serv-desc { font-size: 13.5px; line-height: 1.55; color: rgba(255,255,255,.72); margin: 0 0 14px; }
.kg-serv-link {
	color: var(--kg-gold2, #D6B655); text-decoration: none; font-weight: 700; font-size: 13px;
	display: inline-flex; align-items: center; gap: 7px;
}
.kg-serv-link i { font-size: 11px; transition: transform .2s cubic-bezier(.16,1,.3,1); }
.kg-serv-link:hover i { transform: translateX(3px); }

@media (max-width: 1024px) {
	.kg-serv { grid-template-columns: repeat(2, 1fr); gap: 28px; }
}
@media (max-width: 480px) {
	.kg-serv { grid-template-columns: 1fr; }
}
</style>
