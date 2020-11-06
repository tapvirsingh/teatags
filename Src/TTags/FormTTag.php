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
			'id' => 'form-id',

			'action' => '',
			'method' => 'POST' (default), 'PUT' or 'GET',
			'mutipart' => false (default) or true,

			// Short hands.
			// Use any HTML Input Types.
			// name attribute in these fields will be same as placeholder 
			// however replaced with underscore.
			'Some Custom Placeholder' => 'text', 'range' ,'textarea', 'password' ... ,

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

			'buttons' => [
				'submit' => 'Submit',
				'cancel' => 'Cancel',
			], 
		];
	*/

	function __construct($fields){

	}

};