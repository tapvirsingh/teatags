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
			'Introduction' => $article_RootWithVariable.$default_DocArticle,
			'Idea and Concept' => $article_RootWithVariable.'concept',
			'Directory Structure' => $article_RootWithVariable.'directory-structure',
			'TTagAppSettings Dir' => [
					'constants.php' =>	$article_RootWithVariable.'constants',
					'brand-navbar.php' => $article_RootWithVariable.'brand-navbar',

					// 'footer' => [
					// 			'classes.php' => $article_RootWithVariable.'classes',
					// 			'configuration.php' => $article_RootWithVariable.'configuration',
					// 			'links.php' => $article_RootWithVariable.'links',
					// 			],

					// 'navbrand' => [
					// 			'brand.php' => $article_RootWithVariable.'classes',
					// 			'navbar.php' => $article_RootWithVariable.'configuration',
					// 			],

					'footer.php' => $article_RootWithVariable.'footer',
					'google.php' => $article_RootWithVariable.'google',
					'js.php' => $article_RootWithVariable.'js',
					'links.php' => $article_RootWithVariable.'links',
					'nav-links.php' => $article_RootWithVariable.'nav-links',
					'page-headers.php' => $article_RootWithVariable.'page-headers',
					'social.php' => $article_RootWithVariable.'social',
					'styles.php' => $article_RootWithVariable.'styles',
					],
				'TTag Classes' => [
					'HtmlTTag' => $article_RootWithVariable.'HtmlTTag',
					'BodyTTag' => $article_RootWithVariable.'BodyTTag',
					'DivTTag' => $article_RootWithVariable.'DivTTag',
					'DivsTTags' => $article_RootWithVariable.'DivsTTags',
					'ArticleTTag' => $article_RootWithVariable.'ArticleTTag',
					'JumboTTag' => $article_RootWithVariable.'JumboTTag',
					'ListTTag' => $article_RootWithVariable.'ListTTag',
					'NavBarTTag' => $article_RootWithVariable.'NavBarTTag',
					'NavTTag' => $article_RootWithVariable.'NavTTag',
					'BrandTTag' => $article_RootWithVariable.'BrandTTag',
					'FooterTTag' => $article_RootWithVariable.'FooterTTag',
					'PageHeadingTTag' => $article_RootWithVariable.'PageHeadingTTag',
					'HeadingTTag' => $article_RootWithVariable.'HeadingTTag',
					'ParaTTag' => $article_RootWithVariable.'ParaTTag',
					'ImgTTag' => $article_RootWithVariable.'ImgTTag',
					'AnchorTTag' => $article_RootWithVariable.'AnchorTTag',
					'SpanTTag' => $article_RootWithVariable.'SpanTTag',
					'TeaCTag' => $article_RootWithVariable.'TeaCTag',
					'TeaSTag' => $article_RootWithVariable.'TeaSTag',
					'EmailTTag' => $article_RootWithVariable.'EmailTTag',
					'InputTTag' => $article_RootWithVariable.'InputTTag',
					'PassTTag' => $article_RootWithVariable.'PassTTag',
					'InpTextTTag' => $article_RootWithVariable.'InpTextTTag',
					'CardTTag' => $article_RootWithVariable.'CardTTag',
				],
				'TTag Class Methods' => [
					'get' => $article_RootWithVariable.'get',
					'divs' => $article_RootWithVariable.'divs',
					'authorised' => $article_RootWithVariable.'authorised',
				],
					
		];