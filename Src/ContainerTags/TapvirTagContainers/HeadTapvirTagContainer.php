<?php
/**
 * Description of HeadTapvirTagContainer
 *
 * @author Tapvir Singh.
 */
namespace Src\ContainerTags\TapvirTagContainers;

use Src\SingleTags\TapvirTag;
use Src\SingleTags\TapvirTags\HeadLinkTapvirTag;

use Src\ContainerTags\TapvirTagContainer;

use Src\Classes\TTagsConfigProcessor;
use Src\Classes\BSCSS_Overrider_TTag;   

class HeadTapvirTagContainer extends TapvirTagContainer{
    
	private $headLink;
	// private $html;

    function __construct($pageHeaders = null) {


        // Adds Google Analytics Script if it's not null.
        $this->addGoogleAnalyticsScript();

        // initiate css framework.
        $this->initiateCSSFramework();

        $this->appendHtml($this->headLink);

        $gFlinks = $this->linkGoogleFonts();
        if($gFlinks !== null){
        	$this->appendHtml($gFlinks);
        }

        $this->parseHeadArray($pageHeaders);

        $this->loadStyleSheets();

        $this->overrideBSCSS();

        // Load the js scripts and embed those in the head. 
        $this->loadJSRawScripts(true);

        parent::__construct('head', null, $this->html);
    }

    private function initiateCSSFramework(){
        global $ttag_CSSframework;

        switch($ttag_CSSframework){
            case 'bootstrap':
                $this->initiateBootstrap();
        }
    }

    private function loadStyleSheets(){

        $sheets = include tta_StyleSettings('stylesheets');

    	foreach ($sheets  as $key => $value) {

    		$stylesheet  = new HeadLinkTapvirTag($value);
    		$this->appendHtml($stylesheet->get());
    		
    	}	
    }

    private function overrideBSCSS(){
    	$override = new BSCSS_Overrider_TTag();
    	$this->appendHtml($override->get());
    }

    private function addGoogleAnalyticsScript_op(){
        global $ttag_GoogleAnalyticsScript;

        if($ttag_GoogleAnalyticsScript !== null){
            $this->appendHtml($ttag_GoogleAnalyticsScript);
        }

    }

    private function addGoogleAnalyticsScript(){
        // global $ttag_GoogleAnalyticsScript;

        $analytics = file_get_contents(ttag_GoogleSettings('analytics'));

       /* if($analytics != false){
            $script = new ScriptTapvirTagContainer(null,$analytics);
            $this->appendHtml($script->get());
        }*/
        $this->appendHtml($analytics);
        // return $analytics;
    }

    private function linkGoogleFonts_op(){
    	// '<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Manrope:wght@300&family=Questrial&display=swap" rel="stylesheet">


    	$link = null;

    	global $ttag_GoogleFonts;

    	if(isset($ttag_GoogleFonts) && $ttag_GoogleFonts !== null && is_array($ttag_GoogleFonts)){

    		$attribute = '';

    		foreach ($ttag_GoogleFonts as $key) {
    			foreach ($key as $key2 => $value) {
    				if($attribute == ''){
    					$attribute = 'href = "https://fonts.googleapis.com/css2?'.$key2.'='.$value;
    				}else{
    					switch($key2){
							case 'family':
								$attribute .= '&'.$key2.'='.$value;
								break;
							case 'wght' :
								$attribute .= ':'.$key2.'@'.$value;
						}
    				}
    			}
    		}

			$attribute .= '&display=swap" rel = "stylesheet"';

    		$link = new TapvirTag('link',$attribute);

    	}

    	 return $link->getTagCode();
    }

    private function linkGoogleFonts(){
        // '<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Manrope:wght@300&family=Questrial&display=swap" rel="stylesheet">


        $link = null;

        $fonts = include ttag_GoogleSettings('fonts');

        if(isset($fonts) && $fonts !== null && is_array($fonts)){

            $attribute = '';

            foreach ($fonts as $key) {
                foreach ($key as $key2 => $value) {
                    if($attribute == ''){
                        $attribute = 'href = "https://fonts.googleapis.com/css2?'.$key2.'='.$value;
                    }else{
                        switch($key2){
                            case 'family':
                                $attribute .= '&'.$key2.'='.$value;
                                break;
                            case 'wght' :
                                $attribute .= ':'.$key2.'@'.$value;
                        }
                    }
                }
            }

            $attribute .= '&display=swap" rel = "stylesheet"';

            $link = new TapvirTag('link',$attribute);

        }

         return $link->getTagCode();
    }

	function initiateBootstrap(){

		$processor = new TTagsConfigProcessor();

		$bootstrapLink = $processor->getCDN('bootstrap','css');

		if($this->headLink === null){
			$this->headLink = $bootstrapLink;
		}else{
			$this->headLink .= $bootstrapLink;
		}
	}


    private function createTags($pageHead){
        foreach ($pageHead as $key => $value) {
            if(is_array($value)){

                if($key === 'meta'){

                    $meta = new \Src\TTags\MetaTTag($value);
                    $this->appendHtml($meta->get());

                }else{

                    foreach ($value as $key2 => $value2) {

                        $tag = new TapvirTag($key,$key2.'="'.$value2.'"',false);
                        $returned = $tag->getTagCode();
                        $this->appendHtml($returned);

                    }
                }

            }else{
                // returns for instance <title>xyz</title>
                $tag = new TapvirTagContainer($key,null,$value,false);
                $returned = $tag->getThisContainerHtml();
                $this->appendHtml($returned);
            }
        }
    }


	private function parseHeadArray($pageHead){

		global $ttag_PageHeaders;

		// So if no page headers are provided then use the default ones.
		if($pageHead === null || !is_array($pageHead)){
			// return null;
			$pageHead = $ttag_PageHeaders;
		}else{
			$pageHead = array_replace_recursive ($ttag_PageHeaders,$pageHead);
		}

		$this->createTags($pageHead);

	}
        


}