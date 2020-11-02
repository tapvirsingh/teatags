<h3 class="display-4 mb-5">Directory Structure</h3>

TTag has a specific directory structure. When you download TTags, all the files and root directories will be in Tag directory. You must copy all of its content at your root.<br>

#### Root Directories

<br>

##### Directories not to be touched

*Note these directories begin with a capital letter.*

<p class = "ttag-dir">/Src/</p>

This directory is the backbone of TTags. The complete source code of TTags is in the **`/Src/`** directory. Any changes in this directory or its sub-directories will change the way this works. Hence, it should not be touched.
 

<p class = "ttag-dir">/Dependences/</p>

This directory contains the dependences TTags requires. TTags uses **Parsedown**.

<br>

##### Directories that can be customized

*Note these directories begin with a lowercase letter.*

<p class = "ttag-dir">/javascript/</p>

Although TTags does not force you to keep your javascript in this directory and you may keep yours in a different one, however **/Javascript/** is the directory where you should ideally keep.

<p class = "ttag-dir">/md/</p>

This is the directory where you should keep your content. All your Markdown or text files which displays the content on a page must be kept in this folder. You may create sub directories for organising the content.

<p class = "ttag-dir">/themes/</p>

To customize the app you are building must be kept in a sub folder inside the */themes/* folder with a theme name without any space or special character, however, `-` may be used instead of space. For example, 

*/themes/<span  class = "ttag-dir-hilight">tea-tags-theme</span>/*

There should be a */themes/tea-tags-theme/<span  class = "ttag-dir-hilight">css</span>/* and */themes/tea-tags-theme/<span  class = "ttag-dir-hilight">images</span>/* folder for keeping your css and images organised respectively.

<p class = "ttag-dir">/ttag-settings/</p>

This directory here is the main control panel for your application. About every configuration **file** within this directory and its sub-directory is explained separately under the *ttag-settings* article section.

<p class = "ttag-dir">/views/</p>

This is where your views exists. All views other than the index.php must stay within the views directory.

**Root Files**

<p class = "ttag-file">/ttag-config.php</p>

Loads all the TTag classes. Not to be touched.

<p class = "ttag-file">/index.php</p>

This file must exist at root level.