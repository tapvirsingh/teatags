<?php

// Gobal settings for aritcles.

// Note ttag_ prefix is not used here because you may have a custom name that you wish to use.
// However, articles_ prefix should be used.
$articles_mdSubFolder = '/Documentation/1.x/';

// // Please also note that md extention is used here.
// $articles_docFiles = [
// 			'Introduction' => 'introducing-tea-tags',
// 			'Directory structure' => 'directory-structure',
// 		];

$default_DocArticle = 'introducing-tea-tags';
$article_Root = ttag_View().'documentation.php';
$article_RootWithVariable = $article_Root.'?'.$ttag_ArticleVariable.'=';
// Please also note that md extention is used here.
$articles_docFiles = [
		
		];