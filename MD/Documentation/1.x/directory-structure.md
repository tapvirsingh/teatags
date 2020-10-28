<h3 class="display-4 mb-5">Directory Structure</h3>

TTag has a specific directory structure. When you download TTags, all the files and root directories will be in Tag directory. You must copy all of its content at your root.

**Root Directories**

<p class = "ttag-dir">/Src/</p>

This directory is the backbone of TTags. The complete source code of TTags is in the **/Src/** directory. Any changes in this directory or its sub-directories will change the way this works. Hence, it should not be touched.
 
<p class = "ttag-dir">/Dependences/</p>

This directory contains the dependences TTags requires. TTags uses **Parsedown**.

<p class = "ttag-dir">/Javascript/</p>

Although TTags does not force you to keep your javascript in this directory and you may keep yours in a different one, however **/Javascript/** is the directory where you should ideally keep.

<p class = "ttag-dir">/MD/</p>

This is the directory where you should keep your content. All your Markdown or text files which displays the content on a page must be kept in this folder. You may create sub directories for organising the content.

<p class = "ttag-dir">/Themes/</p>

To customize the app you are building must be kept in a sub folder inside the */Themes/* folder with a theme name without any space or special character. For example, 

*/Themes/<span  class = "ttag-dir-hilight">TeaTagsTheme</span>/*

There should be a */Themes/TeaTagsTheme/<span  class = "ttag-dir-hilight">CSS</span>/* and */Themes/TeaTagsTheme/<span  class = "ttag-dir-hilight">Images</span>/* folder for keeping your css and images organised respectively.

<p class = "ttag-dir">/TTagAppSettings/</p>

This directory here is the main control panel for your application. About every configuration **file** within this directory is explained seperatly under the *TTagAppSettings Directory* article section.

However the **directories** are explained here.

<p class = "ttag-dir">/TTagAppSettings/footer/</p>

The folder has currently three files.

<p class = "ttag-file">/classes.php</p>

Following keys and values make changes to footer.
	
```php

<?php 
return [
			// Single link in the footer.
			// Classes added or removed here will affect the 
			// indiviual links in the footer.
			'footerLink'=>'ttag-footer-link d-block my-1',

			// Collective links on footer.
			// Classes added or removed here will affect the 
			// ul tags of the links in the footer.
			// These values are used if the verticle alignment of
			// footer are used.
			'footerLinks'=>'ttag-footer-links col-sm-6',

			// Single link in the footer.
			// Classes added or removed here will affect the 
			// indiviual links in the footer.
			// These values are used if the horizontal alignment of
			// footer are used.
			'footerHLink'=>'ttag-footer-h-link table-cell m-3',

			// Footer's sublink caption.
			'footerSubCap'=>'ttag-footer-sublink-caption',

			// Collective links on footer.
			// Classes added or removed here will affect the 
			// ul tags of the links in the footer.
			// These values are used if the horizontal alignment of
			// footer are used.
			'horiz-links' => 'col-12 text-center my-2',

			// Classes for social links.
			'social-link-class' => 'm-3 text-light d-inline-flex ttag-social-link',

			// Bootstrap or custom css classes that will affect the complete footer.
			'class' => 'p-5  bg-dark',

			// Class for the company information.
			'company-class' => 'text-light text-center',

			//Class for the site icon.
			'icons-class' => 'mr-1',
	];

```

<p class = "ttag-file">/configuration.php</p>

Following settings sets the configuration of the footer.
	
```php
<?php 

return [
		// Show social links in the footer.
		// Links are defined in TTagAppSettings/social.php 
		'showSocialLinks' => true, 

		// Show or hide the footer.
		'showFooter' => true,

		// Show website's icon.
		// even if no img is given a space for it will be reserved.
		'showWebIcon' => true, 

		// Website icon's offset value.
		// Sets the offset value for icon in footer (works only on verticle display of links.)
		'iconOffset' => 2, 

		// How many icon cols per row need to be set.
		//Sets the cols per row value for icon in footer (works only on verticle display of links.)
		'iconColsPerRow' => 3, 

		// Create a new on Col
		// 'nCSubMenus' => true,

		// Sets cols per row.
		'colsPerRow' => 2,

		// Sets the offset of the col.
		'colsOffset' => 0,

		// If the links are of single dimension and are less the $maxHorLinkCount value set here then, the links will be displayed horizontally. 
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

<p class = "ttag-file">/links.php</p>


Following settings sets the configuration of the footer.
	
```php
<?php 

return [
	// Sets the navigation links.
	NAVLINKS => ['caption'=>'Navigation','links'=> include ttag_RootSettings('nav-links')],
	// Sets the second set of links.
	'License'=> ['caption'=>'License','links'=>['MIT'=>[
														'ttag-icon' => 'balance-scale',
														'ttag-link'=>	'https://github.com/tapvirsingh/teatags']]],
];

```

--- 

<p class = "ttag-dir">/TTagAppSettings/navbrand/</p>

<p class = "ttag-dir">/TTagAppSettings/scripts/</p>

<p class = "ttag-dir">/Views/</p>

This is where your views exists. All views other than the index.php must stay within the views directory.

**Root Files**

<p class = "ttag-file">/TTagConfig.php</p>

Loads all the TTag classes. Not to be touched.

<p class = "ttag-file">/index.php</p>

This file must exist at root level.