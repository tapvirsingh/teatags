
<p class = "ttag-file">/navbrand/navbar.php</p>

It has the settings for navbar.

```php
<?php

return [

 	// When set to true Creates Navbar. 
	'create' => true,

	// Create the default menu for the application
	// ttag_RootSettings function loads the settings
	// stored at settings' root.
	'menu' => include ttag_RootSettings('nav-links'), 

	// id of the menu
	'toggleTarget' => 'navbarMenu',	

	// If set to true, the navbar will have container.
	'in-container' => true, 

	// Align the navigation menu in the navbar.
	// left | right, default : left.
	'align' => 'right', 

	// Add any additional navbar classes.
	// These will be added to the ul element 
	// of the navbar menus.
	'navbar-class' => 'mr-3',

	// Classes for social icons.
	'social-classes' => 'mr-3 text-light d-inline-flex ttag-social-link',

	// Font awesome size of the social icons.
	'social-link-size' => '1x',

	// Universal class for the menu item icons.
	'icons' => [
		// Additional classes for the icons.
		'class'=>	'mr-1',
		// Font awesome size of the icons.
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

```
