<?php
/**
 * Creates tags.
 * @author Tapvir Singh
 */

namespace Src\SingleTags;

use Src\TeaTag;

class TapvirTag extends TeaTag{
   
    
    function __construct($tagName = null, $attribute = null, $echoOnTheGo = false) {
        
        $this->setTagName($tagName);
        $this->setAttribute($attribute);
        $this->setEchoOnTheGo($echoOnTheGo);
        
        $this->createTag();
    }
    
    /**
     * Use this function if arrays of tags are passed.
     */
//    protected function createTags(){
//        if($this->tagNameArray !== null){
//            $tagNameCount = count($this->tagNameArray);
//            
//            for ($i = 0 ; $i < $tagNameCount ; $i++) {
//                
//                $this->tagName = $this->tagNameArray[$i];
//                if($this->attributeArray !== NULL){
//                    $this->attribute = $this->attributeArray[$i];
//                }
//                
//                $this->createTag();
//            }
//        }else{
//            $this->createTag();
//        }
//    }

    public function getTagCode() {
        return $this->tagCode;
    } 

    /**
    * Same as getTagCode(), just easy to remember.
    */
    public function get() {
        return $this->tagCode;
    }

    public function setTagName($tagName) {
//        if(is_array($tagName)){
//            $this->tagNameArray = $tagName;
//        }else{
            $this->tagName = $tagName;
//        }
        return $this;
    }

    /**
     * Set the attribute as array only if tags passed are arrays. 
     * @param type $attribute
     * @return \TapvirTag
     */
    public function setAttribute($attribute) {
//        if($this->tagNameArray !== null && is_array($attribute)){
//            $this->attributeArray = $attribute;
//        }else{
            $this->attribute = $attribute;
//        }
        return $this;
    }

    public function setEchoOnTheGo($echoOnTheGo) {
        $this->echoOnTheGo = $echoOnTheGo;
        return $this;
    }

        
    /**
     * 
     * @param type $spacePos 0: Left, 1: Right
     */
    protected function addSpace($element, $spacePos = 0){
        $element = ($spacePos === 0) ? ' '.$element : $element.' ';
        return $element;
    }
    
    public function setTagCode($tagCode) {
        if($this->tagCode === null){
            $this->tagCode = $tagCode;
        }else{
            $this->tagCode .= $tagCode;
        }
        return $this;
    }

    /**
     * 
     * @param type $element
     * @param type $space
     * @param type $conditionForShowingElement
     */
    protected function createTagElement($element, $space = false,$conditionForShowingElement = true){
        if($conditionForShowingElement){
            if($space !== false){
                $element = $this->addSpace($element, $space);
            }
            if($this->echoOnTheGo){
                echo $element;
            }else{
                $this->setTagCode($element);
            }
        }
    }
    
/**
 * Code to create tags.
 *  @param string $tagName Name of the tag.
 *  @param string $attribute attribute of the dom tag.
 */
    public function createTag() {
        if($this->tagName !== null){
            $this->createTagElement('<');
            $this->createTagElement($this->tagName);
            $this->createTagElement($this->attribute, 0,$this->attribute !== null);
            $this->createTagElement('>');
        }
    }
    
    protected function clearTagCode(){
        $this->tagCode = null;
    }

 /**
  * Code to create ending tags.
  * @param string $tagName Name of the tag.
  */   
    public function endTag() {
        if($this->tagName !== null){
            $this->clearTagCode();
            $this->createTagElement('</');
            $this->createTagElement($this->tagName);
            $this->createTagElement('>');
        }
    }
}
