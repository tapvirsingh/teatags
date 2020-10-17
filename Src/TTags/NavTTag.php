<?php


/**
 * Description of NavBarTTag 
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\Classes\{UIDGeneratorTTag};
use Src\ContainerTags\TapvirTagContainer;
// use Src\ContainerTags\TapvirTagContainers\AnchorTapvirTagContainer;
// use Src\ContainerTags\TapvirTagContainers\DivTapvirTagContainer;
// use Src\ContainerTags\TapvirTagContainers\SpanTapvirTagContainer;

class NavTTag extends TapvirTagContainer{
	
	protected $navList;
	protected $style;
	protected $id ;
	protected $counter;
	protected $parameters;
	protected $currentLink;
	protected $linkActivated;

	private $index;

	/*
		$navList => array of list with keys and values as captions and links.

		$parameters => [
						TODO :- 'id' : A unique id for the Navs. If not set then it automatically generates one. 

						TODO :- ul has some bugs. 'type' : ul | nav (default)
						'style' : class values of bootstrap navs styles
								for details please follow 
								https://getbootstrap.com/docs/4.5/components/navs/#available-styles

								For quick reference:
								values : null or not set for default.
								Centered : justify-content-center
								Right-aligned : justify-content-end
								Vertical : flex-colum (for sm, flex-sm-column)
								Tabs : nav-tabs
								Pills : nav-pills
								Fill and justify : nav-fill
								For equal-width element : nav-justified

								Custom classes may also be added.
								for example 
								docAsideBar

		];
	*/

	function __construct($navList, $parameters = null){
		$this->linkActivated = false;
		$this->navList = $navList;
		$this->parameters = $parameters;
		$this->setParameters();
		$this->createNavTTag();
	}

	private function setParameters(){
		$this->style = $this->getParameter('style');
		$this->id = $this->getParameter('id');
		// $this->setId();
	}

	private function setId(){
		$this->id = $this->getParameter('id');
		// if($this->id === null){
		// 	$this->id = UIDGeneratorTTag::getUID(__CLASS__);		
		// }

	}

	// private function getId(){
	// 	return $this->id.$this->counter;
	// }

	private function navToggler(){

		$id = $this->id;

		$span = new SpanTTag('navbar-toggler-icon');

		$button = new TeaCTag('button','navbar-toggler',$span->get() ,'type="button" data-toggle="collapse" data-target="#'.$id.'" aria-controls="'.$id.'" aria-expanded="true" aria-label="Toggle navigation"' );

		return $button->get();
	}


	private function createNavTTag(){
		$type = $this->getParameter('type');

		switch($type){
			case 'ul' : 
				$nav = $this->createUlNav();
				break;
			// case 'aside' :
			// 	$nav = $this->createNav('aside');
			// 	break;
			default :
				$nav = $this->createNav();
		}

		// $nav = $this->navToggler().$nav;


		$this->setContainerCode($nav);	
	}

	/*private function getFilter(){
          $filter = isset($this->parameters['filter']) ? $this->parameters['filter'] : FILTER_DEFAULT ;
          return $filter;
    }

	private function checkActiveLink(){
		$variable = $this->getParameter('variable');
		$filter = $this->getFilter();
		 $return = filter_input ( INPUT_GET, $variable ,$filter);
	}*/

	private function activateLink($href){
		// If the link is already active exit the function.
		if($this->linkActivated){
			return false;
		}
		$key = $this->getParameter('query-key');

		$stringToMatch = explode('=', $href)[1];

		$this->linkActivated = $key === $stringToMatch;
		return $this->linkActivated;
	}
	

	private function createLink($caption,$href='#', $indent = null){

		$class = 'nav-link ttag-nav-link';

		if($this->activateLink($href)){
			$class .= ' ttag-active active';
		}

		if($indent !== null){
			$class .= ' ttag-sub-link ml-'.$indent;
		}


		$a = new AnchorTTag($href,$caption, $class);
		return $a->get();
	}

	private function defaultCSSClass(){
		return 'nav ttag-nav';
	}

	private function createLinkFromArray($caption,$href,$issetHref){

		$cap = $this->getCaption($caption);
		$lis = null;

		foreach ($href as $key => $value) {

			$fileName =  $issetHref ? $value : $key;

			$subHref =  cleanedUrl('docs').$fileName;

			$lis[] =  $this->createLink($value,$subHref,NAVTAGG_INDENT);
		}

		$addAttrib = 'id = "'.$this->getMultiLinkId().'"';

		// class="panel-collapse collapse in"

		$div = new DivTTag('panel-collapse collapse in',ttag_getCombinedHtml($lis), $addAttrib);

		// $this->counter++;

		return [$cap,$div->get()];
	}

	private function getMultiLinkId(){
		return $this->id.'MultiLink'.$this->index;
	}

	private function getCaption($caption){
		// $cap = new SpanTapvirTagContainer('class="ttag-caption"',$caption);
		// return $cap->get();
		// nav-link disabled
		// data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample"
		$class = 'nav-link ttag-nav-multi-link-cap';
		$capCol = $this->getParameter('cap-color');
		if($capCol !== null){
			$class .=' '.$capCol;
		}

		$addAttrib = 'data-toggle = "collapse"';

		$a = new AnchorTTag('#'.$this->getMultiLinkId(), $caption, $class, $addAttrib	);
		return $a->get();
	}

	private function createNav($tag = 'nav'){
		$lis = null;
		$this->index = 0;
		foreach($this->navList as $caption => $href){
			$issetHref = isset($href);
			if(!is_array($href)){

				$fileName =  $issetHref ? $href : $caption;

				$href = cleanedUrl('docs').$fileName;

				$lis[] = $this->createLink($caption,$href);
			}else{

				$lis = array_merge($lis, $this->createLinkFromArray($caption,$href,$issetHref));
			}

			$this->index++;
		}

		$class = $this->defaultCSSClass();

		if($this->style !== null){
			$class .= ' '.$this->style;
		}


		// $div = new DivTTag('collapse show',ttag_getCombinedHtml($lis),'id="'.$this->id.'"');

		$nav = new TeaCTag($tag,$class,ttag_getCombinedHtml($lis),' id="'.$this->id.'"');
		// $nav = new TapvirTagContainer($tag,'class = "'.$class.'"',$this->navToggler().$div->get());
		return $nav->get();
	}

	

	// ul navs
	private function createUlNav(){
		$lis = null;
		foreach($this->navList as $caption => $href){
			if(!is_array($href))
				$lis[] = $this->createItem($caption,$href);
			else
				$lis = array_merge($lis, $this->createItemFromArray($caption,$href));
		}

		$class = $this->defaultCSSClass();

		if($this->style !== null){
			$class .= ' '.$this->style;
		}

		$ul = new TeaCTag('ul',$class,ttag_getCombinedHtml($lis));
		return $ul->get();
	}

	private function createItem($caption,$href='#',$indent = null){
		$link = $this->createLink($caption,$href,$indent);
		$li = new TeaCTag('li','nav-item ttag-nav-item',$link);
		return $li->get();
	}

	private function createItemFromArray($caption,$href){
		$link = null;
		foreach ($href as $key => $value) {
			$link[] = $this->createItem(' / '.$key,$value, NAVTAGG_INDENT);
		}
		return $link;
	}

}
