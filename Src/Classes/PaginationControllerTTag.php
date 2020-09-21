<?php
/**
 * Controls the pagination of informations, pictures etc.
 *
 * @author Tapvir
 */
class PaginationControllerTTag{

//    Class Variables.
// Protected class variables.

//    Holds the maximum count of information.
    protected $total;
//    Holds the current page number.
    protected $currentPage;
//    Holds the maximum allowed information per page.
    protected $varMaxPerPage;
//    Holds the pagination object.
    protected $pageObject;
//    Holds the page offset value
    protected $pageOffset;

    protected $prevLink;
    protected $nextLink;

    protected $useAnchor;
    
    protected $allowShownItemDetails = false;

//  Name of the id to be used in javascript.
    protected $idPaginationJS = null;
    
    protected $isTherePrevPage = false;
    protected $isThereNextPage = false;
    
//    Methods
//  

	
//        Creates the pagination object
	protected function createPaginationObject(){

            $pageObject = $this->pageObject = new PaginatorTTag($this->currentPage,$this->varMaxPerPage,$this->total);
            $this->pageOffset = $pageObject->offset();
	}
        
    public function setPageOffset($pageOffset) {
        $this->pageOffset = $pageOffset;
    }


    protected function display_page_count($pagination_total_pages, $ulclass){
        if($pagination_total_pages > 1){
//                echo "<p class = \"".$ulclass."_p\"> Page {$this->currentPage} / ".$pagination_total_pages."</p>";
                echo "<span class = \"infotext show_border\" title = \"Page {$this->currentPage} / {$pagination_total_pages}\">{$this->currentPage}</span>";
        }
    }

        protected function set_address_forLinks($htmlPageVar, $prevOrNext){

            $pagination = $this->pageObject;
            switch($prevOrNext){

                case 'P':
                    $this->prevLink = replace_in_address($htmlPageVar."=".$pagination->previous_page());
                    break;  

                case 'N':
                    $this->nextLink = replace_in_address($htmlPageVar."=".$pagination->next_page());
                    break;

            }
        }
        
        protected function getAnchorAttribute($linkType){
            $attribute = ' href = "'.$linkType;
                if($this->useAnchor !== NULL){
                    $attribute .= "#".$this->useAnchor;
                }
            $attribute .= '"';
            return $attribute;
        }
        
        protected function createLiContainer($textOrHtml, $liclass){
            $attribute = 'class  = "'.$liclass.'"';
            new TapvirTagContainer('li', $attribute, $textOrHtml);
        }

        protected function createActiveControlContainer($linkText, $linkOrientation,$liclass){
            $attribute = $this->getAnchorAttribute($linkOrientation);
                
//                Create anchor but donot display it.
            $anchorObj = new TapvirTagContainer('a',$attribute,$linkText,false);
                
//                Create and show list item and add the anchorObj code to it.
            $this->createLiContainer($anchorObj->getThisContainerHtml(), $liclass);
        }
        
        protected function createDeactiveControlContainer($linkText){
            $liclass = "hide_text_caption MediumBckgrndPic MediumDeactive".$linkText;
            $this->createLiContainer($linkText, $liclass);
        }

//        Sets previous page pagination code.
        protected function prev_page_pagination($html_page_var,$liclass){
            $text = 'Previous';
            if($this->isTherePrevPage){
                $this->set_address_forLinks($html_page_var,'P');
                $this->createActiveControlContainer($text,$this->prevLink,$liclass);
            }else{
                $this->createDeactiveControlContainer($text);
            }
        }

//        Sets next page pagination code
        protected function next_page_pagination($html_page_var,$liclass){
            $text = 'Next';
            if($this->isThereNextPage){
                    $this->set_address_forLinks($html_page_var,'N');
                    $this->createActiveControlContainer($text,$this->nextLink,$liclass);
                }else{
                    $this->createDeactiveControlContainer($text);
                }
        }
        
        
        public function setIdPaginationJS($idPaginationJS) {
            $this->idPaginationJS = $idPaginationJS;
        }

                
        public function showShownItemsDetails($bool){
            $this->allowShownItemDetails = $bool;
        }
        
        private function displayShownItems() {
            
            if(!$this->allowShownItemDetails){
                return false;
            }
            
            $pagination = $this->pageObject;            
            $totalPages = $pagination->total_pages();
            
//            Remainder is the last of the shown items.
            $countOfLastPageItems = $this->total % $this->varMaxPerPage;
            
            $currentlyItemsShown = $this->currentPage * $this->varMaxPerPage;
            
            
//            Get the count of items on last page.
            if($countOfLastPageItems > 0 && $this->currentPage == $totalPages){
//                Using simple divisional formula.
//                Quotient - (Divisor - Remainder).
                $currentlyItemsShown = $currentlyItemsShown - ($this->varMaxPerPage - $countOfLastPageItems);
            }
            
            
//            Do not show anything if total is 0 and maxper page is not zero.
            if($this->total == 0 && $currentlyItemsShown > 0){
                return false;
            }
            
            if(!static::$isMobile){
                echo "<div class = \"info_box_with_all_border tapvirContainers pagInfoContainer\" style = \"clear:both;\"><p class = \"pagInfo\">Showing <span class = \"info_light\"><span class = \"pagInfoCurrent\">{$currentlyItemsShown}</span> / <span class = \"pagInfoTotal\">{$this->total}</span></span></p></div>";
            }else{
                echo "<div class = \"pagInfoContainer\" style = \"clear:both;\"><p class = \"pagInfo\">Showing <span class = \"info_light\"><span class = \"pagInfoCurrent\">{$currentlyItemsShown}</span> / <span class = \"pagInfoTotal\">{$this->total}</span></span></p></div>";
            }
            return true;
        }

        protected function displayPageButtons($ulclass,$html_page_var){
            $pagination = $this->pageObject;
            
            $this->isTherePrevPage = $pagination->has_previous_page();
            $this->isThereNextPage = $pagination->has_next_page();
            
            if($this->isThereNextPage  || $this->isTherePrevPage){
//                if(!static::$isMobile){
                    $this->displayPageButtonsOnPC($ulclass, $html_page_var);
//                }else{
//                    $this->displayPageButtonsOnMobile($ulclass, $html_page_var);
//                }
            }
        }
        protected function displayPageButtonsOnMobile($ulclass,$html_page_var){
            $idJS = $this->setJSPagination();

            echo '<div '.$idJS.' data-role="controlgroup" data-type="horizontal">';
                    $this->prev_page_pagination($html_page_var, "hide_text_caption MediumBckgrndPic MediumPrevious");
                    $this->next_page_pagination($html_page_var, "hide_text_caption MediumBckgrndPic MediumNext");
            echo "</div>";
        }
        
        protected function displayPageButtonsOnPC($ulclass,$html_page_var){
            
            $idJS = $this->setJSPagination();

            echo "<div {$idJS}class = \"".$ulclass."_div tapvirContainers\" style =\"text-align:center;\">";
                echo "<ul class = \"".$ulclass."\">";   
                    $this->prev_page_pagination($html_page_var, "hide_text_caption MediumBckgrndPic MediumPrevious");
                    $this->next_page_pagination($html_page_var, "hide_text_caption MediumBckgrndPic MediumNext");
                echo "</ul>";
            echo "</div>";
        }
        
        protected function setJSPagination(){
            $idJS = '';
            if($this->idPaginationJS !== null){
                $idJS = "id = \"{$this->idPaginationJS}\" ";
            }
            return $idJS;
        }

        protected function paging_activation_code($ulclass = null,$liclass = null,$html_page_var, $extraLink = null){

//          Set the default ulClass only if user is using this from a pc.            
//            if(!static::$isMobile){
                $ulclass = ($ulclass === null)?"largesize_ul" : $ulclass ;
//            }
            
//              Display the page buttons.
            $this->displayPageButtons($ulclass,$html_page_var);
//            Display the number of shown items.
            $this->displayShownItems();
	}

// Public Methods

        public function setAnchors($anchor){
            $this->useAnchor = $anchor;
        }

//        Sets the total information
	public function set_total($total)
	{
		$this->total = $total;
                if(is_object($this->pageObject))
                {
                    $pagination = $this->pageObject;
                    $pagination->set_total_count($this->total);
                }
	}

        public function get_total()
        {
            return $this->total;
        }

//      Sets the current page
	public function currentPage($pg){
            $this->currentPage =  $pg;
	}
        
        public function getCurrentPage(){
            return $this->currentPage;
        }

//        Sets the maximum per page
        public function max_per_page($maxperpage){
            $this->varMaxPerPage = $maxperpage;
        }

//        Following functions are the main functions to be used
//        Initializes the pagination
        public function initialize_pagination($current_pg, $max_per_page, $total){
            
            $this->currentPage($current_pg);
            $this->max_per_page($max_per_page);
            $this->set_total($total);
            $this->createPaginationObject();
	}

//        After Initizating Use this function to activate and display the pagination
        public function activate_pagination($ulclass = null,$liclass = null,$html_page_var){
//            $this->paging_activation_code("ulblabs","liblabs","bp");
            $this->paging_activation_code($ulclass, $liclass,$html_page_var);
	}

        public function get_max_per_page()
        {
            return $this->varMaxPerPage;
        }

        public function offset()
        {
            return $this->pageOffset;
        }

//        public function manage_variable($name_of_var,
//                                    $current_values_frm_db = null)
//        {
//            $vrmgr = new FormVariableSelectionManager();
//
//            $vrmgr->manage_variable($name_of_var, $current_values_frm_db);
//        }

}

