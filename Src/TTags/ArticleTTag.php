<?php

/**
 * Description of Article_TTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;
// use Src\ContainerTags\TapvirTagContainers\AnchorTapvirTagContainer;
use Dependences\parsedown_master\Parsedown;

class ArticleTTag extends TapvirTagContainer{

	protected $filename;
	protected $filesCount;
    protected $parameters;
    protected $articleName;

    // protected $loadDirectlyFromMD;
    

    /*
        $file : name of the file to load without extention.
                    When parameters are set, file name passed in here is taken as the default file.  

        $parameters = null (default)
                    Other values

                    'dir' : directory which holds the files,

                    'variable' : variable name,

                    'type' : Works only when variable is used. 
                            values : get (default) | post 

                    'filter' : This variable takes values for php function filter_input
                                Read more about this here:

                                https://www.php.net/manual/en/function.filter-input.php
                                https://www.php.net/manual/en/filter.filters.php

                                some examples of values are
                                FILTER_SANITIZE_STRING , FILTER_SANITIZE_NUMBER_INT

                                default: null, this will set FILTER_DEFAULT. 
    */
    function __construct($file = null, $parameters = null) {


        $this->parameters = $parameters;
		$this->setTheFilename($file);
        $this->queryString($file);
    }

    /*
    	Todo.
    */
    private function getArrayOfArticles($mixed){
    	$this->filesCount = count($mixed);

    }

    private function setTheFilename($filename){
		if($filename !== null){
			$this->filename = strtolower($filename);
    	}else{
    		$this->filename = null;
    	}
    }

    private function getFilterInputType(){
         $variable = isset($this->parameters['type']) ? $this->parameters['type'] : null;
         switch ($variable) {
             case 'post':
                return INPUT_POST;

             default:
                return INPUT_GET;
         }
    }

    private function getDir($file){
        $dir = isset($this->parameters['dir']) ? ttag_MdDir($this->parameters['dir']) : ttag_MdDir();
        global $ttag_MDFileExtention;
        return  $dir.$file.$ttag_MDFileExtention;
    }

    private function getFilter(){
          $filter = isset($this->parameters['filter']) ? $this->parameters['filter'] : FILTER_DEFAULT ;
          return $filter;
    }

    private function queryString($file){
        $variable = isset($this->parameters['variable']) ? $this->parameters['variable'] : null;
        if($variable === null){
            return null;
        }

        $type = $this->getFilterInputType();
        $filter = $this->getFilter();
        
        $return = filter_input ($type , $variable ,$filter);

        if($return === false || $return === null){
            $this->setArticle($file);
            // the filter fails or the $variable is not set.
            $this->setTheFilename($file);
        }else{
            $this->setArticle($return);
            // the requested variable on success
            $this->setTheFilename($return);
        }
    }

    protected function setArticle($name){
        $this->articleName = $name;
    }


    /*

    */

    function get($article = null){
    	$prasedown = new Parsedown();

		if($article === null){
            if($this->filename === null){
                return null;
            }
			// global $ttag_MDFilePath, $ttag_MDFileExtention;

            if($this->parameters === null )
                $text = file_get_contents(ttag_MdFile($this->filename));
            else
                $text = file_get_contents($this->getDir($this->filename));


            $articleTag = new TapvirTagContainer('article',null,$prasedown->text($text));
			$this->setContainerCode($articleTag->get());		
		}else{

            $articleTag = new TapvirTagContainer('article',null,$prasedown->text($article));
			$this->setContainerCode($articleTag->get());		
		}

		return $this->getThisContainerHtml();
    }

    function getCurrentArticleName(){
        return $this->articleName;
    }


}