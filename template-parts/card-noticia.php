<?php
$categories = get_the_category();
$cat        = $categories ? $categories[0] : null;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('kg-card'); ?> data-kg-animate="fade-up">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php echo esc_url(get_permalink()); ?>" class="kg-card__thumb" tabindex="-1" aria-hidden="true">
            <?php the_post_thumbnail('large', ['style' => 'width:100%;height:100%;object-fit:cover;', 'loading' => 'lazy', 'alt' => esc_attr(get_the_title())]); ?>
        </a>
    <?php else : ?>
        <div style="aspect-ratio:16/10;background:linear-gradient(135deg,var(--kg-azul),var(--kg-night));display:flex;align-items:center;justify-content:center;">
            <i class="fas fa-newspaper" style="font-size:32px;color:rgba(255,255,255,.3);" aria-hidden="true"></i>
        </div>
    <?php endif; ?>
    <div class="kg-card__body">
        <?php if ($cat) : ?>
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:7px;">
                <span class="kg-badge kg-badge--gold"><?php echo esc_html($cat->name); ?></span>
                <span class="kg-card__meta"><i class="fa-regular fa-calendar" aria-hidden="true"></i><?php echo esc_html(get_the_date('j M Y')); ?></span>
            </div>
        <?php endif; ?>
        <h2 class="kg-card__title" style="font-size:17px;margin:0 0 8px;">
            <a href="<?php echo esc_url(get_permalink()); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a>
        </h2>
        <p class="kg-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18, '...')); ?></p>
        <a href="<?php echo esc_url(get_permalink()); ?>" class="kg-card__link">
            <?php esc_html_e('Leer más', 'letrasflch'); ?> <i class="fas fa-arrow-right" style="font-size:11px;"></i>
        </a>
    </div>
</article>
