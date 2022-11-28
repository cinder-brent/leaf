<?php

// require_once Configuration
require_once __DIR__ . DIRECTORY_SEPARATOR . "float-config.php";

// Float filter for Leaf
function floatFilter($input) {

    // If $input is_string, and we have a float
    if (
        is_string($input) &&
        preg_match(
            "/" . FLOAT_NUM_STRING . "/",
            $input
        )
    )

        // Parse as float
        $input = (float) $input;

    // Return $input
    return $input;
    
}