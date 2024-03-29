<?php
/* 
	Global application settings.
	Make changes as per your application.
*/

// Author of the application. You may change the page header and meta tags settings for a page by rewriting these on that page.
// $ttag_Author = 'Tapvir Singh';
define('TTAG_AUTHOR','Tapvir Singh');

// Head and Lead, you may set the global values here and override on the page by redefining.
// App's main heading and the lead.
// $ttag_Head = 'Have some Tea Tags!';
// $ttag_Head = 'Tea Tags';
define('TTAG_HEAD','Tea Tags');
// $ttag_Title = 'Tea Tags';
define('TTAG_TITLE','Tea Tags');
// Lead will also be part of the site's description.
// $ttag_Lead = 'A quick, easy and hassle free PHP framework that will assist you in writing HTML and Bootstrap in PHP.';

$ttag_Lead = 'A PHP view framework that manages complete Html by itself. It uses Bootstrap 4 internally but also allows you to use custom or Bootstrap classes. PHP programmers don\'t have to embed PHP in HTML.';

// define('TTAG_LEAD',$ttag_Lead);

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
 // $ttag_Theme = 'tea-tag-slate';
const TTAG_THEME = 'tea-tag-slate';

//CONSTANTS

const NAVLINKS = 'Navigation';
const SOCIALLINKS = 'Social';
const BLAZEHATLINKS = 'BlazehatTech';

const FONTAWESOME = 'fontawesome';

const FNTAWSM_REGULAR = 'far';
const FNTAWSM_BRAND = 'fab';
const FNTAWSM_SOLID = 'fas';
const FNTAWSM_LIGHT = 'fal';
const FNTAWSM_DUOTONE = 'fad';


const FA_REGULAR = 'far';
const FA_BRAND = 'fab';
const FA_SOLID = 'fas';
const FA_LIGHT = 'fal';
const FA_DUOTONE = 'fad';

const NAVTAGG_INDENT = 3;