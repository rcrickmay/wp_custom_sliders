<!-- GET HEADER -->
<?php get_header(); ?>

<!-- GET SILDER -->
<?php
    //Get post variables
    //store post_slug in session to get slides
    global $post; 
    $page_slug = $post -> post_name;
    $_SESSION['se_page_slug'] = strtolower($page_slug);
    
    //Get meta data to check if page has slides
    //page will load unique slides if '$key_1_name' is
    //'use_slides' and '$key_1_value' = 'unique'
    //otherwise default (blank) slides load
    $key_1_value = get_post_meta( get_the_ID(), 'custom_sliders', true );
    $confirm_custom = 'custom';
?>

<?php
//CUSTOM SLIDER CONDITIONS
    if ( ! empty( $key_1_value ) ) {
        
      if ( $key_1_value == $confirm_custom ) {
          $_SESSION['se_custom_sliders'] = strtolower($key_1_value);
          get_template_part( 'sliders/sliders', $_SESSION['se_custom_sliders'] );
        } else {
          get_template_part( 'sliders/sliders-generic' );
      }
      
    } else {
        get_template_part( 'sliders/sliders' );
    }   
    
?>


<div class="index-page-single container">
  <!-- WP LOOP HERE -->
  <br />
  <h4>&uarr; dependent on &darr;</h4>
  <h1>"SINGLE"</h1>
  <br />
</div>


<?php get_footer(); ?>	
	
	
