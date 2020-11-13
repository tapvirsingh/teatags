<?php
/**
 * Description of FormTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\{TapvirTagContainer};
use Src\ContainerTags\TapvirTagContainers\{SelectOptionTapvirTagContainer};

class FormTTag extends TapvirTagContainer{

	protected $formId;
	protected $action;
	protected $method;

	protected $fields;
	protected $reservedFields;

	protected $formHtml;

	protected $file;
	protected $settings;
	protected $classes;

	protected $separator;

	// Current key and value.
	protected $cKey;
	protected $cValue;
	protected $cIndex;
	protected $cArrayKeyExists;

	protected $field;
	protected $caption;
	protected $lowerCaption;

	// $attributeValue is Hyphened and lowercase caption.
	// Following value is used in input's id and name.
	protected $attributeValue;
	protected $modifiers;

	protected $type;
	protected $typeCalledFrom;
	protected $noFormControlList;
	protected $formGroupMustList;

	protected $useFormGroup;
	protected $placeholder;

	protected $formCaption;
	protected $linkHref;

	function __construct($fileWithoutExt){

		$this->file = $fileWithoutExt ;

		$this->cIndex = 0;

		$this->type = $this->typeCalledFrom = null;

		$this->noFormControlList = [
			'hidden','submit','button', 
			'file', 'link',
		];

		$this->noFormGroupList = [
			'hidden','submit','button',
			'hides','buttons', 'link',
		];

		$this->formGroupMustList = [
			'date','color','file'
		];

		// Separator
		$this->separator = '|';

		$this->setReserved();
		$this->setReservedArrayValues();

		$this->fields = include tta_FormStructSettings($fileWithoutExt);
		$this->parameters = include tta_FormParaSettings($fileWithoutExt);
		// $this->settings = include tta_FormSettings($fileWithoutExt);
		$this->classes = include tta_FormClasses($fileWithoutExt);

		// Sets form's id, action and method.
		$this->setFormParameters();
		
		$this->useFormGroup = $this->getParameter('form-group',false);

		$this->createFormElements();
		$this->setFormCaption();

		$attribute = $this->getFormAttr();

		$this->setFormCaption();

		parent::__construct('form',$attribute, $this->formCaption.$this->formHtml);
	}

	protected function setFormCaption(){
		$caption = $this->getParameter('form-caption');
		$classes = $this->getParameter('form-caption-classes');

		if($caption !== null){
			$cap = new HeadingTTag('h3',$caption,$classes);
			$this->formCaption = $cap->get();
			return true;
		}
		$this->formCaption = null;
		return null;
	}

	protected function setReservedArrayValues(){
		$this->reservedArrayInputValues = [
			'hides' => 'hidden',
			'buttons' => 'button',
			'radios' => 'radio',
			'checks' => 'checkbox'
		];

		$this->reservedArrayElements = [
			'combo',
		];
	}

	protected function setReserved(){

		// Input types
		$this->reservedTypeFields = [
			'text','submit','email','button',
			'password','checkbox','file','range',
			'color','date','datetime-local','week',
			'image','month','number','radio',
			'reset','search','tel','time','url',
			'hidden'
		];

		// Input state modifiers
		$this->reservedInputModifiers = [
			'required','disabled',
			'autofocus','readonly',
		];

		// TTag's reserved fields
		$this->reservedFields = [
			'buttons',
			// 'submit',
			// Combo box and (hides) hidden attributes
			'combo', 'hides',
			// Radio buttons and Checkboxes
			'radios','checks',
			
			'link',
		];

		
	}

	/*
		These functions check whether the current
		field is in any of the reserved arrays.
	*/

	protected function isInputTypeField($field){
		return in_array($field, $this->reservedTypeFields) ;
	}


	protected function isFieldReserved($field){
		return in_array($field, $this->reservedFields) ;
	}


	protected function isInputModifier($field){
		return in_array($field, $this->reservedInputModifiers) ;
	}


	protected function setFormParameters(){
		// Set the form's id.
		$this->formId = $this->getParameter('id');

		// Set the form's action.
		$this->action = $this->getParameter('action');

		// Set the form's method.
		$this->method = $this->getParameter('method','POST');
	}

	protected function getFormAttr(){
		$attribute = 'id = "'.$this->formId.'" method = "'.$this->method.'"';

		if($this->action !== null){
			$attribute .= ' action = "'.$this->action.'"';
		}

		$class = $this->getParameter('form-classes');

		if($class !== null){
			$attribute .= ' class = "'.$class.'"';
		}

		return $attribute;
	}

	protected function setType(){
		if($this->typeCalledFrom === SINGLE_ELEMENT_CALL){

			// if the type is in the array of reserved then return the type else returns text.
			$this->type = ($this->isInputTypeField($this->field))?  $this->field : 'text';
		}
	}

	protected function prepInpAttrVals($field,$value = null){

		$this->modifiers = null;

		switch ($this->typeCalledFrom) {

			case SINGLE_ELEMENT_CALL:
				$this->field = $field;
				$this->attributeValue = ttag_SpaceToDash($this->field);
				$this->lowerCaption = $this->field;
				$this->caption = ucfirst($this->field);
				break;

			case ARRAY_ELEMENT_CALL:
				$this->field = $this->cKey;

				$this->attributeValue = is_int($field) ? ttag_SpaceToDash($value) : ttag_SpaceToDash($field);
				$this->lowerCaption = $value;
				$this->caption = $this->cKey === 'hides' ? $value : ucfirst($value);
				break;

			case COMBO_ELEMENT_CALL:
				$this->field = $this->cKey;
				$this->attributeValue = is_int($field) ? ttag_SpaceToDash($value) : ttag_SpaceToDash($field);
				$this->lowerCaption = $field;
				$this->caption = ucfirst($field);
				break;			

			case LINK_ELEMENT_CALL:
				$this->field = $field;
				$this->attributeValue = ttag_SpaceToDash($this->field);
				$this->lowerCaption = $this->field;
				$this->caption = ucfirst($this->field);
				break;

			default:
				break;
		}

	}

	protected function disintegrate(){

		$explodeValue = is_int($this->cKey) ? $this->cValue : $this->cKey;

		$explodedValue = explode($this->separator, $explodeValue);

		// Set the first value to caption.
		$this->prepInpAttrVals($explodedValue[0]);

		// debugTTag($this->caption);

		$isInputModifier = $this->isInputModifier($explodedValue[1]);

		// The second element is an input modifier
		if($isInputModifier){
			// set all the modifiers.
			if(isset($explodedValue[1])){
				// $this->modifiers = explode($this->separator,$explodedValue[1]);
				$this->modifiers = array_slice($explodedValue, 1);
			}

		// The second element is NOT an input modifier
		}else{
			// if set, set the second element as field else set the first element
			$this->field = isset($explodedValue[1]) ? $explodedValue[1] : $explodedValue[0];
			// set all the modifiers.
			if(isset($explodedValue[2])){
				// $this->modifiers = explode($this->separator,$explodedValue[2]);
				$this->modifiers = array_slice($explodedValue, 2);
			}
		}
	}

	protected function createLink(){

		$id = 'id = "'.$this->getUnique().'"';
		$name = 'name = "'.$this->getUnique().'"';

		$attr = $id.' '.$name;

		$class = $this->classes[$this->lowerCaption];

		$href = new AnchorTTag($this->linkHref, $this->caption, $class, $attr);
		return $href->get();
	}

	protected function nonArrayElement(){

		// If not an array proceed to check 
		// whether the values contain any reserved fields.
		if(contains('link',$this->cValue)){
			// Create reserved fields that are not array.
			// None at the moment.
			$this->typeCalledFrom = LINK_ELEMENT_CALL;
			$this->disintegrate();

			$explodedValue = explode('=>',$this->field);

			$this->field = $explodedValue[0];
			$this->linkHref = $explodedValue[1];

			return $this->createLink();
		}else{
			// Create non reserved fields.
			// but check for other reservations.
			$this->typeCalledFrom = SINGLE_ELEMENT_CALL;
			$this->disintegrate();
			return $this->createInput();
		}
	}

	protected function getUnique(){
		return $this->formId.'-'.$this->attributeValue;
	}

	protected function getExtraAttribute(){
		$unique = ' = "'.$this->getUnique().'"';
		$id = 'id '.$unique;
		$name = 'name '.$unique;
		$modifiers =($this->modifiers !== null)? implode(' ', $this->modifiers) : null; 
		return $id.' '.$name.' '.$modifiers;
	}

	protected function shouldDisablePlaceholder(){
		$inFormGroupMustList = in_array($this->field,$this->formGroupMustList); 
		if($inFormGroupMustList){
			return true;
		}

		$notInNoFormGroupList = !in_array($this->field,$this->noFormGroupList);
		return  ($this->useFormGroup  && $notInNoFormGroupList) ;
	}

	protected function createInput(){

		// if(!$arrayElement){
		$this->setType();
		// }
		$this->placeholder = $this->caption;

		if( $this->shouldDisablePlaceholder() ){
			$this->placeholder = null;
		}

		$extraAttribute = $this->getExtraAttribute();

		$class = $this->classes[$this->lowerCaption];

		if(!in_array($this->type, $this->noFormControlList)){
			$class .= ' form-control'; 
		}

		if(isset($this->classes['all']) && $this->placeholder !== null ){
			$class .= ' '.$this->classes['all']; 	
		}

		// $class = "form-control";
		$input = new InputTTag($this->type , $class, $this->placeholder, $extraAttribute);

		return $input->get();
	}

	protected function setTypeForArrayElement($key,$value){
		if($this->cArrayKeyExists){

			$this->type = $this->reservedArrayInputValues[$this->cKey] ;

			$this->prepInpAttrVals($key,$value);
		}
	}


	protected function arrayElement(){

		$this->cArrayKeyExists = array_key_exists($this->cKey, $this->reservedArrayInputValues);

		$html = null;

		foreach ($this->cValue as $key => $value) {

			$this->setTypeForArrayElement($key,$value);
			$html[] = $this->createInput();
		}

		return ttag_getCombinedHtml($html);
	}

	protected function createCombo(){
		// debugTTag($this->cValue);
		$class = null;
		if(isset($this->classes[$this->lowerCaption])){
			$class = $this->classes[$this->lowerCaption];
		}

		// debugTTag($this->lowerCaption);

		$data = [
			'option-data' => $this->cValue,
			'caption' => $this->caption,
			'modifiers' => $this->modifiers,
			'attribute-parameters' => $this->attributeValue,
			'class' => $class, 
		];

		$combo = new ComboTTag($data);
		return $combo->get();
	}

	protected function createField(){
		// $this->reservedArrayElements
		// check if the field is combo

// in_array($this->field, $this->reservedArrayElements)
			// debugTTag($this->cKey);

		if(contains('combo',$this->cKey)){
			$this->typeCalledFrom = COMBO_ELEMENT_CALL;
			$this->disintegrate();
			return $this->createCombo();		
		 }else{
	 		$this->typeCalledFrom = ARRAY_ELEMENT_CALL;
 			$this->disintegrate();
			return $this->arrayElement();
		}
	}


	protected function createElement(){
		$return = null;
		// check if the current value is an array.
		if(is_array($this->cValue)){

			// $this->typeCalledFrom = ARRAY_ELEMENT_CALL;
			$return = $this->createField();

		}else{

			// If not an array proceed to check 
			// whether the values contain any reserved fields.
			$return = $this->nonArrayElement();
		}	

		return $return;

	}

	protected function resetType(){
		$this->typeCalledFrom = $this->type = null;
	}

	protected function createFormGroup($returnedHtml){
		$attr = 'for = "'.$this->getUnique().'"';
		$label = new TeaCTag('label',null,$this->caption,$attr);

		$data = $label->get().$returnedHtml;

		$div = new DivTTag('form-group',$data);
		return $div->get();
	}

	protected function createFormElements(){
		// if key is numeric then 

		// debugTTag($this->fields);

		$return = null;

		foreach ($this->fields as $this->cKey => $this->cValue) {

			$returnedHtml = $this->createElement();	

			if($this->placeholder === null ||
				(!in_array($this->field, $this->noFormGroupList) && 
					$this->useFormGroup)){
			
				$return[] = $this->createFormGroup($returnedHtml);

			}else{
				$return[] = $returnedHtml;
			}

			$this->resetType();

			$this->cIndex++;
		}

		$this->formHtml = ttag_getCombinedHtml($return);
			// debugTTag($this->formHtml);

	}

};