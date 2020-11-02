<h3 class="display-4 mb-5">TeaCTag</h3>

**Category :** `class`

```php
namespace Src\TTags;
```

**Overview**

TeaCTag stands for *Tea Container Tag*, it creates tags that require opening and closing for example, `<a>`, `<div>`, `<style>` etc.

You may create these tags as per your requirements using this class. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{TeaCTag};

// Useage
new TeaCTag($tagName, $class = null, $textOrHtml = null, $extraAttribute = null);

```
<p class = "ttag-code-caption text-muted"><b>TeaCTag.php</b></p>

**Usage Example**

```php
<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HtmlTTag, TeaCTag};

// Useage
$tDiv = new TeaCTag(
	// Tag
	'div',

	// Attributes
	'id ="someId" class = "col-10 offset-1 custom-class" data-hello="Hi there!"',

	// Inner html
	'Enter text or  html <b>Bold Text</b>');

new HtmlTTag($tDiv);


```
<p class = "ttag-code-caption text-muted"><b>TeaCTag.php</b></p>