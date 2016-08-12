# wp_custom_sliders
Custom Sliders for each page in WP based on WP post/page-slug and a single custom variable


//*****************************//
//******** Version 0.2 ********//
//*****************************//
- Reduced code complexity by reducing multiple dependencies
- Removed dependence on Page_Slug
- Changed WP Custom Variable 'custom_sliders' to respond to a folder name directly rather than look for 'unique', 'generic', and etc.
- The value of the 'custom_sliders' WP Custom Variable will be stored as the session variable $_SESSION['custom_sliders'], and this value will correlate exactly with the folder of the same name, where slides are stored
- Removed upper- lower- case dependencies
- Added DESTORY SESSION to php code block, once sliders are loaded

Example of reduction below:

NEW 'getimages.php' code block:
$dir = strtolower($_SESSION['se_custom_sliders']);

PREVIOUS 'getimages.php' code block:
$dir = strtolower($_SESSION['se_page_slug']);


NEW 'page.php' code block:
//-------------------------------

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

-------------------------------//


PREVIOUS 'page.php' code block:
//-------------------------------

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

-------------------------------//





//*****************************//
//******** Version 0.1 ********//
//*****************************//

FILE TREE:
  - THEME:
    "/wp_custom_sliders"

  - SLIDES:
    "/wp_custom_sliders/slides"

  - CUSTOM SLIDES:
    "/wp_custom_sliders/slides/[wp_page_slug]"
    - Where, [wp_page_slug] is the Page/Post Slug variable in wordpress
    - Slug defaults to the page/post name
    - Spaces in the page/post name are replaced with a "-"
    - Name your folders using the "-" format


WP DASHBOARD CUSTOM VARIABLES:
 - Turn on custom variables for your posts/pages;
 - Add a custom variable called 'custom_slider';
 - You can now use this variable on any post/page that you want to have custom sliders on;
 - To use custom sliders, create a folder that is the same name as the post/page-slug
 - the rest will be taken care of...



SESSION VARIABLES:
  - $_SESSION['se_template_dir']
    = WP function: get_template_directory_uri();
    * I had to create a session variable for this WP function, to be able to use the value within 'getimages.php', as it the file was not able to access the WP function...
  
  - $_SESSION['slug_name'] 
    = current page/post slug-name
  
  - $_SESSION['custom_sliders']
    = 'none' (default)
    = 'custom' : starts if/search for custom-page-slug folder
    = 'generic' : starts if/search for generic-page-slug folder
    *  Incorrect inputs default to 'slider-generic.php'
    ** If no 'generic' then defaults to 'slider.php'
    *** If no 'slider.php' then Boom!




CONDITIONS (determined by page/single.php, lines 26-41):
  (A) IF $key_value is not empty;

      (I) AND, IF $key_value is equal to $confirm_custom;
          (1) WHERE, $confirm_custom is set to a string 'custom';
          (2) THEN, get set session variable 'se_custom_sliders' equal to $key_value;
          (3) THEN, GET file 'sliders-custom.php';
              (a) ELSE, GET file 'sliders.php'

      (II) ELSE, GET file 'sliders-generic.php'

  (B) ELSE, get 'sliders.php'
    
