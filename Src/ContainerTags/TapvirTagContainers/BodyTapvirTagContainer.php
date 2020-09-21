<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class BodyTapvirTagContainer extends TapvirTagContainer{
    
	// private $jsScripts = null;

    function __construct($attribute, $textOrHtml,$jsScripts = null) {

    	$this->appendHtml($textOrHtml);

    	$this->loadJSScriptLinks();
    	$this->loadJSScripts();


        parent::__construct('body', $attribute, $this->html,false);
    }

    /*
    	Loads the Javascripts excluding Jquery, popper and bootstrap. These are loaded in BodyTTag
    */

    private function loadJSScriptLinks(){
		global $ttag_JsScriptLinks;

    	foreach ($ttag_JsScriptLinks as $value) {
    		$js  = new ScriptTapvirTagContainer($value);
    		$this->appendHtml($js->get());
    		
    	}	
    }

    private function loadJSScripts(){
		global $ttag_JsScripts;

		$scripts = null;
    	foreach ($ttag_JsScripts as $value) {
    		if($scripts == null){
    			$scripts = $value;
    		}else{
    			$scripts .= $value;
    		}
    		
    	}	
		$js  = new ScriptTapvirTagContainer(null,$scripts);
		$this->appendHtml($js->get());
    }

    

}