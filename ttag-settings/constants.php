<?php
/* 
	Global application settings.
	Make changes as per your application.
*/

// Author of the application. You may change the page header and meta tags settings for a page by rewriting these on that page.
$ttag_Author = 'Tapvir Singh';

// Head and Lead, you may set the global values here and override on the page by redefining.
// App's main heading and the lead.
// $ttag_Head = 'Have some Tea Tags!';
$ttag_Head = 'Tea Tags';
$ttag_Title = 'Enjoy Tea Tags!';
// Lead will also be part of the site's description.
$ttag_Lead = 'A quick, easy and hassle free PHP framework that will assist you in writing HTML and Bootstrap in PHP.';

$ttag_ArticleVariable = 'article' ;

//Site Bootstrap background class
// $ttag_BS_BG_Class = 'bg-dark';
// define("ROOT","/");
// Paths
// Path where markdown files are stored.
$ttag_MDFilePath = ROOT.'md/';
// $ttag_MDFileExtention = '.txt'; // Can be set to .md | .txt or any other.
$ttag_MDFileExtention = '.md'; // Can be set to .md | .txt or any other.
$ttag_PHPFileExtention = '.php'; // Can be set to .php | .blade.php for laravel.

$ttag_ViewsPath = ROOT.'views/'; // Can be set to .md | .txt or any other.

$ttag_ImagesPath = ROOT.'images/'; // Can be set to .md | .txt or any other.

$ttag_IconsPack = 'fontawesome'; // You may also use latest bootstrap's icon library.
$ttag_IconTag = 'i';

$ttag_CSSframework = 'bootstrap';

//$ttag_Theme = 'TeaTagsTheme';
 $ttag_Theme = 'tea-tag-slate';

//CONSTANTS
const NAVLINKS = 'Navigation';
const SOCIALLINKS = 'Social';
const BLAZEHATLINKS = 'BlazehatTech';

// define(,);
const FONTAWESOME = 'fontawesome';
const FNTAWSM_REGULAR = 'far fa-';
const FNTAWSM_BRAND = 'fab fa-';
const FNTAWSM_SOLID = 'fas fa-';
const FNTAWSM_LIGHT = 'fal fa-';
const FNTAWSM_DUOTONE = 'fad fa-';

const NAVTAGG_INDENT = 3;