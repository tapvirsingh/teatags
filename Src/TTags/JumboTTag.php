<?php

/**
 * Description of JumboTTag
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;
// use Src\ContainerTags\TapvirTagContainers\AnchorTapvirTagContainer;


class JumboTTag extends TapvirTagContainer{

	// private $parameters;

	protected $jumboInnerHtml;
	protected $jumboInnerContent;


	/**
		$jumboInnerContent = [
						// Main heading and lead of the jumbotron.
						// You may omet these.
					   // If no values are provided the default values of $ttag_Head and $ttag_Lead are assigned. These default values are defined in global settings file called constants.php in the ttag-settings dirctory. 

								'head' => 'xyz',
								'lead'  => 'abc',

								'buttons' => [
												'Download' => ['#','btn btn-primary','_self'],
												'xyz' => ['#','btn btn-secondary','_self'],
												'abc' => ['#','btn btn-secondary','_self'],
											]
							]

		$parameters = [
						'jumboClasses' : extra classes to be passed along with jombotron class.
						'overlay' : null (Default) or ['color' => #bbb333, 'opacity' => 0.4] 
						'make-fluid' : true | false,
						'head-align' : 'left' | 'center' | 'right' | 'justify',
						'lead-align' : 'left' | 'center' | 'right' | 'justify',

						// Align all inner html.
						'align' : 'left' | 'center' | 'right' | 'justify',
						'bg-image' : url of the image,
						'head-class' : custom class defined in themes.
						'lead-class' : custom class defined in themes.
						'head-size' : 'display-1' | 'display-2' ...
									or 'h1' | 'h2'...

					]
	*/

	function __construct($jumboInnerContent, $parameters = null) {

			$this->parameters = $parameters;
			$this->jumboInnerHtml = null;
			$this->jumboInnerContent = $jumboInnerContent;

			$this->createHead();

			$this->createLead();

			$this->createButtons();

			$this->makeFluid();

			$extraAttribute = $this->setBackgroundImage();

			$jumboClasses = $this->getClasses('jumboClasses','jumbotron');

			$overlay = $this->setOverlay();

			$jumbo = new DivTTag($jumboClasses,$overlay.$this->jumboInnerHtml, $extraAttribute);


			$this->setContainerCode($jumbo->getThisContainerHtml());
		// }
        // parent::__construct('h1', $class, $textOrHtml, $echoOnTheGo);
    }

    private function setJumboInnerHtml($html){
		if($this->jumboInnerHtml === null){
			$this->jumboInnerHtml = is_object($html) ? $html->get() : $html;
		}else{
			$this->jumboInnerHtml .= is_object($html) ? $html->get() : $html;
		}
    }

    protected function setBackgroundImage(){
    	$extraAttribute = null;
			
		$bgImg = $this->getBgImage();
		if($bgImg !== null){
			$extraAttribute = ' style = "background-image : url('.$bgImg.'); background-size:cover;background-position: center center,center center; background-repeat: no-repeat;"';
		}
		return $extraAttribute;
    }

    private function createHead(){
    	$head = 'head';

    	$headAlign = $this->getAlignParameter($head);

		$headClasses = $this->getParameter('head-size');
		if($headClasses === null)
			$headClasses = 'display-1';

		if($headAlign !== null){
			$headClasses .= ' '.$headAlign;
		}

		$headClasses .= $this->getParameter('head-class');

		global $ttag_Head;
		$jumboHead = $this->getData($this->jumboInnerContent, $head , $ttag_Head);

		$h1 = new PageHeadingTTag ($jumboHead,$headClasses);
		
		$this->jumboInnerHtml = $h1->get() ;

    }

    private function createLead(){

    	global $ttag_Lead;

		$leadAlign = $this->getAlignParameter('lead');

		$leadClasses = $lead = 'lead';

		if($leadAlign !== null){
			$leadClasses .= ' '.$leadAlign;
		}

		$leadClassParam = $this->getParameter('lead-class');
		if($leadClassParam !== null){
			$leadClasses .= ' '.$leadClassParam;
		}

		$jumboLead = $this->getData($this->jumboInnerContent, $lead ,$ttag_Lead);
		
		if($jumboLead !== false){
			$lead = new ParaTTag($jumboLead,$leadClasses);
			$this->setJumboInnerHtml($lead);
		}

    }

    private function makeFluid(){
    	$value = $this->getParameter('make-fluid');

    	// continue if true or if the value is not set.
		if($value === null){

			$containerClasses = 'ttag-jumbo-content ';
			$containerClasses .= $this->getClasses('align','container');

			$jumboInner = new DivTTag($containerClasses,$this->jumboInnerHtml);
			// $this->setJumboInnerHtml($jumboInner->getThisContainerHtml());
			$this->jumboInnerHtml = $jumboInner->getThisContainerHtml();

		}
    }


    // Returns the button properties.
    private function getButtonValues($value){
    	$link = $value[0];
    	$class = isset($value[1]) ? $value[1] : null;
    	$target = isset($value[2]) ? $value[2] : null;
    	return [$link, $class, $target];
    }

    // Creates buttons.
	private function createButtons(){
		if(isset($this->jumboInnerContent['buttons']) && 
			is_array($this->jumboInnerContent['buttons'])){

				$buttonHtml = '';

				foreach ($this->jumboInnerContent['buttons'] as $key => $value) {

					list($link,$class,$target ) = $this->getButtonValues($value);

					$attribute = 'role="button"';

					if($target !== null){
						$attribute .= ' target ="'.$target.'"';
					}

					$button = new AnchorTTag($value[0],$key,$value[1],$attribute) ;
					if($buttonHtml === null){
						$buttonHtml = $button->getThisContainerHtml();
					}else{
						$buttonHtml .= $button->getThisContainerHtml();
					}
					
				}

				$this->setJumboInnerHtml($buttonHtml);
			}
	}

    private function getClasses($parameter, $defaultClass){
    	$containerClasses = $defaultClass;

    	if($parameter !== 'align')
    		$additionalClasses = $this->getParameter($parameter);
    	else
    		$additionalClasses = $this->getAlignParameter($parameter);

    	if($additionalClasses !== null ){
    		$containerClasses .= ' '.$additionalClasses;
    	}
    	return $containerClasses;
    }

   

    private function getData($content, $index ,$globalVal = null){
    	
    	$var = null;

    	if(isset($content[$index]) && $content[$index] !== null){
			$var = $content[$index];
		}else{
			if($globalVal !== null){
				$var = $globalVal;
    		}	
		}
		return $var;
    	
			
    }

    private function getBgImage(){
    	if(isset($this->parameters['bg-image'])) {
    		return ttag_Image($this->parameters['bg-image']);
    	}

    	return null;
    }

    private function setOverlay(){
    	$overlay = $this->getParameter('overlay');
    	if($overlay !== null){
    		//  create the overlay.
    		// opacity: 0.4; background-color: rgb(0, 0, 0);
    		$style = 'style = "';

    		$bgcolor = 'background-color:'.$overlay['color'].';';
    		$style .= $bgcolor;

    		if(isset($overlay['opacity'])){
    			$opacity = 'opacity:'.$overlay['opacity'].';';
    			$style .= $opacity;
    		}

    		$style .= '"';

    		$overlayDiv = new DivTTag('ttag-overlay',null,$style);    
    		return $overlayDiv->get();	
    	}

    }

    private function getAlignParameter($subject){
    	if(isset($this->parameters['align'])) {
    		return ' text-'.$this->parameters['align'].' ';
    	}

    	if (isset($this->parameters[$subject.'-align'])){
    		return ' text-'.$this->parameters[$subject.'-align'].' ';
    	}
    	return ' left ';
    }

}