<?php
/**
 * Single post — Kingster editorial layout
 *
 * @package LetrasFLCH
 */

get_header();

while (have_posts()) : the_post();

$post_id     = get_the_ID();
$categories  = get_the_category();
$tags        = get_the_tags();
$primary_cat = $categories ? $categories[0] : null;
$reading_min = ceil(str_word_count(wp_strip_all_tags(get_the_content())) / 200);
$thumb_url   = has_post_thumbnail() ? get_the_post_thumbnail_url($post_id, 'large') : '';

/* Schema.org Article */
$schema = array(
    '@context'      => 'https://schema.org',
    '@type'         => 'Article',
    'headline'      => get_the_title(),
    'datePublished' => get_the_date('c'),
    'dateModified'  => get_the_modified_date('c'),
    'author'        => array('@type' => 'Person', 'name' => get_the_author()),
    'publisher'     => array('@type' => 'Organization', 'name' => get_bloginfo('name'), 'url' => home_url('/')),
    'url'           => get_permalink(),
    'description'   => wp_trim_words(get_the_excerpt(), 30, ''),
);
if ($thumb_url) $schema['image'] = $thumb_url;
if ($primary_cat) $schema['articleSection'] = $primary_cat->name;
?>
<script type="application/ld+json"><?php echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?></script>

<main id="main" class="site-main" role="main" tabindex="-1">

<!-- Hero editorial -->
<section class="kg-single__hero" style="<?php echo $thumb_url ? '' : ''; ?>">
    <?php if ($thumb_url) : ?>
        <img class="kg-single__hero-img" src="<?php echo esc_url($thumb_url); ?>" alt="" aria-hidden="true" loading="eager">
    <?php endif; ?>
    <div class="kg-single__hero-overlay"></div>
    <div class="kg-single__hero-content">
        <div class="kg-single__hero-meta">
            <?php if ($primary_cat) : ?>
                <span class="kg-badge kg-badge--gold" style="font-size:11px;padding:5px 11px;"><?php echo esc_html($primary_cat->name); ?></span>
            <?php endif; ?>
            <span class="kg-single__hero-date"><i class="fa-regular fa-calendar" aria-hidden="true" style="margin-right:4px;"></i><?php echo esc_html(get_the_date('j M Y')); ?> · <?php echo esc_html($reading_min); ?> min de lectura</span>
        </div>
        <h1 class="kg-single__hero-title"><?php echo esc_html(get_the_title()); ?></h1>
        <?php get_template_part('template-parts/breadcrumbs'); ?>
    </div>
</section>

<!-- Content grid -->
<div class="kg-single__grid">

    <!-- Main article -->
    <article>

        <div class="kg-single__content">
            <?php if (has_excerpt()) : ?>
                <p class="kg-single__excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
            <?php endif; ?>

            <?php the_content(); ?>

            <?php
            wp_link_pages(array(
                'before'      => '<nav style="display:flex;gap:8px;margin-top:28px;font-size:14px;font-weight:600;"><span class="kg-single__toc-title" style="margin:0 8px 0 0;">' . esc_html__('Páginas:', 'letrasflch') . '</span>',
                'after'       => '</nav>',
                'link_before' => '<span style="padding:4px 10px;border:1px solid var(--kg-line);border-radius:6px;">',
                'link_after'  => '</span>',
            ));
            ?>
        </div>

        <!-- Tags -->
        <?php if ($tags) : ?>
            <div style="display:flex;align-items:center;gap:9px;flex-wrap:wrap;margin-top:28px;padding-top:24px;border-top:1px solid var(--kg-line);">
                <i class="fas fa-tags" aria-hidden="true" style="color:var(--kg-muted);font-size:13px;"></i>
                <?php foreach ($tags as $tag) : ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="kg-badge kg-badge--navy" style="text-decoration:none;"><?php echo esc_html($tag->name); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Author -->
        <div style="display:flex;align-items:center;gap:14px;margin-top:28px;padding-top:20px;border-top:1px solid var(--kg-line);">
            <div style="width:44px;height:44px;border-radius:50%;background:var(--kg-soft);display:flex;align-items:center;justify-content:center;color:var(--kg-azul);flex:none;">
                <i class="fas fa-user" aria-hidden="true"></i>
            </div>
            <div>
                <div style="font-weight:700;font-size:14px;"><?php echo esc_html(get_the_author()); ?></div>
                <div style="font-size:12.5px;color:var(--kg-muted);"><?php esc_html_e('Facultad de Letras y Ciencias Humanas', 'letrasflch'); ?></div>
            </div>
        </div>

        <!-- Post navigation -->
        <nav style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:32px;" aria-label="<?php esc_attr_e('Navegación entre entradas', 'letrasflch'); ?>">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            <?php if ($prev_post) : ?>
                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" rel="prev" style="text-decoration:none;padding:16px;border:1px solid var(--kg-line);border-radius:10px;">
                    <div style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:var(--kg-muted);margin-bottom:4px;"><i class="fas fa-arrow-left" aria-hidden="true" style="margin-right:4px;"></i><?php esc_html_e('Anterior', 'letrasflch'); ?></div>
                    <div style="font-weight:600;font-size:14px;color:var(--kg-ink);"><?php echo esc_html($prev_post->post_title); ?></div>
                </a>
            <?php endif; ?>
            <?php if ($next_post) : ?>
                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="next" style="text-decoration:none;padding:16px;border:1px solid var(--kg-line);border-radius:10px;text-align:right;">
                    <div style="font-size:11px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:var(--kg-muted);margin-bottom:4px;"><?php esc_html_e('Siguiente', 'letrasflch'); ?><i class="fas fa-arrow-right" aria-hidden="true" style="margin-left:4px;"></i></div>
                    <div style="font-weight:600;font-size:14px;color:var(--kg-ink);"><?php echo esc_html($next_post->post_title); ?></div>
                </a>
            <?php endif; ?>
        </nav>

    </article>

    <!-- Sidebar (TOC + Share) -->
    <aside class="kg-single__sidebar">
        <div class="kg-single__toc-title"><?php esc_html_e('En este artículo', 'letrasflch'); ?></div>
        <div class="kg-single__toc" id="kg-toc"></div>

        <div class="kg-share__title"><?php esc_html_e('Compartir', 'letrasflch'); ?></div>
        <div class="kg-share__list">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="kg-share__item" aria-label="<?php esc_attr_e('Compartir en Facebook', 'letrasflch'); ?>"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="kg-share__item" aria-label="<?php esc_attr_e('Compartir en X', 'letrasflch'); ?>"><i class="fab fa-x-twitter"></i></a>
            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' — ' . get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="kg-share__item" aria-label="<?php esc_attr_e('Compartir por WhatsApp', 'letrasflch'); ?>"><i class="fab fa-whatsapp"></i></a>
            <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="kg-share__item" aria-label="<?php esc_attr_e('Compartir por correo', 'letrasflch'); ?>"><i class="fas fa-envelope"></i></a>
        </div>
    </aside>

</div>

<!-- Related posts -->
<?php get_template_part('template-parts/related-posts'); ?>

<!-- Comments -->
<?php if (comments_open() || get_comments_number()) : ?>
    <div class="kg-comments">
        <h3 class="kg-comments__title"><?php esc_html_e('Comentarios', 'letrasflch'); ?></h3>
        <?php comments_template( '/template-parts/comments.php' ); ?>
    </div>
<?php endif; ?>

</main>

<?php
endwhile;
get_footer();
