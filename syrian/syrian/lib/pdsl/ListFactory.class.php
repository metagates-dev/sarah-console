<?php
/**
 * list common interface
 *
 * 
*/

interface IList
{    
    public function setKey($key);
    public function setTtl($ttl);
    public function get($index, $callback=null);
    public function set($index, $value);
    public function lpush($value);
    public function lpop($callback);
    public function rpush($value);
    public function rpop($callback);
    public function size();
    public function remove();
    public function close();
}

 //----------------------------------------------------

/**
 * Dynamic content list factory
 *      Quick way to lanch all kinds of list with just a key
 *
 * 
*/

 //-----------------------------------------------------

class ListFactory
{
    /**
     * all the loaded classed
     *
     * @access  private
    */
    private static $_classes = array();
    
    /**
     * Load and create the instance of a specifield List class
     *      with a specifield key, then return the instance
     *  And it will make sure the same class will only load once
     *
     * @param   $_class class key
     * @param   $_args  arguments to initialize the instance
    */
    public static function create($_class, $_conf=null)
    {
        //Fetch the class
        $_class = ucfirst( $_class ) . 'List';
        if ( ! isset( self::$_classes[$_class] ) ) {
            require  dirname(__FILE__) ."/{$_class}.class.php";
            self::$_classes[$_class] = true;
        }
        
        //return the newly created instance
        return new $_class($_conf);
    }
}
