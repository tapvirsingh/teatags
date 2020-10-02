<?php

/**
 * Description of HtmlTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;
use Src\ContainerTags\TapvirTagContainers\{HeadTapvirTagContainer};

// use Src\TTags\DOCTYPE;


class HtmlTTag extends TapvirTagContainer{
    
    protected $autoCreateBody;

	// private $headLink;

    function __construct($data,$pageHeaders = null ,   $autoCreateBody = true) {

        $this->autoCreateBody = $autoCreateBody;

        //  Create Head Tag

        $data = is_object($data) ? $data->get() : $data;

        $head = new HeadTapvirTagContainer($pageHeaders);

        $htmlData = $head->get();
        $htmlData .= $this->createBody($data);
      
		// echos <!DOCTYPE>
		new DOCTYPE();

        parent::__construct('html', null, $htmlData, true);

    }

    protected function createBody($data){

        if($this->autoCreateBody){
            $body = new BodyTTag($data); 
            return  $body->get();
        }
        return $data;
    }

    // function embedCustomHeadLinks($customHeadLinks){
    // 	$this->headLink = null;

    // 	if(is_array($customHeadLinks)){
	   //  	foreach ($customHeadLinks as $value) {
	   //  		if($this->headLink === null){
	   //  			$this->headLink = $value;
	   //  		}else{
	   //  			$this->headLink .= $value;
	   //  		}
	   //  	}
    // 	}
    // }

    // function initiateBootstrap(){

    // 	$processor = new TTagsConfigProcessor();

    // 	$bootstrapLink = $processor->getCDN('bootstrap','css');

    // 	if($this->headLink === null){
    // 		$this->headLink = $bootstrapLink;
    // 	}else{
    // 		$this->headLink .= $bootstrapLink;
    // 	}
    // }

}