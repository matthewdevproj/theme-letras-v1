<?php
/**
 * Search results — Kingster command-palette style
 *
 * @package LetrasFLCH
 */

get_header();

$search_query = get_search_query();
$found_posts  = $wp_query->found_posts;
$total_pages  = $wp_query->max_num_pages;
$current_page = max(1, get_query_var('paged'));

function letras_flch_highlight($text, $query) {
    if (empty($query)) return esc_html($text);
    $escaped = esc_html($text);
    $pattern = '/(' . preg_quote(esc_html($query), '/') . ')/iu';
    return preg_replace($pattern, '<mark style="background:rgba(168,134,28,.18);color:var(--kg-ink);padding:1px 3px;border-radius:3px;">$1</mark>', $escaped);
}
?>

<main id="main" class="site-main" role="main" tabindex="-1">

    <!-- Search header -->
    <section class="kg-page-header">
        <div class="kg-container">
            <?php get_template_part('template-parts/breadcrumbs'); ?>
            <div style="position:relative;max-width:620px;margin:8px 0 4px;">
                <i class="fas fa-search" style="position:absolute;left:18px;top:50%;transform:translateY(-50%);color:var(--kg-azul);font-size:16px;z-index:2;" aria-hidden="true"></i>
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" name="s" value="<?php echo esc_attr($search_query); ?>" placeholder="<?php esc_attr_e('Buscar páginas, noticias, personas…', 'letrasflch'); ?>" style="width:100%;border:2px solid var(--kg-azul);border-radius:10px;padding:15px 18px 15px 46px;font-family:inherit;font-size:16px;color:var(--kg-ink);background:var(--kg-panel);">
                </form>
            </div>
            <?php if (!empty($search_query)) : ?>
                <p style="font-size:13.5px;color:var(--kg-muted);margin:8px 0 0;">
                    <?php printf(esc_html(_n('%s resultado para «%s»', '%s resultados para «%s»', $found_posts, 'letrasflch')), number_format_i18n($found_posts), esc_html($search_query)); ?>
                    <?php if ($total_pages > 1) : ?>
                        &mdash; <?php printf(esc_html__('Página %1$d de %2$d', 'letrasflch'), $current_page, $total_pages); ?>
                    <?php endif; ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <section style="padding:32px 0 56px;">
        <div class="kg-container">

            <?php if (have_posts()) : ?>

                <!-- Filter pills (by post type) -->
                <div style="display:flex;gap:9px;margin-bottom:28px;flex-wrap:wrap;">
                    <span style="font-size:12.5px;font-weight:600;color:#fff;background:var(--kg-azul);padding:7px 14px;border-radius:999px;"><?php esc_html_e('Todos', 'letrasflch'); ?> · <?php echo absint($found_posts); ?></span>
                    <?php
                    $post_types = get_post_types(['public' => true], 'objects');
                    foreach ($post_types as $pt) :
                        if (in_array($pt->name, ['attachment'], true)) continue;
                        $count = $wp_query->found_posts; // simplified; real count per type would need a separate query
                    ?>
                        <span style="font-size:12.5px;font-weight:600;color:var(--kg-ink);background:var(--kg-soft);padding:7px 14px;border-radius:999px;cursor:pointer;"><?php echo esc_html($pt->labels->singular_name); ?></span>
                    <?php endforeach; ?>
                </div>

                <!-- Results list -->
                <div style="display:flex;flex-direction:column;">
                    <?php while (have_posts()) : the_post();
                        $cats = get_the_category();
                        $post_type_obj = get_post_type_object(get_post_type());
                        $type_label = $post_type_obj ? $post_type_obj->labels->singular_name : '';
                        // Icon mapping
                        $type_icons = ['post' => 'fa-regular fa-newspaper', 'page' => 'fa-regular fa-file-lines', 'event' => 'fa-regular fa-calendar-day'];
                        $type_icon = isset($type_icons[get_post_type()]) ? $type_icons[get_post_type()] : 'fa-regular fa-file';
                    ?>
                        <a href="<?php the_permalink(); ?>" style="display:flex;gap:16px;align-items:flex-start;padding:18px 0;border-bottom:1px solid var(--kg-line);text-decoration:none;color:var(--kg-ink);transition:background-color .2s ease;" onmouseover="this.style.backgroundColor='var(--kg-soft)'" onmouseout="this.style.backgroundColor='transparent'">
                            <span style="width:42px;height:42px;flex:none;border-radius:10px;background:rgba(36,87,166,.1);color:var(--kg-azul);display:flex;align-items:center;justify-content:center;font-size:16px;">
                                <i class="<?php echo esc_attr($type_icon); ?>" aria-hidden="true"></i>
                            </span>
                            <div style="flex:1;">
                                <div style="display:flex;align-items:center;gap:9px;margin-bottom:4px;">
                                    <span style="font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--kg-gold);"><?php echo esc_html($type_label); ?></span>
                                    <span style="font-size:12px;color:var(--kg-muted);"><?php echo esc_html(get_the_date('j M Y')); ?></span>
                                </div>
                                <h4 style="font-family:var(--font-display);font-weight:600;font-size:18px;line-height:1.2;margin:0 0 4px;"><?php echo letras_flch_highlight(get_the_title(), $search_query); ?></h4>
                                <p style="font-size:13.5px;line-height:1.5;color:var(--kg-muted);margin:0;"><?php echo letras_flch_highlight(wp_trim_words(get_the_excerpt(), 20, '...'), $search_query); ?></p>
                            </div>
                            <i class="fas fa-arrow-right" style="color:var(--kg-muted);font-size:13px;margin-top:6px;" aria-hidden="true"></i>
                        </a>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <?php if ($total_pages > 1) : ?>
                    <nav class="kg-pagination" aria-label="<?php esc_attr_e('Navegación de páginas', 'letrasflch'); ?>">
                        <?php
                        echo paginate_links(array(
                            'total'     => $total_pages,
                            'current'   => $current_page,
                            'prev_text' => '<i class="fas fa-chevron-left"></i>',
                            'next_text' => '<i class="fas fa-chevron-right"></i>',
                            'type'      => 'list',
                        ));
                        ?>
                    </nav>
                <?php endif; ?>

            <?php else : ?>

                <!-- No results -->
                <div class="kg-search__none">
                    <div style="font-size:48px;margin-bottom:16px;opacity:.3;"><i class="fas fa-search" aria-hidden="true"></i></div>
                    <h2><?php esc_html_e('Sin resultados', 'letrasflch'); ?></h2>
                    <p style="margin:0 auto 24px;max-width:30em;font-size:15px;color:var(--kg-muted);"><?php esc_html_e('Intenta con palabras más generales, revisa la ortografía o usa sinónimos.', 'letrasflch'); ?></p>
                    <div style="display:flex;gap:11px;justify-content:center;flex-wrap:wrap;">
                        <a href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/')); ?>" class="kg-btn kg-btn--outline"><i class="fas fa-newspaper" aria-hidden="true"></i> <?php esc_html_e('Ver todas las noticias', 'letrasflch'); ?></a>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="kg-btn kg-btn--ghost"><i class="fas fa-home" aria-hidden="true"></i> <?php esc_html_e('Ir al inicio', 'letrasflch'); ?></a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
