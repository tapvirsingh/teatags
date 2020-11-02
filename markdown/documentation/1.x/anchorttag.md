<h3 class="display-4 mb-5">AnchorTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

Creates `<a>` tags. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{AnchorTTag};

// Useage
new AnchorTTag( $srcAddress = null, 
				$textOrHtml = null,
				$class = null, 
				$otherAttr = null );


```
<p class = "ttag-code-caption text-muted"><b>AnchorTTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, AnchorTTag};

// Useage
$a = new AnchorTTag(
	// href
	'www.blazehattech.com',

	// Inner html
	'Tea Tags by Blazehattech',

	// Class
	'btn btn-link',	

	// Attributes
	'id ="someId"'

	);

new HtmlTTag($a);


```
<p class = "ttag-code-caption text-muted"><b>AnchorTTag.php</b></p>

