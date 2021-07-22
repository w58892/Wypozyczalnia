<?php


/**
 * The Singleton class defines the `GetInstance` method that serves as an
 * alternative to constructor and lets clients access the same instance of this
 * class over and over.
 */
class SingletonDB
{

    private static $instances = [];
    private $db;

    protected function __construct() {
      $this->db = new PDO('mysql:host=localhost;port=3306;dbname=wypozyczalnia', 'root', '');   
     }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }


    public static function getInstance(): SingletonDB
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function query($sql) {
      return $this->db->prepare($sql);
  }
}

?>