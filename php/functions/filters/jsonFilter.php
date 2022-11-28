<?php

// JSON filter for Leaf
function jsonFilter($input) {

	// If $input is_string, and is an array/object
	if (
		is_string($input) &&
		$decoded = json_decode($input)
	)

		// Parse it
		$input = $decoded;

	// Return $input
	return $input;

}