<?php

// Add the styles sheets href as an array, other than jquery, popper and bootstrap.
$ttag_StyleSheets = [
	ROOT.'themes/'.$ttag_Theme.'/css/ttag.css',
	'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
	'//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css',
	'//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/zenburn.min.css',

];

$ttag_StyleSheets_src= [
];

// CSS settings for custom and overriding bootstrap css. use css styling syntax.
// However we recommend creating your own style sheet and then add it to $ttag_StyleSheets.
$ttag_CSS = [
				'body' => [
							'font-size' => '1.3rem',
							// 'color' => '#5e5e5e',
							// color: #c6c6c6;
							'color' => '#c6c6c6',

							// 'background-color' => '#292828 !important'
							'background-color' => '#2a2e32 !important',

							],
				'.lead' => [
							'font-size' => '1.5rem',
							'font-weight' => '400'
							],
				// 'code' => [
				// 			// color: #ff91c4;
				// 			'color' => '#ff91c4',
				// 		],
				// 'pre' => [
				// 			// color: #ff91c4;
				// 			// 'color' => '#c8c575 !important',
				// 		],
			];