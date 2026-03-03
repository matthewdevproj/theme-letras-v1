<?php
/**
 * Letras FLCH Theme Functions
 *
 * @package LetrasFLCH
 */

/**
 * Walker personalizado para menú desktop - VERSIÓN CORREGIDA
 */
class Letras_FLCH_Walker_Nav extends Walker_Nav_Menu {
    
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        if ($depth === 0) {
            $output .= "\n$indent<ul class=\"sub-menu absolute left-0 top-full mt-0 shadow-xl py-2 min-w-[250px] z-50 hidden group-hover:block\">\n";
        } else {
            $output .= "\n$indent<ul class=\"sub-menu absolute left-full top-0 shadow-xl py-2 min-w-[250px] z-50 hidden group-hover:block\">\n";
        }
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        
        $li_classes = array('relative');
        if ($has_children) {
            $li_classes[] = 'group';
        }
        
        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '#';
        
        if ($depth === 0) {
            $link_classes = 'block px-4 py-2 text-sm font-medium text-white hover:text-[#A88F1D] transition-colors duration-200';
        } else {
            $link_classes = 'block px-4 py-2 text-sm text-white hover:text-[#A88F1D] hover:bg-[#1E4A7A] transition-all duration-200 whitespace-nowrap';
        }
        
        if ($has_children && $depth === 0) {
            $link_classes .= ' flex items-center gap-1';
        }
        
        $atts['class'] = $link_classes;
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
        }
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        
        if ($has_children) {
            if ($depth === 0) {
                $item_output .= '<i class="ml-1 text-xs fas fa-chevron-down transition-transform duration-200 group-hover:rotate-180"></i>';
            } else {
                $item_output .= '<i class="ml-2 text-xs fas fa-chevron-right transition-transform duration-200"></i>';
            }
        }
        
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

/**
 * Walker para menú móvil con Tailwind - VERSIÓN CORREGIDA
 */
class Letras_FLCH_Mobile_Walker_Nav extends Walker_Nav_Menu {
    
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"pl-4 mt-2 space-y-2 hidden\">\n";
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        
        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '#';
        
        $link_classes = 'block py-2 text-white hover:text-[#A88F1D] transition-colors duration-200';
        
        if ($has_children) {
            $link_classes .= ' flex items-center justify-between w-full';
            $output .= '<div class="flex items-center justify-between w-full">';
        }
        
        $atts['class'] = $link_classes;
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
        }
        
        $item_output = $args->before;
        
        if ($has_children) {
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= '<button class="mobile-submenu-toggle p-2 text-white hover:text-[#A88F1D] focus:outline-none transition-colors duration-200" onclick="toggleMobileSubmenu(this); return false;">';
            $item_output .= '<i class="fas fa-chevron-down transition-transform duration-200"></i>';
            $item_output .= '</button>';
            $item_output .= '</div>';
        } else {
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
        }
        
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}