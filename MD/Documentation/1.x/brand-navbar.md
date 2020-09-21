
<b>/TTagAppSettings/<span class = "ttag-file">brand-navbar.php</span></b>

```php
<?php
/* 
	Global application settings for Brand.
	Make changes as per your application.
*/

// Brand settings
$ttag_Brand = [
			// Brand Name
			'name' => 'Tea Tags',

			// Link to the website.
			'link' => 'http://www.blazehattech.com',

			// Icon that you wish to display of your brand.			
			'img'  => 'tea.png',

			// Font family you wish to use.
			'font-family'=>'Dancing Script',
		];


// Navbar settings
// If your application does not use navbar, make no changes here. 
// Just don't create the NavBarTTag instance in your page.
$ttag_Navbar = [

	'create' => true, // When set to true Creates Navbar. 
	// Create the default menu for the application
	'menu' => $ttag_NavigationLinks, // Menu
	// id of the menu
	'toggleTarget' => 'navbarMenu',	

	'align' => 'right', // left | right, default : left.

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
	'extraClasses' => 'navbar navbar-expand-lg sticky-top navbar-dark bg-dark',
	
	*/
	'extraClasses' => 'navbar navbar-expand-lg sticky-top navbar-dark',

];

```