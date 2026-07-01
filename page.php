<?php
/**
 * Page template — Kingster editorial design
 *
 * @package LetrasFLCH
 */

get_header();
?>

<main id="main" class="site-main" role="main" tabindex="-1">

<?php while (have_posts()) : the_post(); ?>

<section class="kg-page-header">
    <div class="kg-container">
        <h1 class="kg-page-header__title"><?php the_title(); ?></h1>
        <?php get_template_part('template-parts/breadcrumbs'); ?>
    </div>
</section>

<section style="padding:44px 0 48px;">
    <div class="kg-container">
        <div class="kg-single__grid">
            <div>
                <?php if (has_post_thumbnail() && !get_post_meta(get_the_ID(), 'hide_featured_image', true)) : ?>
                    <figure class="kg-card" style="margin-bottom:24px;">
                        <div style="aspect-ratio:16/9;overflow:hidden;">
                            <?php the_post_thumbnail('large', ['style' => 'width:100%;height:100%;object-fit:cover;']); ?>
                        </div>
                    </figure>
                <?php endif; ?>

                <div class="kg-single__content">
                    <?php the_content(); ?>

                    <?php
                    wp_link_pages(array(
                        'before' => '<div style="display:flex;gap:8px;margin-top:28px;font-size:14px;font-weight:600;">' . esc_html__('Páginas:', 'letrasflch'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </div>

            <aside class="kg-single__sidebar">
                <?php if (is_active_sidebar('blog-sidebar')) : ?>
                    <?php dynamic_sidebar('blog-sidebar'); ?>
                <?php else : ?>
                    <div style="font-size:11px;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--kg-muted);margin-bottom:14px;"><?php esc_html_e('Compartir', 'letrasflch'); ?></div>
                    <div class="kg-share__list">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="kg-share__item" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener" class="kg-share__item" aria-label="X (Twitter)"><i class="fab fa-x-twitter"></i></a>
                        <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' — ' . get_permalink()); ?>" target="_blank" rel="noopener" class="kg-share__item" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</section>

<?php endwhile; ?>

</main>

<?php get_footer(); ?>
