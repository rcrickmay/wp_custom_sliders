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

  $dir = strtolower($_SESSION['se_custom_sliders']);

  //This array will hold all the image addresses
  $result = array();

  //Get all the files in the specified directory
  $files = scandir($dir);

  foreach($files as $file) {

    switch(ltrim(strstr($file, '.'), '.')) {

      //If the file is an image, add it to the array
      case "jpg": case "jpeg":case "png":case "gif":

        $result[] = $_SESSION['se_template_dir'] . "/sliders/" . $dir . "/" . $file;

      }
  }


    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

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

