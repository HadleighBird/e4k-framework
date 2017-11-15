jQuery(document).ready( function($) {

    /**
     * Mobile Navigation
     * Added dropdown list for mobiles etc...
     */
    $( 'header#navbar-wrapper button.nav-toggle' ).click( function( e ) {
        e.preventDefault();
        $(this).toggleClass( 'collapse' );
        $(this).toggleClass( 'collapsed' );
        $( 'div.mobile-menu nav.mobile-nav' ).toggleClass( 'active' );
    } );
    $( 'div.mobile-menu li.menu-item-has-children > a' ).append( '<i class ="toggle fa fa-angle-down"></i>' );
    $( 'div.mobile-menu li i.toggle' ).click( function( e ) {
        e.preventDefault();
        $(this).toggleClass( 'active' );
        $(this).parents( 'a' ).siblings().toggleClass( 'active' );
    } );

    /**
     * Controls the Dropdown FadeIn and FadeOut on hover of a link
     * that has dropdown items
     */
    $('nav.desktop-menu li.dropdown').hover( function() {
        $(this).find( '.dropdown-menu' ).fadeIn( 200 );
    },
    function() {
        $(this).find( '.dropdown-menu' ).stop(true, true).delay(200).fadeOut();
    });

    $('.main-carousel').flickity({
      // options
      cellAlign: 'left',
      wrapAround: 'true',
      autoPlay: 'true'
    });

    /**
     * Custom jQuery
     * [Important: Add your jQuery methods below]
     */

});