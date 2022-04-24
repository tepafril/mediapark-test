<!DOCTYPE html> 
<html>  
    <head> 
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <title>
            <?php if(is_front_page() || is_home()){
                echo get_bloginfo('name');
            } else{
                echo wp_title('');
            }?>
        </title>

   </head> 
   

   <style>
   </style>


   <body>

        <!-- Start Header-->
        <header style="height:72px;">
            <div style="position: fixed;top: 0;width: 100%; background-color:#fff; z-index:100;">
                <div class="container">
                    <div class="row">
                        <div  class="col-sm-12">
                            <nav class="nav d-xsm-none d-md-none d-lg-flex">

                                <ul class="nav-bar logo-container">
                                    <li><a href="#"><?= get_field('text-logo', 'option') ?></a></li>
                                </ul>

                                <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'menu_id' => 'desk-nav',
                                        'menu_class' => 'nav-bar pull-right',
                                        'container'=> ''
                                    ));
                                ?>

                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Simulate a smartphone / tablet -->
                <nav class="mobile-container d-md-block d-lg-none d-xlg-none">

                    <!-- Top Navigation Menu -->
                    <div class="topnav">
                        <a href="#home" class="active"><?= get_field('text-logo', 'option') ?></a>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary-menu',
                                    'menu_id' => 'hamburger-toggle',
                                    'menu_class' => 'nav-bar',
                                    'container'=> ''
                                ));
                            ?>
                            <a href="javascript:void(0);" class="icon" id="hamburger-button">
                            <i class="fa fa-bars fa-lg"></i>
                        </a>
                    </div>

                </nav>

            </div>
        </header>
        <!-- End Header-->
