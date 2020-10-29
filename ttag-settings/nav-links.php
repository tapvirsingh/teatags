<?php

// Create your navigation bar links.
// Used with bootstrap's navbar.

// If user has NOT logged in.
if(!Src\TeaTag::authorised()){


	return  [

		'Home'=> [
			'ttag-icon' => 'home',
			// 'ttag-link' => ttag_IndexView(),
			'ttag-link' => cleanedUrl(),
		],

		// 'Documentation' => 'https://teatags.blazehattechnologies.com/Views/documentation.php',
		'Documentation' => [
			'ttag-icon' => 'book',
			// 'ttag-link'=>ttag_View('documentation'),
			'ttag-link'=> cleanedUrl('docs'),
		],
		// 'Documentation' => 'https://teatags.blazehattechnologies.com/Views/documentation.php',

		// 'Downloads' => ttag_View('download-themes'),
		
		'Blogs' => [
			'ttag-icon' => 'external-link',
			'ttag-link'=>'https://blazehattech.blogspot.com/',
		],

		// ttag-social here in lowercase is a keyword, it will pick up the 
		// social links to show on navbar.
		'ttag-social' =>[
			'facebook',
			'twitter',
			'linkedin',
			'github',
		],
	];

// return $ttag_NavigationLinks;


	// $ttag_NavigationLinks = [

	// 	'Login'=> ttag_IndexView(),

	// 	'Signup' => ttag_View('documentation'),
		
	// ];

}else{
	/*

	If user has authorisation.
	
	*/

	// return [

	// 	'Home'=> ttag_IndexView(),

	// 	'Documentation' => ttag_View('documentation'),
		
	// 	Src\TeaTag::user('name') => [ 'Settings' => '#', 'Logout' => '#'],
	// 	// 'Downloads' => ttag_View('download-themes'),
		
	// 	// 'Blogs' => 'https://blazehattech.blogspot.com/',
	// ];

}

// You may also have your custom named links here which you may use in your views.
// Notice ttag_ suffix not used here as following is a custom named link.
$docNavigation = $articles_docFiles; // Assigning for the navigation

