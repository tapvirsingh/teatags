<b>/TTagAppSettings/<span class = "ttag-file">google.php</span></b>

```php
<?php

// List of Google fonts you wish to link. Must link before using these into brand or anywhere else in the application.
 // Use google fonts notation as used in the link. Note + and ; symbols instead of space or comma.
// Must define using multidimentional arrays.
$ttag_GoogleFonts =  [
						[
							// Dancing+Script:wght@500;600
							'family' =>'Dancing+Script',
							'wght' => '500;600', 
						],
						[
							// Manrope:wght@300
							'family' =>'Manrope',
							'wght' => '300', 
						],
						[
							// Questrial
							'family' => 'Questrial'
						]
					];


// Add your google analytics script here.
// It will added on all the pages by default.
$ttag_GoogleAnalyticsScript = '';

```