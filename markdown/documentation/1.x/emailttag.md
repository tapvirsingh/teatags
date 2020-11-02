<h3 class="display-4 mb-5">EmailTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

Creates `<input type = "email">` tag. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{EmailTTag};

// Useage
new EmailTTag($class = null, $placeHolder = null, $extraAttribute = null);


```
<p class = "ttag-code-caption text-muted"><b>EmailTTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, EmailTTag};

// Useage
$object = new EmailTTag(

	// Class
	'm-4 p-4 text-dark bg-light',	

	// placeHolder
	'Email address',

	// Attributes
	'id ="someId" name = "xyz"'

	);

new HtmlTTag($object);


```
<p class = "ttag-code-caption text-muted"><b>EmailTTag.php</b></p>

