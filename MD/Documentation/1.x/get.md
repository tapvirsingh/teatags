<h3 class="display-4 mb-5">get</h3>

**Category :** `method`

**Scope :** All TTag classes other than HtmlTTag.

**Returns :** `html`

**Overview**

This method returns html from a TTag class object.

**Usage Syntax and Example**

```php
<?php 

// Namespace
use Src\TTags\{PassTTag, HtmlTTag};

// Useage
$pass = new PassTTag('m-4' ,'Enter Password' ,'name="password"');

// get method returns 
// <input type = "password" placeholder="Enter Password" name = "password">
// and assigns this to $passTTagHtml.
$passTTagHtml = $pass->get();

// HtmlTTag displays the html value stored in $passTTagHtml.
new HtmlTTag($passTTagHtml);

```
<p class = "ttag-code-caption text-muted"><b>Method : get()</b></p>

