<?php

namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;
// use Src\ContainerTags\TapvirTagContainers\SpanTapvirTagContainer ;
// use Src\ContainerTags\TapvirTagContainers\AnchorTapvirTagContainer;


class FooterTTag extends TapvirTagContainer{

	// protected $class;
	protected $footerInnerHtml;

	protected $linksCount;
	protected $recurLinksCount;
	protected $col;

	protected $footerClass;
	protected $footerSubLinkCaption;
	protected $footerLinks;

	protected $showWebIcon;
	protected $showSocialLinks;
	protected $socialLinks;
	protected $footerConsts;
	protected $webIconLink;
	protected $maxHorLinkCount ;
	protected $orien ;

	protected $totalFooterLinksCount;

	function __construct(){

		global $ttag_FooterBSC, $ttag_FooterLinks, $ttag_FooterConf, $ttag_SocialLinks,
				$ttag_FooterConsts;

		if(isset($ttag_FooterConf['showFooter']) && $ttag_FooterConf['showFooter'] == true){

			$this->footerConsts = $ttag_FooterConsts;
			$this->socialLinks = $ttag_SocialLinks;

			$this->setFooterConf($ttag_FooterConf);

			$this->calculateLinks($ttag_FooterLinks);

			$this->footerClass =  '';

			// Get the total count of nav links at root level.
			if($this->orien == 'a'){

				if($this->areSmallUniDimensionalLinks()){
					$this->footerClass .= $ttag_FooterBSC['footerHLink'].'"';
				}else{
					$this->footerClass .= $ttag_FooterBSC['footerLink'].'"';
				}
			}elseif($this->orien == 'v'){
				$this->footerClass .= $ttag_FooterBSC['footerLink'].'"';
			}else{
				$this->footerClass .= $ttag_FooterBSC['footerHLink'].'"';
			}
				
			$this->footerSubLinkCaption = $ttag_FooterBSC['footerSubCap'];

			$attribute = $this->setFooterClasses($ttag_FooterBSC);

			// $this->createFooter();
			$this->createFooterInOrder();
		}

		parent::__construct('footer', $attribute, $this->footerInnerHtml);

	}

	private function setFooterClasses($ttag_FooterBSC){
		$attribute = 'class = "footer';
		if(isset($ttag_FooterBSC['class']) && $ttag_FooterBSC['class'] !== null){
			$attribute .= ' '.$ttag_FooterBSC['class'];
		}

		$attribute .= '"';
		return $attribute;
	}

	// Sets the footer's settings
	private function setFooterConf($footerConf){
		if(isset($footerConf)){
			$this->showSocialLinks = $footerConf['showSocialLinks'];
			$this->showWebIcon = $footerConf['showWebIcon'];
			$this->webIconLink = ttag_Image($footerConf['webIconLink']);
			$this->col = $footerConf['colsPerRow'];
			$this->offset = $footerConf['colsOffset'];
			$this->maxHorLinkCount = $footerConf['maxHorLinkCount'];
			$this->iconOffset = $footerConf['iconOffset'];
			$this->iconColsPerRow = $footerConf['iconColsPerRow'];
			$this->orien = $footerConf['orien'];
			$this->order = isset($footerConf['order']) ? $footerConf['order'] : $this->setDefaultDisplayOrder();
		}
	}

	private function setDefaultDisplayOrder(){
		return  ['links','social','copyright','author'];
	}

	private function calculateLinks($footerLinks){
		// if(isset($footerLinks[NAVLINKS])){
			$this->footerLinks = $footerLinks;
			$this->totalFooterLinksCount = count($this->footerLinks);
			if(isset($footerLinks[NAVLINKS])){
				$this->linksCount = count($footerLinks[NAVLINKS]['links']);
				$this->recurLinksCount = count($footerLinks[NAVLINKS]['links'],COUNT_RECURSIVE );
			}
		// }
	}

	protected function setFooterInnerHtml($html){
		if($this->footerInnerHtml === null){
			$this->footerInnerHtml = $html;
		}else{
			$this->footerInnerHtml .= $html;
		}
	}

	protected function createFooter(){
		$this->generateFooterLinks();
		$this->generateSocialLinks();
		$this->showCopyright();
		$this->showAuthors();
	} 

	protected function createFooterInOrder(){

		foreach($this->order as $order){
			switch($order){
				// case 'icon' :
				// 	break;
				case 'links' :
					$this->generateFooterLinks();
					break;
				case 'social' :
					$this->generateSocialLinks();
					break;
				case 'copyright' :
					$this->showCopyright();
					break;
				case 'author' :
					$this->showAuthors();
					break;
				default:
			}
		}
	} 

	protected function showCopyright(){
		$p = new ParaTTag($this->footerConsts['copyright'],'text-light text-center');
		$this->setFooterInnerHtml($p->get());
	}

	protected function showAuthors(){
		$a = new AnchorTTag($this->footerConsts['companyLink'],$this->footerConsts['company'],'ttag-developer-company','target = "_blank"');
		$p = new ParaTTag($this->footerConsts['companyText'].' '.$this->footerConsts['founder'].' @ '.$a->get(),'text-light text-center ttag-founder');
		$this->setFooterInnerHtml($p->get());
	}

	// Create the anchor tag.
	protected function createLink($value, $key = null){
		return new AnchorTTag($value, $key , $this->footerClass ,' target = "_blank"');
	}

	protected function createListItem($aD){
		$return = new TeaCTag('li','ttag-footer-list', $aD->get());
		return $return->get();
	}

	protected function createUl($lis){
		//  Create ul
		$return = new TeaCTag('ul','ttag-footer-lists p-0', ttag_getCombinedHtml($lis));
		return $return->get();
	}

	protected function createListCaption($key){
		//  Caption of the list.
		$caption = new SpanTTag($this->footerSubLinkCaption, $key);
		return $caption->get();
	}

	protected function createDiv($listWithCaption){
		return new DivTTag('col-'.$this->col, ttag_getCombinedHtml($listWithCaption) );
	}

	// One of the values passed into this function is $ttag_NavigationLinks.
	// which is declared and defined in nav-links in TTagAppSetting folder.

	// Value passed in.
	// ['caption'=>'Navigation','links'=>$ttag_NavigationLinks]

	// And links has following array values.
	// 'links'=> [
		// 	'Home'=>'http://localhost/Tag/teatags.php',
		// 	'Documentation'=>'#',
		// 	'Sonia' => '#',
		// // Dropdown menu
		// 	'Dropdown'=>[
		// 				'Test'=>'#',
		// 				'Test2'=>'#',
		// 				// ''=>'-',
		// 				'Test3'=>'#'
		// 			]
		// ];
	protected function generateOneSetOfFooterLinks($links, $key){

		// Because when first time the links are sent, they have the key links.
		// but when called recurrsively this key does not exists. $key now is
		// the caption.
		$caption = !isset($links['caption']) ? $key :$links['caption'];
		$links = !isset($links['links']) ? $links : $links['links'];

		$caption = $this->createListCaption($caption);

		$returnedLink = null;

		// Loop through all the links if any of the value is an array,
		// call this function again and create recurrtion.
		foreach ($links as $key => $value) {

			if(is_array($value)){
				// html of the links is returned.
				$returnedLink[] = $this->generateOneSetOfFooterLinks($value, $key);

			}else{
				// An anchor object is returned
				$linkObj = $this->createLink($value,$key);
				// It is converted to html.
				$returnedLink[] = $linkObj->get();

			}
		}
		// combine all the array of html.
		$stringOfHtml = ttag_getCombinedHtml($returnedLink);

		// attach the code with caption and return.
		$valReturned = $caption.$stringOfHtml;

		return $valReturned;
	}

	private function createDividedNavDivCol($menu, $caption){
		$class = $this->getClass_OffsetVerLinks();
		$menuHtml = ttag_getCombinedHtml($menu);
		$menuWithCaption = $caption.$menuHtml;

		$div = new DivTTag($class,$menuWithCaption);
		$divHtml = $div->get();
		return $divHtml;
	}


	protected function divideNavMenu($links, $key){
		
		// Because when first time the links are sent, they have the key links.
		// but when called recurrsively this key does not exists. $key now is
		// the caption.
		$caption = !isset($links['caption']) ? $key :$links['caption'];
		$links = !isset($links['links']) ? $links : $links['links'];

		$caption = $this->createListCaption($caption);

		$returnedLink = null;
		$foundArrayKey = null;
		$foundArrayValue = null;
		// Loop through all the links if any of the value is an array,
		// call this function again and create recurrtion.
		foreach ($links as $key => $value) {

			if(is_array($value)){
				$foundArrayKey = $key;
				$foundArrayValue = $value;
			}else{
				// An anchor object is returned
				$linkObj = $this->createLink($value,$key);
				// It is converted to html.
				$returnedLink[] = $linkObj->get();

			}
		}
		$stringOfHtml = ttag_getCombinedHtml($returnedLink);

		$valReturned = $caption.$stringOfHtml;

		$class = $this->getClass_OffsetVerLinks();

		$div = new DivTTag($class,$valReturned);

		return ['div'=>$div->get(),'foundArrayKey' => $foundArrayKey, 'foundArrayValue'=>$foundArrayValue] ;
	}



// $ttag_SocialLinks = [
					// 'className' => FNTAWSM_BRAND,
			  // 	 	'icon'=>'facebook-f',
			  // 		'link'=> 'https://www.facebook.com/BlazehatTech',

// 				];

	protected function generateSocialLinks(){

		if(!$this->showSocialLinks){
			return null;
		}

		$retLinks = null;
		foreach ($this->socialLinks as $key => $value) {
			$i = new TeaCTag('i','fa fa-'.$value['icon'].' fa-2x');
			$a = new AnchorTTag($value['link'],$i->get(),'m-3 text-light d-inline-flex ttag-social-link', 'target = "_blank"');
			$retLinks[] = $a->get();
		}

		$div = new DivTTag('text-center col-12', ttag_getCombinedHtml($retLinks));

		$links = $div->get();
 		$dRow = new DivTTag('row mb-4', $links);
 		
 		$this->setFooterInnerHtml($dRow->get());
	}

	protected function createVerticalLinks(){

		foreach ($this->footerLinks as $key => $value) {

			// Following values are being passed as $footerLink
			// 'navLinks' => ['caption'=>'Navigation','links'=>$ttag_NavigationLinks],
			// 'socialLinks' => ['caption'=>'Social','links'=>$socialLinks],
			// $links[] = $this->workOnEachArrayOfFooterLinks($footerLink);
			// if($key !== SOCIALLINKS){
			$class = $this->getClass_OffsetVerLinks();

			if($this->totalFooterLinksCount > 1){
				$retLinks = $this->generateOneSetOfFooterLinks($value, $key);
			
				$div = new DivTTag($class, $retLinks);

				$links[] = $div->get();

				$html = ttag_getCombinedHtml($links);

			}else{
				$divs=null;
				do{

					$ret = $this->divideNavMenu($value, $key);

					$divs[] = $ret['div'];
					if( $ret['foundArrayKey'] !== null ){
						// debugTTag($value);
						// debugTTag($ret['foundArrayValue']);

						$value = $ret['foundArrayValue'];
						$key = $ret['foundArrayKey'];
					}

				}while($ret['foundArrayKey'] !== null);

				$html = ttag_getCombinedHtml($divs);
				// debugTTag($html);
			}

			if($this->showWebIcon){
				// global 
				$iconClass = 'offset-'.$this->iconOffset.' col-'.$this->iconColsPerRow;
				$style = ' style = "background-image:url('.$this->webIconLink.')"';
				$imgDiv = new DivTTag($iconClass.' ttag-web-ico','',$style);
				$html = $imgDiv->get().$html;
			}

			 $dRow = new DivTTag('row mb-4', $html);
		}
		return $dRow->get();
	}

	private function getClass_OffsetVerLinks(){
		$class = 'col-'.$this->col;
		if($this->offset > 0){
			$class .= ' offset-'.$this->offset;
		}
		return $class;		
	}

	protected function areSmallUniDimensionalLinks(){
		return ($this->recurLinksCount === $this->linksCount) && ($this->linksCount <= $this->maxHorLinkCount) ;
	}

// $ttag_NavigationLinks = [

// 	'Home'=>'http://localhost/Tag/teatags.php',
// 	'Documentation'=>'#',
// 	'Download' => '#',
// ];

	protected function createHorizontalLinks(){

		// debugTTag($this->footerLinks[NAVLINKS]['links']);

		foreach ($this->footerLinks as $keyF) {

			$returnedLink = null;

			$caption = $keyF['caption'];
			$caption = $this->createListCaption($caption);

			foreach ($keyF['links'] as $key => $value) {

				$linkObj = $this->createLink($value, $key);
					// It is converted to html.
				$returnedLink[] = $linkObj->get();
			}
			// combine all the array of html.

			$valReturned = ttag_getCombinedHtml($returnedLink);
				
			$div = new DivTTag('col-12 text-center', $caption.$valReturned);

			$links[] = $div->get();
		}

		$html = ttag_getCombinedHtml($links);

		if($this->showWebIcon){
			$style = ' style = "background-image:url('.$this->webIconLink.')"';
			$imgDiv = new DivTTag('ttag-web-h-ico col-12','',$style);
			$iconHtml = $imgDiv->get();
		 	$dImgRow = new DivTTag('row mb-4', $iconHtml);
		}

		 $dRow = new DivTTag('row mb-4', $html);

		return ($this->showWebIcon) ? $dImgRow->get().$dRow->get() : $dRow->get();
	}

	protected function generateFooterLinks(){

		if($this->footerLinks === null ){
			return null;
		}

		// debugTTag($this->totalFooterLinksCount);
		// debugTTag($this->recurLinksCount);
		// debugTTag($this->linksCount);

		switch ($this->orien) {
			case 'h':
				$dRowHtml = $this->createHorizontalLinks();
				break;
			case 'v':
				$dRowHtml = $this->createVerticalLinks();
				break;
			
			default: // a
				if($this->areSmallUniDimensionalLinks()){
					$dRowHtml = $this->createHorizontalLinks();
				}else{
					$dRowHtml = $this->createVerticalLinks();
				}
				// break;
		}

	

		$this->setFooterInnerHtml($dRowHtml);
	}

	

}