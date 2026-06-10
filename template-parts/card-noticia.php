<?php
/**
 * Template part: Tarjeta de noticia
 * Refactorizado con FLCH Design System — Junio 2026
 *
 * Contexto: usada dentro de un loop con .grid-cards
 * Requiere que the_post() haya sido llamado antes.
 *
 * @package LetrasFLCH
 */

$categories = get_the_category();
$cat        = $categories ? $categories[0] : null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flch-card flch-card--news' ); ?> data-flch-component="news-card" data-flch-animate="fade-up">

    <!-- Imagen destacada + badge de categoría -->
    <div class="flch-card__media">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>"
               tabindex="-1"
               aria-hidden="true"
               class="flch-card__img-link">
                <?php the_post_thumbnail( 'large', [
                    'class'   => 'flch-card__img',
                    'loading' => 'lazy',
                    'alt'     => esc_attr( get_the_title() ),
                ] ); ?>
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>"
               class="flch-card__img-link flch-card__img-placeholder"
               tabindex="-1"
               aria-hidden="true">
                <i class="fas fa-newspaper" aria-hidden="true"></i>
            </a>
        <?php endif; ?>

        <?php if ( $cat ) : ?>
            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
               class="flch-badge flch-badge--category"
               title="<?php echo esc_attr( sprintf( 'Ver todas las noticias de %s', $cat->name ) ); ?>">
                <?php echo esc_html( $cat->name ); ?>
            </a>
        <?php endif; ?>
    </div>

    <!-- Cuerpo -->
    <div class="flch-card__body">

        <!-- Metadatos: fecha -->
        <time class="flch-card__date"
              datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
            <i class="far fa-calendar-alt" aria-hidden="true"></i>
            <?php echo esc_html( get_the_date() ); ?>
        </time>

        <!-- Título -->
        <h2 class="flch-card__title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <!-- Extracto -->
        <p class="flch-card__excerpt">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?>
        </p>

        <!-- Leer más con botón FLCH -->
        <a href="<?php the_permalink(); ?>"
           class="flch-btn flch-btn--outline"
           aria-label="<?php echo esc_attr( sprintf(
               /* translators: %s: título del artículo */
               __( 'Leer más sobre: %s', 'letrasflch' ),
               get_the_title()
           ) ); ?>">
            <?php esc_html_e( 'Leer más', 'letrasflch' ); ?>
            <i class="fas fa-arrow-right" aria-hidden="true"></i>
        </a>

    </div>

</article>
