<?php
/**
 * session common interface
 *
 * R8C - random 8 chars used to strength the session security
 *
 * 
*/
interface ISession
{
    public function start();
    public function destroy();
    public function setSessionId($_sessid);
    public function getSessionId();

    public function has($key);
    public function get($key);
    public function set($key, $val);

    public function getR8C();
    public function setR8C($r8c);
}

 //----------------------------------------------------

/**
 * Session factory - quick way to lanch all kinds of session implements with just a key
 *
 * 
*/

 //-------------------------------------------------------

class SessionFactory
{
    private static $_classes = NULL;
    
    /**
     * Load and create the instance of a specifield session class
     *      with a specifield key, then return the instance
     *  And it will make sure the same class will only load once
     *
     * @param   $_class class key
     * @param   $_args  arguments to initialize the instance
    */
    public static function create( $_class, $_conf = NULL )
    {
        if ( self::$_classes == NULL ) self::$_classes = array();
        
        //Fetch the class
        $_class = ucfirst( $_class ) . 'Session';
        if ( ! isset( self::$_classes[$_class] ) ) {
            require  dirname(__FILE__) ."/{$_class}.class.php";
            self::$_classes[$_class] = true;
        }
        
        //return the newly created instance
        return new $_class($_conf);
    }
}
?>
