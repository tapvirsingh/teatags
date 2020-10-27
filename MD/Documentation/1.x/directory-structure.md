<h3 class="display-4 mb-5">Directory Structure</h3>

TTag has a specific directory structure. When you download TTags, all the files and root directories will be in Tag directory. You must copy all of its content at your root.

**Root Directories**

<p class = "ttag-dir">/Src/</p>

This directory is the backbone of TTags. The complete source code of TTags is in the **/Src/** directory. Any changes in this directory or its sub-directories will change the way this works. Hence, it should not be touched.
 
<p class = "ttag-dir">/Dependences/</p>

This directory contains the dependences TTags requires. TTags uses **Parsedown**.

<p class = "ttag-dir">/Javascript/</p>

Although TTags does not force you to keep your javascript in this directory and you may keep yours in a different one, however **/Javascript/** is the directory where you should ideally keep.

<p class = "ttag-dir">/MD/</p>

This is the directory where you should keep your content. All your Markdown or text files which displays the content on a page must be kept in this folder. You may create sub directories for organising the content.

<p class = "ttag-dir">/Themes/</p>

To customize the app you are building must be kept in a sub folder inside the */Themes/* folder with a theme name without any space or special character. For example, 

*/Themes/<span  class = "ttag-dir-hilight">TeaTagsTheme</span>/*

There should be a */Themes/TeaTagsTheme/<span  class = "ttag-dir-hilight">CSS</span>/* and */Themes/TeaTagsTheme/<span  class = "ttag-dir-hilight">Images</span>/* folder for keeping your css and images organised respectively.

<p class = "ttag-dir">/TTagAppSettings/</p>

This directory here is the main control panel for your application. About every configuration file within this directory is explained seperatly under the *TTagAppSettings Directory* article section.

<p class = "ttag-dir">/Views/</p>

This is where your views exists. All views other than the index.php must stay within the views directory.

**Root Files**

<p class = "ttag-file">/TTagConfig.php</p>

Loads all the TTag classes. Not to be touched.

<p class = "ttag-file">/index.php</p>

This file must exist at root level.