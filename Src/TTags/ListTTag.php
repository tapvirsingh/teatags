<?php
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class ListTTag extends TapvirTagContainer{

	protected $list;
	protected $itemIndex;

	protected $listType;

	/*
	$parameters = [
					'list-type' : ul (default) | ol ,
					'active' : index number of the item to make it active. default: null
					'disabled' : [] array of disabled item indexes. default null
					]
	*/
	 function __construct($list, $parameters = null) {

	 		$this->list = $list;
	 		$this->parameters = $parameters;
	 		$this->itemIndex = 0;

	 		$this->setListType();
	 		$this->createList();

	 		$class = 'class = "list-group';
	 		$class .= '"';

	 		$attribute = $class;

	        parent::__construct( $this->listType, $attribute, $this->list );
    }

    private function createItem($listItem){

		$class = $this->getItemClasses();

		$attribute = $class;

		$li = new TapvirTagContainer('li', $attribute , $listItem);
		return $li->get();
		// $a = new AnchorTapvirTagContainer($href,$caption, $class);
		// return $a->get();
	}

	private function getItemClasses(){
		$class = 'class = "list-group-item ttag-group-item';

		$parameters = ['active','disabled'] ;

		foreach ($parameters as $value) {

			$result = $this->getParameter($value);
			$isResultAnArray = is_array($result);

			if(
				// The parameter is set
				$result !== null && 
				(
					// Is not an array and is equal to result OR
					(!$isResultAnArray && $this->itemIndex === $result) ||
					// Is an array and the current index is in the list of array.
					($isResultAnArray && in_array($this->itemIndex,$result))
				)
			) {
				$class .= ' '.$value;
			}

		}

		$class .= '"';
		return $class;
	}

	private function createItems(){
		$list = null;
		foreach ($this->list as $listItem) {

			$list[] = $this->createItem($listItem);

			$this->itemIndex++;
		}
		return $list;
	}

	private function createList(){
		$list = $this->createItems();

		$this->list = ttag_getCombinedHtml($list);
	}


    // Set the list type. ul | ol
    private function setListType(){
    	$this->listType = $this->getParameter('list-type');
    	if($this->listType === null){
    		$this->listType = 'ul';
    	}
    }
}