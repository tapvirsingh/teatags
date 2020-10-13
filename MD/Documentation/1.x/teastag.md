<h3 class="display-4 mb-5">TeaSTag</h3>

**Category :** `class`

```php
namespace Src\TTags
```

**Overview**

TeaSTag stands for *Tea Single Tag*, it creates tags that require closing tag for example, `<img>`, `<link>`, `<meta>` etc.

You may create these tags as per your requirements using this class. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{TeaSTag};

// Useage
new TeaSTag($tagName,  $class = null, $textOrHtml = null, $extraAttribute = null);

```
<p class = "ttag-code-caption text-muted"><b>TeaSTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, TeaSTag};

// Useage
$tDiv = new TeaSTag(
	// Tag
	'div',

	// Attributes
	'id ="someId" class = "col-10 offset-1 custom-class" data-hello="Hi there!"',

	// Inner html
	'Enter text or  html <b>Bold Text</b>');

new HtmlTTag($tDiv);


```
<p class = "ttag-code-caption text-muted"><b>TeaSTag.php</b></p>