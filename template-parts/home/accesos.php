<?php
/**
 * Template part: Accesos / Centros de producción — spec "Portada FLCH Kingster".
 *
 * Tarjeta blanca elevada que se monta sobre el borde inferior del hero.
 * Datos reales compartidos con el índice del command palette
 * (letras_flch_centros_data() en functions.php).
 *
 * @package LetrasFLCH
 */
$letras_flch_centros = letras_flch_centros_data();
?>
<section class="kg-accesos" aria-label="Accesos rápidos y centros de producción">
	<div class="kg-accesos__wrap">
		<div class="kg-accesos__grid">
			<?php foreach ( $letras_flch_centros as $centro ) : ?>
				<a href="<?php echo esc_url( $centro['href'] ); ?>"
				   target="_blank" rel="noopener noreferrer"
				   class="kg-accesos__item">
					<span class="kg-accesos__icon"><i class="<?php echo esc_attr( $centro['icon'] ); ?>" aria-hidden="true"></i></span>
					<span class="kg-accesos__text">
						<span class="kg-accesos__title"><?php echo esc_html( $centro['title'] ); ?></span>
						<span class="kg-accesos__sub"><?php echo esc_html( $centro['sub'] ); ?></span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<style>
.kg-accesos {
	position: relative;
	z-index: 3;
	margin-top: -92px;
	padding: 0 28px 64px;
}
.kg-accesos__wrap {
	max-width: var(--kg-container, 1200px);
	margin: 0 auto;
}
.kg-accesos__grid {
	background: var(--kg-panel, #fff);
	border: 1px solid var(--kg-line, rgba(26,34,48,.12));
	border-radius: 14px;
	box-shadow: 0 1px 3px rgba(8,18,32,.05), 0 12px 32px rgba(8,18,32,.06);
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	overflow: hidden;
}
.kg-accesos__item {
	display: flex;
	align-items: center;
	gap: 15px;
	padding: 26px 24px;
	text-decoration: none;
	color: var(--kg-ink, #1A2230);
	border-right: 1px solid var(--kg-line, rgba(26,34,48,.12));
	transition: background-color .2s ease;
}
.kg-accesos__item:last-child { border-right: none; }
.kg-accesos__item:hover,
.kg-accesos__item:focus-visible { background: var(--kg-soft, #F4F1E9); }

.kg-accesos__icon {
	width: 50px;
	height: 50px;
	flex: none;
	border-radius: 11px;
	background: rgba(20,59,99,.1);
	color: var(--kg-azul, #143B63);
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 21px;
	transition: background-color .2s ease, color .2s ease, transform .2s cubic-bezier(.16,1,.3,1);
}
.kg-accesos__item:hover .kg-accesos__icon,
.kg-accesos__item:focus-visible .kg-accesos__icon {
	background: var(--kg-azul, #143B63);
	color: #fff;
	transform: scale(1.06);
}

.kg-accesos__text {
	display: flex;
	flex-direction: column;
	line-height: 1.2;
}
.kg-accesos__title { font-weight: 700; font-size: 15px; }
.kg-accesos__sub { font-size: 12.5px; color: var(--kg-muted, #5E6675); margin-top: 2px; }

@media (max-width: 1024px) {
	.kg-accesos__grid { grid-template-columns: 1fr 1fr; }
	.kg-accesos__item:nth-child(2) { border-right: none; }
}
@media (max-width: 760px) {
	.kg-accesos { margin-top: -60px; padding-bottom: 48px; }
}
@media (max-width: 480px) {
	.kg-accesos__grid { grid-template-columns: 1fr; }
	.kg-accesos__item { border-right: none !important; border-bottom: 1px solid var(--kg-line, rgba(26,34,48,.12)); }
	.kg-accesos__item:last-child { border-bottom: none; }
}
</style>
