<?php
/**
 * Template part for displaying breadcrumbs
 *
 * @package LetrasFLCH
 */

if (is_front_page()) {
    return;
}
?>

<div class="flex items-center gap-2 text-sm text-gray-dark breadcrumbs">
    <a href="<?php echo esc_url(home_url()); ?>" class="text-primary-dark hover:text-accent-gold">
        <i class="fas fa-home"></i> Inicio
    </a>
    
    <span class="text-xs separator"><i class="fas fa-chevron-right"></i></span>
    
    <?php if (is_category() || is_single()) : ?>
        
        <?php if (is_category()) : ?>
            <?php
            $category = get_queried_object();
            echo '<span class="current">' . esc_html($category->name) . '</span>';
            ?>
        <?php endif; ?>
        
        <?php if (is_single()) : ?>
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                $category = $categories[0];
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="text-primary-dark hover:text-accent-gold">' . esc_html($category->name) . '</a>';
                echo '<span class="text-xs separator"><i class="fas fa-chevron-right"></i></span>';
            }
            ?>
            <span class="current"><?php the_title(); ?></span>
        <?php endif; ?>
        
    <?php elseif (is_page()) : ?>
        
        <?php
        $ancestors = get_post_ancestors(get_the_ID());
        if ($ancestors) {
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor) {
                echo '<a href="' . esc_url(get_permalink($ancestor)) . '" class="text-primary-dark hover:text-accent-gold">' . esc_html(get_the_title($ancestor)) . '</a>';
                echo '<span class="text-xs separator"><i class="fas fa-chevron-right"></i></span>';
            }
        }
        ?>
        <span class="current"><?php the_title(); ?></span>
        
    <?php elseif (is_search()) : ?>
        
        <span class="current"><?php printf(__('Resultados para: %s', 'letras-flch'), get_search_query()); ?></span>
        
    <?php elseif (is_404()) : ?>
        
        <span class="current"><?php _e('Página no encontrada', 'letras-flch'); ?></span>
        
    <?php elseif (is_tag()) : ?>
        
        <?php
        $tag = get_queried_object();
        echo '<span class="current">' . sprintf(__('Etiqueta: %s', 'letras-flch'), $tag->name) . '</span>';
        ?>
        
    <?php elseif (is_author()) : ?>
        
        <?php
        $author = get_queried_object();
        echo '<span class="current">' . sprintf(__('Autor: %s', 'letras-flch'), $author->display_name) . '</span>';
        ?>
        
    <?php elseif (is_archive()) : ?>
        
        <?php if (is_day()) : ?>
            <span class="current"><?php printf(__('Archivo del día: %s', 'letras-flch'), get_the_date()); ?></span>
        <?php elseif (is_month()) : ?>
            <span class="current"><?php printf(__('Archivo del mes: %s', 'letras-flch'), get_the_date('F Y')); ?></span>
        <?php elseif (is_year()) : ?>
            <span class="current"><?php printf(__('Archivo del año: %s', 'letras-flch'), get_the_date('Y')); ?></span>
        <?php endif; ?>
        
    <?php endif; ?>
</div>