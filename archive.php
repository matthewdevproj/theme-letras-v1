<?php
/**
 * The template for displaying archive pages
 *
 * Handles: category, tag, date, author archives.
 * For the blog posts page (/noticias/ if set as static front page),
 * WordPress uses home.php → index.php instead.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package LetrasFLCH
 */

get_header();

$found_posts  = $wp_query->found_posts;
$total_pages  = $wp_query->max_num_pages;
$current_page = max( 1, get_query_var( 'paged' ) );

/* ---- Determine archive type label ---- */
if ( is_category() ) {
    $archive_type  = esc_html__( 'Categoría', 'letrasflch' );
    $archive_icon  = 'fas fa-folder-open';
    $archive_label = single_cat_title( '', false );
    $archive_desc  = category_description();
} elseif ( is_tag() ) {
    $archive_type  = esc_html__( 'Etiqueta', 'letrasflch' );
    $archive_icon  = 'fas fa-tag';
    $archive_label = single_tag_title( '', false );
    $archive_desc  = tag_description();
} elseif ( is_author() ) {
    $archive_type  = esc_html__( 'Autor', 'letrasflch' );
    $archive_icon  = 'far fa-user';
    $archive_label = get_the_author();
    $archive_desc  = get_the_author_meta( 'description' );
} elseif ( is_year() ) {
    $archive_type  = esc_html__( 'Archivo', 'letrasflch' );
    $archive_icon  = 'far fa-calendar-alt';
    $archive_label = get_the_date( 'Y' );
    $archive_desc  = '';
} elseif ( is_month() ) {
    $archive_type  = esc_html__( 'Archivo', 'letrasflch' );
    $archive_icon  = 'far fa-calendar-alt';
    $archive_label = get_the_date( 'F Y' );
    $archive_desc  = '';
} elseif ( is_day() ) {
    $archive_type  = esc_html__( 'Archivo', 'letrasflch' );
    $archive_icon  = 'far fa-calendar-alt';
    $archive_label = get_the_date();
    $archive_desc  = '';
} else {
    $archive_type  = esc_html__( 'Noticias', 'letrasflch' );
    $archive_icon  = 'fas fa-newspaper';
    $archive_label = esc_html__( 'Noticias y Eventos', 'letrasflch' );
    $archive_desc  = '';
}
?>

<!-- ================================================ -->
<!-- PAGE HEADER                                        -->
<!-- ================================================ -->
<section class="page-header">
    <div class="container-custom">

        <div class="archive-header__eyebrow">
            <i class="<?php echo esc_attr( $archive_icon ); ?>" aria-hidden="true"></i>
            <span><?php echo $archive_type; ?></span>
        </div>

        <h1 class="page-title animate-fade-in-up">
            <?php echo esc_html( $archive_label ); ?>
        </h1>

        <?php if ( ! empty( $archive_desc ) ) : ?>
            <p class="archive-header__desc"><?php echo wp_kses_post( $archive_desc ); ?></p>
        <?php endif; ?>

        <p class="archive-header__count">
            <?php
            printf(
                esc_html( _n(
                    '%s publicación encontrada',
                    '%s publicaciones encontradas',
                    $found_posts,
                    'letrasflch'
                ) ),
                number_format_i18n( $found_posts )
            );
            if ( $total_pages > 1 ) {
                echo ' &mdash; ';
                printf(
                    esc_html__( 'Página %1$d de %2$d', 'letrasflch' ),
                    $current_page,
                    $total_pages
                );
            }
            ?>
        </p>

        <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
    </div>
</section>

<!-- ================================================ -->
<!-- MAIN CONTENT                                       -->
<!-- ================================================ -->
<main id="main" class="site-main archive-main" role="main" tabindex="-1">
    <div class="container-custom">
        <div class="archive-layout">

            <!-- ---- Posts Column ---- -->
            <div class="archive-posts">

                <?php if ( have_posts() ) : ?>

                    <?php
                    /*
                     * First post: displayed as a featured "hero" card.
                     * Remaining posts fill the card grid below.
                     */
                    the_post();
                    ?>

                    <!-- Featured Article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-featured group' ); ?>>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="archive-featured__image">
                                <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                    <?php the_post_thumbnail( 'large', [
                                        'class'   => 'archive-featured__img',
                                        'loading' => 'eager',
                                        'alt'     => esc_attr( get_the_title() ),
                                    ] ); ?>
                                </a>
                                <div class="archive-featured__overlay" aria-hidden="true"></div>
                                <span class="archive-featured__label">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <?php esc_html_e( 'Destacado', 'letrasflch' ); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="archive-featured__body">

                            <?php
                            $f_cats = get_the_category();
                            if ( $f_cats ) :
                                $f_cat = $f_cats[0];
                            ?>
                                <a href="<?php echo esc_url( get_category_link( $f_cat->term_id ) ); ?>"
                                   class="archive-featured__cat">
                                    <?php echo esc_html( $f_cat->name ); ?>
                                </a>
                            <?php endif; ?>

                            <h2 class="archive-featured__title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="archive-featured__meta">
                                <span>
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </time>
                                </span>
                                <span>
                                    <i class="far fa-user" aria-hidden="true"></i>
                                    <?php the_author(); ?>
                                </span>
                            </div>

                            <p class="archive-featured__excerpt">
                                <?php echo esc_html( wp_trim_words( get_the_excerpt(), 35, '...' ) ); ?>
                            </p>

                            <a href="<?php the_permalink(); ?>" class="archive-featured__link">
                                <?php esc_html_e( 'Leer artículo completo', 'letrasflch' ); ?>
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>

                        </div>
                    </article>

                    <?php if ( have_posts() ) : ?>

                        <!-- Section divider -->
                        <div class="archive-section-divider">
                            <h3 class="archive-section-divider__title">
                                <?php esc_html_e( 'Más noticias', 'letrasflch' ); ?>
                            </h3>
                            <div class="archive-section-divider__line" aria-hidden="true"></div>
                        </div>

                        <!-- Cards grid -->
                        <div class="grid-cards">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'template-parts/card-noticia' ); ?>
                            <?php endwhile; ?>
                        </div>

                    <?php endif; ?>

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

                <?php else : ?>

                    <!-- Empty state -->
                    <div class="archive-empty">
                        <div class="archive-empty__icon">
                            <i class="fas fa-newspaper" aria-hidden="true"></i>
                        </div>
                        <h2 class="archive-empty__title">
                            <?php esc_html_e( 'No se encontraron publicaciones', 'letrasflch' ); ?>
                        </h2>
                        <p class="archive-empty__text">
                            <?php esc_html_e( 'En este momento no hay publicaciones disponibles en esta sección. Explora otras categorías o vuelve al inicio.', 'letrasflch' ); ?>
                        </p>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <?php esc_html_e( 'Volver al inicio', 'letrasflch' ); ?>
                        </a>
                    </div>

                <?php endif; ?>

            </div><!-- /.archive-posts -->

            <!-- ---- Sidebar ---- -->
            <aside class="sidebar archive-sidebar" aria-label="<?php esc_attr_e( 'Contenido relacionado', 'letrasflch' ); ?>">

                <?php if ( is_active_sidebar( 'archive-sidebar' ) ) : ?>
                    <?php dynamic_sidebar( 'archive-sidebar' ); ?>
                <?php else : ?>

                    <!-- Widget: Buscar -->
                    <div class="widget">
                        <h3 class="widget-title"><?php esc_html_e( 'Buscar', 'letrasflch' ); ?></h3>
                        <?php get_search_form(); ?>
                    </div>

                    <!-- Widget: Categorías -->
                    <div class="widget">
                        <h3 class="widget-title"><?php esc_html_e( 'Categorías', 'letrasflch' ); ?></h3>
                        <ul>
                            <?php wp_list_categories( array(
                                'title_li'   => '',
                                'show_count' => true,
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'hide_empty' => true,
                            ) ); ?>
                        </ul>
                    </div>

                    <!-- Widget: Archivo mensual -->
                    <div class="widget">
                        <h3 class="widget-title"><?php esc_html_e( 'Archivo', 'letrasflch' ); ?></h3>
                        <ul>
                            <?php wp_get_archives( array(
                                'type'            => 'monthly',
                                'show_post_count' => true,
                                'limit'           => 12,
                            ) ); ?>
                        </ul>
                    </div>

                <?php endif; ?>

            </aside>

        </div>
    </div>
</main>

<?php get_footer(); ?>
