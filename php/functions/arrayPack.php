<?php

/**
 * Pack data in an array suitable for processing.
 *
 * arrayPack packs $data in an array (under key $key) suitable for
 * interpretation by a machine. It formats the data as though it were already
 * packed and ready to be fed through a loop, resulting in shorter
 * implementation syntax.
 *
 * If $data is an array with key $key, it will be packed in an array and
 * returned.
 *
 * @param mixed $data The data to pack into the array.
 * @param int|string $key The key to use when packing the array.
 *
 * @return mixed The (un)formatted data.
 */
// Pack array
function arrayPack(
	$data,
	int|string $key = 0
) {
	
	// If $data is_array
	if (is_array($data)) {
		
		// If $data[$key] isset
		if (isset($data[$key]))
			
			// Wrap $data in an array
			$data = [$data];
			
		// Otherwise
		else
			
			// Wrap $data in a couple arrays
			$data = [[$key => $data]];
			
	}
	
	// Otherwise
	else
		
		// Pack $data in a few arrays
		$data = [[$key => [$data]]];
		
	// Return $data
	return $data;
	
}