<h3 class="display-4 mb-5">HtmlTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates the `<!DOCTYPE html>` and then proceeds by creating the `<head>`, setting the page headers which are globally set in the page-headers.php, later creates `<body>` along with the passed `$data`.

**Usage**

This must be called at the end of the view page, as it displays the page as soon as it is called.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{HtmlTTag};

// Useage
new HtmlTTag( $data ,$pageHeaders = null ,  $autoCreateBody = true);

```
<p class = "ttag-code-caption text-muted"><b>HtmlTTag.php</b></p>


**Parameters**

**`$data` : Mixed**

Values which may be passed.

1. **Object** of TTag Classes *(BodyTTag, DivTTag, DivsTTags etc)*.

2. **Array** (single dimension) of TTag objects or html. For example, `new HtmlTTag([$navbarObject, $divsObject])` or `new HtmlTTag([$divHtml, $divHtml2])`.

3. **Html**, for example, 

<div class="ml-5">

```php 
<?php 

use Src\TTags\{HtmlTTag, SpanTTag};

// $someHtml is an object of SpanTTag.
// Contains following code
// <span class = "text-dark">The World Loves Tea!</span>
$someHtml = new SpanTTag('text-dark', "The World Loves Tea!");

new HtmlTTag($someHtml);

``` 

<p class = "ttag-code-caption text-muted"><b>Example</b> of passing Html</p>
</div>


4. **Text**, for example, `new HtmlTTag('The World Loves Tea!')`.

---

**`$pageHeaders` : Array**

The default values of $pageHeaders are globally defined in `$ttag_PageHeaders` in the *ttag-settings/page-headers.php*. However, you may override those default values for a view by setting the new values locally.

For example,
```php
<?php

$pageHeaders = [ 'meta' => [
					'keywords' => 'PHP Framework, Bootstrap Helper',
				] ];

// Overring the default $ttag_PageHeaders values.
new HtmlTTag( $data ,$pageHeaders);

```
<p class = "ttag-code-caption text-muted"><b>local_view_page.php</b></p>

This overrides the global default value `$ttag_PageHeaders` set in page-headers.php

```php
<?php

$ttag_PageHeaders = [
				// 'title'  => $ttag_Title,
				'title'  => TTAG_TITLE,
				'meta' => [
					'keywords' => 'CSS Framework, PHP Framework, Bootstrap Helper',
					'description' => $ttag_Lead,
					// Add the author's name.
					// 'author' => $ttag_Author,
					'author' => TTAG_AUTHOR,
					'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no'
				]
		];


```
<p class = "ttag-code-caption text-muted"><b>ttag-settings/page-headers.php</b></p>

**Note, there were 3 keywords in page-headers.php which were overridden by 2 in local_view_page.php**

Values which may be passed in an array should be as shown in the example.

---

**`$autoCreateBody` : Boolean**

**`true` :** <span class ="badge badge-dark">Default and recommended</span> HtmlTTag will automatically create the `<body>` tag. It will append all the `$data` passed to it in the `<body>` tag.

**`false` :** One must use an object instantiated by using `new BodyTTag($someHtml)` and then pass that object to `HtmlTTag`.

Example when the value is `false`,
```php
<?php

$data = "The World Loves Tea!";

// Creating an object of BodyTTag
$body = new BodyTTag($data);

// Passing the body object as the $autoCreateBody = false
new HtmlTTag($body, null, false);

```
<p class = "ttag-code-caption text-muted"><b>auto_create_body_false.php</b> $autoCreateBody = false</p>

---

**Methods**

**N/A**

Since this class should be called at the end of the view page, and it immideately displays the page, therefore, there is no requirement of calling a method with this class. 