<?php
	
	//Database Class
	
	class Database{
	
		var $dbuser;        // database user name
		var $dbpassword;    // database password
		var $dbname;        // databse name
		var $dbhost;        // database hostname
		var $dbconn;        // database connection handler
				
		/**
		 * Connects to the database server
		 * @param string $dbuser MySQL database user
		 * @param string $dbpassword MySQL database password
		 * @param string $dbname MySQL database name
		 * @param string $dbhost MySQL database host
		 */
		function __construct( $dbuser, $dbpassword, $dbname, $dbhost ) {
			$this->dbuser = $dbuser;
			$this->dbpassword = $dbpassword;
			$this->dbname = $dbname;
			$this->dbhost = $dbhost;
			$this->db_connect();
			$this->select_db();
		}
		
		/* Selects a database */
		function select_db() {
			
			mysql_select_db($this->dbname);  

			if(mysql_error()) {

				echo "It seems database ".$this->dbname." does not exist"; die;

			}
        }
		
		/*connect to database*/
		function db_connect() {
			
			$this->dbconn = mysql_connect( $this->dbhost, $this->dbuser, $this->dbpassword, true );
			
			if ( !$this->dbconn ) {
				echo 'Cannot connet to database.'; die; 
			}
			
		}
		
		/* close database connection */
		function close_conn() {
			mysql_close($this->dbconn);
			echo "Connection closed";
		}
	} 
?>