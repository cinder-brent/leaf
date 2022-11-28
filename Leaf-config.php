<?php

// Leaf configuration
	
	// Directories
		
		// PHP
		define(
			"PHP_DIR",
			"php" . DIRECTORY_SEPARATOR
		);
			
			// Classes
			define(
				"CLASS_DIR",
				PHP_DIR . "classes" . DIRECTORY_SEPARATOR
			);
			
			// Functions
			define(
				"FUNC_DIR",
				PHP_DIR . "functions" . DIRECTORY_SEPARATOR
			);

				// Filters
				define(
					"FILTER_DIR",
					FUNC_DIR . DIRECTORY_SEPARATOR . "filters" .
						DIRECTORY_SEPARATOR
				);