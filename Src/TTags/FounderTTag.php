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
	private $name;
	private $website;
	private $text;
	private $socialLinks;
	private $dpFile;
	private $dpStyle;
	private $dpSize;

	function __construct(){
		// Setters
		$this->founder = include ttag_RootSettings('founder');

		$this->name = $this->founder['name'];
		$this->text = $this->founder['text'];
		$this->website = $this->founder['website'];

		$this->dpFile = $this->founder['dp']['file'];
		$this->dpStyle = $this->founder['dp']['style'];
		$this->dpSize = $this->founder['dp']['size'];

		$this->socialLinks = $this->getSocialLinks();
	}


	protected function getSocialLinks(){
		$socialLinks = null;
		foreach($this->founder['social'] as $social => $link){
			if($link !== null){
				$socialLink = new TeaCTag('i', 'fa fa-'.$social);
				$anchor = new AnchorTTag($link, $socialLink, 'm-2 text-light d-inline-flex ttag-social-link','target="_blank"');
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
   		$website = $this->website;
   		$socialLinks = ttag_getCombinedHtml($dataToAppend);

   		$founderData = [$text,$dp,$name,$website,$socialLinks];

   		// $div = new DivTTag($class,$dp->get().ttag_getCombinedHtml($dataToAppend));
   		// return $div->get();

   		$divs = new DivsTTags($founderData ,[
   			'extra-row-class' => 'text-center text-white mt-2',
   			'col' => [12,12,12,12,12],
   		]);

   		return $divs->get();
   }

	function founder(){
		return $this->createFounderTTag();
	}

}