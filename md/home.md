<h3 class="ttag-text-light text-center display-4 mt-0 mb-5">How to use Tea Tags</h3>

<p class="text-center ttag-text-light">Write this...</p>

```php

<?php
// Include the global TTag's configuration file.
require_once('../TTagConfig.php');

// Use HtmlTTag.
use Src\TTags\{HtmlTTag};

// Displays The World Loves Tea!.
new HtmlTTag('The World Loves Tea!');

```
<p class="ttag-code-caption text-muted"><b>Tea Tags using PHP</b></p>

<p class="text-center ttag-text-light">And get this!</p>

```html
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" 
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
		crossorigin="anonymous">
	<link 
		href="https://fonts.googleapis.com/css2?
		family=Dancing+Script:wght@500;600&
		family=Manrope:wght@300&
		family=Questrial&display=swap" 
	rel="stylesheet">
	<title>Tea Tags</title>
	<meta name="viewport" 
		content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" 
		href="http://localhost/tag/themes/tea-tag-slate/css/ttag.css">
	<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" 
		href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">
	<link rel="stylesheet" 
		href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/zenburn.min.css">
</head>
<body class="">The World Loves Tea!
	<footer class="footer p-5  bg-dark">
		<div class="row mb-4">
			<div class="ttag-web-h-ico col-12" 
		style="background-image:url(http://localhost/tag/Themes/tea-tag-slate/images/tea.png)">
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-12 text-center my-2">
				<span class="ttag-footer-sublink-caption">Navigation</span>
				<a href="http://localhost/tag/" 
					class="ttag-footer-h-link table-cell m-3" 
					target="_blank">
					<i class = "fa mr-1 fa-1x fa-home"></i>
					<span>Home</span>
				</a>
				<a href="http://localhost/tag/docs/" 
					class="ttag-footer-h-link table-cell m-3" 
					target="_blank">
					<i class = "fa mr-1 fa-1x fa-book"></i>
					<span>Documentation</span>
				</a>
				<a href="https://blazehattech.blogspot.com/" 
					class="ttag-footer-h-link table-cell m-3" 
					target="_blank">
					<i class = "fa mr-1 fa-1x fa-external-link"></i>
					<span>Blogs</span>
				</a>
			</div>
			<div class="col-12 text-center my-2">
				<span class="ttag-footer-sublink-caption">License</span>
				<a href="https://github.com/tapvirsingh/teatags" 
					class="ttag-footer-h-link table-cell m-3" target="_blank">
					<i class = "fa mr-1 fa-1x fa-balance-scale"></i>
					<span>MIT</span>
				</a>
			</div>
		</div>
		<div class="row mb-4">
			<div class="text-center col-12">
				<a href="https://www.facebook.com/BlazingTeaTags" 
					class="m-3 text-light d-inline-flex ttag-social-link" 
					target="_blank">
					<i class = "fa fa-facebook-f fa-2x"></i>
				</a>
				<a href="https://twitter.com/BlazingTeaTags" 
					class="m-3 text-light d-inline-flex ttag-social-link" 
					target="_blank">
					<i class = "fa fa-twitter fa-2x"></i>
				</a>
				<a href="https://www.youtube.com/channel/UCRXchFZDXjW4YQKVsGI75_w" 
					class="m-3 text-light d-inline-flex ttag-social-link" 
					target="_blank">
					<i class = "fa fa-youtube fa-2x"></i>
				</a>
				<a href="https://www.linkedin.com/company/blazehattech" 
					class="m-3 text-light d-inline-flex ttag-social-link" 
					target="_blank">
					<i class = "fa fa-linkedin fa-2x"></i>
				</a>
				<a href="https://github.com/tapvirsingh/teatags" 
					class="m-3 text-light d-inline-flex ttag-social-link" 
					target="_blank">
					<i class = "fa fa-github fa-2x"></i>
				</a>
			</div>
		</div>
		<p class="text-light text-center">© Copyright 2020 
			<a href="http://blazehattech.com/" 
				class="ttag-developer-company" 
				target="_blank">
				Blazehat Technologies LLP
			</a> - All Rights Reserved
		</p>
		<div class="container">
			<div class="row text-center text-white mt-2">
				<div class="col-sm-12 col-md-12" id="">
					<span class="font-weight-bold">Founder </span>
				</div>
			</div>
			<div class="row text-center text-white mt-2">
				<div class="col-sm-12 col-md-12" id="">
					<img alt="Tapvir Singh" 
						class="rounded-circle" 
						width="64" height="64" 
						src="http://localhost/tag/images/DSC_7924.JPG">
					</div>
			</div>
			<div class="row text-center text-white mt-2">
				<div class="col-sm-12 col-md-12" id="">Tapvir Singh</div>
			</div>
			<div class="row text-center text-white mt-2">
				<div class="col-sm-12 col-md-12" id="">
					<a href="https://tapvir.blogspot.com/" 
					class="ttag-founder-web-link">tapvir.blogspot.com</a>
				</div>
			</div>
			<div class="row text-center text-white mt-2">
				<div class="col-sm-12 col-md-12" id="">
					<a href="https://twitter.com/tapvir_singh" 
						class="m-2 text-light d-inline-flex ttag-social-link" 
						target="_blank">
						<i class = "fa fa-twitter"></i>
					</a>
					<a href="https://www.facebook.com/tapvir/" 
						class="m-2 text-light d-inline-flex ttag-social-link" 
						target="_blank">
						<i class = "fa fa-facebook"></i>
					</a>
					<a href="https://www.linkedin.com/in/tapvir/" 
						class="m-2 text-light d-inline-flex ttag-social-link" 
						target="_blank">
						<i class = "fa fa-linkedin"></i>
					</a>
					<a href="https://www.youtube.com/user/tapvir/" 
						class="m-2 text-light d-inline-flex ttag-social-link" 
						target="_blank">
						<i class = "fa fa-youtube"></i>
					</a>
					<a href="https://github.com/tapvirsingh" 
						class="m-2 text-light d-inline-flex ttag-social-link" 
						target="_blank">
						<i class = "fa fa-github"></i>
					</a>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" 
			type="text/javascript">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
			type="text/javascript">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
			type="text/javascript">
	</script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js" 
			type="text/javascript">
	</script>
	<script type="text/javascript">
	hljs.initHighlightingOnLoad();
	</script>
</body>
</html>

```
<p class="ttag-code-caption text-muted"><b>HTML output along with custom and Bootstrap 4 classes.</b></p>

**Note** 

The above HTML output has been beautified (tabbed and spaced) for making it easier to understand. The HTML output generated by Tea Tags shall be instead minified.