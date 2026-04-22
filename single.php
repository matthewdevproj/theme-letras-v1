<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package LetrasFLCH
 */

get_header();

while ( have_posts() ) : the_post();

$post_id    = get_the_ID();
$categories = get_the_category();
$tags       = get_the_tags();
$primary_cat = $categories ? $categories[0] : null;

/* ---- Schema.org Article ---- */
$schema = array(
    '@context'      => 'https://schema.org',
    '@type'         => 'Article',
    'headline'      => get_the_title(),
    'datePublished' => get_the_date( 'c' ),
    'dateModified'  => get_the_modified_date( 'c' ),
    'author'        => array(
        '@type' => 'Person',
        'name'  => get_the_author(),
    ),
    'publisher'     => array(
        '@type' => 'Organization',
        'name'  => get_bloginfo( 'name' ),
        'url'   => home_url( '/' ),
    ),
    'url'           => get_permalink(),
    'description'   => wp_trim_words( get_the_excerpt(), 30, '' ),
);
if ( has_post_thumbnail() ) {
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
    if ( $thumb ) {
        $schema['image'] = $thumb[0];
    }
}
if ( $primary_cat ) {
    $schema['articleSection'] = $primary_cat->name;
}
?>
<main id="main" class="site-main" role="main" tabindex="-1">

<script type="application/ld+json">
<?php echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); ?>
</script>

<!-- ============================================================
     PAGE HEADER
     ============================================================ -->
<section class="single-header page-header">
    <div class="container-custom">

        <!-- Categoría -->
        <?php if ( $primary_cat ) : ?>
            <a href="<?php echo esc_url( get_category_link( $primary_cat->term_id ) ); ?>"
               class="archive-header__eyebrow single-header__cat-link">
                <i class="fas fa-folder-open" aria-hidden="true"></i>
                <?php echo esc_html( $primary_cat->name ); ?>
            </a>
        <?php endif; ?>

        <!-- Título -->
        <h1 class="page-title single-header__title animate-fade-in-up">
            <?php the_title(); ?>
        </h1>

        <!-- Meta -->
        <div class="single-header__meta">
            <span class="single-header__meta-item">
                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
            </span>
            <span class="single-header__meta-item">
                <i class="far fa-user" aria-hidden="true"></i>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                   rel="author">
                    <?php the_author(); ?>
                </a>
            </span>
            <?php if ( $categories && count( $categories ) > 1 ) : ?>
                <span class="single-header__meta-item">
                    <i class="fas fa-tags" aria-hidden="true"></i>
                    <?php the_category( ', ' ); ?>
                </span>
            <?php endif; ?>
        </div>

        <?php get_template_part( 'template-parts/breadcrumbs' ); ?>
    </div>
</section>

<!-- ============================================================
     CONTENT AREA
     ============================================================ -->
<div class="single-layout container-custom">

    <!-- ---- MAIN ARTICLE ---- -->
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>

        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
            <figure class="single-featured-image">
                <?php the_post_thumbnail( 'archive-featured', [
                    'class'   => 'single-featured-image__img',
                    'loading' => 'eager',
                    'alt'     => esc_attr( get_the_title() ),
                ] ); ?>
                <?php if ( get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
                    <figcaption class="single-featured-image__caption">
                        <?php echo esc_html( get_post( get_post_thumbnail_id() )->post_excerpt ); ?>
                    </figcaption>
                <?php endif; ?>
            </figure>
        <?php endif; ?>

        <!-- Post Content -->
        <div class="single-content">
            <?php the_content(); ?>

            <?php
            wp_link_pages( array(
                'before'      => '<nav class="single-page-links"><span class="single-page-links__label">'
                                 . esc_html__( 'Páginas:', 'letrasflch' ) . '</span>',
                'after'       => '</nav>',
                'link_before' => '<span class="single-page-links__item">',
                'link_after'  => '</span>',
            ) );
            ?>
        </div>

        <!-- Tags -->
        <?php if ( $tags ) : ?>
            <div class="single-tags">
                <i class="fas fa-tags single-tags__icon" aria-hidden="true"></i>
                <?php foreach ( $tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                       class="single-tag-chip">
                        <?php echo esc_html( $tag->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Share buttons -->
        <div class="single-share">
            <span class="single-share__label">
                <i class="fas fa-share-alt" aria-hidden="true"></i>
                <?php esc_html_e( 'Compartir:', 'letrasflch' ); ?>
            </span>
            <div class="single-share__buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="single-share-btn single-share-btn--facebook"
                   aria-label="<?php esc_attr_e( 'Compartir en Facebook', 'letrasflch' ); ?>">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="single-share-btn single-share-btn--twitter"
                   aria-label="<?php esc_attr_e( 'Compartir en X (Twitter)', 'letrasflch' ); ?>">
                    <i class="fab fa-x-twitter" aria-hidden="true"></i>
                </a>
                <a href="https://wa.me/?text=<?php echo urlencode( get_the_title() . ' — ' . get_permalink() ); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="single-share-btn single-share-btn--whatsapp"
                   aria-label="<?php esc_attr_e( 'Compartir por WhatsApp', 'letrasflch' ); ?>">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                </a>
                <a href="mailto:?subject=<?php echo urlencode( get_the_title() ); ?>&body=<?php echo urlencode( get_permalink() ); ?>"
                   class="single-share-btn single-share-btn--email"
                   aria-label="<?php esc_attr_e( 'Compartir por correo', 'letrasflch' ); ?>">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <!-- Post Navigation -->
        <nav class="single-post-nav" aria-label="<?php esc_attr_e( 'Navegación entre entradas', 'letrasflch' ); ?>">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>

            <div class="single-post-nav__item single-post-nav__item--prev">
                <?php if ( $prev_post ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>"
                       class="single-post-nav__link" rel="prev">
                        <?php if ( has_post_thumbnail( $prev_post->ID ) ) : ?>
                            <div class="single-post-nav__thumb" aria-hidden="true">
                                <?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail', [ 'alt' => '' ] ); ?>
                            </div>
                        <?php endif; ?>
                        <div class="single-post-nav__info">
                            <span class="single-post-nav__direction">
                                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                                <?php esc_html_e( 'Anterior', 'letrasflch' ); ?>
                            </span>
                            <span class="single-post-nav__post-title">
                                <?php echo esc_html( $prev_post->post_title ); ?>
                            </span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>

            <div class="single-post-nav__item single-post-nav__item--next">
                <?php if ( $next_post ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"
                       class="single-post-nav__link single-post-nav__link--next" rel="next">
                        <div class="single-post-nav__info single-post-nav__info--right">
                            <span class="single-post-nav__direction">
                                <?php esc_html_e( 'Siguiente', 'letrasflch' ); ?>
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </span>
                            <span class="single-post-nav__post-title">
                                <?php echo esc_html( $next_post->post_title ); ?>
                            </span>
                        </div>
                        <?php if ( has_post_thumbnail( $next_post->ID ) ) : ?>
                            <div class="single-post-nav__thumb" aria-hidden="true">
                                <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail', [ 'alt' => '' ] ); ?>
                            </div>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Related Posts -->
        <?php get_template_part( 'template-parts/related-posts' ); ?>

        <!-- Comments -->
        <?php if ( comments_open() || get_comments_number() ) : ?>
            <div class="single-comments">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>

    </article><!-- /.single-article -->

    <!-- ---- SIDEBAR ---- -->
    <aside class="sidebar single-sidebar" aria-label="<?php esc_attr_e( 'Contenido relacionado', 'letrasflch' ); ?>">

        <?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>
            <?php dynamic_sidebar( 'post-sidebar' ); ?>
        <?php else : ?>

            <!-- Widget: Últimas noticias -->
            <div class="widget">
                <h3 class="widget-title"><?php esc_html_e( 'Últimas noticias', 'letrasflch' ); ?></h3>
                <?php
                $recent = new WP_Query( array(
                    'posts_per_page'      => 5,
                    'post__not_in'        => array( $post_id ),
                    'ignore_sticky_posts' => 1,
                    'no_found_rows'       => true,
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

            <!-- Widget: Categorías -->
            <div class="widget">
                <h3 class="widget-title"><?php esc_html_e( 'Categorías', 'letrasflch' ); ?></h3>
                <ul>
                    <?php wp_list_categories( array(
                        'title_li'   => '',
                        'show_count' => true,
                        'hide_empty' => true,
                    ) ); ?>
                </ul>
            </div>

        <?php endif; ?>

    </aside>

</div><!-- /.single-layout -->

<?php endwhile; ?>

</main><!-- #main -->

<?php get_footer(); ?>
