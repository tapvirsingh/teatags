<?php
/**
 * Description of SelectOptionTapvirTagContainer
 *
 * @author Tapvir Singh
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class SelectOptionTapvirTagContainer extends TapvirTagContainer{
    
//    function __construct($attribute, $textOrHtml, $echoOnTheGo = true) {
//        $this->createSelectTag($attribute, $textOrHtml, $echoOnTheGo);
//    }
//    
//    protected function setOptions($option){
//         $op = new TapvirTagContainer('option', null, $option, false);
//         $this->option = $op->getThisContainerHtml();
//         
//    }
//
//
//    protected function createSelectTag($attribute, $textOrHtml, $echoOnTheGo){
//        parent::__construct('select', $attribute, $textOrHtml, $echoOnTheGo);
//    }
    
    function __construct($attribute, $optionsCaptionArray) {

//        $this->optionVal = $optionsValArray;
        $opHTML = $this->setOptions($optionsCaptionArray);
        parent::__construct('select', $attribute, $opHTML);

    }
    
    protected function setOptions($optionsCaptionArray){
         $op = new TapvirTagContainer('option', null, $optionsCaptionArray);
         return  $op->getThisContainerHtml();
    }


}
