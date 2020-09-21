<?php
/*
	Donot make any changes to this file.
*/

// auto load classes.
spl_autoload_register(function ($className) {
    require_once $className . '.php';
});
	
// define("ROOT", __DIR__ ."/");
define("ROOT", "http://localhost/tag/");

// Global Function
require_once('Src/Functions/global.php');

// Include Global App Settings
// The files must be loaded in the following order.
require_once('TTagAppSettings/constants.php');
require_once('TTagAppSettings/articles.php');
require_once('TTagAppSettings/nav-links.php');
require_once('TTagAppSettings/links.php');
require_once('TTagAppSettings/social.php');
require_once('TTagAppSettings/brand-navbar.php');
require_once('TTagAppSettings/bootstrap.php');
require_once('TTagAppSettings/styles.php');
require_once('TTagAppSettings/js.php');
require_once('TTagAppSettings/footer.php');
require_once('TTagAppSettings/google.php');
require_once('TTagAppSettings/page-headers.php');

// Dependences
require_once('Dependences/parsedown_master/Parsedown.php');
// require_once('Dependences/parsedown-extra-master/ParsedownExtra.php');
