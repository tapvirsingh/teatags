<h3 class="display-4 mb-5">divs</h3>

**Category :** `method`

**Scope :** All TTag classes other than HtmlTTag.

**Returns :** `DivsTTags` object.

**Overview**

This method internally calls `DivsTTags` constructor to auto create `<div class = "container">`, `<div class = "row">` and `<div class = "col-x">` depending upon the type of data. 

The parameters are same as that of `DivsTTags`.

**Usage Syntax and Example**

```php
<?php 

// Namespace
use Src\TTags\{ArticleTTag,HtmlTTag};


// Load home.md 
$article = new ArticleTTag($ttag_PageName);

// Article calls divs() method that internally 
// calls DivsTTags constructor to auto create 
// div.col, div.rows and div.container 
// depending upon the type of data.
// This method returns DivsTTags object.
// The parameters are same as that of
// DivsTTags.
$div = $article->divs([ 'col' =>10,  'offset' => 1,
						'extra-row-class' => 'mt-4']);

// Creates and displays the page.
new HtmlTTag($div);


```
<p class = "ttag-code-caption text-muted"><b>Method : divs()</b></p>

