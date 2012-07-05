<?php

require_once __DIR__ . '/../serializer/AbSerializer.php';
require_once __DIR__ . '/../serializer/ISerializer.php';

/**
 * 
 * MsgPack フォーマットによるシリアライズ機能を提供します。
 * 
 * @package serializer
 * @author syamgot
 *
 */
class MsgpackSerializer extends AbSerializer implements ISerializer
{
	
	/**
	 * (non-PHPdoc)
	 * @see ISerializer::serialize()
	 */
	public function serialize($value) {
		$this->serializedValue = msgpack_serialize($value);	
		return ($this->serializedValue !== false) ? true : false;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see ISerializer::deserialize()
	 */
	public function deserialize($value) {
		$this->deserializedValue = msgpack_unserialize($value);	
		return ($this->deserializedValue !== false) ? true : false;
	}
	
}