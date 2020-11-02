### Introduction
 
Tea Tags is a view framework which helps you to create complex pages in core PHP without the need to write HTML. It will be created for you by Tea Tags. For example, this single line of code `$containerDiv = new DivTTag("container",$someHtml)` will create `<div class ="container"> ... </div>`.
 
You can write your articles using Markdown. HTML Tags and elements will still be available, for example, you may use `<code>`, `<b>`, `<strong>` etc tags along with elements in your code or text however we would recommend using <code>\`</code> and <code>\**</code> instead. Use HTML tags only when you are completely out of options.
 
The **ttag-settings** folder contains files which have the global settings for your app. Files in this folder prevent you from rewriting the global default code again and again. For example, 
 
```php
<?php  

$ttag_Navbar = [
 
	// You can create your global navbar menu in the form 
	// of multi-dimensional array in this file, and it will 
   	// be available on all the pages of the website.
 
		'menu' =>  [
				'Home'=>'#',
				'Documentation'=>'#',
 				
 				// A dropdown menu
				'Dropdown'=>[
						'One'=>'#',
						'Two'=>'#',
						''=>'-',
						'Three'=>'#'
						],
				],			
 
	'extraClasses' => 'navbar-expand-lg sticky-top navbar-light bg-white',
 
];
 
```
You may create the navbar menu by declaring and defining it as an array in the navbar.php global settings file which is in the **ttag-settings** folder. You may later call `$navbar = new NavBarTTag("Home")` and `$navbar = new NavBarTTag("Documentation")`, in your *home.php* and *documentation.php* page files respectively, to set the *Home* and *Documentation* links of the menu to *active*.
 
Please note, there are naming conventions. Although it has been mentioned in the documentation that the names of the files may not be same as that of the links (array keys declared in the global settings) but the array keys declared in the menu in the **navbar.php** file must match the keys (links) instantiating the object of class NavBarTTag. We will talk more on this subject later in the documentation.
 
This visual framework can be used to build both static and dynamic PHP web applications.
 
**This page was created using the following code written in PHP.**
 
```php
<?php
// Include the global TTag's configuration file.
require_once('tta-config.php');

use Src\TTags\{NavBarTTag,JumboTTag,ArticleTTag,HtmlTTag};

$ttag_PageName = 'Home';
// Page Metadata
// You may add new page headers and meta tags, or overwrite the defaults here.
$pageHeaders = [ 'meta' => [
					'keywords' => 'PHP Framework, Bootstrap Helper',
					] 
				];

// Activate the Home link in the navigation bar.
$navbar = new NavBarTTag($ttag_PageName);

// Set the bootstrap's jumbotron
$jumbo = new JumboTTag( [ // Buttons 
							'buttons' => [
								'Learn more' => [ttag_View('documentation'),
													'btn btn-primary btn-lg m-4'],
								'Download from Github' => [
															'https://github.com/tapvirsingh/teatags',
															'btn btn-success btn-lg',
															'_blank',
														],
							]
						],
						[//$parameters
							'bg-image' => 'tea-background.jpg',
							'lead-class' => 'col-7',
						] );

// Load home.md 
$article = new ArticleTTag($ttag_PageName);

// Article auto creates div.col, rows and container, depending upon the type of data.
// and returns a DivsTTags object.
$div = $article->divs([ 'col' =>10,  'offset' => 1,
						// 'extra-container-class' => 'text-justify', 
						'extra-row-class' => 'mt-4']);

// Creates the page with default page headers, array composed of
// navbar, jumbotron and div, also auto creates the body tags, 
// and then displays the page.
new HtmlTTag([$navbar,$jumbo,$div]);

```
 
That's it! No complex untraceable HTML and no chunks of small code either which again becomes difficult to manage.
 
The content which you are reading has been separately saved in the MD folder. It has been written using Markdown. This helps in keeping the code clean, and also ensures that the content writer who may not be a programmer is not bothered with embedded PHP scripts he isn't familiar with.
 
However, instead of separately saving the code and the content, you may hard code it directly in the code as a variable and then pass it as a parameter (argument) to the **ArticleTTag**'s **get()** method. For example,
 
```php
<?php

// Some hard coded Markdown being saved in $md variable.
$md = "**Lorem ipsum** dolor __sit__ amet, consectetur adipiscing elit.";

// Instantiate object of ArticleTTag.
$article = new ArticleTTag();

// Get the html of the article.
$html = $article->get($md);

 
```

So, let's take a cup of tea and get started! 

<!-- Get on with the full [documentation](#)  and [download](#) the framework. -->
 

