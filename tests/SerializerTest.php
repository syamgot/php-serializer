<?php

require_once __DIR__ . '/../src/com/syamgot/php/serializer/Serializer.php';
require_once __DIR__ . '/../src/com/syamgot/php/serializer/Base64Serializer.php';
require_once __DIR__ . '/../src/com/syamgot/php/serializer/DeflateSerializer.php';
require_once __DIR__ . '/../src/com/syamgot/php/serializer/MsgpackSerializer.php';
require_once __DIR__ . '/../src/com/syamgot/php/serializer/ZlibSerializer.php';

use com\syamgot\php\serializer\Serializer;
use com\syamgot\php\serializer\Base64Serializer;
use com\syamgot\php\serializer\DeflateSerializer;
use com\syamgot\php\serializer\MsgpackSerializer;
use com\syamgot\php\serializer\ZlibSerializer;


/**
 * Serializer unit test
 * 
 * @author syamgot
 */
class SerializerTest extends PHPUnit_Framework_TestCase 
{
	
	/** **************************************************
	*
	* Tests
	*
	************************************************** */

	/**
	 * 
	 */
	public function testAddSerializer()
	{
		try {
			$s = new Serializer();
			$s->addSerialier(new stdClass());
		} catch (InvalidArgumentException $e) {
			return;
		}
		$this->fail('期待通りの例外が発生しませんでした。');
	}
	
	/**
	 * @param mixed $value
	 * @param boolean $res
	 * 
	 * @dataProvider providerSerialize
	 */
	public function testSerialize($serializers, $defaultValue, $serializedValue) 
	{
		$s = new Serializer();
		foreach($serializers as $key => $value)
		{
			$s->addSerialier($value);	
		}
		$this->assertTrue($s->serialize($defaultValue));
		$this->assertEquals($s->getSerializedValue(), $serializedValue);
	}
	
	/**
	 * 
	 * Enter description here ...
	 * 
	 * @dataProvider providerDeserialize
	 */
	public function testDeserialize($serializers, $serializedValue, $defaultValue) 
	{
		$s = new Serializer();
		foreach($serializers as $key => $value)
		{
			$s->addSerialier($value);	
		}
		$this->assertTrue($s->deserialize($serializedValue));
		$this->assertEquals($s->getDeserializedValue(), $defaultValue);
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
		$this->object = new Serializer();
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
     * @var Serializer
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
    	
				  array(array(
    				  new Base64Serializer
    				, new DeflateSerializer
    			), 'abcde12345', gzdeflate(base64_encode('abcde12345')))
    			
				, array(array(
					  array('name' => 'Msgpack')
					, array('name' => 'Zlib')
    			), 'abcde12345', gzcompress(msgpack_serialize('abcde12345')))
    			
    	);
    }
    
    /**
	 * array($value, $res)
     */
    public function providerDeserialize() {
    	return array(
    	
				  array(array(
    				  new Base64Serializer
    				, new DeflateSerializer 
    			), gzdeflate(base64_encode('abcde12345')), 'abcde12345')
    			
				, array(array(
					  array('name' => 'Msgpack')
					, array('name' => 'Zlib')
    			), gzcompress(msgpack_serialize('abcde12345')), 'abcde12345')
    			
    	);
    }
    
}

