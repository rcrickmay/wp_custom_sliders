<!-- GET HEADER -->
<?php get_header(); ?>

<!-- GET SILDER -->
<?php
    //Get meta data to check if page has slides
    //page will load unique slides if '$key_name' is
    //'use_slides' and '$key_value' = ['sliders_folder_name']
    //otherwise default (blank) slides load
    $key_value = get_post_meta( get_the_ID(), 'custom_sliders', true );
    $_SESSION['se_custom_sliders'] = strtolower($key_value);

    if ( ! empty( $key_value ) ) {
      get_template_part( 'sliders/sliders', 'custom' );
    }

?>


<div class="index-page-single container">
  <!-- WP LOOP HERE -->
  <br />
  <h4>&uarr; dependent on &darr;</h4>
  <h1>"PAGE"</h1>
  <br />
</div>


<?php get_footer(); ?>	
	
	
