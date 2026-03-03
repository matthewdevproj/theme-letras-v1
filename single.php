<?php
/**
 * The single post template
 *
 * @package LetrasFLCH
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<!-- Page Header -->
<section class="py-12 bg-gray-50 border-y border-gray-light">
    <div class="container-custom">
        <div class="flex flex-wrap items-center gap-6 mb-4 text-sm text-gray-dark">
            <span class="flex items-center gap-1">
                <i class="text-accent-gold far fa-calendar-alt"></i>
                <?php echo get_the_date(); ?>
            </span>
            <span class="flex items-center gap-1">
                <i class="text-accent-gold far fa-user"></i>
                <?php the_author(); ?>
            </span>
            <span class="flex flex-wrap items-center gap-2">
                <i class="text-accent-gold far fa-folder"></i>
                <?php the_category(' '); ?>
            </span>
        </div>
        
        <h1 class="mb-2 text-3xl font-semibold md:text-4xl animate-fade-in-up">
            <?php the_title(); ?>
        </h1>
        
        <?php get_template_part('template-parts/breadcrumbs'); ?>
    </div>
</section>

<!-- Post Content -->
<article class="py-16">
    <div class="container-custom">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <?php if (has_post_thumbnail()) : ?>
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
                
                <!-- Tags -->
                <?php if (has_tag()) : ?>
                    <div class="flex items-center gap-2 pt-8 mt-8 border-t border-gray-light">
                        <i class="text-accent-gold fas fa-tags"></i>
                        <div class="flex flex-wrap gap-2">
                            <?php the_tags('', '', ''); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Navegación entre posts -->
                <nav class="flex justify-between pt-8 mt-8 border-t border-gray-light">
                    <div class="nav-previous">
                        <?php previous_post_link(
                            '%link',
                            '<i class="mr-2 fas fa-arrow-left"></i> Artículo anterior'
                        ); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link(
                            '%link',
                            'Artículo siguiente <i class="ml-2 fas fa-arrow-right"></i>'
                        ); ?>
                    </div>
                </nav>
                
                <!-- Comentarios -->
                <?php comments_template(); ?>
            </div>
            
            <!-- Sidebar -->
            <aside class="sticky top-24">
                <?php if (is_active_sidebar('post-sidebar')) : ?>
                    <?php dynamic_sidebar('post-sidebar'); ?>
                <?php else : ?>
                    <div class="p-6 mb-6 bg-white border border-gray-light rounded-lg">
                        <h3 class="relative pb-2 mb-4 text-lg font-semibold after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-accent-gold">
                            Compartir
                        </h3>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" 
                               target="_blank" 
                               class="flex items-center justify-center w-10 h-10 text-white transition-all bg-[#1877f2] rounded-full hover:-translate-y-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" 
                               target="_blank" 
                               class="flex items-center justify-center w-10 h-10 text-white transition-all bg-[#1da1f2] rounded-full hover:-translate-y-1">
                                <i class="fab fa-x-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" 
                               target="_blank" 
                               class="flex items-center justify-center w-10 h-10 text-white transition-all bg-[#25d366] rounded-full hover:-translate-y-1">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-white border border-gray-light rounded-lg">
                        <h3 class="relative pb-2 mb-4 text-lg font-semibold after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-accent-gold">
                            Últimas noticias
                        </h3>
                        <ul>
                            <?php
                            $recent = new WP_Query(array(
                                'posts_per_page' => 5,
                                'post__not_in' => array(get_the_ID())
                            ));
                            while ($recent->have_posts()) : $recent->the_post(); ?>
                                <li class="mb-3 pb-3 border-b border-dashed border-gray-light last:border-0">
                                    <a href="<?php the_permalink(); ?>" class="block hover:text-accent-gold">
                                        <?php the_title(); ?>
                                    </a>
                                    <span class="block mt-1 text-xs text-secondary-muted">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>