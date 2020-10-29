<?php
/**
 * Creates tags.
 * @author Tapvir Singh
 */

namespace Src\ContainerTags;

use Src\TeaTag;
use Src\SingleTags\TapvirTag;
use Src\TTags\{DivsTTags,ScriptTTag};

class TapvirTagContainer extends TeaTag{
  
    /**
     * Constructor to create the Container.
     * @param type $tagName Name of the tag to create.
     * @param type $attribute Attribute of the tag.
     * @param type $textOrHtml Text or Html within this tag. Only if it is a block tag.
     * @param type $singleTag Is a block / single tag.
     * @param type $echoOnTheGo Display as the tag is created or create html for later use.
     */
    function __construct($tagName = null, $attribute = null, $textOrHtml = null, $echoOnTheGo = false) {
        
        
        $this->setTagName($tagName);
        $this->setAttribute($attribute);
        $this->setTextOrHtml($textOrHtml);
        $this->setArrayOfTextOrHtml();
        $this->setEchoOnTheGo($echoOnTheGo);
        
        $this->proceedWithTWBCreation();
    }
    
    /**
     * 
     * @return string Returns the created html. 
     */
    public function getThisContainerHtml(){
        return $this->containerCode;
    }

    /**
     * Same as getThisContainerHtml(), just easy to remember. 
     * @return string Returns the created html. 
     */
    public function get(){
        return $this->containerCode;
    }

    public function setCode($code){
      return $this->setContainerCode($code);
    }
    
    public function setContainerCode($containerCode) {
//        debug2($containerCode,__FILE__,__LINE__);
//        debug2($this->containerCode,__FILE__,__LINE__);
        
        if($this->containerCode === null){
            $this->containerCode = $containerCode;
        }else{
            $this->containerCode .= $containerCode;
        }
        return $this;
    }

    
    public function setEchoOnTheGo($echoOnTheGo) {
        $this->echoOnTheGo = $echoOnTheGo;
        return $this;
    }

            
    public function setTagName($tagName) {
        $this->tagName = $tagName;
        return $this;
    }

    public function setAttribute($attribute) {
        $this->attribute = $attribute;
        return $this;
    }

    public function setTextOrHtml($textOrHtml) {
        $this->textOrHtml = $textOrHtml;
        return $this;
    }
    
    /**
     * Checks if textOrHtml is array, if so sets it as array.
     */
    public function setArrayOfTextOrHtml() {
        if(is_array($this->textOrHtml)){
            $this->arrayOfTextOrHtml = $this->textOrHtml;
            $this->textOrHtml = null;
        }
    }
    
    public function showTextOrHtml(){
        if($this->appendedTextOrHtml !== null){
            $this->createContainerElement($this->appendedTextOrHtml);
        }elseif($this->textOrHtml !== null){
            $this->createContainerElement($this->textOrHtml);
        }
    }
    
    protected function setAppendedTextOrHtml($codeToAppend) {
        $this->appendedTextOrHtml = $codeToAppend;
    }


    /**
     * Use this to add a list item array for displaying.
     * @param type $codeToAppend
     */
    public function appendInnerHTML($codeToAppend){
        $this->setAppendedTextOrHtml($codeToAppend);
        $this->createTagWB();
        $this->setAppendedTextOrHtml(null);
    }
    
    /**
     * Proceed with Tag With Body Creation.
     * Checks if passed textOrHtml is array, if so, uses the array creation method else simple method.
     */
    protected function proceedWithTWBCreation(){
        if($this->arrayOfTextOrHtml !== null){
            $this->createArrayTagWB();
        }else{
            $this->createTagWB();
        }
    }
    
    protected function createArrayTagWB(){
        if($this->arrayOfTextOrHtml !== null){
            foreach($this->arrayOfTextOrHtml as $item){
                $this->setTextOrHtml($item);
                $this->createTagWB();
            }
        }
    }
    
    /**
     * Create tag with body
     */
    public function createTagWB(){
        if($this->tagName !== null){
            $this->createTag();
            $this->showTextOrHtml();
            $this->endTag();
        }
    }
    
    
    /**
     * 
     * @param type $spacePos 0: Left, 1: Right
     */
    protected function addSpace($element, $spacePos = 0){
        $element = ($spacePos === 0) ? ' '.$element : $element.' ';
        return $element;
    }
    
    
    
    protected function setOrShowContainerElement($element){
        if($this->echoOnTheGo){
            echo $element;
        }else{
            $this->setContainerCode($element);
        }
    }
    
    protected function createContainerElement($element, $space = false,$conditionForShowingElement = true){
        if($conditionForShowingElement){
            if($space !== false){
                $element = $this->addSpace($element, $space);
            }
            $this->setOrShowContainerElement($element);
        }
    }

/**
 * Code to create tags.
 *  @param string $tagName Name of the tag.
 *  @param string $attribute attribute of the dom tag.
 */
    public function createTag() {
        if($this->tagName !== null){
            
            $tagObject = $this->tagObject = new TapvirTag($this->tagName,  $this->attribute,$this->echoOnTheGo);
            $this->setContainerCode($tagObject->getTagCode());
//            $this->createContainerElement('<');
//            $this->createContainerElement($this->tagName);
//            $this->createContainerElement($this->attribute, 0,$this->attribute !== null);
//            $this->createContainerElement('>');
        }
    }

 /**
  * Code to create ending tags.
  * @param string $tagName Name of the tag.
  */   
    public function endTag() {
        if($this->tagName !== null && $this->tagObject !== null){
            
            $tagObject = $this->tagObject;
            $tagObject->endTag();
            $this->setContainerCode($tagObject->getTagCode());
//            $this->createContainerElement('</');
//            $this->createContainerElement($this->tagName);
//            $this->createContainerElement('>');
        }
    }

    protected  function loadJSRawScripts($head = false){

        $script = ($head === true) ? 'js-raw-head-scripts' : 'js-raw-scripts';

        $jsScripts = include tta_ScriptSettings($script);

        if(!is_array($jsScripts)){
            return null;
        }

        $js = null;

        foreach ($jsScripts as $value) {

            $js[]  = new ScriptTTag($value);
            
        }   
        $jsHtml = ttag_getCombinedHtml($js);
        $this->appendHtml($jsHtml);
    }

}
