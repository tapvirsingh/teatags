
<p class = "ttag-file">/footer/links.php</p>

Following settings sets the configuration of the footer.
	
```php
<?php 

return [
	// Sets the navigation links.
	NAVLINKS => ['caption'=>'Navigation',
				'links'=> include ttag_RootSettings('nav-links')],

	// Sets the second set of links.
	'License'=> ['caption'=>'License',

				'links'=>[
					'MIT'=>[
							'ttag-icon' => 'balance-scale',
							'ttag-link'=>'https://github.com/tapvirsingh/teatags',
							]
						]
				],
];

```
