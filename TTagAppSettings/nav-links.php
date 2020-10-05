<?php

// Create your navigation bar links.
// Used with bootstrap's navbar.

// If user has NOT logged in.
if(!Src\TeaTag::authorised()){


	return  [

		'Home'=> ttag_IndexView(),

		'Documentation' => ttag_View('documentation'),

		// 'Downloads' => ttag_View('download-themes'),
		
		'Blogs' => 'https://blazehattech.blogspot.com/',
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

