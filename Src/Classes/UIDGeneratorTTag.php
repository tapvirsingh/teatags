<?php

namespace Src\Classes;

 class UIDGeneratorTTag {

	static protected $className;
	static protected $time;

	static function getUID($className){
		self::$className = (new \ReflectionClass($className))->getShortName();
		self::setTime();
		return self::$className.self::$time;
	}

	private function setTime(){
		self::$time = time();
	}
}