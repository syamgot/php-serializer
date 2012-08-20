<?php


/**
 * 
 * serializer の抽象クラスです。
 * 
 * @package serializer
 * @author syamgot
 *
 */
class AbSerializer
{
	
	/**
	 * 直近のシリアライズ済みの値を返します
	 * 
	 * @return string
	 */
	public function getSerializedValue()
	{
		return $this->serializedValue;	
	}
	
	/**
	 * 直近のデシリアライズ済みの値を返します
	 * 
	 * @return string
	 */
	public function getDeserializedValue()
	{
		return $this->deserializedValue;	
	}

	protected $serializedValue = null;
	protected $deserializedValue = null;
	
}

