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
	$printed = print_r($array,true);
	var_dump($printed);
	// echo '</code>';
	echo '</pre>';
}

// Get complete address of MD or its sub directory
function ttag_MdDir($dir = null){
	if($dir !== null)
		return MD_ROOT.$dir.'/';
	else
		return MD_ROOT;
}


// Convert space to dash.
function ttag_SpaceToDash($var){

	$var = strtolower($var);
	return preg_replace('/[[:space:]]+/', '-', $var);
}

// Convert dash to space.
function ttag_DashToSpace($var){
	$var = strtolower($var);
	return preg_replace('/[-]+/', ' ', $var);
}

// Loads the view file
function ttag_View($file = null){

	global $ttag_PHPFileExtention;

	if($file !== null)
		return ROOT.'views/'.$file.$ttag_PHPFileExtention;
	else
		return ROOT.'views/';
}

function cleanedUrl($url = null){
	if($url !== null)
		return ROOT.$url.'/';	
	else
		return ROOT;	
}

// Loads the javascript from javascript folder.

// Loads the dependencies
function ttag_Depend(){
	return ROOT.'Dependences';
}
// fontawesome
// fontawesome
// Load FontAwesome
function ttag_FontAwesome($filename){
	return ttag_Depend().'/fontawesome/js/'.$filename;
}

// Loads the Image file.
function ttag_Image($file){
	return ttag_Theme().'/'.'images/'.$file;
}

// Load the image from /Image/ folder.
function ttag_RootImage($file){
	return IMAGES_ROOT.$file;
}

// Load the image from /Image/ folder.
function ttag_RootSettings($file){
	return SETTINGS_ROOT.$file.'.php';
}

// Google Settings.
function ttag_GoogleSettings($file){
	if($file == 'analytics')
		return GOOGLE_SETTINGS.$file.'.html';
	else
		return GOOGLE_SETTINGS.$file.'.php';
}

// Load the image from /Image/ folder.
function ttag_FooterSettings($file){
	return FOOTER_SETTINGS.$file.'.php';
}

// Load the image from /image/ folder.
function tta_NavBrandSettings($file){	
	return NAVBRAND_SETTINGS.$file.'.php';
}

// Load the script from /script/ folder.
function tta_ScriptSettings($file, $script = 'javascript'){	
	return SCRIPTS_SETTINGS.$script.'/'.$file.'.php';
}

// Load the script from /script/ folder.
function tta_StyleSettings($file){	
	return STYLES_SETTINGS.$file.'.php';
}

// Load the form's structure from /forms/structure/ dir.
function tta_FormStructSettings($file){	
	return FORMSTRUCT_SETTINGS.'/'.$file.'.php';
}

// Load the form's settings from /forms/settings/ dir.
function tta_FormSettings($file){	
	return FORMSETTING_SETTINGS.'/'.$file.'.php';
}

// Load the form's classes from /forms/classes/ dir.
function tta_FormClasses($file){	
	return FORMCLASSES_SETTINGS.'/'.$file.'.php';
}

// Load the form's parameters from /forms/parameters/ dir.
function tta_FormParaSettings($file){	
	return FORMPARA_SETTINGS.'/'.$file.'.php';
}

// Load the form's parameters from /forms/parameters/ dir.
function ttag_EmbeddedJS($file){	
	return EMBEDDED_JS_ROOT.'/'.$file.'.js';
}

// Loads the Md file
function ttag_MdFile($file, $doNotPrependDir = false){
	global $ttag_MDFileExtention;
	if(!$doNotPrependDir)
		return MD_ROOT.$file.$ttag_MDFileExtention;
	else
		return $file.$ttag_MDFileExtention;
}

// Loads the affiliate file
function ttag_Affiliate($file){
	$fileContents = file_get_contents(AFFILIATE_ROOT.$file);
	if($fileContents === false){
		return null;
	}
	return $fileContents; 
}

// Loads the affiliate file
function ttag_LoadRegisteredAffiliates(){
	return AFFILIATE_ROOT.'/register.php';
}

// Loads the file at root
function ttag_RootView($file){
	global $ttag_PHPFileExtention;
	return ROOT.$file.$ttag_PHPFileExtention;
}

// Loads the index file
function ttag_IndexView(){
	global $ttag_PHPFileExtention;
	// return ROOT.'index'.$ttag_PHPFileExtention;
	return ROOT;
}

// Returns the current theme's directory
function ttag_Theme(){
	// global $ttag_Theme;
	return ROOT.'themes/'.TTAG_THEME;
}

// Check value if it is 
function is($value,$condition){
	return (isset($value) && $value === $condition);    
}

// Check value if its not
function isNot($value,$condition,$returnValue = false){
	$return = (isset($value) && $value !== $condition);    
	// if return value is set, then return value else return boolean.
	return $returnValue === true? $value : $return;
}

// Checks if a substring exists in a string. Returns boolean 
function contains($needle,$string){
	$bool = false;

	if(is_array($string)){

		foreach ($string as $key => $value) {
			$bool = strpos($key, $needle) !== false;
			if($bool){
				break;
			}
		}
		
	}else{
		$bool = strpos($string, $needle) !== false;
	}
	return $bool;
}

function getArticleRoot($file){
	$article_Root = ttag_View().'documentation.php';
	$article_RootWithVariable = $article_Root.'?'.$ttag_ArticleVariable.'=';
}

function isArrayAssoc(array $array) {
  return count(array_filter(array_keys($array), 'is_string')) > 0;
}

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

function concValueRef(&$var,$val){
	if($var === null){
		$var = $val;
	}else{
		$var .= ' '.$val;
	}
}
