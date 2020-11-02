<h3 class="display-4 mb-5">InpTextTTag</h3>

**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

Creates the `<input type = "text">` tag. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{InpTextTTag};

// Useage
new InpTextTTag($class = null ,$placeHolder  = null ,$extraAttribute = null);


```
<p class = "ttag-code-caption text-muted"><b>InpTextTTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, InpTextTTag};

// Useage
$object = new InpTextTTag(

	// Class
	'm-4 p-4 text-dark bg-light',	

	// placeHolder
	'Password',

	// Attributes
	'id = "someId" name = "password"'

	);

new HtmlTTag($object);

```
<p class = "ttag-code-caption text-muted"><b>InpTextTTag.php</b></p>

