<?php
/**
 * The page template
 *
 * @package LetrasFLCH
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<!-- Page Header -->
<section class="py-12 bg-gray-50 border-y border-gray-light">
    <div class="container-custom">
        <h1 class="mb-2 text-3xl font-semibold animate-fade-in-up">
            <?php the_title(); ?>
        </h1>
        <?php get_template_part('template-parts/breadcrumbs'); ?>
    </div>
</section>

<!-- Page Content -->
<section class="py-16">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <?php if (has_post_thumbnail() && !get_post_meta(get_the_ID(), 'hide_featured_image', true)) : ?>
                <div class="mb-8 overflow-hidden rounded-lg aspect-video">
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                </div>
            <?php endif; ?>
            
            <div class="prose prose-lg max-w-none">
                <?php the_content(); ?>
                
                <?php
                wp_link_pages(array(
                    'before' => '<div class="flex gap-2 mt-8">' . esc_html__('Páginas:', 'letras-flch'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>