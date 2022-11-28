<?php

// Number filters configuration

    // NUMBER_FILTER_DIR
    define(
        "NUMBER_FILTER_DIR",
        FILTER_DIR . "number" . DIRECTORY_SEPARATOR
    );

    // Regular expressions
        
        // Whitespaces
        define(
            "WHITESPACES",
            "\s*"
        );

        // LNUM
        define(
            "LNUM",
            "[0-9]+"
        );

        // DNUM
        define(
            "DNUM",
            "([0-9]*)[\.]" . LNUM . "|(" . LNUM . "[\.][0-9]*)"
        );

        // EXPONENT_DNUM
        define(
            "EXPONENT_DNUM",
            "((" . LNUM . "|" . DNUM . ")[eE][+-]?" . LNUM . ")"
        );