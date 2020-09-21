<?php


<?php

// This is a helper class to make paginating 
// records easy.
class PaginatorTTag {
	
  public $currentPage;
  public $perPage;
  public $totalCount;
  
  public $minPageVal = 1;
  
  
  //This function sets the minimum or least count.
  public function setMinPage($val=1){
    $this->minPageVal = $val;
  }
  
  
  /* 
	Param:
		$page : Current page number
		$per_page : max per page
		$total_count : total count.
  */
  public function __construct($page=1, $perPage=20, $totalCount=0){
  
  	$this->currentPage = (int)$page;
    $this->perPage = (int)$perPage;
    $this->totalCount = (int)$totalCount;


  }

  public function offset() {
    // Assuming 20 items per page:
    // page 1 has an offset of 0    (1-1) * 20
    // page 2 has an offset of 20   (2-1) * 20
    //   in other words, page 2 starts with item 21
    return ($this->currentPage - 1) * $this->perPage;
  }

//  sets the total count of information.
  public function setTotalCount($totalCount)
  {
      $this->totalCount = $totalCount;
//    Correct the page if it is incorrect.
//    $this->rectify_current_page_validity();
  }

  public function totalPages()
  {
    return ceil($this->totalCount/$this->perPage);
   }
		
  public function previousPage() {
	return $this->currentPage - 1;
  }
  
  public function nextPage() {
	return $this->currentPage + 1;
  }

  public function rectifyCurrentPageValidity()
  {
      if($this->currentPage < $this->minPageVal)
//       Returns $this->minPageVal as smaller than min.
        $this->currentPage = $this->minPageVal;
      
      elseif($this->currentPage > $this->total_pages())
//       Returns total_pages as greater than max.
        $this->currentPage = $this->total_pages();
  }

	public function has_previous_page() {
		return $this->previous_page() >= $this->minPageVal ? true : false;
	}

	public function has_next_page() {
		return $this->next_page() <= $this->total_pages() ? true : false;
	}

}
