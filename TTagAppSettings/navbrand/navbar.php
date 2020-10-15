<?php

return [

	'create' => true, // When set to true Creates Navbar. 
	// Create the default menu for the application
	'menu' => include ttag_RootSettings('nav-links'), // Menu
	// id of the menu
	'toggleTarget' => 'navbarMenu',	

	// If set to true, the navbar will have container.
	'in-container' => true, 

	'align' => 'right', // left | right, default : left.

	// Additional navbar classes.
	'navbar-class' => 'mr-3',

	'social-classes' => 'mr-3 text-light d-inline-flex ttag-social-link',

	'social-link-size' => '1x',

	'icons' => [
		'class'=>	'mr-1',
		'size' =>'1x',
	],

	// If both of the following are false, then 
	// by default captions will be shown.
	// Show captions
	'show-captions' => true,
	// Show icons
	'show-icons' => true,

	/* 
	Add navbar classes like navbar-light bg-light navbar-expand-lg, 
	other than the navbar class, it is added by default. We recommend 
	using css classes instead of using style element for custom styling.

	For example avoid style="background-color: #e3f2fd;", 
	create a css class instead and add the styling there.
	

	Examples:
	'extraClasses' => 'navbar-expand-lg navbar-dark bg-primary',
	'extraClasses' => 'navbar-expand-lg navbar-dark bg-danger',
	'extraClasses' => 'navbar-expand-lg navbar-dark bg-dark',
	'extraClasses' => 'navbar-expand-lg navbar-dark bg-transparent',
	'extraClasses' => 'navbar-expand-lg sticky-top navbar-light bg-white',
	*/
	
	'extraClasses' => 'navbar navbar-expand-lg sticky-top navbar-dark bg-dark',
	
	// 'extraClasses' => 'navbar navbar-expand-lg sticky-top navbar-dark',

];