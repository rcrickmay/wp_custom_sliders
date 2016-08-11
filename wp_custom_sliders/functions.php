<?php
// Register Nav Walker
// Used here for sake of simplicity
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'wp_custom_sliders' ),
    'secondary' => __( 'Secondary Menu', 'wp_custom_sliders' )
) );

?>