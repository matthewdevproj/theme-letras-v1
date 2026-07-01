<?php
/**
 * 404 template — Kingster editorial design
 *
 * @package LetrasFLCH
 */

get_header();
?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "<?php echo esc_js(esc_html__('Página no encontrada', 'letrasflch')); ?>",
    "url": "<?php echo esc_js(esc_url(home_url(add_query_arg(array())))); ?>"
}
</script>

<main id="main" class="site-main" role="main" tabindex="-1">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <div class="kg-404">
        <div class="kg-404__code" aria-hidden="true">404</div>
        <h1 class="kg-404__title"><?php esc_html_e('Página no encontrada', 'letrasflch'); ?></h1>
        <p class="kg-404__desc"><?php esc_html_e('La página que buscas no existe o fue movida. Vuelve al inicio o usa el buscador.', 'letrasflch'); ?></p>
        <div class="kg-404__actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="kg-btn kg-btn--gold">
                <i class="fas fa-home" aria-hidden="true"></i>
                <?php esc_html_e('Ir al inicio', 'letrasflch'); ?>
            </a>
            <a href="#" onclick="document.querySelector('[data-kg-search-trigger]')?.click();return false;" class="kg-btn kg-btn--outline">
                <i class="fas fa-search" aria-hidden="true"></i>
                <?php esc_html_e('Buscar en el sitio', 'letrasflch'); ?>
            </a>
        </div>
    </div>

    <?php
    $popular_cats = get_categories(array(
        'orderby'    => 'count',
        'order'      => 'DESC',
        'number'     => 8,
        'hide_empty' => true,
    ));
    if ($popular_cats) : ?>
    <div class="kg-container" style="padding-bottom:48px;">
        <div class="kg-div">
            <span class="kg-div__line"></span>
            <span class="kg-div__lbl"><?php esc_html_e('Explorar por categoría', 'letrasflch'); ?></span>
            <span class="kg-div__num">—</span>
        </div>
        <div style="display:flex;flex-wrap:wrap;gap:9px;padding:22px 28px 0;">
            <?php foreach ($popular_cats as $cat) : ?>
                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="kg-badge kg-badge--navy" style="text-decoration:none;">
                    <?php echo esc_html($cat->name); ?>
                    <span style="opacity:.6;margin-left:4px;"><?php echo absint($cat->count); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
