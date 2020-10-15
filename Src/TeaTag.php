<?php
/**
 * Description of TeaTag
 *
 * @author Tapvir Singh
 */

namespace Src;

use Src\TTags\{DivsTTags};

class TeaTag{
 
    protected $tagNameArray = null;
    protected $tagName;
    protected $attributeArray = null;
    protected $attribute;
    protected $echoOnTheGo;
    
    protected $tagCode = null;
// --------------------------
    protected $textOrHtml;
    protected $arrayOfTextOrHtml;
    
    protected $appendedTextOrHtml = null;
    
    protected $tagObject;
    
    protected $containerCode = null;

    protected $headContainerCode = null;

    protected  $html;

    protected $parameters=null;

    static protected $authorised = false;

    static protected $user = null;

    protected function appendHtml($returned){
        if($this->html === null){
            $this->html = $returned;
        }else{
            $this->html .= $returned;
        }
    }

    // Gets the parameter values, returns null if the value does not exist.
    protected function getParameter($var){
        if(isset($this->parameters[$var]) && $this->parameters[$var] !== null){
            return $this->parameters[$var];
        }
        return null;
    }

    // Get divs parameters
    function divs($parameters){
        return new DivsTTags($this,$parameters );
    }

    

        // Set / get authorisation.
        // Use this function to set / get the current 
        // status of login.
    static function authorised($val = null){
        // get the value.
        if($val === null)
            return self::$authorised;

        //else set the value.
        self::$authorised = $val;
    }  

    // // Set / get user.
    // // Use this function to set / get the current 
    // // details of the user.
    // static function user($mixed = null){

    //     self::$user = null;

    //     // return the complete array.
    //     if($mixed === null){
    //         return self::$user;
    //     }

    //     //if not an arry return the value.
    //     if(! is_array($mixed)){

    //         try{
    //             if( isset(self::$user[$mixed])) 
    //                 return self::$user[$mixed] ;
    //             else
    //                 throw new \Exception("The $mixed key does not exist in user.<br><b>File : </b>".__FILE__.',<br><b>Line # </b>'.__LINE__.'<hr>');

    //         }catch(\Exception $e){
    //             die('<b>Tea Tags caught exception : </b>'.$e->getMessage());
    //         };
    //     }

    //     // else if it is an array then
    //     // set the value.
    //     self::$user = $mixed;


    // }


}

