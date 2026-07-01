<?php
if (is_front_page()) return;

$crumbs = [];
$crumbs[] = ['name' => 'Inicio', 'url' => home_url('/')];

if (is_category()) {
    $crumbs[] = ['name' => single_cat_title('', false), 'url' => ''];
} elseif (is_single()) {
    $cats = get_the_category();
    if ($cats) {
        $crumbs[] = ['name' => $cats[0]->name, 'url' => get_category_link($cats[0]->term_id)];
    }
    $crumbs[] = ['name' => get_the_title(), 'url' => ''];
} elseif (is_page()) {
    $ancestors = array_reverse(get_post_ancestors(get_the_ID()));
    foreach ($ancestors as $a) {
        $crumbs[] = ['name' => get_the_title($a), 'url' => get_permalink($a)];
    }
    $crumbs[] = ['name' => get_the_title(), 'url' => ''];
} elseif (is_search()) {
    $crumbs[] = ['name' => sprintf('Resultados: %s', get_search_query()), 'url' => ''];
} elseif (is_tag()) {
    $crumbs[] = ['name' => single_tag_title('', false), 'url' => ''];
} elseif (is_author()) {
    $crumbs[] = ['name' => get_the_author(), 'url' => ''];
} elseif (is_date()) {
    if (is_day()) $crumbs[] = ['name' => get_the_date(), 'url' => ''];
    elseif (is_month()) $crumbs[] = ['name' => get_the_date('F Y'), 'url' => ''];
    else $crumbs[] = ['name' => get_the_date('Y'), 'url' => ''];
} elseif (is_404()) {
    $crumbs[] = ['name' => 'Página no encontrada', 'url' => ''];
} elseif (is_post_type_archive()) {
    $crumbs[] = ['name' => post_type_archive_title('', false), 'url' => ''];
}
?>
<nav class="kg-breadcrumbs" aria-label="Ruta de navegación" itemscope itemtype="https://schema.org/BreadcrumbList">
    <?php foreach ($crumbs as $i => $c) : ?>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <?php if (!empty($c['url'])) : ?>
                <a href="<?php echo esc_url($c['url']); ?>" itemprop="item">
                    <?php if ($i === 0) : ?><i class="fa-solid fa-house" aria-hidden="true" style="margin-right:4px;"></i><?php endif; ?>
                    <span itemprop="name"><?php echo esc_html($c['name']); ?></span>
                </a>
            <?php else : ?>
                <span class="kg-breadcrumbs__current" itemprop="name"><?php echo esc_html($c['name']); ?></span>
            <?php endif; ?>
            <meta itemprop="position" content="<?php echo $i + 1; ?>">
        </span>
        <?php if ($i < count($crumbs) - 1) : ?>
            <i class="fa-solid fa-chevron-right kg-breadcrumbs__sep" aria-hidden="true"></i>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
