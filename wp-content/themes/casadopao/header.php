<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>

        <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php bloginfo('template_directory'); ?>/css/casadopao.css" rel="stylesheet">
        <link href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">

        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- header -->
        <nav class="navbar navbar-default navbar-fixed-top">
        <div id="header">
            <!--
            <div class="header-bar">
                <div class="container">
                    <ul class="social-network-header social-circle-header">
                        <?php if (CustomOption::get_site_meta("facebook")) : ?>
                            <li><a href="<?php echo CustomOption::get_site_meta("facebook"); ?>" target="_blank" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>

                        <?php if (CustomOption::get_site_meta("instagram")) : ?>
                            <li><a href="<?php echo CustomOption::get_site_meta("instagram"); ?>" class="icoInstagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <?php endif; ?>

                        <?php if (CustomOption::get_site_meta("twitter")) : ?>
                            <li><a href="<?php echo CustomOption::get_site_meta("twitter"); ?>" class="icoTwitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>

                        <?php if (CustomOption::get_site_meta("linkedin")) : ?>
                            <li><a href="<?php echo CustomOption::get_site_meta("linkedin"); ?>" class="icoLinkedin" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif; ?>

                        <?php if (CustomOption::get_site_meta("youtube")) : ?>
                            <li><a href="<?php echo CustomOption::get_site_meta("youtube"); ?>" class="icoYoutube" title="Youtube" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            -->
            <div class="container header-content">
                <div class="col-logo">
                    <a href="/home">
                        <!--
                        <img src="<?php bloginfo('template_directory'); ?>/images/style-sheets-sistemas-web.png" width="250" alt=""/>
                        -->
                    </a>
                </div>
                <div class="col-menu">
                    <nav class="animenu">
                        <button class="animenu__toggle">
                            <span class="animenu__toggle__bar"></span>
                            <span class="animenu__toggle__bar"></span>
                            <span class="animenu__toggle__bar"></span>
                        </button>
                        <?php
                        $defaults = array(
                            'theme_location' => 'primary',
                            'menu' => 'menu',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'animenu__nav',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => new My_Walker_Nav_Menu()
                        );
                        wp_nav_menu($defaults);
                        ?>
                        <!--<ul class="animenu__nav">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="who.html">Who</a></li>
                                <li><a href="what.html">What</a>
                                        <ul class="animenu__nav__child">
                                                <li><a href="inbound-websites.html">Inbound Websites</a></li>
                                                <li><a href="inbound-content-marketing.html">Inbound & Content Marketing</a></li>
                                                <li><a href="inbound-video-marketing.html">Inbound Video Marketing </a></li>
                                        </ul>
                                </li>
                                <li><a href="case-studies.html">Case Studies</a></li>
                                <li><a href="resources.html">Resources</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                        </ul>-->
                    </nav>
                </div>
                <div class="col-search">
                    <input type="search" class="form-control">
                </div>
            </div>
        </div>
        </nav>
