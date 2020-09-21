<?php

// Takes an array (of object or sting or html) and
// joins those and returns html
function ttag_getCombinedHtml($array){
	if(!is_array($array)){
		return null;
	}
	$html = null;

	foreach ($array as $key => $value) {
		if($html === null){
			if(is_object($value ))
				$html = $value->get();
			elseif(is_string($value))
				$html = $value;
		}else{
			if(is_object($value ))
				$html .= $value->get();
			elseif(is_string($value))
				$html .= $value;
		}

	}
	return $html;

}

// Gets html from array, object or simple html
function ttag_getData($data){
	if(is_array($data )){
        return ttag_getCombinedHtml($data);
    }
	return is_object($data) ? $data->get() : $data;
	
}

//  debuging function
function debugTTag($array){
	echo '<pre>';
	// echo '<code>';
	var_dump(print_r($array));
	// echo '</code>';
	echo '</pre>';
}

// Get complete address of MD or its sub directory
function ttag_MdDir($dir = null){
	if($dir !== null)
		return ROOT.'MD/'.$dir.'/';
	else
		return ROOT.'MD/';
}


// Convert space to dash.
function ttag_spaceToDash($var){
	$var = strtolower($var);
	return preg_replace('/[[:space:]]+/', '-', $var);
}

// Loads the view file
function ttag_View($file = null){

	global $ttag_PHPFileExtention;

	if($file !== null)
		return ROOT.'Views/'.$file.$ttag_PHPFileExtention;
	else
		return ROOT.'Views/';
}

// Loads the Image file.
function ttag_Image($file){
	return ttag_theme().'/'.'Images/'.$file;
}

// Loads the Md file
function ttag_MdFile($file, $doNotPrependDir = false){
	global $ttag_MDFileExtention;
	if(!$doNotPrependDir)
		return ROOT.'MD/'.$file.$ttag_MDFileExtention;
	else
		return $file.$ttag_MDFileExtention;
}

// Loads the file at root
function ttag_RootView($file){
	global $ttag_PHPFileExtention;
	return ROOT.$file.$ttag_PHPFileExtention;
}

// Loads the index file
function ttag_IndexView(){
	global $ttag_PHPFileExtention;
	return ROOT.'index'.$ttag_PHPFileExtention;
}

// Returns the current theme's directory
function ttag_theme(){
	global $ttag_Theme;
	return ROOT.'Themes/'.$ttag_Theme;
}