<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package LetrasFLCH
 */

get_header();

// Schema.org for 404
?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "<?php echo esc_js( esc_html__( 'Página no encontrada', 'letrasflch' ) ); ?>",
    "url": "<?php echo esc_js( esc_url( home_url( $_SERVER['REQUEST_URI'] ) ) ); ?>"
}
</script>

<main id="main" class="site-main page-404-main" role="main" tabindex="-1">
    <div class="container-custom">

        <!-- ============================================================
             HERO 404
             ============================================================ -->
        <div class="page-404">

            <!-- Número animado -->
            <div class="page-404__number" aria-hidden="true">404</div>

            <!-- Icono -->
            <div class="page-404__icon" aria-hidden="true">
                <i class="fas fa-map-signs"></i>
            </div>

            <h1 class="page-404__title">
                <?php esc_html_e( 'Página no encontrada', 'letrasflch' ); ?>
            </h1>

            <p class="page-404__text">
                <?php esc_html_e( 'La página que buscas no existe, fue movida o su dirección ha cambiado. Usa el buscador o explora las categorías a continuación.', 'letrasflch' ); ?>
            </p>

            <!-- Search form -->
            <div class="page-404__search">
                <form role="search" method="get" class="search-bar-form page-404__search-form"
                      action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label for="s404" class="sr-only">
                        <?php esc_html_e( 'Buscar en el sitio', 'letrasflch' ); ?>
                    </label>
                    <div class="search-bar-input-wrap">
                        <i class="fas fa-search search-bar-icon" aria-hidden="true"></i>
                        <input type="search"
                               id="s404"
                               class="search-bar-input"
                               name="s"
                               placeholder="<?php esc_attr_e( 'Buscar en el sitio…', 'letrasflch' ); ?>"
                               autocomplete="off">
                        <button type="submit" class="search-bar-submit">
                            <?php esc_html_e( 'Buscar', 'letrasflch' ); ?>
                        </button>
                    </div>
                </form>
            </div>

            <!-- CTA buttons -->
            <div class="page-404__ctas">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                    <i class="fas fa-home" aria-hidden="true"></i>
                    <?php esc_html_e( 'Ir al inicio', 'letrasflch' ); ?>
                </a>
                <a href="javascript:history.back()" class="btn btn-outline-dark">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    <?php esc_html_e( 'Volver atrás', 'letrasflch' ); ?>
                </a>
            </div>

        </div><!-- /.page-404 -->

        <!-- ============================================================
             CATEGORÍAS POPULARES
             ============================================================ -->
        <?php
        $popular_cats = get_categories( array(
            'orderby'    => 'count',
            'order'      => 'DESC',
            'number'     => 8,
            'hide_empty' => true,
        ) );
        if ( $popular_cats ) :
        ?>
        <section class="page-404-categories" aria-labelledby="cats-404-title">
            <h2 id="cats-404-title" class="page-404-section-title">
                <i class="fas fa-folder-open" aria-hidden="true"></i>
                <?php esc_html_e( 'Explorar por categoría', 'letrasflch' ); ?>
            </h2>
            <div class="search-no-results__cat-chips">
                <?php foreach ( $popular_cats as $cat ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                       class="search-cat-chip">
                        <?php echo esc_html( $cat->name ); ?>
                        <span class="search-cat-chip__count"><?php echo absint( $cat->count ); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- ============================================================
             ÚLTIMAS NOTICIAS
             ============================================================ -->
        <?php
        $recent_posts = new WP_Query( array(
            'posts_per_page' => 3,
            'no_found_rows'  => true,
        ) );
        if ( $recent_posts->have_posts() ) :
        ?>
        <section class="page-404-recent" aria-labelledby="recent-404-title">
            <div class="archive-section-divider mb-8">
                <h2 id="recent-404-title" class="archive-section-divider__title">
                    <i class="fas fa-newspaper" aria-hidden="true"></i>
                    <?php esc_html_e( 'Últimas noticias', 'letrasflch' ); ?>
                </h2>
                <div class="archive-section-divider__line" aria-hidden="true"></div>
            </div>
            <div class="grid-cards">
                <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                    <?php get_template_part( 'template-parts/card-noticia' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </section>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
