<?php

// Null filter for Leaf
function nullFilter($input) {

    // If $input is_string and is null
    if (
        is_string($input) &&
        preg_match(
            "/null/",
            $input
        )
    )

        // Parse as null
        $input = null;

    // Return $input
    return $input;

}