<?php

/**
 * Description of FontAwsmTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class FontAwsmTTag extends TapvirTagContainer{

	/*
		$parameters = [
			'class' => Name of extra classes you wish to add. 
						eg 'mr-3'
			'fa-class' => 'fa' or 'fab' or 'fas' ... Depending updon 
						the type of font being used.
			'fa-size' => '1x' (Default) or '2x', '3x' ...

			'decorative' => Boolean, when true will set
							aria-hidden="true"

			'title' => Title of the icon, when placed shows tooltip on hover.

			'extra-attrib' => Any extra attibutes you wish to add.
							e.g, id = "someId".

		];
	*/

	function __construct($iconName, $parameters = null){

		$this->parameters = $parameters;

		$attribute = $this->setClass($iconName);

		$attribute .= $this->setDecorativeAttribute();

		$attribute .= $this->extraAttribute();

		$attribute .= $this->setTitle();

		// 		$tagName , $attribute
		parent::__construct('i', $attribute);
	}

	protected function setClass($ico){
		$class  = $this->getParameter('class');

		$faClass  = $this->getParameter('fa-class');
		$faSize  = $this->getParameter('fa-size');

		$faClass = ($faClass !== null) ? $faClass : 'fa';
		$faSize = ($faSize !== null) ? 'fa-'.$faSize : 'fa-1x';

		$completeClass = 'class = "'.$faClass.' '.$class.' '.$faSize.' '.'fa-'.$ico;

		$return = $completeClass;
		$return .= '"';

		return $return;
	}

	protected function setDecorativeAttribute(){
		$decorative = $this->getParameter('decorative');
		if($decorative === true){
			return '  aria-hidden="true"';
		}
		return null;
	}

	protected function setTitle(){
		$title = $this->getParameter('title');
		if($title !== null){
			return ' title ="'.$title.'"';
		}
		return null;
	}

	protected function extraAttribute(){
		$extraAttribute = $this->getParameter('extra-attrib');
		if($extraAttribute !== null){
			return ' '.$extraAttribute;
		}
		return null;
	}

};