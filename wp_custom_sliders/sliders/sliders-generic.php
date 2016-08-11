<!-- SLIDER -->
<div id="carousel-container">
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
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo get_template_directory_uri() . '/sliders/generic/placeholder1.png' ?>" alt="01">
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri() . '/sliders/generic/placeholder2.png' ?>" alt="02">
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri() . '/sliders/generic/placeholder3.png' ?>" alt="03">
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri() . '/sliders/generic/placeholder4.png' ?>" alt="04">
        </div>

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
</div>
<!-- /SLIDER -->