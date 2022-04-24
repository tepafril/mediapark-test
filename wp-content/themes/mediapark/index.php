<?php get_header(); ?>


  <!-- Start Gallery -->
  <?php get_template_part( 'partials/gallery' ); ?>
  <!-- End Gallery -->


  <!-- Start tables -->
  <?php get_template_part( 'partials/table' ); ?>
  <!-- End tables -->

  

  <!-- Start Blog -->
  <?php get_template_part( 'partials/blog' ); ?>
  <!-- End Blog -->


  <div class="p-2">&nbsp;</div>

  <!-- Start Contact Form -->
  <?php get_template_part( 'partials/contactform' ) ?>
  <!-- End Contact Form -->

  
<?php get_footer(); ?>