<?php
// Include the global TTag's configuration file.
require_once('../tta-config.php');

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
$docNavs = new NavTTag($articles_docFiles, [
											'style' => 'flex-column mt-4',
											'cap-color' => 'text-white-50',
											// Get the article's query variable name.
											'query-key' => $article->getCurrentArticleName(),
										] );

// Create auto divs.
$divs = new DivsTTags([$docNavs,$article],[ 'col'=>[2,6], 
	// 'extra-container-class' => 'text-justify', 
	'extra-row-class' => 'ml-0 mr-0 ttag-doc-row',
	'in-container' => false,
	'col-classes' => ['bg-dark','pt-4 ml-4'],
	'position'=>'c']);

// Display the navigation and the html within the divs.
new HtmlTTag([$navbar,$divs]);