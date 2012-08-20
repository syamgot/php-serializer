<?php

namespace com\syamgot\php\serializer {
	
	require_once __DIR__ . '/AbSerializer.php';
	require_once __DIR__ . '/ISerializer.php';

	use com\syamgot\php\serializer\AbSerializer;
	use com\syamgot\php\serializer\ISerializer;
	
	use \InvalidArgumentException;

	class Serializer extends AbSerializer implements ISerializer
	{
		
		public function __construct()
		{	
			$this->_serialisers = array();	
		}
		
		public function addSerialier($value)
		{
			if (is_array($value)) {
				$classname = $value['name'].'Serializer';
				unset($value['name']);
				require_once __DIR__ . "/$classname.php";
				$classname = __NAMESPACE__."\\$classname";
				$this->_serialisers[$classname] = new $classname($value);
			} else if ($value instanceof ISerializer) {
				$this->_serialisers[get_class($value)] = $value;
			} else {
				throw new InvalidArgumentException('引数は配列型か、ISerializerインタフェース実装したクラスでなければなりません.');
			}
		}
	
		/**
		 * (non-PHPdoc)
		 * @see ISerializer::serialize()
		 */
		public function serialize($value)
		{
			$buf = $value;
			
			if (is_array($this->_serialisers)) 
			{
				foreach ($this->_serialisers as $serializer) 
				{
					if (!$serializer->serialize($buf)) 
					{
						return false;	
					}
					else
					{
						$buf = $serializer->getSerializedValue();
					}
				}
			}
			
			$this->serializedValue = $buf;
			return true;
		}
	
		/**
		 * (non-PHPdoc)
		 * @see ISerializer::deserialize()
		 */
		public function deserialize($value)
		{
			$buf = $value;
			
			if (is_array($this->_serialisers)) 
			{
				
				$this->_serialisers = array_reverse($this->_serialisers);
				
				foreach ($this->_serialisers as $serializer) 
				{
					if (!$serializer->deserialize($buf)) 
					{
						return false;	
					}
					else
					{
						$buf = $serializer->getDeserializedValue();
					}
				}
			}
			
			$this->deserializedValue = $buf;
			return true;
		}	
		
		/**
		 * @var array
		 */
		private $_serialisers;	
		
	}
		
}		


