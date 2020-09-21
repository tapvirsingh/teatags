<h3 class="display-4 mb-5">HeadingTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

Creates custom heading ( `<h1>`, `<h2>`, `<h3>`... ) for a page, article, section etc.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{HeadingTTag};

// Useage
new HeadingTTag($tag, $textOrHtml,$class = null);

```
<p class = "ttag-code-caption text-muted"><b>HeadingTTag.php</b></p>

Example,


```php
<?php 

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{HeadingTTag};

// Useage
$pgHeading = new HeadingTTag('h4','The World Loves Tea!' , 'display-1');

// Display the page.
new HtmlTTag($pgHeading);

```
<p class = "ttag-code-caption text-muted"><b>HeadingTTag.php</b></p>

**Parameters**

**`'$tag'`: String**

Tag you wish to create without `<` and `>`. Use `'h1'`, `'h2'`,`'h3'` etc.

---

**`'$textOrHtml'`: String**

You may pass a text or html.

---

**`'$class'`: String**

`null` => <span class="badge badge-dark">Default</span> or any Bootstrap or custom class.


