<section class="testimonial-slider">
  <div class="flexslider">
    <ul class="slides">

      <?php
        $args = array(
          'post_type' => 'testimonial',
          'posts_per_page' => 5,
          'orderby' => 'rand'
          );

        $testimonials = new WP_Query( $args );

          if ( $testimonials -> have_posts() ){

          while ( $testimonials -> have_posts() ) {
            $testimonials -> the_post();

          if (function_exists ('get_field')){
            if (get_field('testimonial')){

              echo '<li><blockquote><figure>" ';
              the_field('testimonial');
              echo ' "<figcaption>';
              the_title();
              echo '</figcaption></figure></blockquote></li>';
            }
          }
        }
        wp_reset_postdata();
      }
      ?>
    </ul>
  </div>

</section>
