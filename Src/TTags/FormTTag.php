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

	protected $formHtml;

	protected $file;

	function __construct($fileWithoutExt){

		$this->file = $fileWithoutExt ;

		$this->fields = include tta_FormStructSettings($fileWithoutExt);
		$this->parameters = include tta_FormParaSettings($fileWithoutExt);

		// Sets form's id, action and method.
		$this->setFormParameters();

		$this->createForm();

		$attribute = $this->getFormAttr();

		parent::__construct('form',$attribute, $this->formHtml);
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

	protected function createButtons($value){

		$buttons = null;

		foreach($value as $button){
			$addAtt = $this->getUniqueAttr($button);
			$extraAttribute = 'type = "button" '.$addAtt;
			$buttonObject = new TeaSTag('input','form-control',$extraAttribute);
			$buttons[] = $buttonObject->get();
		}

		return $buttons;
	}

	protected function createHiddenInput($value){
		$hiddens = null;

		foreach($value as $hidden => $hValue){
			$addAtt = $this->getUniqueAttr($hidden);
			$extraAttribute = 'type = "hidden" '.'value = "'.$hValue.'" '.$addAtt;
			$hiddenObject = new TeaSTag('input','form-control',$extraAttribute);
			$hiddens[] = $hiddenObject->get();
		}

		return $hiddens;
	}

	protected function reservedFieldIsArray($field, $value){

		switch ($field) {
			case 'buttons':
				return $this->createButtons($value)	;		
			case 'hidden' :
				return $this->createHiddenInput($value);
			default:
				break;
		}
	}

	protected function createSubmitButton($value){
		$addAtt = $this->getUniqueAttr($value); 
		// $submit = new InputTTag($field,'form-control',ucwords($field), $addAtt);
		$extraAttribute = 'type = "submit" '.$addAtt;
		$submit = new TeaSTag('input','btn btn-primary',$extraAttribute);
		return $submit->get();
	}

	protected function createReservedField($field, $value){

		/*if($field == 'submit'){
			$html = $this->createSubmitButton($value);
			// $tagName, $class = null, $extraAttribute = null
			// InputTTag($value,'form-control',$field,$addAtt);
		}else{
			$array = $this->reservedFieldIsArray($field, $value);
			$html = ttag_getCombinedHtml($array);
		}*/

		$html = null;

		switch ($field) {
			case 'submit':
				$html = $this->createSubmitButton($value);
				break;
			case 'buttons':
				$html = $this->createButtons($value);
				break;
			case 'hidden' :
				$html = $this->createHiddenInput($value);
				break;
		}

		return $html;
	}

	protected function createFields(){

		$html = null;

		foreach($this->fields as $field => $value){
			if($this->isFieldReserved($value)){

				$html[] = $this->createReservedField($field,$value);
			}else{
				// Create field
				$html[] = $this->createField($field,$value);
			}
		}

		$this->formHtml = ttag_getCombinedHtml($html);
	}

	protected function createAddValue($value){
		$values = explode('-', $value);
		$ret = null;
		$retString = null;

		foreach ($values as $key) {
				// Working on following possible code
				// 'Some Custom Placeholder' => 'text-required-autofocus'
				if($this->isFieldReserved($key)){
					$ret['type-value'] = $key;
				}else{
					concValueRef($retString, $key);
				}
		}

		$ret['add-param'] = $retString;

		return $ret;
	}

	protected function getUniqueAttr($param){
		$dashed = ttag_SpaceToDash($param);
		$unique = $this->formId.'-'.$dashed;
		$return = ' id = "'.$unique.'" name = "'.$unique.'" ';
		return $return;
	}

	protected function createField($field,$value){

		$addAttr = $this->getUniqueAttr($field); 

		if(contains('-',$value)){
			$retured = $this->createAddValue($value);
			$value = $retured['type-value'];
			$addAttr .= $retured['add-param'];
		}

		// $value contains type of the input.
		// $field contains placeholder.
		$input = new InputTTag($value,'form-control',$field,$addAttr);
		return $input->get();
	}

	protected function isFieldReserved($field){
		$reservedFields = [
			'submit' ,'hidden' ,'buttons'
		];

		return in_array($field, $reservedFields);
	}

	protected function createForm(){
		$this->createFields();
	}

};