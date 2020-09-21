<b>/TTagAppSettings/<span class = "ttag-file">nav-links.php</span></b>

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

// You may also have your custom named links here which you may use in your views.
// Notice ttag_ suffix not used here as following is a custom named link.
$docNavigation = $articles_docFiles; // Assigning for the navigation

```