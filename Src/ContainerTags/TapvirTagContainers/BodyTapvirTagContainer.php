<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;
// use Src\TTags\{ScriptTTag};

class BodyTapvirTagContainer extends TapvirTagContainer{
    
	// private $jsScripts = null;

    function __construct($attribute, $textOrHtml,$jsScripts = null) {

    	$this->appendHtml($textOrHtml);

    	$this->loadJSScriptLinks();
        // $this->loadJSRawScripts(true);
        $this->loadJSRawScripts();
    	$this->loadJSScripts();


        parent::__construct('body', $attribute, $this->html,false);
    }

    /*
    	Loads the Javascripts excluding Jquery, popper and bootstrap. These are loaded in BodyTTag
    */

    private function loadJSScriptLinks_op(){
		global $ttag_JsScriptLinks;

    	foreach ($ttag_JsScriptLinks as $value) {
    		$js  = new ScriptTapvirTagContainer($value);
    		$this->appendHtml($js->get());
    		
    	}	
    } 

    private function loadJSScriptLinks(){
        $jsScriptLinks = include tta_ScriptSettings('jslinks');

        foreach ($jsScriptLinks as $value) {
            $js  = new ScriptTapvirTagContainer($value);
            $this->appendHtml($js->get());
            
        }   
    }

    

    private function loadJSScripts(){
		$jsScripts = include tta_ScriptSettings('jsscripts');

		$scripts = null;
    	foreach ($jsScripts as $value) {
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