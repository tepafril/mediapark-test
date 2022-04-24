<?php if ( shortcode_exists( 'call_unsplash_gallery' ) ) : ?>
    <div id="gallery-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="gallery-title mt-10"><?= get_field('gallery_label', 'option') ?></h1>
                </div>
            </div>
        </div>

        <div style="background-color: #fff; width: 70%; height: 780px; position: absolute; right: 0px; border-top-left-radius: 25rem;">
            &nbsp;
        </div>

        <div #swiperRef="" class="swiper mySwiper">

            <div class="swiper-wrapper">
            <?php
                $shortcode = do_shortcode( '[call_unsplash_gallery slide_item="5" keyword="France"]', FALSE );
                echo $shortcode;
            ?>
            </div>

            <div style="background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);width: 240px;position: absolute;right: 0px;top: 0px;height: 100%;z-index: 10;">
            &nbsp;
            </div>

            <div class="swiper-button-next">
            <a class="button button-circle button-primary"><i class="fa-solid fa-arrow-right-long fa-2x"></i></a>
            </div>
            <div class="swiper-button-prev">
            <a class="button button-circle button-primary"><i class="fa-solid fa-arrow-left-long fa-2x"></i></a>
            </div>
        </div>
        
    </div>
<?php endif; ?>
