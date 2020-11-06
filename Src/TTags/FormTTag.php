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

		//	Basic Options
		-------------------

			'id' => 'form-id',

			'action' => '',
			'method' => 'POST' (default), 'PUT' or 'GET',

			// set this value.
			'enctype' => 'text' (default), 'mutipart' (multipart/form-data (default) if form has file type) or 'app' (application/x-www-form-urlencoded)

			// Shorthands for input.
			// Use any HTML Input Types.
			// name attribute in these fields will be same as placeholder 
			// however replaced with underscore.
			'Some Custom Placeholder' => 'text', 'file' , 'range' ,'textarea', 'password' ... ,
			// You may append readonly, required, disabled etc along with the type
			// for example,
			'Some Custom Placeholder' => 'text-required',

			'Some Custom Placeholder' => [
				'type' => 'text', 'textarea', 'password' ,'dropdown', 'checkbox' or 'radio',
				'id' => 'dropdown-id',
				'name' => 'dropdown-name',
				'list' => [
					'caption1' => 'value1',
					'caption2' => 'value2',
					'caption3' => 'value3',
					'caption4' => 'value4',
				], 
			],

			//Shorthand for creating submit button.
			// This reserved key creates Submit button.
			// with following attributes.
			// id = "form-id-submit" name = "form-id-submit" value="Submit" 

			'Submit',

			// Creates buttons
			// This reserved key creates buttons.
			// with following attributes.
			// id = "form-id-button_caption_1" name = "form-id-button_caption_1" value="Button Caption 1" 	
			// id = "form-id-button_caption_2" name = "form-id-button_caption_2" value="Button Caption 2" 	
			// id = "form-id-button_caption_3" name = "form-id-button_caption_3" value="Button Caption 3"

			'buttons' => [
				'Button Caption 1' , 'Button Caption 2' , 'Button Caption 3' 
			],

			// Creates hidden fields
			// This reserved key creates hidden fields.
			// with following attributes.

			// type = "hidden" id = "form-id-hidden-name" name = "form-id-hidden-name" value="value"  	

			// type = "hidden" id = "form-id-hidden-name2" name = "form-id-hidden-name2" value="value2"  	

			'hidden' => [
				'name' => 'value',
				'name2' => 'value2',
			], 
	
	
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

	function __construct($fields){

	}

};