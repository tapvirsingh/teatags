<?php
/**
 * Description of FormTapvirTagContainer
 *
 * @author Tapvir Singh.
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class FormTapvirTagContainer extends TapvirTagContainer{
    
    private $dontCreateFieldset = false;
    private $multiDimensionArrayOfFields, $fieldSetHTMLArray, $fieldsetAttribute, $legendAttribute;
    private $arrayOfFields, $fieldPrefix, $fieldCount, $fieldType, $field , $fieldName, $fieldAttr, $fieldsAttrs;
    private $containerParaAttribute;
    private $formHTML;
    private $labels, $currentLoopCount;
    private $container;
    private $containerClass;
    
//    static private $counter = 0;
    
    function __construct($multiDimensionArrayOfFields = null,$fieldAttributes = null, $fieldPrefix = null, $method = null, $action = null, $formAttribute = null,  $labels = null) {
        
        $this->labels = $labels;
//        $this->arrayOfFields = $arrayOfFields;
        $this->multiDimensionArrayOfFields = $multiDimensionArrayOfFields;
        
        $this->fieldPrefix = $fieldPrefix;
//        $this->fieldsAttrs = $fieldAttributes;
        
        $this->setFieldsAttrs($fieldAttributes);
        
//        $this->createFields();
        $this->initiateFormCreation($multiDimensionArrayOfFields);
        
        $formAttribute .= ' class = "text-center" ';
        
        if($method !== null){
            $formAttribute .= ' method = "'.$method.'" ';
        }
        
        if($action !== null){
            $formAttribute .= ' action = "'.$action.'" ';
        }
        
        parent::__construct('form', $formAttribute, $this->formHTML);
    }

    function setLabels($labels) {
        $this->labels = $labels;
    }

    private function createLabel(){
        if($this->labels !== null && is_array($this->labels)){
            $lbl = new TapvirTagContainer('span', 'class = "" style = "display:block;"', $this->labels[$this->currentLoopCount], false);
            return($lbl->getThisContainerHtml());
        }
    }
        
    protected function setFieldSetAttribute() {
        // if the fieldset-attribute is set then
        // make it available at the class level.
        if(isset($this->arrayOfFields['fieldset-attribute'])){
            $this->fieldsetAttribute = $this->arrayOfFields['fieldset-attribute'];
        }
    }
    
    protected function setLegendAttribute() {
       // if the legend-attribute is set then
        // make it available at the class level.
        if(isset($this->arrayOfFields['legend-attribute'])){
            $this->legendAttribute = $this->arrayOfFields['legend-attribute'];
        }
    }
    
    protected function setContainerParaAttribute(){
        if(isset($this->arrayOfFields['containerPara-attribute'])){
            $this->containerParaAttribute = $this->arrayOfFields['containerPara-attribute'];
        }
    }

        
    protected function setFieldsAttrs($fieldsAttrs) {
        $array = null;
        foreach($fieldsAttrs as $key => $value){
//        Get the list of coma seperated types.
            $comaSepArray = explode(',', $key);
//            Assign every coma sep key the same value.
            if(!empty($comaSepArray)){
                foreach($comaSepArray as $comKey){
                    $array[$comKey] = $value;
                }
            }
        }
        $this->fieldsAttrs = $array;
    }
        
    protected function getFieldAttr(){
        foreach($this->fieldsAttrs as $key => $value){
            if($this->fieldType === $key){
                $this->fieldAttr = $value;
            }
        }
    }
    
    public function setFormHTML($formHTML) {
        if($this->formHTML === null){
            $this->formHTML = $formHTML;
        }else{
            $this->formHTML .= $formHTML;
        }
    }
    
    protected function getFieldName(){
        
        $str = strtolower($this->field);
        $this->fieldName = $this->fieldPrefix.str_space_to_underscore($str);
    }

    protected function createFields(){
      
        for($i=0 ; $i < $this->fieldCount ; $i++){
            
//            list($containerClass,$type, $field) = explode('-TAPFT-', $this->arrayOfFields[$i]);

            $explodedData = explode('-TAPFT-', $this->arrayOfFields[$i]);
            
            if(sizeof($explodedData) == 3){
                // Container class
                $containerClass = $explodedData[0];
                //  field type
                $this->fieldType = $explodedData[1];
                //  field
                $this->field = $explodedData[2];
//            If there is a class with the container
                if(strpos($containerClass, '.')){
                    list($this->container,$this->containerClass) = explode('.', $containerClass);
                }
            }else{
                $this->fieldType = $explodedData[0];
                $this->field = $explodedData[1];
            }
      
            $this->currentLoopCount = $i;
            
            if($this->fieldType !== 'fieldset'){
                
                $this->getFieldName();
                $this->getFieldAttr();
               $this->createField();

            }else{
                $this->checkDontCreateFieldset();
            }
            
        }
    }
    
    
    protected function createInputTag(){
        $field = $this->fieldType === 'checkbox' || $this->fieldType === 'radio' ? null : $this->field;
        $label = null;
        if($this->fieldType === 'checkbox' || $this->fieldType === 'radio'){
            $label = new TapvirTagContainer('label', 'id = "id_'.$this->fieldName.'" style = "text-shadow:none;" ', $this->field, false);
//            color:wheat;
        }
        
        if($this->fieldType === 'submit'){
            $returnInp =  new InputTapvirTag($this->fieldType, $field,'class = "btn btn-success btn-lg" name = "'.$this->fieldName.'" '.$this->fieldAttr, false);
        }else{
            $returnInp =  new InputTapvirTag($this->fieldType, $field,'class = "form-control form-control-lg" name = "'.$this->fieldName.'" '.$this->fieldAttr, false);
        }
        
        $returnHTMLCode = $returnInp->getTagCode();
        if($label !== null){
            $returnHTMLCode .= $label->getThisContainerHtml();
        }
        return $returnHTMLCode;
    }
    
    protected function createField(){
//                static::$counter++;

//        debug2('Calling Form Class.... '.static::$counter,__FILE__,__LINE__);
        
        $lbl = $this->createLabel();

        switch ($this->fieldType) {
            case 'legend':
                $para = new TapvirTagContainer($this->fieldType, $this->legendAttribute, $lbl.$this->field, false);
                break;
            
            case 'html':
                $para = new TapvirTagContainer($this->container, 'class = "'.$this->containerClass.'" ', $lbl.$this->field,false);
                break;

            default:
                $inputFieldHTML = $this->createInputTag();
                $para = new TapvirTagContainer($this->container, 'class = "'.$this->containerClass.'" ', $lbl.$inputFieldHTML,false);
                break;
        }
        
        $this->setFormHTML($para->getThisContainerHtml());
        return $para;
    }

    protected function checkDontCreateFieldset() {
        if($this->fieldType === 'fieldset' && $this->field === 'none'){
            $this->dontCreateFieldset = true;
        }
    }
        
    protected function createFieldSet($count){
        if($count > 1 ){
            if( $this->dontCreateFieldset){
                    $this->fieldSetHTMLArray[] = $this->formHTML;
            }else{
    //                    Create a fieldset element as there are more than one forms.
                $fieldset = new TapvirTagContainer('fieldset', $this->fieldsetAttribute, $this->formHTML, false);
                $this->fieldSetHTMLArray[] = $fieldset->getThisContainerHtml();
            }
            
        }
    }
    

    protected function setFieldCount(){

        // Get the total array of current fields.
        $this->fieldCount = count($this->arrayOfFields);

        if($this->fieldsetAttribute !== null ){
            $this->fieldCount--;
        }
        if($this->legendAttribute !== null){
            $this->fieldCount--;
        }
//        if($this->containerParaAttribute !== null){
//            $this->fieldCount--;
//        }

    }
    
    protected function initiateFormCreation($multiDimensionArrayOfFields){

        // Count the number of array passed as the argument.
        $mutiDemArrayCount = count($multiDimensionArrayOfFields);

        // Loop through each array.
        foreach($multiDimensionArrayOfFields as $arrayOffields){
            
            // Current active field in the loop. 
            $this->arrayOfFields = $arrayOffields;

            // Set the field attribute at the class level.
            $this->setFieldSetAttribute();
            $this->setLegendAttribute();
            $this->setContainerParaAttribute();
            $this->setFieldCount();


            $this->createFields();
            $this->createFieldSet($mutiDemArrayCount);
//            Set all to null for new values of next array of fields.
            $this->formHTML = $this->legendAttribute = $this->fieldsetAttribute = null;
            $this->dontCreateFieldset = false;
        }
        
        $divRow = new DivTapvirTagContainer('class = "container"', implode(' ',  $this->fieldSetHTMLArray), false);
        
        $this->setFormHTML($divRow->getThisContainerHtml());
        
    }
    
}
