<?php
/**
 * searchform.php — formulario de búsqueda estándar de WordPress.
 *
 * Usado por get_search_form() (widgets/bloques núcleo de búsqueda). No
 * existía en el tema — sin este archivo, WordPress cae al markup por
 * defecto sin estilo del core en vez del diseño Kingster.
 *
 * @package LetrasFLCH
 */
$letras_flch_search_id = wp_unique_id( 'kg-search-' );
?>
<form role="search" method="get" class="kg-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $letras_flch_search_id ); ?>" class="screen-reader-text">
		<?php esc_html_e( 'Buscar en el sitio', 'letrasflch' ); ?>
	</label>
	<div class="kg-searchform__field">
		<i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
		<input
			type="search"
			id="<?php echo esc_attr( $letras_flch_search_id ); ?>"
			class="kg-input"
			placeholder="<?php esc_attr_e( 'Buscar noticias, escuelas, investigadores…', 'letrasflch' ); ?>"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			name="s"
		/>
	</div>
	<button type="submit" class="kg-btn kg-btn--gold">
		<?php esc_html_e( 'Buscar', 'letrasflch' ); ?>
	</button>
</form>

<style>
.kg-searchform { display: flex; gap: 10px; align-items: stretch; }
.kg-searchform__field { position: relative; flex: 1; }
.kg-searchform__field i {
	position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
	color: var(--kg-azul, #143B63); font-size: 14px; pointer-events: none;
}
.kg-searchform__field .kg-input { padding-left: 38px; }
</style>
