<?php 

return [
		// Links are defined in TTagAppSettings/social.php 
		'showSocialLinks' => true, 
		'showFooter' => true,
		// even if no img is given a space for it will be reserved.
		'showWebIcon' => true, 
		// Sets the offset value for icon in footer (works only on verticle display of links.)
		'iconOffset' => 2, 
		//Sets the cols per row value for icon in footer (works only on verticle display of links.)
		'iconColsPerRow' => 3, 
		// Create a new on Col
		// 'nCSubMenus' => true,
		'colsPerRow' => 2,
		'colsOffset' => 0,
		// If the links are of single dimension and are less the $maxHorLinkCount value set here then, the links will be displayed horizontally. 
		// Max links in a row to display horizontally.
		'maxHorLinkCount' => 6, 
		'webIconLink' => 'tea.png',
		// a = auto, h = horizontal, v = vertical
		'orien' => 'h', 

		// Show captions
		'show-captions' => true,

		// Show icons
		'show-icons' => true,

		'icons-size' => '1x',	

		// You can set the order in which the footer information should appear.
		// Starting from the left most which will appear first then the others.
		// 'icon',
		'order'=> ['links','social','copyright','founder',],
];