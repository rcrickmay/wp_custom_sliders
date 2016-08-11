<?php
  //**************************************************************************//
  //**************************************************************************//
  //JS, JSON, PHP, AJAX FRAMEWORK PROVIDED BY jeffrey-sweeney @ StackOverflow //
  //**************************************************************************//
  //**************************************************************************//

  //This page is independent;
  //Must call session_start() and vars.
  //
  session_start();

  $dir = strtolower($_SESSION['se_page_slug']);

  //This array will hold all the image addresses
  $result = array();

  //Get all the files in the specified directory
  $files = scandir($dir);

  foreach($files as $file) {

    switch(ltrim(strstr($file, '.'), '.')) {

      //If the file is an image, add it to the array
      case "jpg": case "jpeg":case "png":case "gif":
      //Where "/sliders/" below is the folder that
      //contains your page specific sliders folders
        $result[] = $_SESSION['se_template_dir'] . "/sliders/" . $dir . "/" . $file;

      }
  }

  //Convert the array into JSON
  $resultJson = json_encode($result);

  //Output the JSON object
  //This is what the AJAX request will see
  echo($resultJson);
  //
  //
  //
  //**************************************************************************//
  //**************************************************************************//
  //**************************************************************************// 
?>

