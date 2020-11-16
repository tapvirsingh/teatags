<b>/ttag-settings/<span class = "ttag-file">constants.php</span></b>

```php

// Author of the application. 
// You may change the page header and meta tags settings
// for a page by rewriting these on that page.
$ttag_Author = '';

// App's main heading and the lead (a small description 
// explaining about your project.).
// You may set the global values here and override 
// on the page by redefining.
$ttag_Head = '';
// Lead will also be part of the site's meta description.
$ttag_Lead = '';

// App's title.
$ttag_Title = '';

// This variable is responsible for setting the article's variable. 
$ttag_ArticleVariable = 'article' ;

// Path where markdown files are stored.
$ttag_MDFilePath = ROOT.'MD/';

// Extention of the content files. Can be set to .md | .txt or any other.
// $ttag_MDFileExtention = '.txt';
$ttag_MDFileExtention = '.md'; 

// Can be set to .php | .blade.php for laravel. 
// Not yet tested for laravel.
$ttag_PHPFileExtention = '.php'; 

// Path for views directory.
$ttag_ViewsPath = ROOT.'Views/'; 

// Path for Images directory.
$ttag_ImagesPath = ROOT.'Images/'; 

// Bootstrap icon's pack.
// You may also use latest bootstrap's icon library.
$ttag_IconsPack = 'fontawesome'; 

// Icon tag for fontawesome <i class = "..."></i>
$ttag_IconTag = 'i';

// Type of framework. Currently TTag supports only bootstrap.
$ttag_CSSframework = 'bootstrap';

// The theme you wish to activate.
// Please note that the name should be same as that of the directory.
const TTAG_THEME = 'tea-tag-slate';


```