<?php
/**
 * Template part: Escuelas Profesionales — spec "Portada FLCH Kingster".
 *
 * Grid de 10 tarjetas (foto + overlay + número editorial + hover zoom/línea
 * dorada). Datos reales compartidos con el índice del command palette
 * (letras_flch_schools_data() en functions.php).
 *
 * @package LetrasFLCH
 */
$letras_flch_schools = letras_flch_schools_data();
?>
<div class="kg-div kg-reveal" aria-hidden="true"><span class="kg-div__num">01</span><span class="kg-div__lbl">Oferta académica</span><span class="kg-div__line"></span></div>
<section id="escuelas" class="kg-sec kg-sec--tight" aria-label="Escuelas Profesionales">
	<div class="kg-sec__head kg-reveal">
		<div>
			<div class="kg-sec__eyebrow">Carreras de pregrado</div>
			<h2 class="kg-sec__title">Escuelas Profesionales</h2>
		</div>
	</div>
	<div class="kg-esc">
		<?php foreach ( $letras_flch_schools as $school ) : ?>
			<a href="<?php echo esc_url( $school['href'] ); ?>" class="kg-reveal kg-school">
				<div class="kg-school-img">
					<img src="<?php echo esc_url( $school['img'] ); ?>" alt="<?php echo esc_attr( $school['name'] ); ?>" loading="lazy">
				</div>
				<div class="kg-school__scrim" aria-hidden="true"></div>
				<div class="kg-school__body">
					<div class="kg-school__num-row">
						<span class="kg-school__num"><?php echo esc_html( $school['n'] ); ?></span>
						<span class="kg-school__num-line"></span>
					</div>
					<h3 class="kg-school__name"><?php echo esc_html( $school['name'] ); ?></h3>
					<span class="kg-school-go">Ver escuela <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
				</div>
			</a>
		<?php endforeach; ?>
	</div>
</section>

<style>
.kg-esc {
	display: grid;
	grid-template-columns: repeat(5, 1fr);
	gap: 16px;
}
.kg-school {
	position: relative;
	text-decoration: none;
	color: #fff;
	border-radius: 12px;
	overflow: hidden;
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	min-height: 230px;
	background: var(--kg-night, #0E2742);
	transition: transform .2s cubic-bezier(.22,1,.36,1), box-shadow .2s ease;
}
.kg-school:hover,
.kg-school:focus-visible {
	transform: translateY(-5px);
	box-shadow: 0 20px 44px rgba(8,18,32,.3);
}
.kg-school-img { position: absolute; inset: 0; z-index: 0; }
.kg-school-img img {
	width: 100%; height: 100%; object-fit: cover; display: block;
	transition: transform .5s cubic-bezier(.16,1,.3,1);
}
.kg-school:hover .kg-school-img img,
.kg-school:focus-visible .kg-school-img img { transform: scale(1.07); }

.kg-school__scrim {
	position: absolute; inset: 0; z-index: 1;
	background: linear-gradient(180deg, rgba(8,18,32,.05) 0%, rgba(8,18,32,.55) 52%, rgba(8,18,32,.92) 100%);
}
.kg-school::after {
	content: ""; position: absolute; left: 0; bottom: 0; height: 3px; width: 0;
	background: var(--kg-gold2, #D6B655); transition: width .35s cubic-bezier(.16,1,.3,1); z-index: 3;
}
.kg-school:hover::after,
.kg-school:focus-visible::after { width: 100%; }

.kg-school__body { position: relative; z-index: 2; padding: 18px 16px; }
.kg-school__num-row { display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
.kg-school__num { font-family: var(--font-display, 'Newsreader', serif); font-size: 14px; color: var(--kg-gold2, #D6B655); }
.kg-school__num-line { width: 20px; height: 1px; background: var(--kg-gold2, #D6B655); }
.kg-school__name {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	color: #fff;
	font-size: 17px; line-height: 1.12; margin: 0 0 9px;
}
.kg-school-go {
	font-size: 12px; font-weight: 700; color: var(--kg-gold2, #D6B655);
	display: inline-flex; align-items: center; gap: 6px;
	transition: gap .2s ease;
}
.kg-school-go i { font-size: 10px; }
.kg-school:hover .kg-school-go,
.kg-school:focus-visible .kg-school-go { gap: 11px; color: #fff; }

@media (max-width: 1024px) {
	.kg-esc { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 760px) {
	.kg-esc { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 480px) {
	.kg-esc { grid-template-columns: 1fr; }
}
@media (min-width: 1920px) {
	.kg-esc { grid-template-columns: repeat(5, 1fr); }
}
</style>
