<?php 
/**
 *  Database parameters
 */
###### db-config.ini ######
#db_driver=mysql
#db_user=root
#db_password=

#[dsn]
#host=localhost
#port=3306
#dbname=romco

#[db_options]
#PDO::MYSQL_ATTR_INIT_COMMAND=set names utf8

#[db_attributes]
#ATTR_ERRMODE=ERRMODE_EXCEPTION
############

class Database extends PDO
{
    function __construct()
    {
	/**
        $ini = "db-ro.ini" ;
        $parse = parse_ini_file ( $ini , true ) ;
		print_r($parse);

        $driver = $parse [ "db_driver" ] ;
        $dsn = "${driver}:" ;
        $user = $parse [ "db_user" ] ;
        $password = $parse [ "db_password" ] ;
        $options = $parse [ "db_options" ] ;
        $attributes = $parse [ "db_attributes" ] ;

        foreach ( $parse [ "dsn" ] as $k => $v ) {
            $dsn .= "${k}=${v};" ;
        }
	**/
		//parent::__construct("mysql:dbname=vcmeijer;host=localhost", "romco_admin", "Password2!"); //Production
		parent::__construct("mysql:dbname=vcmeijer;host=localhost", "root", ""); //Development
        $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('DBStatement', array($this)));
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

