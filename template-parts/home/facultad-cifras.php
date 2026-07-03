<?php
/**
 * Template part: Indicadores / Facultad en cifras — spec "Portada FLCH Kingster".
 *
 * Sección editorial plana (sin tarjeta ni degradado): 4 contadores con
 * separador vertical entre columnas.
 *
 * SSR (auditoría P0): antes los 4 indicadores se generaban con un
 * <template x-for> de Alpine → el HTML servido llegaba VACÍO (invisible
 * para buscadores y para visitantes sin JS). Son datos institucionales
 * estáticos, así que se imprimen en PHP con su valor final como texto;
 * el contador GSAP genérico [data-count] (js/home-animations.js) anima
 * de 0 al valor cuando hay JS. Sin JS, el número final ya está ahí.
 * Alpine ya no es necesario en esta sección.
 *
 * @package LetrasFLCH
 */
$letras_flch_stats = array(
	array( 'value' => 10,  'suffix' => '',  'label' => 'Escuelas profesionales' ),
	array( 'value' => 475, 'suffix' => '',  'label' => 'Años de trayectoria' ),
	array( 'value' => 300, 'suffix' => '+', 'label' => 'Docentes' ),
	array( 'value' => 6,   'suffix' => '',  'label' => 'Revistas indexadas' ),
);
?>
<section id="cifras" class="kg-sec" aria-label="La Facultad en cifras">
	<div class="kg-cifras kg-reveal">
		<?php foreach ( $letras_flch_stats as $s ) : ?>
			<div class="kg-cifras__item">
				<div class="kg-cifras__value" data-count="<?php echo esc_attr( $s['value'] ); ?>" data-suffix="<?php echo esc_attr( $s['suffix'] ); ?>"><?php echo esc_html( $s['value'] . $s['suffix'] ); ?></div>
				<div class="kg-cifras__label"><?php echo esc_html( $s['label'] ); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<style>
.kg-cifras {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 24px;
	text-align: center;
}
.kg-cifras__item {
	padding: 20px;
	border-right: 1px solid var(--kg-line, rgba(26,34,48,.12));
}
.kg-cifras__item:last-child { border-right: none; }
.kg-cifras__value {
	font-family: var(--font-display, 'Newsreader', serif);
	font-weight: 600;
	font-size: clamp(38px, 4.6vw, 56px);
	line-height: 1;
	color: var(--kg-azul, #143B63);
}
.kg-cifras__label {
	font-size: 12.5px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase;
	color: var(--kg-muted, #5E6675); margin-top: 10px;
}

@media (max-width: 1024px) {
	.kg-cifras { grid-template-columns: repeat(2, 1fr); gap: 30px 24px; }
}
@media (max-width: 480px) {
	.kg-cifras { grid-template-columns: repeat(2, 1fr); }
}
</style>
