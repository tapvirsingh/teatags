<?php
/**
 * Description of ComboTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\{TapvirTagContainer};

class ComboTTag extends TapvirTagContainer{

	protected $parameters;
	protected $optionsData;
	protected $caption;
	protected $modifiers;

	protected $attribParameters;

	protected $cKey;
	protected $cValue;

	// array Key
	protected $aKey;

	protected $optionsHtml;

	function __construct($parameters){
		$this->parameters = $parameters;
		$this->setParameters();
		$this->createOptions();

		$attribute = 'class="custom-select"';
		$data = $this->optionsHtml;

		parent::__construct('select',$attribute, $data);
	}

	protected function setParameters(){
		$this->optionsData = $this->getParameter('option-data');
		$this->caption = $this->getParameter('caption');
		$this->modifiers = $this->getParameter('modifiers');
		$this->attribParameters = $this->getParameter('attribute-parameters');
	}

	protected function createOptions(){
		$options = new OptionTTag($this->optionsData,$this->caption);
		$this->optionsHtml = $options->get();
	}
};