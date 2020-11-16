<?php

/**
This class overrides the default bootstrap css and adds the script tags in the page.
*/

namespace Src\Classes;

use Src\ContainerTags\TapvirTagContainer;

class BSCSS_Overrider_TTag extends TapvirTagContainer{

		function __construct(){

			$embedded = include tta_StyleSettings('embedded');

			$css = null;

			foreach ($embedded as $key => $value) {
				if($css === null){
					$css = $key.'{';
				}else{
					$css .= $key.'{';
				}
				
				foreach ($value as $key2 => $value2) {
						$css .= $key2.':'.$value2.';';
				}
				$css .= '}';

			}

			$style = new TapvirTagContainer('style',null,$css);

			$this->setContainerCode($style->get());
		}

};