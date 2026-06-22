<?php
/**
 * The main template file (Blog) con Tailwind y Hero Slider en front page
 *
 * @package LetrasFLCH
 */

get_header();
?>

<main id="main" class="site-main" role="main" tabindex="-1">

<?php // Verificar si estamos en la página de inicio
if (is_front_page()) : ?>
    
    <!-- Hero Section con Slider (solo en front page) -->
    <?php get_template_part('template-parts/hero'); ?>

    <!-- El resto de tu contenido para front page -->
    <div class="container-custom py-16">
        <?php
        // Últimas noticias de la categoría "noticias"
        $noticias = new WP_Query(array(
            'category_name'  => 'noticias',
            'posts_per_page' => 6,
            'no_found_rows'  => true,
        ));

        if ($noticias->have_posts()) :
        ?>
            <section class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-azuld flex items-center gap-3">
                        <i class="fas fa-newspaper text-gold"></i>
                        Últimas Noticias
                    </h2>
                    <a href="<?php echo esc_url(home_url('/noticias')); ?>"
                       class="flch-btn flch-btn--outline text-sm">
                        Ver todas
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="grid-cards">
                    <?php while ($noticias->have_posts()) : $noticias->the_post(); ?>
                        <?php get_template_part('template-parts/card-noticia'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- Aquí va el contenido de tu página de inicio (editor) -->
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>

<?php else : // Para páginas de blog/archivos ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container-custom">
            <h1 class="page-title animate-fade-in-up">
                <?php
                if (is_home()) {
                    echo 'Noticias y Eventos';
                } elseif (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } elseif (is_author()) {
                    the_author();
                } elseif (is_date()) {
                    echo 'Archivo: ' . get_the_date('F Y');
                } else {
                    echo 'Blog';
                }
                ?>
            </h1>
            <?php get_template_part('template-parts/breadcrumbs'); ?>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-16">
        <div class="container-custom">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <?php if (have_posts()) : ?>
                        <div class="grid-cards">
                            <?php while (have_posts()) : the_post(); ?>
                                <?php get_template_part('template-parts/card-noticia'); ?>
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="pagination">
                            <?php
                            echo paginate_links(array(
                                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                                'next_text' => '<i class="fas fa-chevron-right"></i>',
                                'type'      => 'list'
                            ));
                            ?>
                        </div>
                        
                    <?php else : ?>
                        <p class="text-center text-gray-dark">No se encontraron publicaciones.</p>
                    <?php endif; ?>
                </div>
                
                <!-- Sidebar -->
                <aside class="sidebar">
                    <?php if (is_active_sidebar('blog-sidebar')) : ?>
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    <?php else : ?>
                        <!-- Widget por defecto -->
                        <div class="widget">
                            <h3 class="widget-title">Categorías</h3>
                            <ul>
                                <?php wp_list_categories(array(
                                    'title_li' => '',
                                    'show_count' => true
                                )); ?>
                            </ul>
                        </div>
                        
                        <div class="widget">
                            <h3 class="widget-title">Archivo</h3>
                            <ul>
                                <?php wp_get_archives(array(
                                    'type' => 'monthly',
                                    'show_post_count' => true
                                )); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </aside>
            </div>
        </div>
    </section>

<?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>