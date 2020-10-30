
<p class = "ttag-file">/footer/classes.php</p>

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
			'social-link-class' => 'm-3 text-light 
									d-inline-flex ttag-social-link',

			// Bootstrap or custom css classes that 
			// will affect the complete footer.
			'class' => 'p-5  bg-dark',

			// Class for the company information.
			'company-class' => 'text-light text-center',

			//Class for the site icon.
			'icons-class' => 'mr-1',
	];

```