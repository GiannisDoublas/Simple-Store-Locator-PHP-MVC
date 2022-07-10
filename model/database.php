<?php 
	require './config/config.inc.php' ;

	class Database
	{	

		private $host = DB_HOST;
		private $username = DB_USER;
		private $password = DB_PASSWORD;
		private $dbname = DB_NAME;
		protected $db = null;

		private $dbh;
	    private $stmt;
	    private $error;

		public function __construct(){
	        //Set DSN
	        $dsn = "mysql:host=$this->host;dbname=$this->dbname";
	        $options = array(
	            PDO::ATTR_PERSISTENT => true,
	            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	        );

	        //Create PDO instance
	        try{
	            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
	        }catch(PDOException $e){
	            $this->error = $e->getMessage();
	            echo $this->error;
	        }
	    }

		
		//Prepare statement with query
	    public function query($sql){
	        $this->stmt = $this->dbh->prepare($sql);
	    }

	    //Bind values, to prepared statement using named parameters
	    public function bind($param, $value, $type = null){
	        if(is_null($type)){
	            switch(true){
	                case is_int($value):
	                    $type = PDO::PARAM_INT;
	                    break;
	                case is_bool($value):
	                    $type = PDO::PARAM_BOOL;
	                    break;
	                case is_null($value):
	                    $type = PDO::PARAM_NULL;
	                    break;
	                default:
	                    $type = PDO::PARAM_STR;
	            }
	        }
	        $this->stmt->bindValue($param, $value, $type);
	    }

	    //Execute the prepared statement
	    public function execute(){
	        return $this->stmt->execute();
	    }

	    //Return multiple records
	    public function executeO(){
	        $this->execute();
	        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	    }

	    //Return multiple records
	    public function executeS(){
	        $this->execute();
	        return $this->stmt->fetchAll();
	    }

	    //Return a single record
	    public function getRow(){
	        $this->execute();
	        return $this->stmt->fetch(PDO::FETCH_OBJ);
	    }

	    //Get row count
	    public function rowCount(){
	        return $this->stmt->rowCount();
	    }
	}

?>