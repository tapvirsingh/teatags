<?php
/*
CardsTTag : Class that creates bootstrap 4 cards
@Author: Tapvir Singh
*/

namespace Src\TTag;

class CardTTag extends TapvirTagController{

	/**
		$parameters = [
			
			'card-style' : (Optional) It is the equivalent of css style element for the card.
							It sets the style values for the card.
							example,
							'width: 18rem;'

			'card-class' : (Optional) Add additional classes to the card. 
							'text-right text-sm-left some-custom-class'
 
		]
	*/

	function __construct($parameters){
		$this->parameters = $parameters;
	}

// 	<div class="card" style="width: 18rem;">
//   <img src="..." class="card-img-top" alt="...">
//   <div class="card-body">
//     <h5 class="card-title">Card title</h5>
//     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
//     <a href="#" class="btn btn-primary">Go somewhere</a>
//   </div>
// </div>

	// Add the card image.
	protected function cardImage(){
		$image = $this->getParameter('image');
		if($image !== null){
			 // <img src="..." class="card-img-top" alt="...">
			return new ImgTTag($image['src'] ,'class = "card-img-top" alt="'.$image['alt'].'"');
		}
	}


	// Create all links of the card.
	// Say you want to make first and third links as buttons
	// the code for that will be.
	// $parameters[ 
	// 				'make-button' => [	
	// 									'0'=>'btn btn-primary'
	// 									'2'=>'btn btn-secondary'
	// 								] 
	// 			]

	protected function cardLinks(){
		$links = $this->getParameter('links');
		$returnLinks = null;
		if($links !== null){
			// Get the list of indexes to be made buttons.
  			$makeButtons = $this->getParameter('make-buttons');
  			$index = 0;
			foreach ($links as $caption => $linkSrc) {

				$class = isset($makeButtons[$index]) ? $makeButtons[$index] : 'card-link';

				$returnLinks[] = new AnchorTTag($linkSrc, $caption, $class);

				$index++;
			}	

		}
		return ttag_getCombinedHtml($returnLinks);
	}

	//Set the card title.
	protected function cardTitle(){
		$title = $this->getParameter('title');
		if($title !== null){
			return new HeadingTTag('h5',$title,'card-title');
		}
	}

	// set the card's subtitle.
	protected function cardSubTitle(){
		$subTitle = $this->getParameter('subtitle');
		if($subTitle !== null){
			return new HeadingTTag('h6',$subTitle,'card-subtitle mb-2 text-muted');
		}
	}

	// set the text in the card.
	protected function cardText(){
		$text = $this->getParameter('text');
		if($text !== null){
			return new ParaTTag($text,'card-text');
		}
	}

	// create the cards' body.
	protected function cardBody(){

		$title = $this->cardTitle();
		$subtitle = $this->cardSubTitle();
		$text = $this->cardText();
		$links = $this->cardLinks();

		$dataToAppend = $title->get().$subtitle->get().$text->get().$links;

		$div = new DivTTag('card-body' ,$dataToAppend);
		return $div->get();
	}

	// get the style element of the card.
	protected function getStyleForCard(){
		$style = $this->getParameter('card-style');
		$styleAttribute = null;
		if($style !== null){
			$styleAttribute = 'style = "'.$style.'"';
		}
		return $styleAttribute;
	}


	// create the card.
	protected function createCard(){
		$dataToAppend = $this->cardBody();

		$styleAttribute = $this->getStyleForCard();
		
		$additionalClasses = $this->getParameter('card-class');

		$div = new DivTTag('card '.$additionalClasses,$dataToAppend,$styleAttribute);
	}

}