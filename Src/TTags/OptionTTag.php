<?php
/**
 * Description of OptionTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\{TapvirTagContainer};

class OptionTTag extends TapvirTagContainer{

	protected $optionsData;
	protected $caption;

	function __construct($optionsData,$caption){
		$this->optionsData = $optionsData;
		$this->caption = $caption;

		$optionsHtml = $this->createOptions();
		$this->setCode($optionsHtml);
	}

	protected function createOptions(){
		$class = null;
		$attribute = ' selected';
		$caption = new TeaCTag('option', $class, $this->caption, $attribute);
		$options[] = $caption->get();

		foreach ($this->optionsData as $key => $value) {
			$attribute = ' value = "'.$value.'"';
			$option = new TeaCTag('option', $class, $key, $attribute);
			$options[] = $option->get();
		}

		$optionsHtml = ttag_getCombinedHtml($options);

		return $optionsHtml;
	}

};