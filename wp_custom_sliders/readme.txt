//******************************************************//
//**********************  README  **********************//
//******************************************************// 


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
    
