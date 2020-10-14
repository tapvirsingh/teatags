<h3 class="display-4 mb-5">CardTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

This class creates Bootstrap 4 cards.

**Usage Syntax**

```php
<?php

// Namespace
use Src\TTags\{CardTTag};

// Useage
$card = new CardTTag($parameters);

```
<p class = "ttag-code-caption text-muted"><b>example.php</b></p>


**Parameters**


**`'title'` : String** : Title of the card.

**`'subtitle'` : String** : Subtitle of the card.

**`'text'` : String**  : Text in the card.

**`'card-style'` : String** <span class="badge badge-dark">Optional</span> : It is the equivalent of css style element for the card.
				It sets the style values for the card. 

Example,  `'width: 18rem;'`

**`'card-class'` : String** <span class="badge badge-dark">Optional</span> : Add additional classes to the card. 
				'text-right text-sm-left some-custom-class'

**`'image'` : Array** : Card's image source and alternate text. 
 
```php
<?php

$parameters = [

	'image' => [
				'src' : Image source,
				'alt' : Alternate text of the image,
			],
];

```

<p class = "ttag-code-caption text-muted"><b>Example of <code>'image'</code></b></p>

**`'links'` : Array** : Links that need to be placed within a card.

```php
<?php

$parameters = [

	'links' => [
		'Read More' => 'http://www.some-link.com',
		'Author' => 'http://www.some-author.com',
	],
];

```

<p class = "ttag-code-caption text-muted"><b>Example of <code>'links'</code></b></p>

**`'make-button'` : Array** : Converts all the indexed links into buttons. The keys are the index values of `links` and values are the custom or Bootstrap classes.
```php
<?php

$parameters = [

	'links' => [

		'Read More' => 'http://www.some-content.com',

		// some link that need not be converted into a button.
		'Some link' => 'http://www.some-link.com',

		'Author' => 'http://www.some-author.com',
	],

	// Convert links['Read More'] and links['Author'] into buttons
	'make-button' => [	
			'0'=>'btn btn-primary',
			'2'=>'btn btn-secondary',
	],

];

```

<p class = "ttag-code-caption text-muted"><b>Example of <code>'make-button'</code></b></p>


 