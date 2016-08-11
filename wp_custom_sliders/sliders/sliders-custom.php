<!-- SLIDER -->
  <div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <!-- Wrapper for slides -->      
      <div id="build-sliders" class="carousel-inner" role="listbox">
        <!-- ADD IMAGE REQUESTS BUILT INTO DIVs BELOW -->
        <div class="item active" id="slider-0"></div>
        <div class="item" id="slider-1"></div>
        <div class="item" id="slider-2"></div>
        <div class="item" id="slider-3"></div>
        <div class="item" id="slider-4"></div>
        <!-- MAX SLIDERS SET BY # OF DIVs -->        
     </div>      
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>




<script>
    //**************************************************************************//
    //**************************************************************************//
    //JS, JSON, PHP, AJAX FRAMEWORK PROVIDED BY jeffrey-sweeney @ StackOverflow //
    //**************************************************************************//
    //**************************************************************************//
    //
    //
    //The div element that will contain the images
    var imageContainer = document.getElementById("build-sliders");
    //Makes an asynch request, loading the getimages.php file
    function callForImages() {
        //Create the request object
        var httpReq = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
        //When it loads,
        httpReq.onload = function() {
            //Convert the result back into JSON
            var result = JSON.parse(httpReq.responseText);
            //Show the images
            loadImages(result);
        }
        //Request the page
        try {
          
          //getimages.php is a re-usable file of code
          //that, when run, will get the images in the
          //folder of the name of the #page_slug
          
            httpReq.open("GET", <?php echo '"' . get_template_directory_uri() . '/sliders/getimages.php"'; ?>, true);
            httpReq.send(null);
        } catch(e) {
            console.log(e);
        }
    }
    //Generates the images and sticks them in the container
    function loadImages(images) {
        //For each image,
        for(var i = 0; i < images.length; i++) {
            //Make a new image element, setting the source to the source in the array
            var divFound = "#slider-" + i;
            var newImage = document.createElement("img");
            newImage.setAttribute("src", images[i]);
            newImage.setAttribute("alt", i);                    
            //Add it to the container
            $(divFound).prepend(newImage);
        }
    }
  
    callForImages();
  //
  //
  //
  //**************************************************************************//
  //**************************************************************************//
  //**************************************************************************//  
</script>
<!-- /SLIDER -->      