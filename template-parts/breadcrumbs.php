<?php
/**
 * Template part for displaying breadcrumbs
 * Designed for dark page-header background (#0A1E3C)
 *
 * @package LetrasFLCH
 */

if ( is_front_page() ) {
    return;
}
?>

<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Ruta de navegación', 'letrasflch' ); ?>">
    <a href="<?php echo esc_url( home_url() ); ?>">
        <i class="fas fa-home" aria-hidden="true"></i>
        <span><?php esc_html_e( 'Inicio', 'letrasflch' ); ?></span>
    </a>

    <span class="breadcrumbs__sep" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>

    <?php if ( is_category() ) : ?>

        <span><?php echo esc_html( single_cat_title( '', false ) ); ?></span>

    <?php elseif ( is_single() ) : ?>

        <?php
        $cats = get_the_category();
        if ( $cats ) :
            $cat = $cats[0];
        ?>
            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
                <?php echo esc_html( $cat->name ); ?>
            </a>
            <span class="breadcrumbs__sep" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <?php endif; ?>

        <span class="breadcrumbs__current" aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>

    <?php elseif ( is_page() ) : ?>

        <?php
        $ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
        foreach ( $ancestors as $ancestor ) :
        ?>
            <a href="<?php echo esc_url( get_permalink( $ancestor ) ); ?>">
                <?php echo esc_html( get_the_title( $ancestor ) ); ?>
            </a>
            <span class="breadcrumbs__sep" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <?php endforeach; ?>

        <span class="breadcrumbs__current" aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>

    <?php elseif ( is_search() ) : ?>

        <span class="breadcrumbs__current">
            <?php printf( esc_html__( 'Resultados para: %s', 'letrasflch' ), '<em>' . get_search_query() . '</em>' ); ?>
        </span>

    <?php elseif ( is_tag() ) : ?>

        <span class="breadcrumbs__current">
            <?php printf( esc_html__( 'Etiqueta: %s', 'letrasflch' ), esc_html( single_tag_title( '', false ) ) ); ?>
        </span>

    <?php elseif ( is_author() ) : ?>

        <span class="breadcrumbs__current">
            <?php printf( esc_html__( 'Autor: %s', 'letrasflch' ), esc_html( get_the_author() ) ); ?>
        </span>

    <?php elseif ( is_day() ) : ?>

        <span class="breadcrumbs__current">
            <?php printf( esc_html__( 'Archivo: %s', 'letrasflch' ), get_the_date() ); ?>
        </span>

    <?php elseif ( is_month() ) : ?>

        <span class="breadcrumbs__current">
            <?php printf( esc_html__( 'Archivo: %s', 'letrasflch' ), get_the_date( 'F Y' ) ); ?>
        </span>

    <?php elseif ( is_year() ) : ?>

        <span class="breadcrumbs__current">
            <?php printf( esc_html__( 'Archivo: %s', 'letrasflch' ), get_the_date( 'Y' ) ); ?>
        </span>

    <?php elseif ( is_404() ) : ?>

        <span class="breadcrumbs__current"><?php esc_html_e( 'Página no encontrada', 'letrasflch' ); ?></span>

    <?php endif; ?>
</nav>
