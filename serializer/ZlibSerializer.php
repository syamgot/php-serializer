<?php

require_once __DIR__ . '/../serializer/AbSerializer.php';
require_once __DIR__ . '/../serializer/ISerializer.php';

/**
 * 
 * ZLIBフォーマットによるシリアライズ機能を提供します。
 * 
 * @package serializer
 * @author syamgot
 *
 */
class ZlibSerializer extends AbSerializer implements ISerializer
{
	
	/**
	 * (non-PHPdoc)
	 * @see ISerializer::serialize()
	 */
	public function serialize($value) {
		$this->serializedValue = gzcompress($value);	
		return ($this->serializedValue !== false) ? true : false;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ISerializer::deserialize()
	 */
	public function deserialize($value) {
		$this->deserializedValue = gzuncompress($value);	
		return ($this->deserializedValue !== false) ? true : false;
	}
	
}