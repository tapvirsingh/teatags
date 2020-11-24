<?php

return [
	// 'first name',
	// 'last name',
	'name|required|autofocus',
	'email|required',
	'phone',
	'Query|combo|required' => [
		'Business' => 'biz',
	],
	'message|textarea|rows=4|cols=50|placeholder=Specify your query|required',
	'Send|submit',
];