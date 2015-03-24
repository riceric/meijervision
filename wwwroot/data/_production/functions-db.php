<?php 
/**
 *  Database parameters
 */

class Database extends PDO
{
    private static $Database = null;

    public static function singleton()
    {
        if (is_null(self::$Database) === true)
        {
            self::$Database = new PDO("mysql:dbname=meijer_vcmeijer;host=localhost", "meijer_admin", "Asian0range!"); //Production
        }

        return self::$Database;
    }
}

class DBStatement extends PDOStatement {
    public $dbh;
    protected function __construct($dbh) {
        $this->dbh = $dbh;
    }
}
/**
 * Register user for session login
 */
function dbUserExists($unm)
{
	$result = false;
	$sql = "SELECT username FROM _account WHERE username = '$unm'";
	try {
		$stmt = Database :: prepare ( $sql );
		$stmt->execute();
		$count = $stmt -> rowCount();
		if ($count > 0) {
			$result = true; //Username already taken
		}
		$stmt->closeCursor ( ) ;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return $result;
}

