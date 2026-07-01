<?php
/**
 * Archive template — Kingster editorial layout
 *
 * @package LetrasFLCH
 */

get_header();

$found_posts  = $wp_query->found_posts;
$total_pages  = $wp_query->max_num_pages;
$current_page = max(1, get_query_var('paged'));

if (is_category()) {
    $archive_label = single_cat_title('', false);
    $archive_desc  = category_description();
} elseif (is_tag()) {
    $archive_label = single_tag_title('', false);
    $archive_desc  = tag_description();
} elseif (is_author()) {
    $archive_label = get_the_author();
    $archive_desc  = get_the_author_meta('description');
} elseif (is_year()) {
    $archive_label = get_the_date('Y');
    $archive_desc  = '';
} elseif (is_month()) {
    $archive_label = get_the_date('F Y');
    $archive_desc  = '';
} elseif (is_day()) {
    $archive_label = get_the_date();
    $archive_desc  = '';
} else {
    $archive_label = esc_html__('Noticias y Eventos', 'letrasflch');
    $archive_desc  = '';
}
?>

<main id="main" class="site-main" role="main" tabindex="-1">

    <!-- Page header -->
    <section class="kg-page-header">
        <div class="kg-container">
            <?php get_template_part('template-parts/breadcrumbs'); ?>
            <h1 class="kg-page-header__title"><?php echo esc_html($archive_label); ?></h1>
            <?php if (!empty($archive_desc)) : ?>
                <p class="kg-page-header__desc"><?php echo wp_kses_post($archive_desc); ?></p>
            <?php endif; ?>
            <p style="font-size:13px;color:var(--kg-muted);margin:8px 0 0;">
                <?php printf(esc_html(_n('%s publicación', '%s publicaciones', $found_posts, 'letrasflch')), number_format_i18n($found_posts)); ?>
                <?php if ($total_pages > 1) : ?>
                    &mdash; <?php printf(esc_html__('Página %1$d de %2$d', 'letrasflch'), $current_page, $total_pages); ?>
                <?php endif; ?>
            </p>
        </div>
    </section>

    <!-- Archive grid -->
    <section style="padding:32px 0 48px;">
        <div class="kg-container">
            <div style="display:grid;grid-template-columns:230px 1fr;gap:34px;">

                <!-- Filter sidebar -->
                <aside class="kg-filter">
                    <div class="kg-filter__title"><?php esc_html_e('Filtrar', 'letrasflch'); ?></div>

                    <div class="kg-filter__search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <input type="text" placeholder="<?php esc_attr_e('Buscar…', 'letrasflch'); ?>" id="kg-archive-search">
                    </div>

                    <div class="kg-filter__group">
                        <div class="kg-filter__label"><?php esc_html_e('Categoría', 'letrasflch'); ?></div>
                        <div class="kg-filter__options">
                            <?php
                            $cats = get_categories(array('hide_empty' => true));
                            $current_cat = is_category() ? get_queried_object_id() : 0;
                            ?>
                            <label class="kg-filter__option<?php echo !$current_cat ? ' kg-filter__option--active' : ''; ?>">
                                <span class="kg-filter__checkbox<?php echo !$current_cat ? ' kg-filter__checkbox--checked' : ''; ?>"><?php echo !$current_cat ? '<i class="fas fa-check" style="font-size:9px;"></i>' : ''; ?></span>
                                <a href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/noticias/')); ?>" style="color:inherit;text-decoration:none;"><?php esc_html_e('Todas', 'letrasflch'); ?></a>
                            </label>
                            <?php foreach ($cats as $cat) : ?>
                                <label class="kg-filter__option<?php echo $current_cat === $cat->term_id ? ' kg-filter__option--active' : ''; ?>">
                                    <span class="kg-filter__checkbox<?php echo $current_cat === $cat->term_id ? ' kg-filter__checkbox--checked' : ''; ?>"><?php echo $current_cat === $cat->term_id ? '<i class="fas fa-check" style="font-size:9px;"></i>' : ''; ?></span>
                                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html($cat->name); ?> (<?php echo absint($cat->count); ?>)</a>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </aside>

                <!-- Posts column -->
                <div>

                    <?php if (have_posts()) : ?>

                        <!-- Sort bar -->
                        <div class="kg-search__info">
                            <span><?php printf(esc_html(_n('%s resultado', '%s resultados', $found_posts, 'letrasflch')), number_format_i18n($found_posts)); ?></span>
                            <span class="kg-search__sort"><?php esc_html_e('Más recientes', 'letrasflch'); ?> <i class="fas fa-chevron-down" style="font-size:9px;margin-left:4px;"></i></span>
                        </div>

                        <!-- Cards grid -->
                        <div class="kg-search__grid">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="kg-card" style="display:flex;flex-direction:column;">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="kg-card__thumb" tabindex="-1" aria-hidden="true">
                                            <?php the_post_thumbnail('card-thumbnail', ['loading' => 'lazy', 'alt' => '']); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="kg-card__body">
                                        <?php
                                        $c = get_the_category();
                                        if ($c) : ?>
                                            <div style="display:flex;align-items:center;gap:8px;margin-bottom:7px;">
                                                <span class="kg-badge kg-badge--gold"><?php echo esc_html($c[0]->name); ?></span>
                                                <span class="kg-card__meta"><i class="fa-regular fa-calendar" aria-hidden="true"></i><?php echo esc_html(get_the_date('j M Y')); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <h3 class="kg-card__title" style="font-size:17px;margin:0 0 8px;">
                                            <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a>
                                        </h3>
                                        <p class="kg-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18, '...')); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="kg-card__link"><?php esc_html_e('Leer más', 'letrasflch'); ?> <i class="fas fa-arrow-right" style="font-size:11px;"></i></a>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <?php if ($total_pages > 1) : ?>
                            <nav class="kg-pagination" aria-label="<?php esc_attr_e('Navegación de páginas', 'letrasflch'); ?>">
                                <?php
                                $links = paginate_links(array(
                                    'total'     => $total_pages,
                                    'current'   => $current_page,
                                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                                    'type'      => 'array',
                                ));
                                if ($links) :
                                    foreach ($links as $link) :
                                        $class = 'kg-pagination__item';
                                        if (strpos($link, 'current') !== false) $class .= ' kg-pagination__item--active';
                                        if (strpos($link, 'dots') !== false) $class .= ' kg-pagination__item--disabled';
                                        echo str_replace(
                                            ['<span', '</span>', 'page-numbers'],
                                            ['<a', '</a>', $class],
                                            $link
                                        );
                                    endforeach;
                                endif;
                                ?>
                            </nav>
                        <?php endif; ?>

                    <?php else : ?>

                        <!-- Empty state -->
                        <div class="kg-search__none">
                            <div style="font-size:48px;margin-bottom:16px;opacity:.3;"><i class="fas fa-newspaper" aria-hidden="true"></i></div>
                            <h2><?php esc_html_e('No se encontraron publicaciones', 'letrasflch'); ?></h2>
                            <p style="margin:0 0 20px;"><?php esc_html_e('En este momento no hay publicaciones disponibles en esta sección.', 'letrasflch'); ?></p>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="kg-btn kg-btn--outline"><i class="fas fa-home" aria-hidden="true"></i> <?php esc_html_e('Volver al inicio', 'letrasflch'); ?></a>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
