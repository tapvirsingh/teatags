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
								'Download from Github' => ['#','btn btn-success btn-lg'],
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
