<?php
/**
 * Template part: Revistas Académicas — spec "Portada FLCH Kingster".
 *
 * Carrusel Splide (perPage responsivo 5/3/2). Datos reales compartidos con
 * el índice del command palette (letras_flch_revistas_data() en functions.php).
 *
 * @package LetrasFLCH
 */
$letras_flch_revistas = letras_flch_revistas_data();
?>
<div class="kg-div kg-reveal" aria-hidden="true"><span class="kg-div__num">02</span><span class="kg-div__lbl">Producción editorial</span><span class="kg-div__line"></span></div>
<section id="revistas" class="kg-sec kg-sec--tight" aria-label="Revistas Académicas">
	<div class="kg-sec__head kg-reveal">
		<div>
			<div class="kg-sec__eyebrow">Producción editorial indexada</div>
			<h2 class="kg-sec__title">Revistas Académicas</h2>
		</div>
		<div class="kg-banner__nav">
			<button type="button" class="kg-revnav kg-rev-prev" aria-label="Revistas anteriores"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
			<button type="button" class="kg-revnav kg-rev-next" aria-label="Revistas siguientes"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
		</div>
	</div>

	<div class="kg-rev-splide splide kg-reveal" aria-label="Revistas académicas">
		<div class="splide__track">
			<ul class="splide__list">
				<?php foreach ( $letras_flch_revistas as $revista ) : ?>
					<li class="splide__slide">
						<a href="<?php echo esc_url( $revista['href'] ); ?>" target="_blank" rel="noopener noreferrer" class="kg-revcard">
							<div class="kg-rev-cover" style="background-image:linear-gradient(155deg, <?php echo esc_attr( $revista['c1'] ); ?>, <?php echo esc_attr( $revista['c2'] ); ?>)">
								<span class="kg-rev-issn"><?php echo esc_html( $revista['issn'] ); ?></span>
								<span class="kg-rev-short"><?php echo esc_html( $revista['short'] ); ?></span>
							</div>
							<h3 class="kg-rev-name"><?php echo esc_html( $revista['name'] ); ?></h3>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<style>
.kg-revcard { text-decoration: none; color: var(--kg-ink, #1A2230); display: flex; flex-direction: column; }
.kg-rev-cover {
	aspect-ratio: 3/4; border-radius: 10px; overflow: hidden; position: relative;
	display: flex; align-items: flex-end; padding: 18px;
	background-size: cover;
	box-shadow: 0 16px 36px rgba(8,18,32,.2);
	transition: transform .35s cubic-bezier(.16,1,.3,1), box-shadow .35s ease;
}
.kg-revcard:hover .kg-rev-cover,
.kg-revcard:focus-visible .kg-rev-cover {
	transform: translateY(-8px) scale(1.02);
	box-shadow: 0 22px 44px rgba(8,18,32,.22);
}
.kg-rev-issn {
	position: absolute; top: 14px; right: 14px;
	font-family: 'JetBrains Mono', monospace; font-size: 9.5px; font-weight: 600; letter-spacing: .04em;
	color: #fff; background: rgba(0,0,0,.28); padding: 4px 8px; border-radius: 5px;
}
.kg-rev-short {
	font-family: var(--font-display, 'Newsreader', serif); font-style: normal; font-size: 30px; line-height: 1;
	color: #fff; text-shadow: 0 2px 14px rgba(0,0,0,.3);
}
.kg-rev-name {
	font-family: var(--font-display, 'Newsreader', serif); font-weight: 600;
	font-size: 16px; line-height: 1.15; margin: 14px 0 4px;
	transition: color .2s ease;
}
.kg-revcard:hover .kg-rev-name,
.kg-revcard:focus-visible .kg-rev-name { color: var(--kg-azul, #143B63); }
</style>
