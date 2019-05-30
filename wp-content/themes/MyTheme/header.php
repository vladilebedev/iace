<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="header_wrap">
            <div class="logo_container">
                <?php the_custom_logo(); ?>
            </div>
            <div class="icon_container">
                <ul>
                    <li>
                        <div class="contact_icon fa fa-map-marker"></div>
                        <br>
                        <div class="cont_text">
                            <?php $options = get_option('sample_theme_options');
                                echo $options['addresstext']; ?>
                        </div>
                    </li>
                    <li>
                        <?php $options = get_option('sample_theme_options'); ?>
                        <div class="contact_icon fa fa-envelope-o"></div>
                        <br>
                        <div class="cont_text">
                            <a href="mailto:<?php echo $options['mailtext']; ?>" target="_blank">
                                <?php echo $options['mailtext']; ?>
                            </a>
                        </div>
                    </li>
                    <li>
                        <?php $options = get_option('sample_theme_options'); ?>
                        <div class="contact_icon fa fa-phone"></div>
                        <br>
                        <div class="cont_text">
                            <a href="tel:<?php echo $options['phonetext1']; ?>" target="_blank">
                                <?php echo $options['phonetext1']; ?>
                            </a>
                            <br>
                            <a href="tel:<?php echo $options['phonetext2']; ?>" target="_blank">
                                <?php echo $options['phonetext2']; ?>
                            </a>
                            <br>
                                <a href="tel:<?php echo $options['phonetext3']; ?>" target="_blank">
                                    <?php echo $options['phonetext3']; ?>
                                </a>
                            <br>
                            <?php 
                                $idObj = get_category_by_slug('contacts');
                                $id = $idObj->term_id;
                                if ( have_posts() ) : query_posts('cat=' . $id . '&orderby=ID&order=ASC');
                                    while (have_posts()) : the_post(); 
                                        the_content();
                                    endwhile;
                                endif;
                                wp_reset_query();
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu_wrap">
            <nav class="nav_menu">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'nav navbar-nav',
                        'menu_id' => '',
                        'depth' => 1
                    ));
                ?>
            </nav>
        </div>
    </header>