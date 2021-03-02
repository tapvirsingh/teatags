<?php
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainers\BodyTapvirTagContainer;

class BodyTTag extends BodyTapvirTagContainer{

	// private $jsScripts = null;
    private $bodyInnerHtml = null;

    function __construct($bodyInnerHtml,$class = null, $extraAttributes = null) {

        global $ttag_BS_BG_Class;

        $this->bodyInnerHtml = ttag_getData($bodyInnerHtml);

        // $this->bodyInnerHtml = $bodyInnerHtml;

    	// $bootstrapScripts = $this->createBootstrapJSScripts();

    	// $this->bodyInnerHtml .= $bootstrapScripts;

        $attribute = 'class = "'.$ttag_BS_BG_Class;

    	if($class !== null){
    		$attribute .= ' '.$class;
    	}

        $attribute .= '"';

    	if($extraAttributes !== null){
    		$attribute .= ' '.$extraAttributes;
    	}

        $this->createFooter();

        parent::__construct($attribute, $this->bodyInnerHtml );
    }

    protected function createFooter(){
        // global $ttag_Footer;
        
        $footer = new FooterTTag();
        $this->bodyInnerHtml .= $footer->get();
         // $this->bodyInnerHtml .= $ttag_Footer->get();
    }

	 function createBootstrapJSScripts(){

    	$processor = new TTagsConfigProcessor();
    	
    	// Get js cdn links
    	// $jsJQueryCDN = $processor->getCDN('jquery');
    	$jsPopperCDN = $processor->getCDN('popper');
    	$jsBootstrapCDN = $processor->getCDN('bootstrap');

    	// $bootstrapScripts = $jsJQueryCDN.$jsPopperCDN.$jsBootstrapCDN;
        $bootstrapScripts = $jsPopperCDN.$jsBootstrapCDN;

		return $bootstrapScripts;
    }
}