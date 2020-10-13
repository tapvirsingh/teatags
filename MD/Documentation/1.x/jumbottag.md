<h3 class="display-4 mb-5">JumboTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates Bootstrap's Jumbotron.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{JumboTTag};

// Useage
new JumboTTag($jumboInnerContent , $parameters = null);

```
<p class = "ttag-code-caption text-muted"><b>JumboTTag.php</b></p>

Example,

```php

// Set the bootstrap's jumbotron
$jumbo = new JumboTTag( [
				'head' => 'Page Heading',
				'lead' => 'Description of the page inside Jumbotron.',
				 // Buttons 
				'buttons' => [
					'Caption1' => ['#','btn btn-primary btn-lg m-4'],
					'Caption2' => ['#','btn btn-success btn-lg'],
				]
			],
			[//$parameters
				'bg-image' => 'tea-background.jpg',
				'lead-class' => 'col-7',
				'head-class' => 'text-dark',
				'head-size' => 'display-1',

			] );

```
<p class = "ttag-code-caption text-muted"><b>JumboTTag.php</b> example</p>

**Parameters**

**`$jumboInnerContent` : Array**

Main heading and lead of the jumbotron. You may omet these. If no values are provided the default values of `$ttag_Head` and `$ttag_Lead` are assigned. These default values are defined in global settings file called constants.php in the TTagAppSettings dirctory.

1. **`'head'`** => `'xyz'` Same as that of Bootstrap. It is the main heading of the page.

2. **`'lead'`**  => `'abc'` Same as that of Bootstrap. It is the description of the page.

3.
	Buttons

<div class="ml-5">

```php
	'buttons' => [
				'Download' => ['#','btn btn-primary'],
				'xyz' => ['#','btn btn-secondary'],
				'abc' => ['#','btn btn-secondary'],
				],

```

</div>

---

**`$parameters` : Array**

It can take `null` as a value, if passed, it picks up the default values.

Values which may be passed.

1. **`'jumboClasses'`** => Extra classes to be passed apart from `jombotron` class that is passed internally by default.

1. **`'make-fluid'`** => `true` <span class="badge badge-dark">Default</span>  or `false`, same as that in Bootstrap.

2. **`'head-align'`** => `'left'` <span class="badge badge-dark">Default</span> or `'center'` or `'right'` or `'justify'`,

3. **`'lead-align'`** => `'left'` <span class="badge badge-dark">Default</span> or `'center'` or `'right'` or `'justify'`,

4. **`'align'`** => Align all inner html. 
	`'left'` <span class="badge badge-dark">Default</span> or `'center'` or `'right'` or `'justify'`, 

5. **`'bg-image'`** => Url for the background image.

6. **`'head-class'`** => Custom class defined in themes or Bootstrap class.
	
7. **`'lead-class'`** => Custom class defined in themes or Bootstrap class.

8. **`'head-size'`** => `'display-1'` or `'display-2'` ...
									
	or `'h1'` or `'h2'`...

8. **`'overlay'`** => This takes an array, with keys `color` and `opacity`<span class="badge badge-dark">Optional</span>.
	
	Example

```php

	// Pass color and opacity.
	['color'=>'#fff','opacity'=> '0.67']
	// or
	['color'=>'rgba(255,255,255,0.67)']

```

---


**Methods**

For methods please refer to **Methods** section in documentation.