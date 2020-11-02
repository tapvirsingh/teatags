<h3 class="display-4 mb-5">PageHeadingTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

Creates `<h1>` heading for a page.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{PageHeadingTTag};

// Useage
new PageHeadingTTag($textOrHtml ,$class = null);

```
<p class = "ttag-code-caption text-muted"><b>PageHeadingTTag.php</b></p>

Example,


```php
<?php 

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{PageHeadingTTag};

// Useage
$pgHeading = new PageHeadingTTag('The World Loves Tea!' , 'display-1');

// Display the page.
new HtmlTTag($pgHeading);

```
<p class = "ttag-code-caption text-muted"><b>PageHeadingTTag.php</b></p>

**Parameters**

**`'$textOrHtml'`: String**

You may pass a text or html.

---

**`'$class'`: String**

`null` => <span class="badge badge-dark">Default</span> or any Bootstrap or custom class.


