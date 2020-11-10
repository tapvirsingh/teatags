<?php
/**
 * Description of FormTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class FormTTag extends TapvirTagContainer{

	/*
		$fields => [
			// Use any HTML Input Types.
			// name attribute in these fields will be same as placeholder 
			// however replaced with underscore.

			'Some Custom Placeholder' => 'text', 'file' , 'range' ,'textarea', 'password' ... ,

			// You may append readonly, required, disabled etc along with the type
			// for example,

			'Some Custom Placeholder' => 'text-required',

			// will create input text with required attribute and with
			// following values of id and name.
			// Kindly note the naming convention.
			// formId followed by '-' and then key values
			// that have ' ' replaced with '-'
			
			//  id = "formId-some-custom-placeholder" 
			// 	name = "formId-some-custom-placeholder"

			'Some Custom Placeholder' => [
				'type' => 'dropdown', 'checkbox' or 'radio',
				'id' => 'dropdown-id',
				'name' => 'dropdown-name',
				'list' => [
					'caption1' => 'value1',
					'caption2' => 'value2',
					'caption3' => 'value3',
					'caption4' => 'value4',
				], 
			],

			// This reserved key creates 'submit' button.
			// with following attributes.
			// id = "formId-submit" name = "formId-submit" value="Submit" 

			'submit',

			// Creates buttons
			// If nothing is set the default value
			// is set to null.
			// This reserved key creates buttons.
			// with following attributes.
			// id = "formId-button-caption-1" name = "formId-button-caption-1" value="Button Caption 1" 	
			// id = "formId-button-caption-2" name = "formId-button-caption-2" value="Button Caption 2" 	
			// id = "formId-button-caption-3" name = "formId-button-caption-3" value="Button Caption 3"

			'buttons' => [
				'Button Caption 1' , 'Button Caption 2' , 'Button Caption 3' 
			],

			// Creates hidden fields
			// This reserved key creates hidden fields.
			// with following attributes.

			// type = "hidden" id = "formId-hidden-name" name = "formId-hidden-name" value="value"  	

			// type = "hidden" id = "formId-hidden-name2" name = "formId-hidden-name2" value="value2"  	

			'hidden' => [
				'name' => 'value',
				'name2' => 'value2',
			], 

		];

		$parameters => [

		//	Basic Options
		-------------------
			
			// Form id.
			'id' => 'formId',
	
			// Form action.
			'action' => '',

			// Form method.
			'method' => 'POST' (default), 'PUT' or 'GET',

			// set this value.
			'enctype' => 'text' (default), 'mutipart' (multipart/form-data) or 'app' (application/x-www-form-urlencoded)

		
		//	Advanced Options
		----------------------

			//formnovalidate
			'validate' => true (default) or false.

			//formtarget
			// Note: The formtarget attribute can be used with type="submit" and type="image".
			'target' => _self (default), _blank, _parent, _top or framename ,

			//autocomplete
			<form autocomplete="on|off">
			'autocomplete' => true (default) , false,

			// rel
			// <form rel="value">
			'rel' => null (default) , 'external', 'help', 'license' ,'next','nofollow','noopener'
			,'noreferrer','opener','prev','search',


		];
	*/

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

	protected $field;
	protected $caption;

	// $attributeValue is Hyphened and lowercase caption.
	// Following value is used in input's id and name.
	protected $attributeValue;
	protected $modifiers;


	function __construct($fileWithoutExt){

		$this->file = $fileWithoutExt ;

		$this->cIndex = 0;

		// Separator
		$this->separator = '|';

		$this->setReserved();

		$this->fields = include tta_FormStructSettings($fileWithoutExt);
		$this->parameters = include tta_FormParaSettings($fileWithoutExt);
		// $this->settings = include tta_FormSettings($fileWithoutExt);
		$this->classes = include tta_FormClasses($fileWithoutExt);

		// Sets form's id, action and method.
		$this->setFormParameters();

		$this->createFormElements();

		$attribute = $this->getFormAttr();

		parent::__construct('form',$attribute, $this->formHtml);
	}


	protected function setReserved(){

		// Input types
		$this->reservedTypeFields = [
			'text','submit','email','button',
			'password','checkbox','file','range',
			'color','date','datetime-local','week',
			'image','month','number','radio',
			'reset','search','tel','time','url',
		];

		// Input state modifiers
		$this->reservedInputModifiers = [
			'required','disabled','autofocus',
		];

		// TTag's reserved fields
		$this->reservedFields = [
			'buttons','submit',
			'combo', 'hidden',
			// 'name','confirm password',
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

		return $attribute;
	}

	protected function getType(){
		// if the type is in the array of reserved then return the type else return text.
		return ($this->isInputTypeField($this->field))?  $this->field : 'text';
	}


	protected function disintegrate(){

		$explodedValue = explode($this->separator, $this->cValue);

		// Set the first value to caption.
		$this->field =  $explodedValue[0];
		$this->attributeValue = ttag_SpaceToDash($this->field);
		$this->caption = ucfirst($this->field);
		$this->modifiers = null;

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
			// Set the second element as field
			$this->field = $explodedValue[1];
			// set all the modifiers.
			if(isset($explodedValue[2])){
				// $this->modifiers = explode($this->separator,$explodedValue[2]);
				$this->modifiers = array_slice($explodedValue, 2);
			}
		}
	}

	protected function nonArrayElement(){
		// If not an array proceed to check 
		// whether the values contain any reserved fields.
		if($this->isFieldReserved($this->cValue)){

			// Create reserved fields
		}else{
			// Create non reserved fields.
			// but check for other reservations.
			return $this->createInput();
		}
	}

	protected function createInput(){

		$this->disintegrate();
		$type = $this->getType();

		$placeHolder = $this->caption ;

		$unique = $this->formId.'-'.$this->attributeValue.'"';

		$id = 'id = "'.$unique;
		$name = 'name = "'.$unique;
		$modifiers = implode(' ', $this->modifiers);
		$extraAttribute = $id.' '.$name.' '.$modifiers;

		$class = "form-control";
		$input = new InputTTag($type , $class, $placeHolder, $extraAttribute);
		return $input->get();
	}

	protected function createElement(){
		$return = null;
		// check if the current value is an array.
		if(is_array($this->cValue)){

		}else{

			// If not an array proceed to check 
			// whether the values contain any reserved fields.
			$return = $this->nonArrayElement();
		}	

		return $return;

	}

	protected function createFormElements(){
		// if key is numeric then 

		// debugTTag($this->fields);

		$return = null;

		foreach ($this->fields as $this->cKey => $this->cValue) {

			$return[] = $this->createElement();

			$this->cIndex++;
		}

		$this->formHtml = ttag_getCombinedHtml($return);

	}

};