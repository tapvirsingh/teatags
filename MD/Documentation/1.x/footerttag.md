<h3 class="display-4 mb-5">FooterTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

This class is internally called by `BodyTTag`. You won't need this class directly however, you need to set the constants that this class uses for setting up the footer. Once the footer has been defined, it will be automatically called throught the app.

Any changes you wish to make in the footer must be made with the footer settings and files linked with it.

**Defined Settings**

The constants for FooterTTag are defined in *footer.php* in `$ttag_FooterConsts` for constants, `$ttag_FooterConf` for configuration, `$ttag_FooterLinks` for footer links and `$ttag_FooterBSC` for Bootstrap and custom classes. These are global variables.

**Toggle Footer's Visibility**

You may toggle footer's visibility on a page by inserting following code on that particular page.

**Not creating footer on a page**

```php

$ttag_FooterConf['showFooter'] = false; 

```

<p class = "ttag-code-caption text-muted"><b>some_page.php</b> will not create the footer</p>


**Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../../tta-config.php');

use Src\TTags\{JumboTTag, HtmlTTag};

// Do not show the footer.
$ttag_FooterConf['showFooter'] = false;

// Create auto divs.
$jumbo = new JumboTTag( 
[
    'head' => '404',
    'lead' => 'The page you are looking for does not exist.',
     // Buttons 
    'buttons' => [
        'Home' => [ttag_IndexView(),'btn btn-outline-light btn-lg m-4'],
        'Documentation' => [ttag_View('documentation'),'btn btn-warning btn-lg'],
    ]
],
[//$parameters
	'jumboClasses' => 'm-0 vh-100',
	
    'bg-image' => '404.png',
    'align' => 'center',
    'lead-class' => 'col-12 text-light',
    'head-class' => 'text-light',
    'head-size' => 'display-1',

] );

// Display.
new HtmlTTag($jumbo);

```

<p class = "ttag-code-caption text-muted"><b>404.php</b> does not create footer</p>

**Creating footer on a page**

```php

// Default value set in TTagAppSettings/footer.php
$ttag_FooterConf['showFooter'] = true; 

```
<p class = "ttag-code-caption text-muted"><b>some_page.php</b> will show the footer</p>

`$ttag_FooterConf['showFooter'] = true;` is the default value that is set in *TTagAppSettings/footer.php*, this means that by default **footer will be created on all pages**.


**TTagAppSettings/footer.php** 

The actual settings defined in *footer.php* of this page. Read comments carefully.

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

				// Links are defined in TTagAppSettings/social.php 
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

<p class = "ttag-code-caption text-muted"><b>footer.php</b></p>

The social links are defined in **social.php** file in the **TTagAppSettings** directory. These links automatically get picked up by the `FooterTTag` class.

```php

<?php 

$ttag_SocialLinks = [
		[
			// Fontawsome class ie. 'fab fa-'
			'className' => FNTAWSM_BRAND,
			// social icon
	  	 	'icon'=>'facebook-f',
	  	 	// Link to the social page.
	  		'link'=> 'https://www.facebook.com/BlazehatTech'
	  	],
		[
			'className' => FNTAWSM_BRAND,
			'icon'=>'twitter',
			'link'=> 'https://twitter.com/BlazehatTech'
		],
		[
			'className' => FNTAWSM_BRAND,
			'icon'=>'youtube',
			'link'=> 'https://www.youtube.com/channel/UCRXchFZDXjW4YQKVsGI75_w'
		],
		[
			'className' => FNTAWSM_BRAND,
			'icon'=>'linkedin',
			'link'=> 'https://www.linkedin.com/company/blazehattech'
		],

	];

```

<p class = "ttag-code-caption text-muted"><b>social.php</b></p>
