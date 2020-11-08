<?php

return [
	'name|required',
	'username|disabled',
	'email|required',
	'password|required',
	'some field|combo|required'=>[
		'apples' => 1,
		'oranges'=> 'o',
		'bananas' => 'ban',
		'grapes' => 'g',
	],
	// 'Login' => 'text',
	'confirm password-required',
	// 'submit',
	'Jump In|submit',
];