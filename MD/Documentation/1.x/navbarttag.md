<h3 class="display-4 mb-5">NavBarTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

Creates navigation bar and shows the current active page from list item.

The structure of the navigation bar to be displayed should be defined in **nav-links.php** in the ttag-settings directory. It must be defined to `$ttag_NavigationLinks` variable.

Example,

```php
<?php

// Create your navigation bar links.
// Used with bootstrap's navbar.
$ttag_NavigationLinks = [

	'Home'=> ttag_IndexView(),

	'Documentation' => ttag_View('documentation'),

	// 'Downloads' => ttag_View('download-themes'),
	
	'Blogs' => 'https://blazehattech.blogspot.com/',
];

```
<p class = "ttag-code-caption text-muted"><b>nav-links.php</b> </p>

The navigation structure defined here will be automatically picked by **NavBarTTag** for displaying the navigation.

**Defined Settings**

The global settings of NavBarTTag are defined in *brand-navbar.php* in global `$ttag_Navbar` variable. To customize your navbar you make changes here. Read the comments carefully for better understanding.

**ttag-settings/brand-navbar.php**

```php

<?php

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

<p class = "ttag-code-caption text-muted"><b>brand-navbar.php</b></p>

**Usage**

The object of **NavBarTTag** must be instantiated on the view page where you wish to display the navigation bar. While doing so, you must also pass in the name of the current page.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{NavBarTTag};

// Useage
new NavBarTTag($activeKey);

```
<p class = "ttag-code-caption text-muted"><b>usage_syntax_NavBarTTag.php</b></p>


In following example the Home link in navigation bar will be highlighted. The navigation bar (menu) is defined in **nav-links.php**. The value `'Home'` is the key in the array which has the value of the index page. `ttag_IndexView()` returns the index page link.

Example,

```php
<?php 

// Include the global TTag's configuration file.
require_once('TTagConfig.php');

// Namespace
use Src\TTags\{NavBarTTag};

$ttag_PageName = 'Home';

// Useage
$navbar = new NavBarTTag($ttag_PageName);

new HtmlTTag($navbar);

```
<p class = "ttag-code-caption text-muted"><b>index.php</b></p>



**Parameters**

**`$activeKey` : String**

It takes one of the key values from `$ttag_NavigationLinks`. This value adds the Bootstrap's `active` class to the selected key of the list. 

---

**Methods**

For methods please refer to **Methods** section in documentation.



