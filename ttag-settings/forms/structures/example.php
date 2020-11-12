<?php

/*
	Format
	(Caption)|type|reserved fields|(field modifiers)
	
	Please note :
	1. Either 'type' or 'reserved field' must be passed.
	2. Caption and field modifiers are optional.
		Note : if caption is set, then second value must either
		a 'type' or a 'reserved field' and not a field modifier.
	3. unkown types will be considered as text (default).
	4. | (pipes) must be used to separate caption, 
		reserved fields and field modifiers.
	
*/

return [
	'name|required|autofocus',
	'username|disabled',
	'email|required',
	'password|required',
	'date|required',
	'DOB|date|required',
	'color|required',

	// 'Email or Phone|text|disabled',
	// // following unkown type will be 
	// // shown as text.
	// 'unkownType|required',
	'Some Field|combo|required'=>[
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],

	// The hidden input type fields.
	'hides'=>[
		// <input type = "hidden" name ="apples" value = "1">
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],

	// Multiple buttons
	'buttons' => [
		'Calculate',
		'Reset',
	],

	
	'confirm password|password|required',
	'submit',
	'Jump In|submit',
];