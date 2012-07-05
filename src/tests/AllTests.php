<?php
//require_once 'PHPUnit/Framework/TestSuite.php';

class AllTests {
	
	public static function suite() {
		
		$suite = new PHPUnit_Framework_TestSuite();

		foreach (self::$tests as $value)
		{
			require_once $value.'.php';
			$suite->addTestSuite($value);
		}
		
		return $suite;
	}

	protected static $tests = array(
		  'Base64SerializerTest'
		, 'DeflateSerializerTest'
		, 'MsgpackSerializerTest'
		, 'ZlibSerializerTest'
	);
}
