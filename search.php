<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package LetrasFLCH
 */

get_header();

// Obtener datos de búsqueda
$search_query = get_search_query();
$found_posts = $wp_query->found_posts;
$current_page = max(1, get_query_var('paged'));
$total_pages = $wp_query->max_num_pages;
?>

<main id="main" class="site-main" role="main">

    <!-- =================================== -->
    <!-- HERO SECTION - EXPERIENCIA PREMIUM  -->
    <!-- =================================== -->
    <section class="relative bg-gradient-to-br from-[#0A1E3C] via-[#143B63] to-[#1E4A7A] overflow-hidden" 
             aria-label="Sección de búsqueda">
        
        <!-- Background con parallax effect -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23A88F1D" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-[#0A1E3C] via-transparent to-transparent"></div>
        </div>

        <!-- Elementos flotantes decorativos -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-10 left-10 w-64 h-64 bg-[#A88F1D]/5 rounded-full blur-3xl animate-float-slow"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#A88F1D]/5 rounded-full blur-3xl animate-float-slower"></div>
        </div>
        
        <div class="container-custom relative z-10 py-20 md:py-28">
            <div class="max-w-4xl mx-auto text-center">
                
                <!-- Micro-interacción: Icono animado -->
                <div class="relative inline-flex mb-8 group">
                    <div class="absolute inset-0 bg-[#A88F1D] rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-[#A88F1D] to-[#C6A43F] rounded-2xl shadow-2xl flex items-center justify-center transform -rotate-3 group-hover:rotate-0 transition-transform duration-500">
                        <i class="fas fa-search text-4xl text-white"></i>
                    </div>
                </div>

                <?php if (!empty($search_query)) : ?>
                    <!-- Título con tipografía expresiva -->
                    <h1 class="text-white mb-4">
                        <span class="block text-sm md:text-base font-medium text-[#A88F1D] tracking-[0.3em] uppercase mb-4 animate-fade-in-up">
                            <?php echo $found_posts > 0 ? 'Resultados de búsqueda' : 'Búsqueda sin resultados'; ?>
                        </span>
                        
                        <span class="relative inline-block">
                            <span class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                                "<?php echo esc_html($search_query); ?>"
                            </span>
                            
                            <!-- Badge de contador -->
                            <?php if ($found_posts > 0) : ?>
                                <span class="absolute -top-4 -right-4 md:-top-6 md:-right-6 bg-[#A88F1D] text-white text-sm md:text-base font-bold px-3 md:px-4 py-1 md:py-2 rounded-full shadow-lg animate-bounce-subtle">
                                    <?php echo number_format_i18n($found_posts); ?>
                                </span>
                            <?php endif; ?>
                        </span>
                    </h1>
                    
                    <!-- Mensaje contextual -->
                    <p class="text-white/70 text-lg md:text-xl max-w-2xl mx-auto mt-6 animate-fade-in-up animation-delay-200">
                        <?php if ($found_posts > 0) : ?>
                            <?php printf(
                                esc_html__('Mostrando %d de %d resultados %s', 'letrasflch'),
                                min($found_posts, get_option('posts_per_page')),
                                $found_posts,
                                $total_pages > 1 ? sprintf(esc_html__('· Página %d de %d', 'letrasflch'), $current_page, $total_pages) : ''
                            ); ?>
                        <?php else : ?>
                            <?php esc_html_e('No encontramos coincidencias exactas. Prueba con otros términos.', 'letrasflch'); ?>
                        <?php endif; ?>
                    </p>
                <?php else : ?>
                    <!-- Estado inicial: búsqueda vacía -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                        <span class="block text-sm md:text-base font-medium text-[#A88F1D] tracking-[0.3em] uppercase mb-4">
                            Explorar
                        </span>
                        ¿Qué estás buscando?
                    </h1>
                    <p class="text-white/70 text-lg md:text-xl max-w-2xl mx-auto">
                        Encuentra información sobre facultades, carreras, eventos, investigaciones y más.
                    </p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Divisor curvo inferior -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-auto" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" 
                      fill="white" fill-opacity="1"/>
            </svg>
        </div>
    </section>

    <!-- =================================== -->
    <!-- BARRA DE BÚSQUEDA AVANZADA         -->
    <!-- =================================== -->
    <section class="bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm backdrop-blur-sm bg-white/95" 
             x-data="{ searchFilters: false }">
        <div class="container-custom py-6">
            
            <!-- Formulario de búsqueda principal -->
            <form role="search" method="get" class="relative" action="<?php echo esc_url(home_url('/')); ?>">
                <label for="search-field" class="sr-only"><?php esc_html_e('Buscar', 'letrasflch'); ?></label>
                
                <div class="relative group">
                    <input type="search" 
                           id="search-field"
                           class="w-full px-8 py-5 pr-48 text-lg bg-gray-50 border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-[#A88F1D] focus:bg-white transition-all duration-300"
                           placeholder="<?php esc_attr_e('Escribe tu búsqueda...', 'letrasflch'); ?>"
                           value="<?php echo esc_attr($search_query); ?>" 
                           name="s"
                           autocomplete="off"
                           autofocus>
                    
                    <!-- Acciones del input -->
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-2">
                        
                        <!-- Botón de filtros -->
                        <button type="button" 
                                @click="searchFilters = !searchFilters"
                                class="p-3 text-gray-400 hover:text-[#A88F1D] transition-colors relative"
                                :class="{ 'text-[#A88F1D]': searchFilters }"
                                aria-label="Filtros avanzados">
                            <i class="fas fa-sliders-h text-xl"></i>
                            <span class="absolute -top-1 -right-1 w-2 h-2 bg-[#A88F1D] rounded-full" 
                                  x-show="searchFilters" 
                                  x-cloak></span>
                        </button>
                        
                        <?php if (!empty($search_query)) : ?>
                            <!-- Botón limpiar -->
                            <button type="button" 
                                    class="search-clear p-3 text-gray-400 hover:text-[#A88F1D] transition-colors"
                                    onclick="document.getElementById('search-field').value = ''; this.form.submit()"
                                    aria-label="Limpiar búsqueda">
                                <i class="fas fa-times-circle text-xl"></i>
                            </button>
                        <?php endif; ?>
                        
                        <!-- Botón buscar -->
                        <button type="submit" 
                                class="px-8 py-3 bg-[#A88F1D] hover:bg-[#8B7718] text-white font-semibold rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-[#A88F1D]/30 flex items-center gap-2 group">
                            <i class="fas fa-search"></i>
                            <span class="hidden sm:inline">Buscar</span>
                        </button>
                    </div>
                </div>
                
                <!-- Panel de filtros avanzados -->
                <div x-show="searchFilters" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-4"
                     class="absolute top-full left-0 right-0 mt-4 p-6 bg-white rounded-2xl shadow-2xl border border-gray-100 z-50"
                     x-cloak>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Filtro por tipo -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de contenido</label>
                            <select name="post_type" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-[#A88F1D] focus:ring-1 focus:ring-[#A88F1D] transition-colors">
                                <option value="">Todos</option>
                                <?php
                                $post_types = get_post_types(['public' => true], 'objects');
                                foreach ($post_types as $post_type) :
                                    if (in_array($post_type->name, ['attachment', 'revision'])) continue;
                                ?>
                                    <option value="<?php echo esc_attr($post_type->name); ?>" 
                                            <?php selected(isset($_GET['post_type']) ? $_GET['post_type'] : '', $post_type->name); ?>>
                                        <?php echo esc_html($post_type->label); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <!-- Filtro por fecha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Fecha</label>
                            <select name="date_filter" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-[#A88F1D] focus:ring-1 focus:ring-[#A88F1D] transition-colors">
                                <option value="">Cualquier fecha</option>
                                <option value="today" <?php selected(isset($_GET['date_filter']) ? $_GET['date_filter'] : '', 'today'); ?>>Hoy</option>
                                <option value="week" <?php selected(isset($_GET['date_filter']) ? $_GET['date_filter'] : '', 'week'); ?>>Esta semana</option>
                                <option value="month" <?php selected(isset($_GET['date_filter']) ? $_GET['date_filter'] : '', 'month'); ?>>Este mes</option>
                                <option value="year" <?php selected(isset($_GET['date_filter']) ? $_GET['date_filter'] : '', 'year'); ?>>Este año</option>
                            </select>
                        </div>
                        
                        <!-- Filtro por orden -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ordenar por</label>
                            <select name="orderby" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-[#A88F1D] focus:ring-1 focus:ring-[#A88F1D] transition-colors">
                                <option value="relevance" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'relevance'); ?>>Relevancia</option>
                                <option value="date" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'date'); ?>>Más reciente</option>
                                <option value="title" <?php selected(isset($_GET['orderby']) ? $_GET['orderby'] : '', 'title'); ?>>Título (A-Z)</option>
                            </select>
                        </div>
                        
                        <!-- Botones acción -->
                        <div class="flex items-end gap-2">
                            <button type="submit" class="flex-1 px-4 py-2 bg-[#A88F1D] text-white rounded-lg hover:bg-[#8B7718] transition-colors">
                                Aplicar filtros
                            </button>
                            <a href="<?php echo esc_url(home_url('/?s=' . urlencode($search_query))); ?>" 
                               class="px-4 py-2 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors">
                                Limpiar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Breadcrumbs mejorados -->
            <div class="mt-4 text-sm">
                <?php get_template_part('template-parts/breadcrumbs'); ?>
            </div>
        </div>
    </section>

    <!-- =================================== -->
    <!-- RESULTADOS DE BÚSQUEDA              -->
    <!-- =================================== -->
    <section class="py-16 bg-gray-50" aria-label="Resultados de búsqueda">
        <div class="container-custom">
            
            <?php if (have_posts()) : ?>
                
                <!-- Vista de resultados -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Columna principal: resultados -->
                    <div class="lg:col-span-2">
                        
                        <!-- Lista de resultados -->
                        <div class="space-y-6">
                            <?php while (have_posts()) : the_post(); ?>
                                
                                <article id="post-<?php the_ID(); ?>" 
                                         <?php post_class('search-result-card group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-[#A88F1D]/30'); ?>>
                                    
                                    <div class="flex flex-col md:flex-row">
                                        
                                        <!-- Thumbnail column -->
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="md:w-1/3 relative overflow-hidden bg-gradient-to-br from-[#0A1E3C] to-[#143B63]">
                                                <a href="<?php the_permalink(); ?>" class="block h-full">
                                                    <?php the_post_thumbnail('medium', [
                                                        'class' => 'w-full h-48 md:h-full object-cover group-hover:scale-110 transition-transform duration-700',
                                                        'loading' => 'lazy'
                                                    ]); ?>
                                                </a>
                                                
                                                <!-- Badge de tipo -->
                                                <span class="absolute top-4 left-4 px-3 py-1 bg-[#A88F1D] text-white text-xs font-semibold rounded-full shadow-lg z-10">
                                                    <?php echo get_post_type_object(get_post_type())->labels->singular_name ?? get_post_type(); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <!-- Content column -->
                                        <div class="<?php echo has_post_thumbnail() ? 'md:w-2/3' : 'w-full'; ?> p-6">
                                            
                                            <!-- Título con highlighting -->
                                            <h2 class="text-xl md:text-2xl font-bold text-[#0A1E3C] mb-3 group-hover:text-[#A88F1D] transition-colors">
                                                <a href="<?php the_permalink(); ?>" class="hover:underline">
                                                    <?php
                                                    $title = get_the_title();
                                                    if (!empty($search_query)) {
                                                        $title = preg_replace(
                                                            '/(' . preg_quote($search_query, '/') . ')/i',
                                                            '<mark class="bg-[#A88F1D]/20 text-[#A88F1D] font-medium px-1 rounded">$1</mark>',
                                                            $title
                                                        );
                                                    }
                                                    echo $title;
                                                    ?>
                                                </a>
                                            </h2>
                                            
                                            <!-- Meta info -->
                                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-4">
                                                <span class="flex items-center gap-1">
                                                    <i class="far fa-calendar-alt text-[#A88F1D]"></i>
                                                    <?php echo get_the_date('d M Y'); ?>
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <i class="far fa-user text-[#A88F1D]"></i>
                                                    <?php the_author(); ?>
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <i class="far fa-folder-open text-[#A88F1D]"></i>
                                                    <?php the_category(', '); ?>
                                                </span>
                                            </div>
                                            
                                            <!-- Extracto con highlighting -->
                                            <div class="text-gray-600 mb-4 line-clamp-3">
                                                <?php
                                                $excerpt = get_the_excerpt();
                                                if (!empty($search_query)) {
                                                    $excerpt = preg_replace(
                                                        '/(' . preg_quote($search_query, '/') . ')/i',
                                                        '<mark class="bg-[#A88F1D]/20 text-[#A88F1D] font-medium px-1 rounded">$1</mark>',
                                                        $excerpt
                                                    );
                                                }
                                                echo $excerpt;
                                                ?>
                                            </div>
                                            
                                            <!-- Enlace de lectura -->
                                            <a href="<?php the_permalink(); ?>" 
                                               class="inline-flex items-center text-[#A88F1D] hover:text-[#8B7718] font-medium transition-colors group/link">
                                                <span>Leer artículo completo</span>
                                                <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition-transform"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                                
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Paginación premium -->
                        <?php if ($total_pages > 1) : ?>
                            <div class="mt-12">
                                <nav class="flex flex-col sm:flex-row items-center justify-between gap-4" aria-label="Paginación">
                                    <p class="text-sm text-gray-500">
                                        <?php printf(
                                            esc_html__('Mostrando página %d de %d', 'letrasflch'),
                                            $current_page,
                                            $total_pages
                                        ); ?>
                                    </p>
                                    
                                    <?php
                                    $pagination_args = array(
                                        'prev_text' => '<i class="fas fa-chevron-left"></i><span class="hidden sm:inline ml-2">Anterior</span>',
                                        'next_text' => '<span class="hidden sm:inline mr-2">Siguiente</span><i class="fas fa-chevron-right"></i>',
                                        'type'      => 'array',
                                        'mid_size'  => 2,
                                        'end_size'  => 1,
                                        'total'     => $total_pages,
                                        'current'   => $current_page,
                                    );
                                    
                                    $pagination_links = paginate_links($pagination_args);
                                    
                                    if ($pagination_links) : ?>
                                        <ul class="flex flex-wrap items-center gap-2">
                                            <?php foreach ($pagination_links as $link) : 
                                                $class = strpos($link, 'current') ? 'bg-[#A88F1D] text-white border-[#A88F1D]' : 'bg-white border-gray-200 hover:bg-[#A88F1D] hover:text-white hover:border-[#A88F1D]';
                                                $link = str_replace('page-numbers', "px-4 py-2 border rounded-lg transition-all duration-300 {$class}", $link);
                                            ?>
                                                <li><?php echo $link; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </nav>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Sidebar con contenido relevante -->
                    <aside class="lg:col-span-1 space-y-6">
                        
                        <!-- Widget: Categorías populares -->
                        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-[#0A1E3C] mb-4 flex items-center gap-2">
                                <i class="fas fa-tags text-[#A88F1D]"></i>
                                Categorías populares
                            </h3>
                            <div class="space-y-2">
                                <?php wp_list_categories([
                                    'title_li' => '',
                                    'show_count' => true,
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'number' => 8,
                                    'style' => 'list',
                                    'class' => 'space-y-2'
                                ]); ?>
                            </div>
                        </div>
                        
                        <!-- Widget: Contenido destacado -->
                        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-[#0A1E3C] mb-4 flex items-center gap-2">
                                <i class="fas fa-star text-[#A88F1D]"></i>
                                Destacados
                            </h3>
                            
                            <?php
                            $featured_query = new WP_Query([
                                'posts_per_page' => 3,
                                'meta_key' => '_thumbnail_id',
                                'ignore_sticky_posts' => 1
                            ]);
                            
                            if ($featured_query->have_posts()) : ?>
                                <div class="space-y-4">
                                    <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="group flex gap-3 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                                    <?php the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-300']); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div>
                                                <h4 class="font-medium text-[#0A1E3C] group-hover:text-[#A88F1D] transition-colors line-clamp-2">
                                                    <?php the_title(); ?>
                                                </h4>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    <?php echo get_the_date('d M Y'); ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Widget: Ayuda -->
                        <div class="bg-gradient-to-br from-[#0A1E3C] to-[#143B63] rounded-2xl shadow-lg p-6 text-white">
                            <h3 class="text-lg font-bold mb-3 flex items-center gap-2">
                                <i class="fas fa-life-ring text-[#A88F1D]"></i>
                                ¿Necesitas ayuda?
                            </h3>
                            <p class="text-white/80 text-sm mb-4">
                                Si no encuentras lo que buscas, contáctanos directamente.
                            </p>
                            <a href="/contacto" class="inline-flex items-center text-[#A88F1D] hover:text-[#C6A43F] font-medium transition-colors group">
                                <span>Contactar soporte</span>
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </aside>
                </div>
                
            <?php else : ?>
                
                <!-- =================================== -->
                <!-- ESTADO SIN RESULTADOS - UX PREMIUM  -->
                <!-- =================================== -->
                <div class="max-w-3xl mx-auto text-center py-12">
                    
                    <!-- Ilustración animada -->
                    <div class="relative w-40 h-40 mx-auto mb-8">
                        <div class="absolute inset-0 bg-[#A88F1D]/10 rounded-full animate-ping-slow"></div>
                        <div class="absolute inset-4 bg-[#A88F1D]/20 rounded-full animate-pulse-slow"></div>
                        <div class="absolute inset-8 bg-[#A88F1D] rounded-full flex items-center justify-center shadow-2xl">
                            <i class="fas fa-search text-4xl text-white"></i>
                        </div>
                    </div>
                    
                    <h2 class="text-3xl md:text-4xl font-bold text-[#0A1E3C] mb-4">
                        No encontramos resultados
                    </h2>
                    
                    <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                        No hay resultados para 
                        <span class="text-[#A88F1D] font-semibold">"<?php echo esc_html($search_query); ?>"</span>. 
                        Prueba con otras palabras clave o explora nuestras categorías.
                    </p>
                    
                    <!-- Sugerencias inteligentes -->
                    <div class="bg-white rounded-2xl p-8 shadow-sm mb-8 text-left">
                        <h3 class="text-lg font-semibold text-[#0A1E3C] mb-6 flex items-center gap-2">
                            <i class="fas fa-lightbulb text-[#A88F1D] text-xl"></i>
                            Sugerencias para mejorar tu búsqueda
                        </h3>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-check text-xs text-[#A88F1D]"></i>
                                    </div>
                                    <p class="text-gray-600">Revisa la ortografía de las palabras</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-check text-xs text-[#A88F1D]"></i>
                                    </div>
                                    <p class="text-gray-600">Usa términos más generales</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-check text-xs text-[#A88F1D]"></i>
                                    </div>
                                    <p class="text-gray-600">Prueba con sinónimos o palabras relacionadas</p>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-check text-xs text-[#A88F1D]"></i>
                                    </div>
                                    <p class="text-gray-600">Utiliza menos palabras clave</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-check text-xs text-[#A88F1D]"></i>
                                    </div>
                                    <p class="text-gray-600">Navega por nuestras categorías principales</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-6 h-6 rounded-full bg-[#A88F1D]/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i class="fas fa-check text-xs text-[#A88F1D]"></i>
                                    </div>
                                    <p class="text-gray-600">Contacta a soporte para ayuda personalizada</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Búsquedas populares -->
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <h4 class="text-sm font-medium text-gray-500 mb-4">Búsquedas populares en la facultad:</h4>
                            <div class="flex flex-wrap gap-2">
                                <?php
                                $popular_searches = ['Pregrado', 'Posgrado', 'Idiomas', 'Biblioteca', 'Investigación', 'Admisión', 'CEID', 'Malla curricular'];
                                foreach ($popular_searches as $term) : ?>
                                    <a href="<?php echo esc_url(home_url('/?s=' . urlencode($term))); ?>" 
                                       class="px-4 py-2 bg-gray-100 hover:bg-[#A88F1D] hover:text-white rounded-full text-sm transition-all duration-300">
                                        <?php echo esc_html($term); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Acciones principales -->
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" 
                           class="px-8 py-4 bg-[#0A1E3C] hover:bg-[#143B63] text-white font-semibold rounded-xl transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl">
                            <i class="fas fa-home"></i>
                            Ir al inicio
                        </a>
                        <a href="/mapa-del-sitio" 
                           class="px-8 py-4 bg-white hover:bg-gray-50 text-[#0A1E3C] font-semibold rounded-xl transition-all duration-300 border border-gray-200 flex items-center gap-2 shadow-sm hover:shadow">
                            <i class="fas fa-sitemap"></i>
                            Mapa del sitio
                        </a>
                    </div>
                </div>
                
            <?php endif; ?>
        </div>
    </section>
    
    <!-- =================================== -->
    <!-- SECCIÓN "¿NO ENCUENTRAS?" - CTA      -->
    <!-- =================================== -->
    <?php if ($found_posts < 3) : ?>
        <section class="py-16 bg-white border-t border-gray-100">
            <div class="container-custom">
                <div class="max-w-4xl mx-auto text-center">
                    <div class="bg-gradient-to-r from-[#F8F6F2] to-white rounded-3xl p-12 shadow-sm border border-gray-100">
                        <h2 class="text-3xl md:text-4xl font-bold text-[#0A1E3C] mb-4">
                            ¿No encuentras lo que buscas?
                        </h2>
                        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                            Nuestro equipo está listo para ayudarte a encontrar la información que necesitas.
                        </p>
                        
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="/contacto" 
                               class="px-8 py-4 bg-[#A88F1D] hover:bg-[#8B7718] text-white font-semibold rounded-xl transition-all duration-300 flex items-center gap-2 shadow-lg hover:shadow-xl">
                                <i class="fas fa-headset"></i>
                                Contactar soporte
                            </a>
                            <a href="/preguntas-frecuentes" 
                               class="px-8 py-4 border-2 border-[#A88F1D] text-[#A88F1D] hover:bg-[#A88F1D] hover:text-white font-semibold rounded-xl transition-all duration-300 flex items-center gap-2">
                                <i class="fas fa-question-circle"></i>
                                Ver FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

</main>

<!-- Scripts específicos para la página de búsqueda -->
<script>
(function() {
    'use strict';
    
    document.addEventListener('DOMContentLoaded', function() {
        
        // Limpiar búsqueda con animación
        const clearButton = document.querySelector('.search-clear');
        if (clearButton) {
            clearButton.addEventListener('click', function(e) {
                const input = document.getElementById('search-field');
                input.value = '';
                input.focus();
                
                // Feedback visual
                input.classList.add('border-[#A88F1D]', 'scale-105');
                setTimeout(() => {
                    input.classList.remove('scale-105');
                }, 200);
            });
        }
        
        // Animación de entrada para resultados (Intersection Observer)
        if ('IntersectionObserver' in window) {
            const resultObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        resultObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '50px'
            });
            
            document.querySelectorAll('.search-result-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                card.style.transitionDelay = `${index * 0.1}s`;
                resultObserver.observe(card);
            });
        }
        
        // Autofocus en el campo de búsqueda (solo desktop)
        if (window.innerWidth >= 1024) {
            const searchField = document.getElementById('search-field');
            if (searchField && !searchField.value) {
                setTimeout(() => searchField.focus(), 500);
            }
        }
        
        // Guardar búsquedas recientes en localStorage
        const currentSearch = '<?php echo esc_js($search_query); ?>';
        if (currentSearch && currentSearch.length > 2) {
            let recentSearches = JSON.parse(localStorage.getItem('recentSearches') || '[]');
            recentSearches = [currentSearch, ...recentSearches.filter(s => s !== currentSearch)].slice(0, 5);
            localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
        }
    });
})();
</script>

<!-- Estilos adicionales para animaciones -->
<style>
@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(2deg); }
}

@keyframes float-slower {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(20px) rotate(-2deg); }
}

@keyframes bounce-subtle {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

@keyframes ping-slow {
    75%, 100% { transform: scale(1.5); opacity: 0; }
}

.animate-float-slow {
    animation: float-slow 8s ease-in-out infinite;
}

.animate-float-slower {
    animation: float-slower 12s ease-in-out infinite;
}

.animate-bounce-subtle {
    animation: bounce-subtle 2s ease-in-out infinite;
}

.animate-ping-slow {
    animation: ping-slow 3s cubic-bezier(0, 0, 0.2, 1) infinite;
}

.animation-delay-200 {
    animation-delay: 200ms;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

[x-cloak] { 
    display: none !important; 
}

/* Highlight de búsqueda */
mark {
    background-color: rgba(168, 143, 29, 0.2);
    color: #A88F1D;
    font-weight: 500;
    padding: 0.1rem 0.3rem;
    border-radius: 0.25rem;
}

/* Estilos para paginación */
.pagination .current a,
.pagination .current span {
    background-color: #A88F1D !important;
    color: white !important;
    border-color: #A88F1D !important;
}

/* Hover en cards */
.search-result-card {
    position: relative;
    z-index: 1;
}

.search-result-card:hover {
    z-index: 10;
}

/* Scrollbar personalizada */
.overflow-y-auto::-webkit-scrollbar {
    width: 8px;
}

.overflow-y-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
    background: #A88F1D;
    border-radius: 10px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: #8B7718;
}
</style>

<?php get_footer(); ?>