<b>/ttag-settings/<span class = "ttag-file">footer.php</span></b>

```php

<?php

// Following code sets the global settings for footer. 

// Footer contants. These will be displayed in the footer as it is.
$ttag_FooterConsts = [
	'copyright' => '© Copyright 2020 
					Blazehat Technologies LLP - All Rights Reserved',
	'founder' => 'Tapvir Singh',
	'company' => 'Blazehat Technologies LLP',
	'companyLink' => 'http://blazehattech.com/',
	'companyText' => 'Created by ',
];


// Footer configuration.
$ttag_FooterConf = [

				// Links are defined in ttag-settings/social.php 
				'showSocialLinks' => true, 

				// Show footer true | false. When false footer won't show.
				'showFooter' => true,

				 // even if no img is given a space for it will be reserved.
				'showWebIcon' => true,

				// Sets the offset value for icon in footer 
				// (works only on verticle display of links.)
				'iconOffset' => 1,

				//Sets the cols per row value for icon in footer 
				// (works only on verticle display of links.)
				'iconColsPerRow' => 3, 

				// # of cols per row.
				'colsPerRow' => 2,

				// cols offset.
				'colsOffset' => 0,

				// If the links are of single dimension 
				// and are less the $maxHorLinkCount value 
				// set here then, the links will be displayed 
				// horizontally. 

				// Max links in a row to display horizontally.
				'maxHorLinkCount' => 6, 

				// company logo to display in the footer.
				'webIconLink' => 'tea.png',

				// Orientation of the footerlinks.
				// a = auto, h = horizontal, v = vertical
				'orien' => 'v', 

				// You can set the order in which the footer 
				// information should appear.
				// Starting from the left most which will 
				// appear first then the others. 
				'order'=> ['links','social','copyright','author',],
		];

$ttag_FooterLinks = [

	// Navigation links.
	NAVLINKS => [
					// Caption for the navigation.
					'caption'=>'Navigation',
					// Assign the nav links defined in nav-links.php
					'links'=>$ttag_NavigationLinks],

	// Other links.
	'Licence'=> ['caption'=>'Licence','links'=> 
											[	'GPVL3'=>'#', 
												'Terms of use'=>'#']
											],

	// Themes
	'Themes' => [
					'caption'=>'Themes',
					'links'=>[
								'Dark' => '#','Light' => '#'
							],
				],
	
];

// Footer Bootstrap Classes.
$ttag_FooterBSC = [	

				// Vertical links
				// Bootstrap and custom classes when 
				// $ttag_FooterConf['orien'] == 'v' 
				'footerLink'=>'ttag-footer-link d-block',

				// Horizontal links
				// Bootstrap and custom classes when 
				// $ttag_FooterConf['orien'] == 'h' 
				'footerHLink'=>'ttag-footer-h-link d-inline-flex m-3',

				// Caption of the sublinks 
				'footerSubCap'=>'ttag-footer-sublink-caption',

				// Bootstrap or custom css classes. Any extra 
				// class you wish to add to the <footer> tag.
				'class' => 'p-5'
			];

```