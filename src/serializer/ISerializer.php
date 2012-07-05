<?php

/**
 * 
 * データのシリアライズ機能を提供します。
 * 
 * @package serializer
 * @author syamgot
 * 
 */
interface ISerializer 
{
	/**
	 * データをシリアライズします。
	 * 
	 * @param mixed $value 
	 * @return boolean
	 */
	public function serialize($value);
	
	/**
	 * データをデシリアライズします。
	 * 
	 * @param mixed $value 
	 * @return boolean
	 */
	public function deserialize($value);
	
	/**
	 * シリアライズ済みの値を返します
	 * 
	 * @return string
	 */
	public function getSerializedValue();
	
	/**
	 * デシリアライズ済みの値を返します
	 * 
	 * @return string
	 */
	public function getDeserializedValue();
	
}