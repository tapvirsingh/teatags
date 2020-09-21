<?php

/**
 * Description of ImgTTag
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\SingleTags\TapvirTag;

class ImgTTag extends TapvirTag{
      function __construct($src ,$attribute = null) {

      	$attribute .= ' src = "'.$src.'"';

        parent::__construct('img', $attribute);
        
    }
}
