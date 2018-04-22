<?php
	$HOST =  'localhost';
	$USER = 'root';
	$PASSWORD = '';

	class clsDBConnection
	{
		protected $myConn;
		
		public function __construct( $DBName )
		{
			$this->myConn = $this->OpenConn($DBName);
		}
		
		public function __destruct()
		{
			$this->myConn = $this->CloseConn();
		} 
		
		public function GetmyConn()
		{
			return $this->myConn;
		}
		
		public function SQLSelect($query)
		{
			try
			{
				$record = $this->myConn->prepare($query);	
				$record ->execute();
				//$rows = $record ->fetch(PDO::FETCH_OBJ);
			
				$result = $record->setFetchMode(PDO::FETCH_ASSOC);
				$rows = $record->fetchAll(); 
				
				return $rows;
			
			}
			catch(PDOException $e)
			{
				echo "Query Failed ".$e->getMessage();
			}
		}
		public function executeQuery($query)
		{
			try
			{			
				$this->myConn->exec($query);
				return true;			
			}
			catch(PDOException $e)
			{
				echo "Query Failed ".$e->getMessage(). "<br>" .$query;
				return false;
			}
		}
		public function executeBind($bind)
		{
			try
			{			
				$bind->execute();
				return true;			
			}
			catch(PDOException $e)
			{
				echo "Query Failed ".$e->getMessage(). "<br>" .$query;
				return false;
			}
		}
				
		public function OpenConn($DBName)
		{
			global $HOST, $USER, $PASSWORD;
			$connection;
			try
			{
				$connection = new PDO("mysql:host=$HOST; dbname=$DBName", $USER, $PASSWORD);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $connection;
		
			}
			catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}
		}
		public function CloseConn()
		{
			$this->myConn= null;
		}
	}
?>