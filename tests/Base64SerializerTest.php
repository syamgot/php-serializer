<?php

require_once __DIR__ . '/../src/com/syamgot/php/serializer/Base64Serializer.php';

use com\syamgot\php\serializer\Base64Serializer;

/**
 * Base64Serializer unit test
 * 
 * @author syamgot
 */
class Base64SerializerTest extends PHPUnit_Framework_TestCase 
{
	
	/** **************************************************
	*
	* Tests
	*
	************************************************** */

	/**
	 * @param mixed $value
	 * @param boolean $res
	 * 
	 * @dataProvider providerSerialize
	 */
	public function testSerialize($value, $res) 
	{
		$this->assertEquals($this->object->serialize($value), $res);
	}
	
	/**
	 * @param mixed $value
	 * 
	 * @dataProvider providerDeserialize
	 * @depends testSerialize
	 */
	public function testDeserialize($value) 
	{
		$this->assertTrue($this->object->serialize($value));
		$this->assertTrue($this->object->deserialize($this->object->getSerializedValue()));
		$this->assertEquals($this->object->getDeserializedValue(), $value);
	}

	/** **************************************************
	*
	* setup and teardown
	*
	************************************************** */
	
	/**
	 * 
	 */	
	public static function setUpBeforeClass() {}
	
	/**
	 * 
	 */
	protected function setUp() 
	{
		$this->object = new Base64Serializer();
	}
	
	/**
	 * 
	 */
	protected function tearDown() {}
	
	/**
	 * 
	 */
	public static function tearDownAfterClass() {}
	
	/** **************************************************
	 * 
	 * propeties
	 * 
	 ************************************************** */
	
    /**
     * @var Base64Serializer
     */
    protected $object;
	
	/** **************************************************
	 * 
	 * Data Providers
	 * 
	 ************************************************** */
    
    /**
	 * array($value, $res)
     */
    public function providerSerialize() {
    	return array(
    		  array('hogehoge', true)
    		, array(null, true)
    	);
    }
    
    /**
	 * array($value, $res)
     */
    public function providerDeserialize() {
    	return array(
    		  array('hogehoge')
    	);
    }
    
}

