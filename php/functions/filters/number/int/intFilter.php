<?php

// require_once Configuration
require_once __DIR__ . DIRECTORY_SEPARATOR . "int-config.php";

// Int filter for Leaf
function intFilter($input) {

    // If $input is_string and is an int
    if (
        is_string($input) &&
        preg_match(
            "/" . INT_NUM_STRING . "/",
            $input
        )
    )

        // Parse as int
        $input = (int) $input;

    // Return $input
    return $input;

}