<?php

class HTMLGeneratorTTag extends TapvirTagContainer{

	private $bodySkeleton;
	private $pageHeaders;

	protected function generateBody(){
		// Loop through every element.
		// Break key into array
		// Check whether the first letter matches $ (object value is passed), # means div#id, . div.class
	}

// 	// Set the body skeleton
// Set the body skeleton
// $bodySkeleton = [
// 					'$navbar' => $navbar,
// 					'$jumbo' => $jumbo,
// 					'd#container .container .text-justify' => [

// 									'd#intro .row mt-4' => [
// 										'.col-8 .offset-2' => $exp
// 									],

// 									'd#intro2 .row mt-4' => [
// 										'd#introcol1 .col-4 .offset-2' => $exp,
// 										'd#introcol2 .col-4 .offset-2' => $exp
// 									]
// 						]
// 				];


	function __construct($bodySkeleton,$pageHeaders = null){
		$this->pageHeaders = $pageHeaders;
		$this->bodySkeleton = $bodySkeleton;

		if(is_array($bodySkeleton)){
			$this->generateBody();
		}
	}

}