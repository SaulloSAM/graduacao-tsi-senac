<html lang='pt_BR'>
    <head>
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
        <link href="style.css" rel="stylesheet">
        <!--[if IE]> <link rel="stylesheet" href="ie.css" type="text/css"/> <![endif]-->
    </head>

    <body class="home blog">
        <nav>
            <div id="top-bar-tile">
                <div id="top-bar-content">
                    <h1><!-- Nome ou Icone do Site -->
                        <a id="link_Home" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                    </h1>

                    <!-- <span class="slogan"><?php // bloginfo('deion'); ?></span> -->

                    <div id="search-box"><!-- search-box -->
                        <form method="get" id="searchform" action="">
                            <input  type="text"
                                    placeholder="Pesquisa"
                                    onfocus="if(this.value == this.defaultValue) this.value = ''" 
                                    name="s" 
                                    id="s" />
                        </form>
                    </div>

                </div> <!-- top-bar-content -->
            </div> <!-- top-bar-tile -->

            <div id="nav-bar-tile">
                <?php wp_nav_menu(array( 'menu' => 'mainnav', 'menu_class' => 'nav-bar-content',
                                        'menu_id' => 'navigation', 'container' => false,
                                        'theme_location' => 'primary-menu', 'show_home' => '1'));
                ?>
            </div> <!-- nav-bar-tile -->
        </nav>

        <div id="wrapper">
            <div id="content">