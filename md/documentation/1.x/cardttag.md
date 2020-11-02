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
$card = new CardTTag($parameters,$count = null);

```
<p class = "ttag-code-caption text-muted"><b>example.php</b></p>


**Parameters**

**`$parameters` : Array** : It takes a single dimension array values with following keys.

1. **`'accordion-id'` : String** : `null` <span class="badge badge-dark">Default</span>, when is set creates cards for accordion. The value must be same as that of the `accordion-id` set for `AccordionTTag`.

2. **`'default-show'` : Int** <span class="badge badge-dark">Only for AccordionTTag</span> : `0` <span class="badge badge-dark">Default</span> The index of the card that needs to be shown by default.

3. **`'title'` : String** : Title of the card.

4. **`'subtitle'` : String** : Subtitle of the card.

5. **`'text'` : String**  : Text in the card.

6. **`'card-style'` : String** <span class="badge badge-dark">Optional</span> : It is the equivalent of css style element for the card.
				It sets the style values for the card. 
 				Example,  `'width: 18rem;'`

7. **`'card-class'` : String** <span class="badge badge-dark">Optional</span> : Add additional classes to the card. 
				'text-right text-sm-left some-custom-class'

8. **`'image'` : Array** : Card's image source and alternate text. 
 
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

9. **`'links'` : Array** : Links that need to be placed within a card.

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

10. **`'make-button'` : Array** : Converts all the indexed links into buttons. The keys are the index values of `links` and values are the custom or Bootstrap classes.

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

--- 

**`$count` : Int** : `null` <span class="badge badge-dark">Default</span>, Usually used when called in a loop. The index value of the loop is passed in this variable. It is used to uniquely identify an element, for example id.
 