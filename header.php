<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Important Meta -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- WordPress Stuff -->
    <?php wp_head(); ?>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />

    <!-- FontAwesome -->
    <link rel="dns-prefetch stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>

    <header id="navbar-wrapper">
        <?php
        # Company Logo and Company Name
        $logo = get_field( 'company_logo', 'options' );
        $name = get_field( 'company_name', 'options' );
        ?>
        <button class="nav-toggle">
            <span class="icon icon-top"></span>
            <span class="icon icon-middle"></span>
            <span class="icon icon-bottom"></span>
        </button>

        <?php
        $header_background_color = get_field('header_background_color','options');
        $toggle_colors = get_field('toggle_colors','options');
        ?>

        <nav class="navbar-default desktop-menu clearfix"style="background:<?php echo $header_background_color; ?>;">
            <div class="container">
                <div class="logo-wrap pull-left">
                    <a href="<?php echo home_url(); ?>">
                    <?php if ( $logo ): ?>
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?> Logo" />
                    <?php else: ?>
                        <img src="https://placehold.it/125x50" alt="Placehold Logo" />
                    <?php endif; ?>
                    </a>
                </div>
                <?php
                # Register Desktop Menu
                wp_nav_menu(
                    array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 4,
                        'container'         => 'div',
                        'container_class'   => 'menu-navbar-container',
                        'menu_class'        => 'nav navbar-nav pull-right',
                        'fallback_cb'       => 'Bootstrap_Menu_Fallback',
                        'walker'            => new Bootstrap_Menu()
                    )
                );
                ?>
            </div>
        </nav>
        <div class="mobile-menu">
            <div class="logo-wrap">
                <a href="<?php echo home_url(); ?>">
                <?php if ( $logo ): ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $name; ?> Logo" />
                <?php else: ?>
                    <img src="https://placehold.it/125x50" alt="Placehold Logo" />
                <?php endif; ?>
                </a>
            </div>
            <nav class="mobile-nav">
            <?php
            # Register Mobile Menu
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'container_class' => false,
                    'menu_id' => false,
                    'fallback_cb' => '',
                    'depth' => 0
                )
            );
            ?>
            </nav>
        </div>
    </header>
