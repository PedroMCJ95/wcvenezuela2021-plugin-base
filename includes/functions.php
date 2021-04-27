<?php

// Security
if (!defined('ABSPATH')) exit;

// Include files
include_once slug_INC.'admin/functions.php';
include_once slug_INC.'public/functions.php';
include_once slug_INC.'schema/functions.php';

// Function that shows all the content of a variable
if ( ! function_exists( 'echop' ) ) {
    function echop( $var ) {
        echo '<pre>', var_dump( $var ), '</pre>';
    }
}
