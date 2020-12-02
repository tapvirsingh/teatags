<?php
// Include the global TTag's configuration file.
require_once('ttag-config.php');

use Src\TTags\{SpanTTag,TeaCTag,NavBarTTag,JumboTTag,ArticleTTag,HtmlTTag,FontAwsmTTag};

$ttag_PageName = 'Home';
// Page Metadata
// You may add new page headers and meta tags, or overwrite the defaults here.
$pageHeaders = [ 'meta' => [
					'keywords' => 'PHP Framework, Bootstrap Helper',
					] 
				];

// Activate the Home link in the navigation bar.
$navbar = new NavBarTTag($ttag_PageName);

$githubIco = new FontAwsmTTag('github');
$infoIco = new FontAwsmTTag('book');

$verNum = new TeaCTag('sup','ttag-ver','2');
$beta = new TeaCTag('sup','ttag-beta','&beta;');

$ver = new SpanTTag('ttag-show-version-style',$verNum->get().$beta->get());

// Set the bootstrap's jumbotron
$jumbo = new JumboTTag(
							[
							'head' => "Tea Tags ".$ver->get(),
							// 'lead' =>$ttag_Lead,
							// Buttons 
							'buttons' => [
							$infoIco->get().' Read Docs' => [
													'https://teatags.blazehattechnologies.com/Views/documentation.php',
													'btn btn-outline-light btn-lg m-4'
												],
							$githubIco->get().' Download / Clone' => [
															'https://github.com/tapvirsingh/teatags',
															'btn btn-outline-success btn-lg',
															'_blank',
														],
							]
						],
						[//$parameters
							// 'bg-image' => 'tea-background.jpg',
							'lead-class' => 'col-8 offset-2 ttag-text-lighter',
							'align'=>'center',
							'jumbo-classes'=>'mb-0 pb-1 ttag-border-radius-0 ttag-jumbo-background ',
							'head-class' => 'ttag-text-light mb-3',
							// 'overlay' => ['color' => '#fff', 'opacity'=>'0.5']
						] );

// Load home.md 
$article = new ArticleTTag($ttag_PageName);

// Article auto creates div.col, rows and container, depending upon the type of data.
// and returns a DivsTTags object.
$div = $article->divs([ 'col' =>8,  'offset' => 2,
						// 'extra-container-class' => 'text-justify', 
						'extra-row-class' => 'mt-4']);


// Creates the page with default page headers, array composed of
// navbar, jumbotron and div, also auto creates the body tags, 
// and then displays the page.
new HtmlTTag([$navbar,$jumbo,$div]);
