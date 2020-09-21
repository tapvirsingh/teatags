<?php

static class TTagInit{

	static function init(){
		spl_autoload_register(function ($class_name) {
    		require $class_name . '.php';
		});
	}

};