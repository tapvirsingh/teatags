<?php 
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;

class IconTTag extends TapvirTagContainer{

	protected $iconDefaultClass;
	protected $iconTag;
	protected $iconsPack;
	protected $icon;

	// Use FNTAWSOME_* constants declared and defined in constants.php in ttag-settings folder
	function __construct($icon = null, $iconType){
		global $ttag_IconDefaultClass, $ttag_IconTag, $ttag_IconsPack;

		$this->iconDefaultClass = $iconType.' fa-';
		$this->iconTag = $ttag_IconTag;
		$this->iconsPack = $this->iconsPack;
		$this->icon = $icon;
	}

	protected function createIcon(){
		switch($this->iconsPack){
			case FONTAWESOME:
				return $this->createFontawesomeIcon();
		}
	}

	private function createFontawesomeIcon(){
		parent::__construct($this->iconTag,'class = "'.$this->iconDefaultClass.' '.$this->icon.'"');
		
	}

};