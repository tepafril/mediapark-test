<div id="contact-form-container" class="pt-10 pb-10 box-shadow">
    <div class="container">
        <div class="row">
            <div class="d-xsm-none d-sm-none d-md-none d-lg-block col-lg-6 pt-10 pb-10">
            <?php
                $callcenter = new WP_Query(array(
                    'post_type' =>  'callcenter',
                    'order'     => 'ASC',
                    'per_page'  => 3,
                ));
            ?>

            <?php while ( $callcenter->have_posts() ) : $callcenter->the_post(); ?>
                <div class="flex-wrap mb-10">
                    <div class="logo-box">
                    <div class="logo"><img src="<?=get_field('thunbnail')['url']?>"></div>
                    </div>
                    <div class="content ml-10">
                    <div class="name pb-2"><?=get_field('nick_name')?></div>
                    <div class="email pb-2"><?=get_field('email')?></div>
                    <div class="phone pb-2"><?=get_field('contact_phone')?></div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>


            <div class="col-xsm-12 col-sm-12 col-md-12 col-lg-6">
            <h1 class="title mt-5"><?= get_field('contact_form_label', 'option') ?></h1>
            <?php echo do_shortcode( '[contact-form-7 id="56" title="Contact form 1" html_id="contact-form" html_class="form-control"]' ); ?>
            </div>
        </div>
    </div>
</div>