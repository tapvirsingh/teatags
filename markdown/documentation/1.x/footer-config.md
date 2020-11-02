
<p class = "ttag-file">/footer/configuration.php</p>

Following settings sets the configuration of the footer.
	
```php
<?php 

return [
		// Show social links in the footer.
		// Links are defined in ttag-settings/social.php 
		'showSocialLinks' => true, 

		// Show or hide the footer.
		'showFooter' => true,

		// Show website's icon.
		// even if no img is given a space for it will 
		// be reserved.
		'showWebIcon' => true, 

		// Website icon's offset value.
		// Sets the offset value for icon in footer 
		// (works only on verticle display of links.)
		'iconOffset' => 2, 

		// How many icon cols per row need to be set.
		//Sets the cols per row value for icon in footer 
		// (works only on verticle display of links.)
		'iconColsPerRow' => 3, 

		// Create a new on Col
		// 'nCSubMenus' => true,

		// Sets cols per row.
		'colsPerRow' => 2,

		// Sets the offset of the col.
		'colsOffset' => 0,

		// If the links are of single dimension and are 
		// less the $maxHorLinkCount value set here then, 
		// the links will be displayed horizontally. 
		// Max links in a row to display horizontally.
		'maxHorLinkCount' => 6, 

		// Sets the image for the web icon.
		'webIconLink' => 'tea.png',

		// Orientation of the footer.
		// a = auto, h = horizontal, v = vertical
		'orien' => 'h', 

		// Show captions
		'show-captions' => true,

		// Show icons
		'show-icons' => true,

		// font awesome icon size.
		'icons-size' => '1x',	

		// You can set the order in which the footer information should appear.
		// Starting from the left most which will appear first then the others.
		// 'icon',
		'order'=> ['links','social','copyright','founder',],
];

```