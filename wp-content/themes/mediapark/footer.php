

        <!-- Start Footer -->
        <footer class="mt-10 pt-10 pb-10 dark-footer">

          <div class="container">

            <div class="row">
              <div class="col-xsm-12 col-md-6 col-lg-3">
                <h2 class="pt-0 pb-0"><?= get_field('foot_menu_label_1', 'option') ?></h2>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',
                        'menu_class' => 'footer-nav',
                        'container'=> ''
                    ));
                ?>
              </div>
              
              <div class="col-xsm-12 col-md-6 col-lg-3">
                <h2 class="pt-0 pb-0"><?= get_field('foot_menu_label_2', 'option') ?></h2>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',
                        'menu_class' => 'footer-nav',
                        'container'=> ''
                    ));
                ?>

              </div>
              
              <div class="d-xsm-none d-sm-none d-md-none d-lg-block col-lg-6">
                <div class="social-media-container">
                  <div class="social-media-box pb-5">
                    <a href="<?= get_field('social_media_facebook', 'option') ?>" target="_blank" class="p-5"><i class="fa fa-facebook fa-2x"></i></a>
                    <a href="<?= get_field('social_media_instagram', 'option') ?>" target="_blank" class="p-5"><i class="fa fa-instagram fa-2x"></i></a>
                  </div>
                </div>
              </div>
            </div>

        </footer>
        <!-- End Footer -->
        
        <?php wp_foot(); ?>
   </body> 
</html> 