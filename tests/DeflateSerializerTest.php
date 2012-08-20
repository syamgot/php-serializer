<?php

require_once __DIR__ . '/../src/com/syamgot/php/serializer/DeflateSerializer.php';

use com\syamgot\php\serializer\DeflateSerializer;

/**
 * DeflateSerializer unit test
 * 
 * @author syamgot
 */
class DeflateSerializerTest extends PHPUnit_Framework_TestCase 
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
		$this->object = new DeflateSerializer();
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
     * @var DeflateSerializer
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

