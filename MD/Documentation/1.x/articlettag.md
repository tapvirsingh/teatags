<h3 class="display-4 mb-5">ArticleTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates the `<article>` tag, loads the content from MD folder, and then appends the data passed to it.

**Usage**

Since, every article will have the `<article>` tag, as per HTML5 guidelines it must have a heading, i.e. `<h1>`, `<h2>`, `<h3>`, `<h4>` or `<h5>`. This must be included in your Markdown file, you may use hashes `###` for displaying the same.

The class can be used to read a file from MD folder or can be used to directly pass a string containing the Markdown or text as a parameter.

Your view page may have multiple short articles.

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{ArticleTTag};

// Useage
new ArticleTTag($file = null, $parameters = null);

```
<p class = "ttag-code-caption text-muted"><b>ArticleTTag.php</b></p>


**Parameters**

**`$file` : String**
 
Name of the file to load without extention. When `$parameters` are set, file name passed in here is taken as the default file. 

Example,

```php
<?php

// Set the parameters for the article.
$parameters = [
		// Directory inside the MD folder where all markdown is written.
				'dir'=>'Documentation/1.x',

	 	// Set the load file variable to article. This will check whether
		// the variable is set in the query string and if so, then it 
		// get the value load the article.
				'variable'=>'article', 

		// Use PHP standard filter for sanitizing the query input.
		// This class uses filter_input php function.
				'filter'=>FILTER_SANITIZE_STRING];

// If the article variable is not set in the query string,
// then load the following file.
$article = new ArticleTTag('introducing-tea-tags', $parameters);

```
<p class = "ttag-code-caption text-muted"><b>ArticleTTag.php</b> example with $parameters</p>

**`null` :** <span class="badge badge-dark">Default</span> Object will be instantiated but no file will be loaded.

---

**`$parameters` : Array**

`dir` :

directory which holds the files,

`variable` :

variable name,

`type` :

Works only when `variable` is used. 

Values : `get` <span class="badge badge-dark">Default</span> or `post`.

`filter` :

This variable takes values for php function filter_input.

Read more about `filter` in the Read More section at the bottom of the page.
some examples of values are 

`FILTER_SANITIZE_STRING` , `FILTER_SANITIZE_NUMBER_INT`.

 **Note : null** <span class="badge badge-dark">Default</span> This will set the `filter` to `FILTER_DEFAULT`. 

---

**Methods**

1. **`get([$article = null])`** : This is an overridden method. 

	**Parameter**

	`$article` : Takes the name of the file with extention.

	**Return Value**

	Returns the complete article in html.


2. **`divs($parameters)`**	: Creates divs using DivsTTags class. Refer to DivsTTags for details.

	**Parameter**

	`$parameters` : Takes the same `$parameters` as that of DivsTTags.

	**Return Value**

	Returns the complete article within multiple div tags depending upon the structure of article in html.

---

**Read More** (External Links)

*`<article>`* tag on [Developer Mozilla](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article).

*`filter-input`* function on [php.net](https://www.php.net/manual/en/function.filter-input.php)

*`filters`* on [php.net](https://www.php.net/manual/en/filter.filters.php)	
