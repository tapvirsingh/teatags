<?php
// Include the global TTag's configuration file.
require_once('../tta-config.php');

use Src\TTags\{NavBarTTag,NavTTag,ArticleTTag, DivsTTags, HtmlTTag, NavTogglerTTag};

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


$navtoggler = new NavTogglerTTag([
									'caption' => 'Docs Menu',
									'icon' => 'ml-2 fa fa-align-justify',
									// 'src' :  ,
									'class' => 'btn btn-outline-info mb-3  d-sm-block d-md-none',
									'id' =>  'docNavToggler' ,
									'src' => '#docNavCon' ,
								]);

// Create document's navigation and use the article's 
// query variable for navigating through the articles.
$docNavs = new NavTTag($articles_docFiles, [
											'style' => 'flex-column mt-4',
											// Get the article's query variable name.
											'query-key' => $article->getCurrentArticleName(),
											'id' => 'docNav'
										] );

$content = $navtoggler->get().$article->get();

// Create auto divs.
$divs = new DivsTTags([$docNavs,$content],[ 'col'=>[2,6], 
	// 'extra-container-class' => 'text-justify', 
	'extra-row-class' => 'ml-0 mr-0 ttag-doc-row',
	'in-container' => false,
	'ids' => ['docNavCon','container'],
	'col-classes' => ['bg-dark d-xs-none d-sm-block','pt-4 ml-4'],
	'position'=>'c']);

// Display the navigation and the html within the divs.
new HtmlTTag([$navbar,$divs]);