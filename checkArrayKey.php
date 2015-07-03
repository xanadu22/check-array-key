<?PHP

/**
 * Checks whether a key exists within a given array of unknown dimensions.
 * Returns true if the key was found, false if not.
 */
function arrayKeyExists($inputArray, $keyToFind) {
	if (!is_array($inputArray))
		return false;
	
	foreach ($inputArray as $curKey => $curValue) {
		if ($curKey === $keyToFind) // we found it!
			return true;
		elseif (is_array($curValue) && arrayKeyExists($curValue, $keyToFind)) // make the recursive call
			return true;
	}

	return false; // default case, key not found
}


function testArrayKeyExists($testArray, $testKey, $expected)
{
	$keyExists = arrayKeyExists($testArray, $testKey);
	if ($keyExists === $expected)
		echo "TEST PASSED" . PHP_EOL;
	else {
		echo "TEST FAILED" . PHP_EOL;
		echo "Expected $expected does not match actual $keyExists" . PHP_EOL;
		echo "Test Key: $testKey" . PHP_EOL;
		echo "Test Array: " . PHP_EOL;
		print_r($testArray);
	}
}

