<?php
/*
CardsTTag : Class that creates bootstrap 4 cards
@Author: Tapvir Singh
*/

namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class CardTTag extends TapvirTagContainer{

	protected $dataToAppend;
	protected $accordionId;
	protected $count;

	/**
		$parameters = [

			'accordion-id' => null (default) . When is set creates cards for accordion.
			
			'card-style' => (Optional) It is the equivalent of css style element for the card.
							It sets the style values for the card.
							example,
							'width: 18rem;'

			'card-class' => (Optional) Add additional classes to the card. 
							'text-right text-sm-left some-custom-class'

			'image' => [
						'src' : Image source,
						'alt' : Alternate text of the image,
					]

			// Buttons.
			'links' => [
				'xyz' => 'http://www.some-link.com'
			]

			'make-button' => [	
										'0'=>'btn btn-primary'
										'2'=>'btn btn-secondary'
							] 
			// Card Title
			'title' => 'Xyz',
			'subtitle' => 'Xyz',
			'text' => 'Zyx is ....',

			'title-tag' => 'h4' (Default),
			'title-class' => Additional head classes. 

			'subtitle-tag' => 'h6' (Default),
			'subtitle-class' => Additional head classes. 	

			'text-class' => Additional head classes. 

			'links-class' => Additional classes can be added here.
			
			// Only to be used for accordion or in group.
			'default-show' => The index of the card that needs to be shown by default.
 
		],

		$count = null (Default) , Usually used when called in a loop. The index value of the loop is passed in this variable. It is used to uniquely identify an element for example id.
	*/

	function __construct($parameters, $count = null){
		$this->parameters = $parameters;
		$this->count = $count;
		if(!empty($this->parameters)){

			$this->accordionId = $this->getParameter('accordion-id');

			$div = $this->createCard();

			if($this->accordionId === null){
				parent::__construct('div',null,$div->get());
			}else{
				$this->setContainerCode($div->get());
			}

		}
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

  			$additionalClasses = $this->getParameter('links-class');

  			$index = 0;
			foreach ($links as $caption => $linkSrc) {

				$class = isset($makeButtons[$index]) ? $makeButtons[$index] : 'card-link';

				if($additionalClasses !== null){
					$class .= ' '.$additionalClasses;
				}

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

			list($tag,$class) = $this->getTagAndClass('title', 'h4' , 'title-class');

			return new HeadingTTag($tag, $title, $class);
		}
	}

	protected function getTagAndClass($prefix, $defaultTag , $defaultClass){

		$tag = $this->getParameter($prefix.'-tag');
		$class = $this->getParameter($prefix.'-class');

		$tag = $tag === null ? $defaultTag : $tag;

		$class = $class === null ? $defaultClass : $class.' '.$defaultClass;

		return [$tag,$class];
	}

	// set the card's subtitle.
	protected function cardSubTitle(){
		$subTitle = $this->getParameter('subtitle');
		if($subTitle !== null){

			list($tag,$class) = $this->getTagAndClass('subtitle', 'h6' , 'card-subtitle mb-2 text-muted');

			return new HeadingTTag($tag, $subTitle, $class);
		}
	}

	// set the text in the card.
	protected function cardText(){
		$text = $this->getParameter('text');
		if($text !== null){
			return new ParaTTag($text,'card-text');
		}
	}

	protected function appendToDataToAppend($html){
		if($this->dataToAppend === null)
			$this->dataToAppend = $html;
		else
			$this->dataToAppend .= $html;
	}

	// create the cards' body.
	protected function cardBody(){

		$methods = [
			'cardTitle','cardSubTitle','cardText','cardLinks',
		];

		foreach ($methods as $method) {
			$object = $this->$method(); 
			if(is_object($object)){
				$this->appendToDataToAppend($object->get());
			}elseif(is_string($object)){
				$this->appendToDataToAppend($object);
			}
		}

		$div = new DivTTag('card-body' ,$this->dataToAppend);
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

	// UA - Unique attribute
	protected function getUA($text){
		return $this->accordionId."_".$text."_".$this->count;
	}

	protected function createAccordCardBody(){
		// <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		// $dataToAppend,$extraAttribute = null)
		$body = $this->cardBody();

		$extraAttribute = ' id="'.$this->getUA('collapse').'"  aria-labelledby="'.$this->getUA('heading').'" data-parent="#'.$this->accordionId.'"';

		$attribute = 'collapse';
		// Get the default show index. Card that should be shown by default.
		$defaultShow = $this->getParameter('default-show',0);

		if($defaultShow === $this->count){
			$attribute .= ' show';
		}

		$div = new DivTTag($attribute,$body,$extraAttribute);

		return $div->get();
	}

	protected function createAccordCardHeader(){

		// $textOrHtml = null,
        // $extraAttribute = null

		$title = $this->getParameter('title');

        $collapseValue = $this->getUA('collapse');
        $extraAttribBtn = 'type="button" data-toggle="collapse" data-target="#'.$collapseValue.'" aria-expanded="true" aria-controls="'.$collapseValue.'"';

		$button = new TeaCTag('button','btn tta-card-header btn-block text-left',$title,$extraAttribBtn);

		$h2 = new HeadingTTag('h2',$button->get(),'mb-0');

		$extraAttribute = 'id = "'.$this->getUA('heading').'"';

		$div = new DivTTag('card-header',$h2,$extraAttribute);
		return $div->get();
	}

	protected function createAccordCard(){
		$header = $this->createAccordCardHeader();

		$body = $this->createAccordCardBody();

		return $header.$body;
	}

	// create the card.
	protected function createCard(){

		if($this->accordionId !== null){
			$dataToAppend = $this->createAccordCard();
		}else{
			$dataToAppend = $this->cardBody();
		}

		$styleAttribute = $this->getStyleForCard();
		
		$additionalClasses = $this->getParameter('card-class');

		$div = new DivTTag('card '.$additionalClasses,$dataToAppend,$styleAttribute);
		
		return $div;
	}
}	