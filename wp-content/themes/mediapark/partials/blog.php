<?php if ( shortcode_exists( 'call_unsplash_blog' ) ) : ?>
    <div class="mt-5">
        <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="gallery-title mt-10"><?= get_field('news_label', 'option') ?></h1>
            </div>
        </div>
        </div>
    </div>

    <div id="blog-container" class="pt-10 pb-10 mb-10 box-shadow">
        <div class="container">
        <div class="row remove-margin">

        <?php
            $shortcode = do_shortcode( '[call_unsplash_blog slide_item="6" keyword="siemreap"]', FALSE );
            echo $shortcode;
        ?>

        </div>
        </div>


        <div class="text-center">
        <a href="#" class="button button-round">Daugiau naujienų <i class="fa-solid fa-arrow-right-long fa-lg pl-6"></i></a>
        </div>
    </div>
<?php endif; ?>
