<?php

/**
 * Description of AffiliateTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class AffiliateTTag extends TapvirTagContainer{

	protected $affiliates;
	
	function __construct(){
		$this->affiliates = include ttag_LoadRegisteredAffiliates();
	}	


	function link($key,$parameters=null){
		$this->parameters = $parameters;
		$link = $this->affiliates[$key]['data'];

		if($parameters !== null){
			$class = $this->getParameter('class');
		}else{
			$class = $this->affiliates[$key]['class'];
		}

		$div = new DivTTag($class, $link);
		return $div->get();
	}

	
};