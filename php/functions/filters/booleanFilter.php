<?php

// Boolean filter for Leaf
function booleanFilter($input) {

    // If $input is_string
    if (is_string($input)) {

        // Switch $input
        switch ($input) {

            // False
            case "false":

                // Set $input to false
                $input = false;

                // Break
                break;

            // True
            case "true":

                // Set $input to true
                $input = true;

        }

    }

    // Return $input at this point
    return $input;

}