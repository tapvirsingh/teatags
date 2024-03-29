<?php

/**
 * Description of FounderTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class FounderTTag extends TapvirTagContainer{

	protected $founder;
	protected $social;
	private $name;
	private $website;
	private $websiteName;
	private $text;
	private $socialLinks;
	private $dpFile;
	private $dpStyle;
	private $dpSize;

	function __construct(){
		// Setters
		$this->founder = include ttag_RootSettings('founder');
		$this->social = include ttag_RootSettings('social');

		$this->name = $this->founder['name'];
		$this->text = $this->founder['text'];
		$this->website = $this->founder['website'];
		$this->websiteName = $this->founder['website-name'];

		$this->dpFile = $this->founder['dp']['file'];
		$this->dpStyle = $this->founder['dp']['style'];
		$this->dpSize = $this->founder['dp']['size'];

		$this->socialLinks = $this->getSocialLinks();
	}


	protected function getSocialLinks(){
		$socialLinks = null;
		foreach($this->founder['social'] as $social => $link){
			if($link !== null){

				$faClass = isNot($this->social[$social]['fa-class'],null,true);

				$class = $faClass.' fa-'.$social;
				$socialLink = new TeaCTag('i',$class );
				$anchor = new AnchorTTag($link, $socialLink, $this->founder['social-link-class'],'target="_blank"');
				$socialLinks[] = $anchor->get(); 
			}
		}
		return $socialLinks;
	}
   
   private function createFounderTTag(){
   		$class = 'text-center col-12';
   		// Social Links
   		$dataToAppend = $this->getSocialLinks();

   		// <img src="..." alt="..." class="rounded">
   		$attribute = 'alt="'.$this->name.'" class="'.$this->dpStyle.'" width = "'.$this->dpSize.'" height = "'.$this->dpSize.'"';
   		// Founder's Display Picture
   		$dp = new ImgTTag($this->dpFile,$attribute);

   		$text = new SpanTTag('font-weight-bold',$this->text);
   		$text = $text->get();
   		$dp = $dp->get();
   		$name = $this->name;
   		$webName = isset($this->websiteName) && $this->websiteName !== null ? $this->websiteName : $this->website; 
   		$website = new AnchorTTag($this->website,$webName,'ttag-founder-web-link');
   		$socialLinks = ttag_getCombinedHtml($dataToAppend);

   		$founderData = [$text,$dp,$name,$website,$socialLinks];

   		// $div = new DivTTag($class,$dp->get().ttag_getCombinedHtml($dataToAppend));
   		// return $div->get();

   		$divs = new DivsTTags($founderData ,[
   			// 'extra-row-class' => 'text-center text-white mt-2',
   			'extra-row-class' => $this->founder['extra-row-class'],
   			'col' => [12,12,12,12,12],
   		]);

   		return $divs->get();
   }

	function founder(){
		return $this->createFounderTTag();
	}

}