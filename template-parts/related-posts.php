<?php
$related_count = defined('LETRAS_RELATED_COUNT') ? LETRAS_RELATED_COUNT : 3;
$post_categories = wp_get_post_categories(get_the_ID());
if (empty($post_categories)) return;

$related_query = new WP_Query(array(
    'post__not_in'        => array(get_the_ID()),
    'posts_per_page'      => $related_count,
    'category__in'        => $post_categories,
    'ignore_sticky_posts' => 1,
    'no_found_rows'       => true,
    'orderby'             => 'rand',
));

if (!$related_query->have_posts()) {
    wp_reset_postdata();
    return;
}
?>
<section class="kg-related">
    <div class="kg-related__header">
        <h3 class="kg-related__title"><?php esc_html_e('También te puede interesar', 'letrasflch'); ?></h3>
        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts') ?: home_url('/noticias/'))); ?>" style="font-size:13px;font-weight:700;color:var(--kg-azul);text-decoration:none;"><?php esc_html_e('Ver más', 'letrasflch'); ?> <i class="fas fa-arrow-right" style="font-size:11px;"></i></a>
    </div>
    <div class="kg-related__grid">
        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" style="text-decoration:none;color:var(--kg-ink);display:flex;flex-direction:column;">
                <?php if (has_post_thumbnail()) : ?>
                    <div style="aspect-ratio:16/10;border-radius:8px;overflow:hidden;margin-bottom:12px;background:var(--kg-soft);">
                        <?php the_post_thumbnail('card-thumbnail', ['style' => 'width:100%;height:100%;object-fit:cover;', 'loading' => 'lazy', 'alt' => '']); ?>
                    </div>
                <?php else : ?>
                    <div style="aspect-ratio:16/10;border-radius:8px;margin-bottom:12px;background:linear-gradient(135deg,var(--kg-azul),var(--kg-night));"></div>
                <?php endif; ?>
                <?php
                $rcats = get_the_category();
                if ($rcats) : ?>
                    <span style="font-size:10.5px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:var(--kg-gold);margin-bottom:6px;"><?php echo esc_html($rcats[0]->name); ?></span>
                <?php endif; ?>
                <h4 style="font-family:var(--font-display);font-weight:600;font-size:16px;line-height:1.25;margin:0;"><?php the_title(); ?></h4>
            </a>
        <?php endwhile; ?>
    </div>
</section>
<?php wp_reset_postdata(); ?>
