<?php

require_once __DIR__ . '/../serializer/ZlibSerializer.php';

/**
 * ZlibSerializer unit test
 * 
 * @author syamgot
 */
class ZlibSerializerTest extends PHPUnit_Framework_TestCase 
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
		$this->object = new ZlibSerializer();
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
     * @var ZlibSerializer
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

