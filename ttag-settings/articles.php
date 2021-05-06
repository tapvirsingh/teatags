<?php

// Gobal settings for aritcles.

// Note ttag_ prefix is not used here because you may have a custom name that you wish to use.
// However, articles_ prefix should be used.
$articles_mdSubFolder = '/documentation/1.x/';

// // Please also note that md extention is used here.
// $articles_docFiles = [
// 			'Introduction' => 'introducing-tea-tags',
// 			'Directory structure' => 'directory-structure',
// 		];

$default_DocArticle = 'introducing-tea-tags';
// $article_Root = ttag_View().'documentation.php';

if(!defined('ARTICLE_ROOT_WITH_VAR')){
	define('ARTICLE_ROOT_WITH_VAR', cleanedUrl());
}

// Please also note that md extention is used here.
$articles_docFiles = [
			'Introduction' => $default_DocArticle,
			'Idea and Concept' => 'concept',
			'Directory Structure' => 'directory-structure',
			'/ttag-settings/' => [
					'footer/' => [
							'classes'=>'footer-classes',
							'configuration'=>'footer-config',
							'links'=>'footer-links'
					],

					'navbrand/' => [
						'brand',
						'navbar',
					 ],
					'scripts/' => [
							'javascript/' =>
							[
								'js-links',
								'js-raw-head',
								'js-raw',
								'js-scripts'
							],
					], 

					'forms/' => [

							// frm is suffix for form.
							'example'=>'frm-example',
							'contact'=>'frm-contact',
							'login'=>'frm-login',
							'signup'=>'frm-signup',

					],
					'constants.php' =>	'constants',
					// 'brand-navbar.php' => 'brand-navbar',
					// 'footer.php' => 'footer',
					'google.php' => 'google',
					// 'js.php' => 'js',
					'links.php' => 'links',
					'nav-links.php' => 'nav-links',
					'page-headers.php' => 'page-headers',
					'social.php' => 'social',
					'styles.php' => 'styles',
					],
			
				'TTag Classes' => [
					'HtmlTTag',
					'BodyTTag',
					'DivTTag',
					'DivsTTags',
					'ArticleTTag' ,
					'JumboTTag',
					'ListTTag' ,
					'NavBarTTag',
					'NavTTag'  ,
					'BrandTTag' ,
					'FooterTTag',
					'PageHeadingTTag',
					'HeadingTTag',
					'ParaTTag',
					'ImgTTag' ,
					'AnchorTTag' ,
					'SpanTTag' ,
					'TeaCTag',
					'TeaSTag',
					'EmailTTag',
					'InputTTag',
					'PassTTag',
					'InpTextTTag' ,
					'CardTTag',
					'FontAwsmTTag' ,
					'SocialTTag' ,
					'AccordionTTag' ,
					'FormTTag' ,
				],
				'TTag Class Methods' => [
					'get',
					'divs' ,
					'authorised',
				],
						
		];		


