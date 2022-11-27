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

	// Create the actual Leaf itself

		// Dummy filters

			// Input
			function dummyIFilter($input) {

				// Simple filter
				return $input . "[0]";

			}

			// Output
			function dummyOFilter($input) {

				// Simple filter
				return $input . "[1]";

			}

		// Construct Leaf
		$Leaf = new Leaf(
			"test.leaf",
			new Filters(new Filter("dummyIFilter")),
			new Filters(new Filter("dummyOFilter"))
		);

	// Create some dummy data
	//$Leaf->setValue("Hello world!");

	// Display the results
	print_r($Leaf);
		
		// getValue
		var_dump($Leaf->getValue());
