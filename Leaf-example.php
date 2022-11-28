<pre><?php

// Leaf example

	// Errors
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	// require_once

		// Leaf-config.php
		require_once "Leaf-config.php";

		// Leaf
		require_once CLASS_DIR . "Leaf.php";

		// Filters

			// nullFilter
			require_once FILTER_DIR . "nullFilter.php";

			// booleanFilter
			require_once FILTER_DIR . "booleanFilter.php";

			// Numbers

				// number-filter-config.php
				require_once FILTER_DIR . "number" . DIRECTORY_SEPARATOR .
					"number-filter-config.php";

				// intFilter
				require_once NUMBER_FILTER_DIR . "int" . DIRECTORY_SEPARATOR .
					"intFilter.php";

				// floatFilter
				require_once NUMBER_FILTER_DIR . "float" . DIRECTORY_SEPARATOR .
					"floatFilter.php";

			// jsonFilter
			require_once FILTER_DIR . "jsonFilter.php";

	// Create the actual Leaf itself
	$Leaf = new Leaf(
		"test.leaf",
		new Filters,
		new Filters([
			new Filter("floatFilter"),
			new Filter("intFilter"),
			new Filter("jsonFilter"),
			new Filter("nullFilter"),
			new Filter("booleanFilter")
		])
	);

	// Create some dummy data
	$Leaf->setValue("{\"myVar\":\"hello world!\"}");

	// Display the results
	print_r($Leaf);
		
		// getValue
		var_dump($Leaf->getValue());