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
	'name',
	'username|disabled',
	'email|required',
	'password|required',

	'username,email,phone|text|disabled',
	// following unkown type will be 
	// shown as text.
	'unkownType|required',
	'some field|combo|required'=>[
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],

	'hidden'=>[
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],

	'buttons' => [
		'Calculate',
		'Reset',
	],
	// 'Login' => 'text',
	'confirm password|required',

	// 'submit',
	'Jump In|submit',
];