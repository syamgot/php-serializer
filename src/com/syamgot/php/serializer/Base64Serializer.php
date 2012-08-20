<?php

namespace com\syamgot\php\serializer {

	require_once __DIR__ . '/AbSerializer.php';
	require_once __DIR__ . '/ISerializer.php';

	use com\syamgot\php\serializer\AbSerializer;
	use com\syamgot\php\serializer\ISerializer;
	
	
	/**
	 * 
	 * BASE64エンコードによるシリアライズ機能を提供します。
	 * 
	 * @package serializer
	 * @author syamgot
	 *
	 */
	class Base64Serializer extends AbSerializer implements ISerializer
	{
		
		/**
		 * (non-PHPdoc)
		 * @see ISerializer::serialize()
		 */
		public function serialize($value) {
			$this->serializedValue = base64_encode($value);	
			return ($this->serializedValue !== false) ? true : false;
		}
		
		/**
		 * (non-PHPdoc)
		 * @see ISerializer::deserialize()
		 */
		public function deserialize($value) {
			$this->deserializedValue = base64_decode($value);	
			return ($this->deserializedValue !== false) ? true : false;
		}
		
	}

}

