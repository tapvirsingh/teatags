<h3 class="display-4 mb-5">BrandTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

This class is internally called by `NavBarTTag`. You won't need this class directly however, you need to set the constants that this class uses for setting up the brand information. 

**Defined Settings**

The constants for BrandTTag are defined in *brand-navbar.php* in global `$ttag_Brand` variable.

**ttag-settings/brand-navbar.php**

```php
<?php

// Brand settings
$ttag_Brand = [
			// Brand Name
			'name' => 'Tea Tags',

			// Link to the website.
			'link' => 'http://www.blazehattech.com',

			// Icon that you wish to display of your brand.			
			'img'  => 'tea.png',

			// Font family you wish to use.
			'font-family'=>'Dancing Script',
		];

```
<p class = "ttag-code-caption text-muted"><b>brand-navbar.php</b></p>