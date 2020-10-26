<h3 class="display-4 mb-5">AccordionTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

This class creates Bootstrap 4 accordion.

**Usage Syntax**

```php
<?php

// Namespace
use Src\TTags\{AccordionTTag};

// Useage
$card = new AccordionTTag($parameters);

```
<p class = "ttag-code-caption text-muted"><b>example.php</b></p>

**Parameters**

**`$parameters` : Array** : It takes an array with following keys.

1. **`'accordion-id'` : String** : `null` <span class="badge badge-dark">Default</span>, when is set creates cards for accordion. The value must be same as that of the `accordion-id` set for `AccordionTTag`.

2. **`'default-show'` : Int** <span class="badge badge-dark">Only for AccordionTTag</span> : `0` <span class="badge badge-dark">Default</span> The index of the card that needs to be shown by default.

--- 

**`$parameters['data']` : Array** : Takes following values as keys. Note following paramaeters are as same as those of [CardTTag](../docs/CardTTag) as internally AccordionTTag uses `CardTTag` for creating accordion.

1. **`'title'` : String** : Title of the card.

2. **`'subtitle'` : String** : Subtitle of the card.

3. **`'text'` : String**  : Text in the card.

4. **`'card-style'` : String** <span class="badge badge-dark">Optional</span> : It is the equivalent of css style element for the card.
				It sets the style values for the card. 
 				Example,  `'width: 18rem;'`

5. **`'card-class'` : String** <span class="badge badge-dark">Optional</span> : Add additional classes to the card. 
				'text-right text-sm-left some-custom-class'

6. **`'image'` : Array** : Card's image source and alternate text. 
 
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

7. **`'links'` : Array** : Links that need to be placed within a card.

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

8. **`'make-button'` : Array** : Converts all the indexed links into buttons. The keys are the index values of `links` and values are the custom or Bootstrap classes.

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

