<h3 class="display-4 mb-5">InputTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

Creates `<input type = "$type">` tag. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{InputTTag};

// Useage
new InputTTag($type, $class = null, $placeHolder = null, $extraAttribute = null);


```
<p class = "ttag-code-caption text-muted"><b>InputTTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, InputTTag};

// Useage
$object = new InputTTag(

	'text',

	// Class
	'm-4 p-4 text-dark bg-light',	

	// placeHolder
	'Name',

	// Attributes
	'id = "someId"'

	);

new HtmlTTag($object);

```
<p class = "ttag-code-caption text-muted"><b>InputTTag.php</b></p>

