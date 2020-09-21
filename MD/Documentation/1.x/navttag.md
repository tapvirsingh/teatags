<h3 class="display-4 mb-5">NavTTag</h3>


**Category :** `class`

```php
namespace Src\TTags;
```


**Overview**

It creates the navigation using Bootstrap's `Navs`. 

**Usage Syntax**

```php
<?php 

// Namespace
use Src\TTags\{NavTTag};

// Useage
new NavTTag($navList , $parameters = null);

```
<p class = "ttag-code-caption text-muted"><b>usage_syntax_NavTTag.php</b></p>

Following is an example of using NavTTag. Also note the submenus.

```php
<?php 

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Namespace
use Src\TTags\{NavTTag,HtmlTTag};

$links = [
	'Home'=> '#',
	'Documentation' => '#',
	'Nav 3' => [
				'Sub Nav 1' => '#',
				'Sub Nav 2' => '#',
				'Sub Nav 3' => '#',
			],

	'website' => 'www.blazehattech.com',
	'Blogs' => 'https://blazehattech.blogspot.com/',
];

$dataNavs = new NavTTag($links);

new HtmlTTag($dataNavs);

```
<p class = "ttag-code-caption text-muted"><b>example_NavTTag.php</b></p>


**Parameters**

**`$navList` : Array**

Array of list with keys and values as captions and links. It can take 2D arrays also for displaying submenus as shown in the example.

**`$parameters` : Array**

1. **`'cap-color'`** => Colour of captions (submenu headings), The key of the submenu is taken as the caption of that menu.

	For example, `'Nav 3'` from the example_NavTTag.php is the caption for it's submenu (array).

2. **`'query-key'`** => It is the query variable for loading multiple documents from the MD directory.

	Following is the actual code for this page, which explains the detailed functioning of all the TTags we have discussed so far including NavTTag. Read the comments carefully.

<div class ="ml-5">

```php
<?php
// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

use Src\TTags\{NavBarTTag,NavTTag,ArticleTTag, DivsTTags, HtmlTTag};

// Set the current page.
$ttag_PageName = 'Documentation';

// Query variable for getting the current article.
// For example, this will have the following query string.
// documentation.php?article=NavTTag
$variable = 'article';

// Activate the Documentation link in the navigation bar.
$navbar = new NavBarTTag($ttag_PageName);

// Load the article.
$article = new ArticleTTag($default_DocArticle, 
							['dir'=>'Documentation/1.x',
							'variable'=>$variable, 
							'filter'=>FILTER_SANITIZE_STRING]);

// Create document's navigation and use the article's 
// query variable for navigating through the articles.
$docNavs = new NavTTag($articles_docFiles, 
						[
						'style' => 'flex-column mt-4',
						'cap-color' => 'text-white-50',
						// Get the article's query variable name.
						'query-key' => $article->getCurrentArticleName(),
						]);

// Create auto divs.
$divs = new DivsTTags([$docNavs,$article],[ 'col'=>[2,6],'offset' => 1, 
	// 'extra-container-class' => 'text-justify', 
	'extra-row-class' => 'ml-0 mr-0 ttag-doc-row',
	'in-container' => false,
	'col-classes' => ['bg-dark','pt-4 ml-4'],
	'position'=>'c']);

// Display the navigation and the html within the divs.
new HtmlTTag([$navbar,$divs]);
```
<p class = "ttag-code-caption text-muted"><b>This page's code</b></p>

</div>


3. **`'style'`** => class values of bootstrap navs styles, 

	**For quick reference:**

	values : `null` or not set for default.

	Centered : `justify-content-center`

	Right-aligned : `justify-content-end`

	Vertical : `flex-colum (for sm, flex-sm-column)`

	Tabs : `nav-tabs`

	Pills : `nav-pills`

	Fill and justify : `nav-fill`

	For equal-width element : `nav-justified`

	For details please follow 
	https://getbootstrap.com/docs/4.5/components/navs/#available-styles

	Custom classes may also be added.

	for example, `docAsideBar`

---

**Methods**

For methods please refer to **Methods** section in documentation.



