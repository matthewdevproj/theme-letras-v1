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

<?php endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>