<?php


/**
 * Description of ScriptTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class ScriptTTag extends TapvirTagContainer{


	function __construct($parameters,$dataToAppend = null){
		$this->parameters = $parameters;

		$attribute = $this->createScriptTagAttribute();

		$dataToAppend = ttag_getData($dataToAppend);

		parent::__construct('script', $attribute, $dataToAppend);

	}	

	protected function createScriptTagAttribute(){
		$attributes = null;
		foreach($this->parameters as $parameter => $value){


			if(isset($value) && $value !== null){
				$attributes[] = ' '.$parameter.'="'.$value.'"';
			}else{
				$attributes[] = ' '.$parameter;
			}
		}
		$attribute = ttag_getCombinedHtml($attributes);

		return $attribute;
	}


}