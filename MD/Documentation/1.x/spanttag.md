<h3 class="display-4 mb-5">SpanTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

Creates `<span>` tags. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{SpanTTag};

// Useage
new SpanTTag($class = null, $textOrHtml = null, $extraAttribute = null);

```
<p class = "ttag-code-caption text-muted"><b>SpanTTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, SpanTTag};

// Useage
$span = new SpanTTag(
	// CSS Classes
	'text-black bg-light p-4 m-4',

	// Inner html
	'Tea Tags by Blazehattech!',

	// Extra Attributes
	'id ="someId"'

	);

new HtmlTTag($span);


```
<p class = "ttag-code-caption text-muted"><b>SpanTTag.php</b></p>

