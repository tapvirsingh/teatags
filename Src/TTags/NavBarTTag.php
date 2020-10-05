<?php

/**
 * Description of NavBarTTag 
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;   

class NavBarTTag extends TapvirTagContainer{

    private $linksWithCaptions;
  	private $dropdownItemExtraClass = null;
  	private $navListCounter;
  	private $activeKey;
    private $navbar;

    function __construct(
    					// Array in the key value format 
    					//  Set the name of the key active for the page.
    					$activeKey = null) {


        $this->navbar = include tta_NavBrandSettings('navbar');

        // $this->navbar = $this->navbar;

    	$this->navListCounter = 0;

    	$this->activeKey = $activeKey;

    	$attribute = 'class = "';

    	if(isset($this->navbar['menu']) && $this->navbar['menu'] !== null){
    		$this->linksWithCaptions = $this->navbar['menu'];
    	}

    	if(isset($this->navbar['extraClasses']) && $this->navbar['extraClasses'] !== null){
    		$attribute .= $this->navbar['extraClasses'];
    	}

    	$attribute .='"';

    	// $html = $this->createNavList();
    	$html = $this->createNavList2();
    	// $html = $this->createNavListRecursive();

    	$div = new DivTTag('collapse navbar-collapse',$html, 'id = "'.$this->navbar['toggleTarget'].'"');

    	$toggleButton = $this->createNavbarToggler();

		$brandTTagObj = new BrandTTag(); 

		$navBarHtml =  $brandTTagObj->get().$toggleButton->get().$div->get();

        parent::__construct('nav', $attribute,$navBarHtml);
    }

    protected function createNavbarToggler(){
    	  // <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    // <span class="navbar-toggler-icon"></span>
  // </button>
    	// global $this->navbar;

        $this->navbar = include tta_NavBrandSettings('navbar');

    	$span = new SpanTTag('navbar-toggler-icon');

        $buttonAttr = ' type="button" data-toggle="collapse" data-target="#'.$this->navbar['toggleTarget'].'" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"';

    	$button = new TeaCTag('button','navbar-toggler',$span->get(),$buttonAttr);

    	return $button;
    }

    /*private function createNavList(){

    	if($this->linksWithCaptions === null){
    		return null;
    	}

        $createdMenu = ' ';

        foreach($this->linksWithCaptions as $nav => $address){
//            If its a dropdown list
            if(is_array($address)){
//                Create the dropdownlist html.
                $dropDownList = $this->createDropDownList($address);
//                Create the clickable button for the list.
                $clickableButton = new AnchorTapvirTagContainer('#', $nav, 'class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"');
//                Add the button and dropdown list html into the list item.
                $li = new TapvirTagContainer('li', 'class="nav-item dropdown"', $clickableButton->getThisContainerHtml().$dropDownList, false);
//                Create a html code for the created menu.
                $createdMenu .= $li->getThisContainerHtml();
            }else{
//                If its not a dropdown list but is a menu item.
               list($nav,$class) = $this->isThisNavActive($nav);
//                Create the clickable button for the list.
                $clickableButton = new AnchorTapvirTagContainer($address, $nav, 'class="nav-link"');
//                Add the button and dropdown list html into the list item.
                $li = new TapvirTagContainer('li', $class, $clickableButton->getThisContainerHtml(), false);
//                Create a html code for the created menu.
                $createdMenu .= $li->getThisContainerHtml();
                
            }
//            Increment navlist counter.
            $this->navListCounter++;
        }
        
//        Create the nav menu container
//        $ul = new TapvirTagContainer('ul', 'class="navbar-nav mr-auto navLinks"', $createdMenu, false);
        $ul = new TapvirTagContainer('ul', 'class="navbar-nav mr-auto"', $createdMenu, false);
        return $ul->getThisContainerHtml();
        
    }*/

	private function createDropDownList($list){

        $createdList = ' ';
        
        foreach($list as $key => $value){
//            If its a divider.
            if($value === '-'){
                $div = new DivTTag('dropdown-divider', null, false);
                $createdList .= $div->getThisContainerHtml();
            }else{
//                Create the dropdown menu list item.
                $a = $this->getAnchorTTC($key,$value);
                $createdList .= $a->getThisContainerHtml();
            }
        }
//        Create the dropdown menu container.
        $divCon = new DivTTag('dropdown-menu',$createdList, 'aria-labelledby="navbarDropdown');
        return $divCon->getThisContainerHtml();
    }

	private function createDropDownList3($list){

        $createdList = ' ';
        global $ttag_ViewsPath;

        foreach($list as $key => $value){
        	if(is_array($value)){

        			$fileName = $ttag_ViewsPath.ttag_spaceToDash($key).'.php';
	                $a = $this->getAnchorTTC($key,$fileName);
	                $createdList .= $a->getThisContainerHtml();

        	}else{

	//            If its a divider.
	            if($value === '-'){
	                $div = new DivTTag('dropdown-divider', null, false);
	                $createdList .= $div->getThisContainerHtml();
	            }else{
	//                Create the dropdown menu list item.
	                $a = $this->getAnchorTTC($key,$value);
	                $createdList .= $a->getThisContainerHtml();
	            }
        	}
        }
//        Create the dropdown menu container.
        $divCon = new DivTTag('dropdown-menu' , $createdList ,'aria-labelledby="navbarDropdown"');
        return $divCon->getThisContainerHtml();
    }


	private function createDropDownList2($list,$nav, $i = 0){
		
        $createdList = ' ';
        foreach($list as $key => $value){
        	if(is_array($value)){
        		$result = $this->createDropDownList2($value,$key,++$i);

		        $ul = new TeaCTag('ul', null, $result);
		        $div = new DivTTag('dropdown-menu',$ul->get());
		        $createdList .= $div->get();

        	}else{
	//            If its a divider.
	            if($value === '-'){
	                $div = new DivTTag('dropdown-divider', null);
	                $createdList .= $div->get();
	            }else{
	//                Create the dropdown menu list item.
	                $a = $this->getAnchorTTC($key,$value);
	                $createdList .= $a->get();
	            }
        	}
        }
//        Create the dropdown menu container.
        $divCon = new DivTTag('dropdown-menu', $createdList,'aria-labelledby="navbarDropdown'.$i.'"');
        $dropDownList =  $divCon->get();

//                Create the clickable button for the list.
        $clickableButton = new AnchorTTag('#', $nav, 'nav-link dropdown-toggle','id="navbarDropdown'.$i.' role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"');

//                Add the button and dropdown list html into the list item.
        $li = new TeaCTag('li', 'nav-item dropdown', $clickableButton->get().$dropDownList);
//                Create a html code for the created menu.
        return $li->get();
    }


    //    Get the drop down item along with the custom class.
    private function getAnchorTTC($key,$value){
        
        if($this->dropdownItemExtraClass[$this->navListCounter] !== null){
            $a = new AnchorTTag($value, $key, 'dropdown-item'.$this->dropdownItemExtraClass[$this->navListCounter]);
        }else{
            $a = new AnchorTTag($value, $key, 'dropdown-item');
        }
        
        return $a;
    }


    /**
     * Sets the custom class for every navigation bar's item
     * @param array $dropdownItemExtraClass
     * @return \NavBarTTag
     */
    function setDropdownItemExtraClass($dropdownItemExtraClass) {
        $this->dropdownItemExtraClass = $dropdownItemExtraClass;
        return $this;
    }

//    Add @ add the end of the key / nav name to make it active.
    //  Deprecated
    private function isThisNavActive($nav){
        $navLabelWithoutAtSymbol = strstr($nav, '@', true);
        $class = 'class="nav-item';
        
        if($navLabelWithoutAtSymbol === false) {
            $navToWrite = $nav ;
            $class .= '"';
        }else{
            $navToWrite = $navLabelWithoutAtSymbol;
            $class .= ' active"';
        }
        return array($navToWrite,$class);
    }

// 
    private function isThisNavSetToActive($nav){
    	$class = 'nav-item';    	
    	// If the page matches the active key.
    	if($nav == $this->activeKey){
            $class .= ' active';
    	}
    	return $class;
    }

/*    
$ttag_NavigationLinks = [

	'Home'=>'http://localhost/Tag/teatags.php',
	'Download' => [
					'TTags' => '#',
					'Download Themes' => [
									'Dark' => '#',
									'Light' => '#',
								],
					],
	'Documentation'=>'#',
	// 'Download' => '#',

	'Video Tutorial'=>'#',
	'Blogs' => 'https://blazehattech.blogspot.com/',

];
*/



	private function createNavList2(){

    	if($this->linksWithCaptions === null){
    		return null;
    	}

        $createdMenu = ' ';

        // global $this->navbar;

        foreach($this->linksWithCaptions as $nav => $address){
//            If its a dropdown list
            if(is_array($address)){
//                Create the dropdownlist html.
                $dropDownList .=  $this->createDropDownList3($address,$nav);

		//                Create the clickable button for the list.
		        $clickableButton = new AnchorTTag('#', $nav, 'nav-link dropdown-toggle',' id="navbarDropdown'.$i.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"');
		//                Add the button and dropdown list html into the list item.
		        $li = new TeaCTag('li', 'nav-item dropdown', $clickableButton->get().$dropDownList);
		//                Create a html code for the created menu.
		         $createdMenu .=  $li->get();

            }else{
//                If its not a dropdown list but is a menu item.
               $class = $this->isThisNavSetToActive($nav);
//                Create the clickable button for the list.
                // $clickableButton = new AnchorTapvirTagContainer($address, $nav, 'class="nav-link"');
                $clickableButton = new AnchorTTag($address, $nav, 'nav-link');
//                Add the button and dropdown list html into the list item.
                $li = new TeaCTag('li', $class, $clickableButton->get(), false);
//                Create a html code for the created menu.
                $createdMenu .= $li->get();
                
            }
//            Increment navlist counter.
            $this->navListCounter++;
        }
        
//        Create the nav menu container
//        $ul = new TapvirTagContainer('ul', 'class="navbar-nav mr-auto navLinks"', $createdMenu, false);
       $alignClass = 'mr-auto';
       if(isset($this->navbar['align']) && $this->navbar['align'] === 'right'){
       		$alignClass = 'ml-auto';
       }  

        $ul = new TeaCTag('ul', 'navbar-nav '.$alignClass, $createdMenu);
        return $ul->get();
        
    }

}