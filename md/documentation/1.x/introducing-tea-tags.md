<h3 class="display-4 mb-5">Introducing Tea Tags!</h3>

Suffixes TTag and TTags used in the framework and documentation denotes Tea Tags.
 
Let us begin with these two simple codes <b>world_loves_tea.html</b> and <b>world_loves_tea.php</b>. 


```html
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	The World Loves Tea!
	</body>
</html>

```
<p class = "ttag-code-caption text-muted"><b>world_loves_tea.html</b> is a html markup that displays The World Loves Tea.</p>

The above html markup is the usual way of writing the html pages. One has to remember to open and close the tags, which sometimes becomes difficult to track. Then repetitively include other files like stylesheets, scripts, footers in all pages, any change becomes literally difficult to track and manage.

Embedding PHP most of the time becomes more messy, and it becomes cumbersome to keep track, handle and understand the code and the markup.

Following is TTag code for the page with the same desired output to print *"The World Loves Tea!"*.

```php
<?php
// Include the global TTag's configuration file.
require_once('../ttag-config.php');

// Use HtmlTTag.
use Src\TTags\{HtmlTTag};

// Displays The World Loves Tea!.
new HtmlTTag('The World Loves Tea!');

```
<p class = "ttag-code-caption text-muted"><b>world_loves_tea.php</b> is a PHP code with TTag’s HtmlTTag class.</p>

The code `new HtmlTTag('The World Loves Tea!');` is responsible for echoing the complete page. We will talk about it in depth later in the documentation.

<p class = "ttag-doc-ques">So what's the difference?</p>

*world_loves_tea.html* seems to be quite obvious but *world_loves_tea.php* does far more than just printing *The World Loves Tea!*. 

To understand this lets look at the html output of the latter, as for former, the html is already written.

```html
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link href = "https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600&family=Manrope:wght@300&family=Questrial&display=swap" rel = "stylesheet">
		<title>Enjoy Tea Tags!</title>
		<meta keywords="CSS Framework, PHP Framework, Bootstrap Helper">
		<meta description="A quick, easy and hassle free PHP framework that will assist you in writing HTML and Bootstrap in PHP.">
		<meta author="Tapvir Singh">
		<meta viewport="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel = "stylesheet" href= "http://localhost/tag/Themes/TeaTagsTheme/CSS/ttag.css" >
		<link rel = "stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >
		<link rel = "stylesheet" href= "//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css" >
		<link rel = "stylesheet" href= "//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/zenburn.min.css" >
		<style>body{font-size:1.3rem;}.lead{font-size:1.5rem;font-weight:400;}</style>
	</head>
	<body class = "">The World Loves Tea!
		<footer class ="p-5 mt-3">
			<div class = "row mb-4">
				<div class = "offset-1 col-3 ttag-web-ico"  style = "background-image:url(http://localhost/tag/Themes/TeaTagsTheme/Images/tea.png)"></div>
				<div class = "col-2">
					<span class = "ttag-footer-sublink-caption">Navigation</span>
					<a  href="http://localhost/tag/index.php"  class = "ttag-footer-link d-block" target = "_blank">Home</a>
					<a  href="http://localhost/tag/Views/documentation.php"  class = "ttag-footer-link d-block" target = "_blank">Documentation</a>
					<a  href="https://blazehattech.blogspot.com/"  class = "ttag-footer-link d-block" target = "_blank">Blogs</a>
				</div>
				<div class = "col-2">
					<span class = "ttag-footer-sublink-caption">Licence</span>
					<a  href="#"  class = "ttag-footer-link d-block" target = "_blank">GPVL3</a>
					<a  href="#"  class = "ttag-footer-link d-block" target = "_blank">Terms of use</a>
				</div>
				<div class = "col-2">
					<span class = "ttag-footer-sublink-caption">Themes</span>
					<a  href="#"  class = "ttag-footer-link d-block" target = "_blank">Dark</a>
					<a  href="#"  class = "ttag-footer-link d-block" target = "_blank">Light</a>
				</div>
			</div>
			<div class = "row mb-4">
				<div class = "text-center col-12">
					<a  href="https://www.facebook.com/BlazehatTech"  class="m-3 text-light d-inline-flex ttag-social-link" target = "_blank">
						<i class ="fa fa-facebook-f fa-2x"></i>
					</a>
					<a  href="https://twitter.com/BlazehatTech"  class="m-3 text-light d-inline-flex ttag-social-link" target = "_blank">
						<i class ="fa fa-twitter fa-2x"></i>
					</a>
					<a  href="https://www.youtube.com/channel/UCRXchFZDXjW4YQKVsGI75_w"  class="m-3 text-light d-inline-flex ttag-social-link" target = "_blank">
						<i class ="fa fa-youtube fa-2x"></i>
					</a>
					<a  href="https://www.linkedin.com/company/blazehattech"  class="m-3 text-light d-inline-flex ttag-social-link" target = "_blank">
						<i class ="fa fa-linkedin fa-2x"></i>
					</a>
				</div>
			</div>
			<p class="text-light text-center">© Copyright 2020 Blazehat Technologies LLP - All Rights Reserved</p>
			<p class="text-light text-center ttag-founder">Created by  Tapvir Singh @ 
				<a  href="http://blazehattech.com/"  target = "_blank" class = "ttag-developer-company">Blazehat Technologies LLP</a>
			</p>
		</footer>
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"  type="text/javascript" ></script>
		<script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"  type="text/javascript" ></script>
		<script  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  type="text/javascript" ></script>
		<script  src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"  type="text/javascript" ></script>
		<script  type="text/javascript" >hljs.initHighlightingOnLoad();</script>
	</body>
</html>

```
<p class = "ttag-code-caption text-muted">Html output of <b>world_loves_tea.php</b>.</p>

Wow!!! Now, thats what those three lines of code *(technically just one `new HtmlTTag('The World Loves Tea!');`)* did for you. Don't worry it is not that complicated as it seems, you will learn as you go through the documentation. For now lets look at some important things. 

As you can see, it opened `<html>` tag, then it managed to create a `<head>` tag along with the stylesheet `<link>`, `<title>` tag, loaded Google fonts, loaded a TTag Theme, set the `<meta>` tags, even opened set some css using `<style>` directly in the file. Later opened `<body>` tags, printed the message *"The World Loves Tea!"*, created the `<footer>` and was finally able to close all the tags which were opened in the correct order.

Although we will talk more about `<footer>` later but one thing to note is that the footer created by TTag is properly styled and organised. Also there is not a single line of code in **world_loves_tea.php** example which refers to it. Fasinating, isn't it?

<p class = "ttag-doc-ques">From where TTag got all that information?</p>

Folder **ttag-settings** contains application's default global settings, once the details which are filled in those fields, will be automatically picked, processed and displayed. We will look deeper into this at later stage.
