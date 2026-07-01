<?php
/**
 * front-page.php — Portada institucional FLCH.
 *
 * Orden de secciones según el handoff "Portada FLCH Kingster" (verificado
 * contra el markup real del prototipo, no solo el resumen del README):
 * Hero → Accesos/Centros → Banner destacadas → Admisión → Somos una
 * Facultad → Servicios → Cifras → Escuelas (divisor 01) → Revistas
 * (divisor 02) → Noticias + Accesos rápidos (divisor 03).
 * Header/footer/controles flotantes son globales (header.php / footer.php).
 *
 * @package LetrasFLCH
 */

get_header();
?>

<main id="main" class="site-main" role="main" tabindex="-1">

	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/home/accesos' ); ?>
	<?php get_template_part( 'template-parts/home/banner-destacadas' ); ?>
	<?php get_template_part( 'template-parts/home/admision' ); ?>
	<?php get_template_part( 'template-parts/home/somos-facultad' ); ?>
	<?php get_template_part( 'template-parts/home/servicios' ); ?>
	<?php get_template_part( 'template-parts/home/facultad-cifras' ); ?>
	<?php get_template_part( 'template-parts/home/escuelas' ); ?>
	<?php get_template_part( 'template-parts/home/revistas' ); ?>
	<?php get_template_part( 'template-parts/home/noticias' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>
