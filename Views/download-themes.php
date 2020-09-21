<?php

// Include the global TTag's configuration file.
require_once('../TTagConfig.php');


$ttag_PageName = 'Downloads';

// Page Metadata
// You may add new page headers and meta tags, or overwrite the defaults here.
$pageHeaders = [
				'meta' => [
					'keywords' => 'PHP Framework, Bootstrap Helper',
				]
			];

// Activate the Home link in the navigation bar.
$navbar = new NavBarTTag($ttag_PageName);

// Set the bootstrap's jumbotron
$jumbo = new JumboTTag(

	//$jumboInnerContent
	[
		'head'=>'Download',
		'lead'=> 'Download Tea Tags and it\'s themes.',
			// Buttons 
		'buttons' => [
			'Learn more' => ['#','btn btn-primary btn-lg m-4'],
			'Download from Github' => ['#','btn btn-success btn-lg'],
			
		]
	],
	//$parameters
	[
		// Make Fluid
		'makeFluid' =>  true,
		'head-size' => 'display-1',
		'align' => 'left',
		// 'bg-image' => 'tea-background.jpg',
		'lead-class' => 'col-7',
	]

	);

// Load download.md 
$article = new ArticleTTag($ttag_PageName); 

// Append article's html to div.col-10 offset-1
$colDiv = new DivTTag('col-10 offset-1', $article->get());

// Append div.col-10 offset-1 to div.row 
$rowDiv = new DivTTag('row mt-4',$colDiv); 

// Append div.row to div.container, text alignment is set to justify.
$containerDiv = new DivTTag('container text-justify',$rowDiv); 

// Create body's inner html by appending navbar, jumbotron and container html.
$bodyInnerHtml = ttag_getCombinedHtml([$navbar,$jumbo,$containerDiv]);

// Append the body's inner html to body tag.
$body = new BodyTTag($bodyInnerHtml);

// Append the body Html and page headers, and display the page.
new HtmlTTag($body->get(),$pageHeaders);