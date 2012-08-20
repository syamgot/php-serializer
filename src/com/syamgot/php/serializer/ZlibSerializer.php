<?php

namespace com\syamgot\php\serializer {
	
	require_once __DIR__ . '/AbSerializer.php';
	require_once __DIR__ . '/ISerializer.php';

	use com\syamgot\php\serializer\AbSerializer;
	use com\syamgot\php\serializer\ISerializer;

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
	
}