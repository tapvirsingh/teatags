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

	/**
		$jumboInnerContent = [
						// Main heading and lead of the jumbotron.
						// You may omet these.
					   // If no values are provided the default values of $ttag_Head and $ttag_Lead are assigned. These default values are defined in global settings file called constants.php in the TTagAppSettings dirctory. 

								'head' => 'xyz',
								'lead'  => 'abc',

								'buttons' => [
												'Download' => ['#','btn btn-primary'],
												'xyz' => ['#','btn btn-secondary'],
												'abc' => ['#','btn btn-secondary'],
											]
							]

		$parameters = [
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

			$headAlign = $this->getAlignParameter('head');
			$leadAlign = $this->getAlignParameter('lead');

			$headClasses = 'display-1';
			if(isset($parameters['head-size']) && $parameters['head-size'] !== null){
				$headClasses = $parameters['head-size'];
			}

			if($headAlign !== null){
				$headClasses .= ' '.$headAlign;
			}

			if(isset($parameters['head-class']) && $parameters['head-class'] !== null){
				$headClasses .= ' '.$parameters['head-class'];
			}

			$leadClasses = 'lead';
			if($leadAlign !== null){
				$leadClasses .= ' '.	$leadAlign;
			}


			if(isset($parameters['lead-class']) && $parameters['lead-class'] !== null){
				$leadClasses .= ' '.$parameters['lead-class'];
			}

			global $ttag_Head;
			$jumboHead = $this->getData($jumboInnerContent['head'], $ttag_Head);

			$h1 = new PageHeadingTTag ($jumboHead,$headClasses);
			$jumboInnerHtml = $h1->get();

			global $ttag_Lead;
			$jumboLead = $this->getData($jumboInnerContent['lead'], $ttag_Lead);
			
			if($jumboLead !== false){
				$lead = new ParaTTag($jumboLead,$leadClasses);
				$jumboInnerHtml .= $lead->get();
			}


			
			if(isset($jumboInnerContent['buttons']) && is_array($jumboInnerContent['buttons'])){

					$buttonHtml = '';

					foreach ($jumboInnerContent['buttons'] as $key => $value) {
						$button = new AnchorTTag($value[0],$key,$value[1],'role="button" ') ;
						if($buttonHtml === null){
							$buttonHtml = $button->getThisContainerHtml();
						}else{
							$buttonHtml .= $button->getThisContainerHtml();
						}
						
					}


					$jumboInnerHtml .= $buttonHtml;
			}

			// continue if true or if the value is not set.
			if(!(isset($parameters['make-fluid']) && $parameters['make-fluid'] === false)){
				$jumboInner = new DivTTag('container',$jumboInnerHtml);
				$jumboInnerHtml = $jumboInner->getThisContainerHtml();

			}

			$extraAttribute = null;
			$bgImg = $this->getBgImage();
			if($bgImg !== null){
				$extraAttribute = ' style = "background-image : url('.$bgImg.'); background-size:cover;background-position: center center,center center; background-repeat: no-repeat;"';
			}

		

			$jumbo = new DivTTag('jumbotron',$jumboInnerHtml, $extraAttribute);
			$this->setContainerCode($jumbo->getThisContainerHtml());
		// }
        // parent::__construct('h1', $class, $textOrHtml, $echoOnTheGo);
    }

    private function getData($content, $globalVal = null){
    	
    	$var = null;

    	if(isset($content) && $content !== null){
			$var = $content;
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

    private function getAlignParameter($subject){
    	if(isset($this->parameters['align'])) {
    		return 'text-'.$this->parameters['align'];
    	}

    	if (isset($this->parameters[$subject.'-align'])){
    		return 'text-'.$this->parameters[$subject.'-align'];
    	}
    	return 'left';
    }

}