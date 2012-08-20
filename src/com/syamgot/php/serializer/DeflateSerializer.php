<?php

require_once __DIR__ . '/../serializer/AbSerializer.php';
require_once __DIR__ . '/../serializer/ISerializer.php';

/**
 * 
 * DEFLATEフォーマットによるシリアライズ機能を提供します。
 * 
 * @package serializer
 * @author syamgot
 *
 */
class DeflateSerializer extends AbSerializer implements ISerializer
{
	
	/**
	 * (non-PHPdoc)
	 * @see ISerializer::serialize()
	 */
	public function serialize($value) {
		$this->serializedValue = gzdeflate($value);	
		return ($this->serializedValue !== false) ? true : false;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ISerializer::deserialize()
	 */
	public function deserialize($value) {
		$this->deserializedValue = gzinflate($value);	
		return ($this->deserializedValue !== false) ? true : false;
	}
	
}