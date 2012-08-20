<?php

namespace com\syamgot\php\serializer {
	
	require_once __DIR__ . '/AbSerializer.php';
	require_once __DIR__ . '/ISerializer.php';

	use com\syamgot\php\serializer\AbSerializer;
	use com\syamgot\php\serializer\ISerializer;
	
		
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

}
