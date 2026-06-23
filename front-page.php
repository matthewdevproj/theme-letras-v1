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
    
    <!-- Hero Section (solo en front page) -->
    <?php get_template_part('template-parts/hero'); ?>

    <!-- ADN de la Facultad -->
    <?php get_template_part('template-parts/home/adn-facultad'); ?>

    <!-- N.º 01 — Noticias Destacadas -->
    <?php get_template_part('template-parts/home/noticias'); ?>

    <!-- N.º 02 — Escuelas Profesionales -->
    <?php get_template_part('template-parts/home/escuelas'); ?>

    <!-- N.º 03 — Investigación y producción académica -->
    <?php get_template_part('template-parts/home/investigacion'); ?>

    <!-- N.º 04 — Revistas académicas indexadas -->
    <?php get_template_part('template-parts/home/revistas'); ?>

    <!-- N.º 05 — Facultad en cifras -->
    <?php get_template_part('template-parts/home/facultad-cifras'); ?>

    <!-- N.º 07 — Comunidad FLCH -->
    <?php get_template_part('template-parts/home/comunidad-humanidades'); ?>

    <!-- Aquí va el contenido de tu página de inicio (editor) -->
    <div class="container-custom py-16">
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
                    esc_html_e( 'Noticias y Eventos', 'letrasflch' );
                } elseif (is_category()) {
                    echo esc_html( single_cat_title( '', false ) );
                } elseif (is_tag()) {
                    echo esc_html( single_tag_title( '', false ) );
                } elseif (is_author()) {
                    echo esc_html( get_the_author() );
                } elseif (is_date()) {
                    echo 'Archivo: ' . esc_html( get_the_date('F Y') );
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