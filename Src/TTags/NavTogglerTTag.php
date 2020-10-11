<?php

namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class NavTogglerTTag extends TapvirTagContainer{

	function __construct($parameters){
		$this->parameters = $parameters;

		$buttonType = isset($parameters['button-type']) ? $parameters['button-type'] : 'button' ;

		switch ($buttonType) {
			case 'link':
				$this->createLink();
				break;
			

			default:
				$this->createButton();
				break;
		}

	}

	// Create the caption for the button.
	protected function caption(){
		$caption = $this->getParameter('caption');
		return new SpanTTag(null, $caption);
	}

	// Set the icon
	protected function icon(){
		 // <i class="fas fa-align-left"></i>
		$icon = $this->getParameter('icon');
		return new TeaCTag('i',$icon,null);
	}

	//Create the icon and set the caption.
	protected function getInnerHtml(){
		$cap = $this->caption();
		$icon = $this->icon();
		return ttag_getCombinedHtml([$cap,$icon]);
	}

	// create an anchor link.
	protected function createLink(){

		$src = $this->getParameter('src');
		$class = $this->getParameter('class');

		$id = $this->getParameter('id');
		$targetId = $this->getParameter('target-id');

		$html = $this->getInnerHtml();

		$extraAttribute = ' id="'.$id.'" data-target = "'.$targetId.'"';

		return new AnchorTTag($src, $html, $class, $extraAttribute);
	}

	// create a button
	protected function createButton(){

		$caption = $this->getParameter('caption');
		$class = $this->getParameter('class');

		$id = $this->getParameter('id');
		$targetId = $this->getParameter('target-id');

		$html = $this->getInnerHtml();

		$extraAttribute = ' type="button" id="'.$id.'" data-target = "'.$targetId.'"';

		return new TeaCTag('button', $class, $html,$extraAttribute);
	}


};