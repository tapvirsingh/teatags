<?php
// Following code sets the global settings for footer. 
// Footer
$ttag_FooterConsts = [
	'copyright' => '© Copyright 2020 
					Blazehat Technologies LLP - All Rights Reserved',
	'founder' => 'Tapvir Singh',

	// 'founderSocialLinks' => [
	// 	'twitter' => '',
	// 	'facebook' => '',
	// 	'linkedin' => '',
	// 	'youtube' => '',
	// ];
	
	'company' => 'Blazehat Technologies LLP',
	'companyLink' => 'http://blazehattech.com/',
	'companyText' => 'Created by ',
];

$ttag_FooterConf = [
				'showSocialLinks' => true, // Links are defined in TTagAppSettings/social.php 
				'showFooter' => true,
				'showWebIcon' => true, // even if no img is given a space for it will be reserved.
				'iconOffset' => 1, // Sets the offset value for icon in footer (works only on verticle display of links.)
				'iconColsPerRow' => 3, //Sets the cols per row value for icon in footer (works only on verticle display of links.)
				// Create a new on Col
				// 'nCSubMenus' => true,
				'colsPerRow' => 2,
				'colsOffset' => 0,
				// If the links are of single dimension and are less the $maxHorLinkCount value set here then, the links will be displayed horizontally. 
				'maxHorLinkCount' => 6, // Max links in a row to display horizontally.
				'webIconLink' => 'tea.png',
				'orien' => 'v', // a = auto, h = horizontal, v = vertical

				// You can set the order in which the footer information should appear.
				// Starting from the left most which will appear first then the others.
				// 'icon',
				'order'=> ['links','social','copyright','author',],
		];

$ttag_FooterLinks = [
	// 'orien' => 'h', // h = horizontal, v = vertical
	NAVLINKS => ['caption'=>'Navigation','links'=>$ttag_NavigationLinks],
	'Licence'=> ['caption'=>'Licence','links'=>['GPVL3'=>'#', 'Terms of use'=>'#']],
	// 'Themes' => [
	// 				'caption'=>'Themes',
	// 				'links'=>[
	// 							'Dark' => '#','Light' => '#'
	// 						],
	// 			],
	// BLAZEHATLINKS => ['caption'=>'Blazehat Technologies LLP','links'=>$ttag_BlazehatLinks],
	
];

// Footer Bootstrap Classes.
$ttag_FooterBSC = [
						'footerLink'=>'ttag-footer-link d-block',
						'footerHLink'=>'ttag-footer-h-link d-inline-flex m-3',
						'footerSubCap'=>'ttag-footer-sublink-caption',
						// Bootstrap or custom css classes.
						'class' => 'p-5  bg-dark'
					];