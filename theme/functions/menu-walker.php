<?php
/**
 * Class Name: Bootstrap Menu
 * Version: 1.2.1
 * Author: E4K Digital Agency
 */
class Bootstrap_Menu extends Walker_Nav_Menu {

    function check_current( $classes )
    {
        return preg_match( '/(current[-_])|active|dropdown/', $classes );
    }

    function start_lvl( &$output, $depth = 0, $args = array() )
    {
        $output .= ( $depth == 0 ) ? '<ul class="dropdown-menu">' : '<ul class="child-list">';
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $item_html = '';

        parent::start_el( $item_html, $item, $depth, $args );

        if ( $item->is_dropdown && stristr( $item_html , 'dropdown-link') && ( $depth === 0 ) ) {
            $item_html = str_replace( '<a', '<a class="dropdown-link" href=" ' . $item->url . ' "', $item_html );
        }

        else {
            if ( $item->is_dropdown && ( $depth === 0 ) )
            {
                $item_html = str_replace( '<a', '<a class="dropdown-toggle"', $item_html );
            }
            else if ( stristr( $item_html , 'li class="dropdown-header') )
            {
                $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html );
            }
            else if ( stristr( $item_html, 'disabled' ) )
            {
                $item_html = preg_replace( '/<a[^>]*>.*?<\/a>/iU' , '<a class="no-link">' . $item->title . '</a>', $item_html);
            }
        }
        $item_html = apply_filters( 'roots_wp_nav_menu_item', $item_html );
        $output .= $item_html;
    }

    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output )
    {
        $element->is_dropdown = ( ( ! empty( $children_elements[ $element->ID ] ) && ( $depth + 1 ) < $max_depth || ( $max_depth === 0 ) ) );
        if ( $element->is_dropdown )
        {
            $element->classes[] = 'dropdown';
        }
        if ( $element && ( $depth === 1 ) )
        {
            $element->classes[] = 'dropdown-item menu-col';
        }
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}

function Bootstrap_Menu_Fallback()
{
    $fb_output = '<ul class="nav navbar-nav">';
    $fb_output .= '<li><a href="' . esc_url( home_url() ) . '">Home</a></li>';
    if ( current_user_can( 'manage_options' ) )
    {
        $fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">Add a Menu</a></li>';
    }
    $fb_output .= '</ul>';
    echo $fb_output;
}