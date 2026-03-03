<?php
/**
 * The main template file (Blog) con Tailwind
 *
 * @package LetrasFLCH
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container-custom">
        <h1 class="page-title animate-fade-in-up">Noticias y Eventos</h1>
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

<?php get_footer(); ?>