<?php
/*
	Warning : Donot make any changes to this file, any change made here 
	may affect the working of the framework.
*/

define("ROOT", "http://localhost/tag/");
// define("ROOT", "/");

// auto load classes.
spl_autoload_register(function ($className) {
	// echo '<pre>'.$className.'</pre>';
    require_once  __DIR__ ."/".str_replace("\\","/",$className) . '.php';
});


define("MD_ROOT", __DIR__ ."/md/");
define("IMAGES_ROOT", __DIR__ ."/images/");
define("SETTINGS_ROOT", __DIR__ ."/ttag-settings/");
define("JAVASCRIPT_ROOT", __DIR__ ."/javascript/");
define("EMBEDDED_JS_ROOT",JAVASCRIPT_ROOT."/embed/");

// dir settings at root.
define("FOOTER_SETTINGS", SETTINGS_ROOT."footer/");
define("NAVBRAND_SETTINGS", SETTINGS_ROOT."navbrand/");
define("SCRIPTS_SETTINGS", SETTINGS_ROOT."scripts/");
define("STYLES_SETTINGS", SETTINGS_ROOT."styles/");
define("GOOGLE_SETTINGS", SETTINGS_ROOT."google/");
define("AFFILIATE_ROOT", SETTINGS_ROOT."affiliates/");

// Form settings
define("FORMS_SETTINGS", SETTINGS_ROOT."forms/");
define("FORMPARA_SETTINGS", FORMS_SETTINGS."parameters/");
define("FORMSETTING_SETTINGS", FORMS_SETTINGS."settings/");
define("FORMSTRUCT_SETTINGS", FORMS_SETTINGS."structures/");
define("FORMCLASSES_SETTINGS", FORMS_SETTINGS."classes/");

// Constants
define("SINGLE_ELEMENT_CALL", 0);
define("ARRAY_ELEMENT_CALL", 1);
define("COMBO_ELEMENT_CALL", 2);
define("LINK_ELEMENT_CALL", 3);

//$ttag_Theme = 'TeaTagsTheme';
 // $ttag_Theme = 'tea-tag-slate';


// Global Function
require_once('Src/Functions/global.php');

// Include Global App Settings
// The files must be loaded in the following order.
require_once('ttag-settings/constants.php');
require_once('ttag-settings/articles.php');
require_once('ttag-settings/nav-links.php');
require_once('ttag-settings/links.php');
require_once('ttag-settings/social.php');
require_once('ttag-settings/brand-navbar.php');
require_once('ttag-settings/bootstrap.php');
// require_once('ttag-settings/styles.php');
// require_once('ttag-settings/js.php');
// require_once('ttag-settings/footer.php');
// require_once('ttag-settings/google.php');
require_once('ttag-settings/page-headers.php');

// Dependences
require_once('Dependences/parsedown_master/Parsedown.php');
// require_once('Dependences/parsedown-extra-master/ParsedownExtra.php');
