<?php


namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

// use Src\TTags\{TeaCTag,DivTTag};

class DivsTTags extends TapvirTagContainer {

	protected $array;
	protected $parameters;
	protected $offset ;
	protected $col ;
	protected $colCount ;
	protected $row ;
	protected $rowCount ;

	protected $ids;

	/*
$parameters : 
	[
			'in-container' => true, // Create a container div  
			// Default is true. Please note null is also considered as true.
			
			'position' => 'r', // r | c stands for row or column works only for single dimensional array. Default value is r
			
			'header-row' => 0, // any # starting from 0 or null.
			'header-col' => 0, // any # starting from 0 or null.
			'show-as' => 'divs', // divs | tables,

			// Bootstrap col.
			
			For array type data => null | some custom single array value defining the col-$var  . For example, [2,2,5,3] would set the four coloums with values col-2, col-2, col-5 and col-3
			
			In case, the data is not an array, which may be for instance an article, a single value can be passed.

			e.g. 'col' => 10
			
			// 'col' =>[2,2,5,3],  // Default value is null.
			// 'col' =>[2,2,5,2,1],  // Default value is null.
			'col' =>4,  // Default value is null.


			// Bootstrap offset.
			
				// Same as that of col.
			
			'offset' => 1, // Default value is null.

			// For 2 cols you may set preferred classes.
			'col-classes' => ['bg-dark','bg-white'],

			'extra-row-class' => add additional row classes.
			
		]*/

	function __construct($data, $parameters){

		// Check whether the $array is object, if so, then get the html, 
		// else work on array.
		$this->array = is_object($data) ? $data->get() : $data;

		// Set the parameters
		$this->parameters = $parameters;
		$this->rowCount = $this->colCount = 0;
		if(isset($parameters['col']) && ($parameters['col'] !== null)){
			$this->col  = $parameters['col'];
		}	
		if(isset($parameters['offset']) && ($parameters['offset'] !== null)){
			$this->offset  = $parameters['offset'];
		}

		$this->ids = $this->getParameter('ids');

		$this->initiateCreation();
	}

	private function initiateCreation(){
		if(isset($this->parameters['show-as']) && ($this->parameters['show-as'] !== null)){
			switch($this->parameters['show-as']){
				case 'tables':
					$this->createTables();
					break;
				default:
					$this->createDivs();
			}
		}else{
			$this->createDivs();
		}
	}

	private function createTables(){

	}

	private function setColSize(){
		if(isset($this->parameters['col']) && 
			($this->parameters['col'] !== null)){

				$this->col = $this->parameters['col'];

		}else{
				$this->col = $this->parameters['col'];
		}
	}

	private function getColSpan(){
		return is_array($this->col[$this->rowCount]) ? $this->col[$this->rowCount][$this->colCount] :  $this->col[$this->colCount];
	}

	private function setCols($colSpan){
		return 'col-sm-12 col-md-'.$colSpan;
	}

	private function manageArrayRow($row){
		$this->colCount = 0;
		foreach ($row as $col => $value) {

			$colSpan = $this->getColSpan();

			// debugTTag($this->col[$this->rowCount][$this->colCount] );
			if($this->offset !== null ){
				$colSpan .= ' offset-'.$this->offset;
			}

			$class = $this->setCols($colSpan);

			$colClasses = $this->getParameter('col-classes');

			if($colClasses !== null){
				$class .= ' '.$colClasses[$this->colCount]; 
			}

			$divC = new DivTTag($class,$value,$this->setId());
			$divCols[] = $divC->get();
			$this->colCount++;
		}
		$divR = $this->createRow(ttag_getCombinedHtml($divCols)) ;
		$divRows[] = $divR->get();
		
		return $divRows;
	}

	private function manageRow($row,$col = null,$offset = null){

		$col = $col === null ? $this->col : $col;
		$offset = $offset === null ? $this->offset : $offset;

		$colV = $this->setCols($colSpan);

		if($offset !== null ){
			$colV .= ' offset-md-'.$offset;
		}

		$divC = new DivTTag($colV, $row,$this->setId()) ;
		$divR = $this->createRow($divC->get());
		$divRows[] = $divR->get();
		return $divRows;
	}

	private function createCol($data){

	}

	private function createRow($data){
		$rowClass = 'row';
		if(isset($this->parameters['extra-row-class'])){
			$rowClass .= ' '.$this->parameters['extra-row-class'];
		}

		return new DivTTag($rowClass ,$data) ;
		
	}


	private function createDivs(){

		$array = $this->array;

		if(!is_array($array)){
			$divRows = $this->manageRow($array);
			$this->setContainerCode(ttag_getCombinedHtml($divRows));	
		}else{
			// if the array is to be positioned in columns
			if($this->parameters['position'] == 'c') { 
					// Columns
					$divRows = $this->manageArrayRow($this->array);
					$this->setContainerCode(ttag_getCombinedHtml($divRows));
			}else{

				foreach($this->array as $row){

					$divCols = null;

					if(is_array($row)){
						$divRows = $this->manageArrayRow($row);
					}else{
						$divRows = $this->manageRow($row, $this->col[$this->rowCount]);
					}

					$this->setContainerCode(ttag_getCombinedHtml($divRows));		
					$this->rowCount++;
				}
			}
		}
	}

	public function get(){
		if(isset($this->parameters['in-container']) && 
			$this->parameters['in-container'] !== null && 
			$this->parameters['in-container'] !== true){
			return parent::get();
		}else{
			$containerClass = 'container';
			if(isset($this->parameters['extra-container-class'])){
				$containerClass .= ' '.$this->parameters['extra-container-class'];
			}

			$divContainer = new DivTTag($containerClass,parent::get());
			return $divContainer->get();
		}
	}

	protected function setId(){
		return ' id = "'.$this->ids[$this->colCount].'" ';
	}


};