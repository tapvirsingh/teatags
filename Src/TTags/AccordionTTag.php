<?php

/**
 * Description of AccordionTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class AccordionTTag extends TapvirTagContainer{
	
	protected $accordionId;

	/*
		
		$parameters = [
			'accordion-id' => Sets the accordion id.
			'default-show' => The index of the card that needs to be shown by default.
			'data' => [
				[
					'title' => '',
					'subtitle' => '',
					'text' => '',
				]
			],

		]
	*/

	function __construct($parameters){
		$this->parameters = $parameters;
		$this->accordionId = $this->getParameter('accordion-id');

		$data = $this->createDataForAccord();

		$attribute = 'class="accordion" id="'.$this->accordionId.'"';

		parent::__construct('div', $attribute, $data);

	}

	protected function createDataForAccord(){
		$data = $this->getParameter('data');
		$defaultShow = $this->getParameter('default-show');

		$cardObjs = null;
		$count = 0;
		foreach ($data as $card) {
			$parameters = array_merge($card,['accordion-id'=> $this->accordionId,'default-show'=>$defaultShow]);
			$cardObj = new CardTTag($parameters,$count);
			$cardObjs[] = $cardObj->get();
			$count++;
		}
		$cardHtml = ttag_getCombinedHtml($cardObjs);

		return $cardHtml;
	}
};