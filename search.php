<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package LetrasFLCH
 */

get_header();

$search_query = get_search_query();
$found_posts  = $wp_query->found_posts;
$total_pages  = $wp_query->max_num_pages;
$current_page = max( 1, get_query_var( 'paged' ) );

/**
 * Resalta el término de búsqueda dentro de un texto.
 * Sólo aplica a contenido que ya pasó por esc_html o similar.
 *
 * @param string $text  Texto plano.
 * @param string $query Término de búsqueda.
 * @return string HTML con <mark> alrededor de las coincidencias.
 */
function letras_flch_highlight( $text, $query ) {
    if ( empty( $query ) ) {
        return esc_html( $text );
    }
    $escaped = esc_html( $text );
    $pattern = '/(' . preg_quote( esc_html( $query ), '/' ) . ')/iu';
    return preg_replace( $pattern, '<mark class="search-highlight">$1</mark>', $escaped );
}
?>

<!-- ============================================================
     PAGE HEADER
     ============================================================ -->
<section class="search-page-header page-header">
    <div class="container-custom">

        <div class="archive-header__eyebrow">
            <i class="fas fa-search" aria-hidden="true"></i>
            <span>
                <?php echo $found_posts > 0
                    ? esc_html__( 'Resultados de búsqueda', 'letrasflch' )
                    : esc_html__( 'Sin resultados', 'letrasflch' );
                ?>
            </span>
        </div>

        <?php if ( ! empty( $search_query ) ) : ?>
            <h1 class="page-title animate-fade-in-up">
                &ldquo;<?php echo esc_html( $search_query ); ?>&rdquo;
            </h1>
            <p class="archive-header__count">
                <?php if ( $found_posts > 0 ) :
                    printf(
                        esc_html( _n(
                            '%s resultado encontrado',
                            '%s resultados encontrados',
                            $found_posts,
                            'letrasflch'
                        ) ),
                        number_format_i18n( $found_posts )
                    );
                    if ( $total_pages > 1 ) :
                        echo ' &mdash; ';
                        printf(
                            esc_html__( 'Página %1$d de %2$d', 'letrasflch' ),
                            $current_page,
                            $total_pages
                        );
                    endif;
                else :
                    esc_html_e( 'No se encontraron coincidencias.', 'letrasflch' );
                endif; ?>
            </p>
        <?php else : ?>
            <h1 class="page-title animate-fade-in-up">
                <?php esc_html_e( '¿Qué estás buscando?', 'letrasflch' ); ?>
            </h1>
        <?php endif; ?>

        <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
    </div>
</section>

<!-- ============================================================
     SEARCH BAR
     ============================================================ -->
<section class="search-bar-section" aria-label="<?php esc_attr_e( 'Formulario de búsqueda', 'letrasflch' ); ?>">
    <div class="container-custom">
        <form role="search" method="get" class="search-bar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label for="search-results-input" class="sr-only">
                <?php esc_html_e( 'Buscar en el sitio', 'letrasflch' ); ?>
            </label>
            <div class="search-bar-input-wrap">
                <i class="fas fa-search search-bar-icon" aria-hidden="true"></i>
                <input type="search"
                       id="search-results-input"
                       class="search-bar-input"
                       name="s"
                       value="<?php echo esc_attr( $search_query ); ?>"
                       placeholder="<?php esc_attr_e( 'Escribe tu búsqueda…', 'letrasflch' ); ?>"
                       autocomplete="off">
                <?php if ( ! empty( $search_query ) ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                       class="search-bar-clear"
                       aria-label="<?php esc_attr_e( 'Limpiar búsqueda', 'letrasflch' ); ?>">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
                <button type="submit" class="search-bar-submit">
                    <?php esc_html_e( 'Buscar', 'letrasflch' ); ?>
                </button>
            </div>

            <!-- Filtros adicionales -->
            <div class="search-bar-filters">
                <div class="search-bar-filter-group">
                    <label for="sf-post-type" class="search-bar-filter-label">
                        <?php esc_html_e( 'Tipo', 'letrasflch' ); ?>
                    </label>
                    <select id="sf-post-type" name="post_type" class="search-bar-select">
                        <option value=""><?php esc_html_e( 'Todos', 'letrasflch' ); ?></option>
                        <?php
                        $post_types = get_post_types( [ 'public' => true ], 'objects' );
                        foreach ( $post_types as $pt ) :
                            if ( in_array( $pt->name, [ 'attachment' ], true ) ) continue;
                        ?>
                            <option value="<?php echo esc_attr( $pt->name ); ?>"
                                <?php selected( isset( $_GET['post_type'] ) ? sanitize_key( $_GET['post_type'] ) : '', $pt->name ); ?>>
                                <?php echo esc_html( $pt->labels->singular_name ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="search-bar-filter-group">
                    <label for="sf-orderby" class="search-bar-filter-label">
                        <?php esc_html_e( 'Ordenar', 'letrasflch' ); ?>
                    </label>
                    <select id="sf-orderby" name="orderby" class="search-bar-select">
                        <option value="relevance"><?php esc_html_e( 'Relevancia', 'letrasflch' ); ?></option>
                        <option value="date"
                            <?php selected( isset( $_GET['orderby'] ) ? sanitize_key( $_GET['orderby'] ) : '', 'date' ); ?>>
                            <?php esc_html_e( 'Más reciente', 'letrasflch' ); ?>
                        </option>
                        <option value="title"
                            <?php selected( isset( $_GET['orderby'] ) ? sanitize_key( $_GET['orderby'] ) : '', 'title' ); ?>>
                            <?php esc_html_e( 'Título A-Z', 'letrasflch' ); ?>
                        </option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- ============================================================
     MAIN CONTENT
     ============================================================ -->
<main id="main" class="site-main archive-main" role="main" tabindex="-1">
    <div class="container-custom">

        <?php if ( have_posts() ) : ?>

            <div class="archive-layout">

                <!-- Results column -->
                <div class="archive-posts">

                    <!-- Results list -->
                    <div class="search-results-list">
                        <?php while ( have_posts() ) : the_post();

                            $cats         = get_the_category();
                            $post_type_label = letras_flch_get_post_type_label();
                        ?>

                        <article id="post-<?php the_ID(); ?>"
                                 <?php post_class( 'search-result-item group' ); ?>>

                            <!-- Thumbnail -->
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="search-result-item__thumb">
                                    <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                        <?php the_post_thumbnail( 'card-thumbnail', [
                                            'class'   => 'search-result-item__img',
                                            'loading' => 'lazy',
                                            'alt'     => esc_attr( get_the_title() ),
                                        ] ); ?>
                                    </a>
                                    <span class="search-result-item__type-badge">
                                        <?php echo esc_html( $post_type_label ); ?>
                                    </span>
                                </div>
                            <?php else : ?>
                                <div class="search-result-item__thumb search-result-item__thumb--placeholder">
                                    <span class="search-result-item__type-badge">
                                        <?php echo esc_html( $post_type_label ); ?>
                                    </span>
                                    <i class="fas fa-file-alt" aria-hidden="true"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Content -->
                            <div class="search-result-item__body">

                                <!-- Meta -->
                                <div class="search-result-item__meta">
                                    <span>
                                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                            <?php echo esc_html( get_the_date() ); ?>
                                        </time>
                                    </span>
                                    <?php if ( $cats ) : ?>
                                        <span>
                                            <i class="far fa-folder-open" aria-hidden="true"></i>
                                            <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>"
                                               class="search-result-item__cat">
                                                <?php echo esc_html( $cats[0]->name ); ?>
                                            </a>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Title with highlight -->
                                <h2 class="search-result-item__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo letras_flch_highlight( get_the_title(), $search_query ); ?>
                                    </a>
                                </h2>

                                <!-- Excerpt with highlight -->
                                <p class="search-result-item__excerpt">
                                    <?php echo letras_flch_highlight(
                                        wp_trim_words( get_the_excerpt(), 25, '...' ),
                                        $search_query
                                    ); ?>
                                </p>

                                <!-- Read more -->
                                <a href="<?php the_permalink(); ?>"
                                   class="search-result-item__link"
                                   aria-label="<?php echo esc_attr( sprintf(
                                       __( 'Leer: %s', 'letrasflch' ),
                                       get_the_title()
                                   ) ); ?>">
                                    <?php esc_html_e( 'Ver más', 'letrasflch' ); ?>
                                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                </a>

                            </div>
                        </article>

                        <?php endwhile; ?>
                    </div><!-- /.search-results-list -->

                    <!-- Pagination -->
                    <?php if ( $total_pages > 1 ) : ?>
                        <nav class="pagination" aria-label="<?php esc_attr_e( 'Navegación de páginas', 'letrasflch' ); ?>">
                            <?php
                            echo paginate_links( array(
                                'total'     => $total_pages,
                                'current'   => $current_page,
                                'prev_text' => '<i class="fas fa-chevron-left" aria-hidden="true"></i>'
                                               . '<span class="sr-only">' . esc_html__( 'Anterior', 'letrasflch' ) . '</span>',
                                'next_text' => '<span class="sr-only">' . esc_html__( 'Siguiente', 'letrasflch' ) . '</span>'
                                               . '<i class="fas fa-chevron-right" aria-hidden="true"></i>',
                                'type'      => 'list',
                            ) );
                            ?>
                        </nav>
                    <?php endif; ?>

                </div><!-- /.archive-posts -->

                <!-- Sidebar -->
                <aside class="sidebar archive-sidebar" aria-label="<?php esc_attr_e( 'Explorar contenido', 'letrasflch' ); ?>">

                    <!-- Widget: Nueva búsqueda (hidden — ya hay search bar arriba) -->

                    <!-- Widget: Categorías -->
                    <div class="widget">
                        <h3 class="widget-title">
                            <i class="fas fa-tags" aria-hidden="true"></i>
                            <?php esc_html_e( 'Categorías', 'letrasflch' ); ?>
                        </h3>
                        <ul>
                            <?php wp_list_categories( array(
                                'title_li'   => '',
                                'show_count' => true,
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'number'     => 8,
                                'hide_empty' => true,
                            ) ); ?>
                        </ul>
                    </div>

                    <!-- Widget: Últimas noticias -->
                    <div class="widget">
                        <h3 class="widget-title">
                            <i class="fas fa-newspaper" aria-hidden="true"></i>
                            <?php esc_html_e( 'Últimas noticias', 'letrasflch' ); ?>
                        </h3>
                        <?php
                        $recent = new WP_Query( array(
                            'posts_per_page'      => 4,
                            'ignore_sticky_posts' => 1,
                        ) );
                        if ( $recent->have_posts() ) : ?>
                            <ul class="widget-posts-list">
                                <?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
                                    <li class="widget-post-item">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <a href="<?php the_permalink(); ?>" class="widget-post-thumb" tabindex="-1" aria-hidden="true">
                                                <?php the_post_thumbnail( 'thumbnail', [
                                                    'class'   => 'widget-post-img',
                                                    'loading' => 'lazy',
                                                    'alt'     => '',
                                                ] ); ?>
                                            </a>
                                        <?php endif; ?>
                                        <div class="widget-post-info">
                                            <a href="<?php the_permalink(); ?>" class="widget-post-title">
                                                <?php the_title(); ?>
                                            </a>
                                            <time class="widget-post-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                                <?php echo esc_html( get_the_date() ); ?>
                                            </time>
                                        </div>
                                    </li>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                </aside>

            </div><!-- /.archive-layout -->

        <?php else : ?>

            <!-- ============================================================
                 NO RESULTS STATE
                 ============================================================ -->
            <div class="search-no-results">

                <div class="search-no-results__icon" aria-hidden="true">
                    <i class="fas fa-search"></i>
                </div>

                <h2 class="search-no-results__title">
                    <?php if ( ! empty( $search_query ) ) :
                        printf(
                            /* translators: %s: search term */
                            esc_html__( 'Sin resultados para &ldquo;%s&rdquo;', 'letrasflch' ),
                            esc_html( $search_query )
                        );
                    else :
                        esc_html_e( 'Ingresa un término de búsqueda', 'letrasflch' );
                    endif; ?>
                </h2>

                <p class="search-no-results__text">
                    <?php esc_html_e( 'Intenta con palabras más generales, revisa la ortografía o usa sinónimos.', 'letrasflch' ); ?>
                </p>

                <!-- Tips -->
                <div class="search-no-results__tips">
                    <h3 class="search-no-results__tips-title">
                        <i class="fas fa-lightbulb" aria-hidden="true"></i>
                        <?php esc_html_e( 'Sugerencias', 'letrasflch' ); ?>
                    </h3>
                    <ul>
                        <li><?php esc_html_e( 'Verifica la ortografía de las palabras clave.', 'letrasflch' ); ?></li>
                        <li><?php esc_html_e( 'Usa términos más cortos o generales.', 'letrasflch' ); ?></li>
                        <li><?php esc_html_e( 'Prueba con palabras relacionadas o sinónimos.', 'letrasflch' ); ?></li>
                        <li><?php esc_html_e( 'Elimina los filtros adicionales y vuelve a buscar.', 'letrasflch' ); ?></li>
                    </ul>
                </div>

                <!-- CTAs -->
                <div class="search-no-results__actions">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/' ) ); ?>"
                       class="flch-btn flch-btn--primary">
                        <i class="fas fa-newspaper" aria-hidden="true"></i>
                        <?php esc_html_e( 'Ver todas las noticias', 'letrasflch' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                       class="flch-btn flch-btn--outline">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <?php esc_html_e( 'Ir al inicio', 'letrasflch' ); ?>
                    </a>
                </div>

                <!-- Popular categories -->
                <div class="search-no-results__categories">
                    <h3 class="search-no-results__tips-title">
                        <?php esc_html_e( 'Explorar por categoría', 'letrasflch' ); ?>
                    </h3>
                    <div class="search-no-results__cat-chips">
                        <?php
                        $popular_cats = get_categories( array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'number'     => 8,
                            'hide_empty' => true,
                        ) );
                        foreach ( $popular_cats as $cat ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                               class="search-cat-chip">
                                <?php echo esc_html( $cat->name ); ?>
                                <span class="search-cat-chip__count"><?php echo absint( $cat->count ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
