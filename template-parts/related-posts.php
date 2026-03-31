<?php
/**
 * Template part: Entradas relacionadas
 *
 * Contexto: debe llamarse dentro del loop de una entrada individual.
 * Consulta posts de las mismas categorías, excluyendo el actual.
 * Número de posts configurado por la constante LETRAS_RELATED_COUNT.
 *
 * @package LetrasFLCH
 */

// Número de entradas a mostrar
$related_count = defined( 'LETRAS_RELATED_COUNT' ) ? LETRAS_RELATED_COUNT : 3;

// Obtener categorías del post actual
$post_categories = wp_get_post_categories( get_the_ID() );

if ( empty( $post_categories ) ) {
    return; // Sin categorías, no hay base para relacionados
}

$related_query = new WP_Query( array(
    'post__not_in'        => array( get_the_ID() ),
    'posts_per_page'      => $related_count,
    'category__in'        => $post_categories,
    'ignore_sticky_posts' => 1,
    'no_found_rows'       => true, // Optimización: no necesitamos total de páginas
    'orderby'             => 'rand',
) );

if ( ! $related_query->have_posts() ) {
    wp_reset_postdata();
    return;
}
?>

<section class="related-posts" aria-labelledby="related-posts-title">

    <div class="related-posts__header">
        <h2 id="related-posts-title" class="related-posts__title">
            <?php esc_html_e( 'También te puede interesar', 'letrasflch' ); ?>
        </h2>
        <div class="archive-section-divider__line" aria-hidden="true"></div>
    </div>

    <div class="grid-cards">
        <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
            <?php get_template_part( 'template-parts/card-noticia' ); ?>
        <?php endwhile; ?>
    </div>

</section>

<?php wp_reset_postdata(); ?>
