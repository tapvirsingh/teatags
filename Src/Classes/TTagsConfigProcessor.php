<?php

/**
 	Make no changes.

 	@author : Tapvir Singh
*/

namespace Src\Classes;	

class TTagsConfigProcessor{


	private function getBootstrapCDN($fileType){

			global $ttag_BootstrapConf;

			if($fileType == 'js'){
				// <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
				return '<script src="https://stackpath.bootstrapcdn.com/bootstrap/'.$ttag_BootstrapConf['ver'].'/'.$fileType.'/bootstrap.'.$ttag_BootstrapConf[$fileType].'.js" integrity="'.$ttag_BootstrapConf['jsIntegrity'].'" crossorigin="'.$ttag_BootstrapConf['crossorigin'].'"></script>';

			}elseif($fileType == 'css'){
				// <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
				return '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/'.$ttag_BootstrapConf['ver'].'/'.$fileType.'/bootstrap.'.$ttag_BootstrapConf[$fileType].'.css" integrity="'.$ttag_BootstrapConf['cssIntegrity'].'" crossorigin="'.$ttag_BootstrapConf['crossorigin'].'">';
			}
			return null;
	}

	private function getJQueryCDN($fileType){

		global $ttag_JQueryConf;

			if($fileType == 'js'){
				return '<script src="https://code.jquery.com/jquery-'.$ttag_JQueryConf['ver'].'.'.$ttag_JQueryConf['js'].'.js" integrity="'.$ttag_JQueryConf['integrity'].'" crossorigin="'.$ttag_JQueryConf['crossorigin'].'"></script>';
			}
			return null;
	}

	private function getPopperCDN($fileType){

			global $ttag_PopperConf;

			if($fileType == 'js'){
				return '<script src="https://cdn.jsdelivr.net/npm/popper.js@'.$ttag_PopperConf['ver'].'/dist/umd/popper.'.$ttag_PopperConf['js'].'.js" integrity="'.$ttag_PopperConf['integrity'].'" crossorigin="'.$ttag_PopperConf['crossorigin'].'"></script>';
			}
			return null;
	}


	function getCDN($name,$fileType = 'js'){
		switch($name){
			case 'bootstrap' : 
				return $this->getBootstrapCDN($fileType);

			case 'jquery' : 
				return  $this->getJQueryCDN($fileType);

			case 'popper' : 
				return  $this->getPopperCDN($fileType);

		}
	}

}