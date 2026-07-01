<?php
/**
 * Blog posts page — Kingster editorial layout
 *
 * @package LetrasFLCH
 */

get_header();

$found_posts  = $wp_query->found_posts;
$total_pages  = $wp_query->max_num_pages;
$current_page = max(1, get_query_var('paged'));
?>

<main id="main" class="site-main" role="main" tabindex="-1">

    <!-- Page header -->
    <section class="kg-page-header">
        <div class="kg-container">
            <?php get_template_part('template-parts/breadcrumbs'); ?>
            <h1 class="kg-page-header__title"><?php esc_html_e('Noticias y Eventos', 'letrasflch'); ?></h1>
            <p style="font-size:13px;color:var(--kg-muted);margin:8px 0 0;">
                <?php printf(esc_html(_n('%s publicación', '%s publicaciones', $found_posts, 'letrasflch')), number_format_i18n($found_posts)); ?>
                <?php if ($total_pages > 1) : ?>
                    &mdash; <?php printf(esc_html__('Página %1$d de %2$d', 'letrasflch'), $current_page, $total_pages); ?>
                <?php endif; ?>
            </p>
        </div>
    </section>

    <!-- Content -->
    <section style="padding:32px 0 56px;">
        <div class="kg-container">

            <div style="display:grid;grid-template-columns:1fr 250px;gap:40px;">

                <!-- Posts column -->
                <div>

                    <?php if (have_posts()) : ?>

                        <?php
                        the_post();
                        $f_cats = get_the_category();
                        ?>

                        <!-- Featured article -->
                        <article class="kg-card kg-card--horizontal" style="margin-bottom:32px;">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="kg-card__thumb" tabindex="-1" aria-hidden="true">
                                    <?php the_post_thumbnail('large', ['style' => 'width:100%;height:100%;object-fit:cover;', 'alt' => '']); ?>
                                </a>
                            <?php endif; ?>
                            <div class="kg-card__body" style="padding:24px 26px;">
                                <?php if ($f_cats) : ?>
                                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:11px;">
                                        <span class="kg-badge kg-badge--green"><?php echo esc_html($f_cats[0]->name); ?></span>
                                        <span class="kg-card__meta"><i class="fa-regular fa-calendar" aria-hidden="true"></i><?php echo esc_html(get_the_date()); ?></span>
                                    </div>
                                <?php endif; ?>
                                <h2 class="kg-card__title" style="font-size:25px;margin:0 0 10px;">
                                    <a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none;"><?php the_title(); ?></a>
                                </h2>
                                <p class="kg-card__excerpt" style="font-size:14px;max-width:38em;"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30, '...')); ?></p>
                                <a href="<?php the_permalink(); ?>" class="kg-card__link" style="font-size:13.5px;"><?php esc_html_e('Leer nota completa', 'letrasflch'); ?> <i class="fas fa-arrow-right" style="font-size:11px;"></i></a>
                            </div>
                        </article>

                        <?php if (have_posts()) : ?>

                            <!-- Section divider -->
                            <div class="kg-div" style="padding-top:0;padding-bottom:18px;">
                                <span class="kg-div__line"></span>
                                <span class="kg-div__lbl"><?php esc_html_e('Más noticias', 'letrasflch'); ?></span>
                                <span class="kg-div__num">—</span>
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

                        <?php endif; ?>

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
                            <p style="margin:0 0 20px;"><?php esc_html_e('Aún no hay publicaciones disponibles.', 'letrasflch'); ?></p>
                        </div>

                    <?php endif; ?>

                </div>

                <!-- Sidebar -->
                <aside style="border-left:1px solid var(--kg-line);padding-left:24px;">
                    <div class="kg-filter__title" style="margin-bottom:16px;"><?php esc_html_e('Explorar', 'letrasflch'); ?></div>

                    <div class="kg-filter__search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <input type="text" placeholder="<?php esc_attr_e('Buscar…', 'letrasflch'); ?>" onclick="document.querySelector('[data-kg-search-trigger]')?.click();" readonly style="cursor:pointer;">
                    </div>

                    <?php if (is_active_sidebar('blog-sidebar')) : ?>
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    <?php else : ?>
                        <div class="kg-filter__group">
                            <div class="kg-filter__label"><?php esc_html_e('Categorías', 'letrasflch'); ?></div>
                            <div class="kg-filter__options">
                                <?php wp_list_categories(array(
                                    'title_li' => '',
                                    'show_count' => true,
                                    'hide_empty' => true,
                                    'style' => 'none',
                                )); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </aside>

            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
