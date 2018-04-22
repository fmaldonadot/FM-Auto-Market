<?php
	class clsMembers
	{
		private $MemberID;
		private $FirstName; 	
		private $LastName; 	
		private $Username; 	
		private $Password; 	
		private $email;
		private $myDBconn;
		
		public function __construct($FirstName, $LastName, $Username, $Password, $email, $myDBconn, $MemberID = null)
		{
			$this->MemberID = $MemberID;
			$this->FirstName = $FirstName; 	
			$this->LastName = $LastName; 	
			$this->Username = $Username; 	
			$this->Password = $Password; 	
			$this->email = $email;
			$this->myDBconn = $myDBconn;
		}	
		
		public function AddMember()
		{
			$query = "INSERT INTO members( FirstName, LastName, Username, Password, email ) ";
			$query .= "VALUES(:1, :2, :3, :4, :5 )"; 
			
			$stmt = $this->myDBconn->GetmyConn()->prepare($query);
			$stmt->bindParam(':1',$this->FirstName);
			$stmt->bindParam(':2',$this->LastName);
			$stmt->bindParam(':3',$this->Username);
			$stmt->bindParam(':4',$this->Password);
			$stmt->bindParam(':5',$this->email );
			
			$added = $this->myDBconn->executeBind($stmt);
			
			return $added;
		}	
		
		public static function GetMemberInfo($query , $myDBConn)
		{
			$result = $myDBConn->SQLSelect($query);
			
			return $result;
		}	
		
		public static function MemberExist( $key, $parameter , $myDBConn )
		{
			$query = "SELECT MemberID FROM members WHERE ";   
			
			switch ($key)
			{
				case "uname":
					$query .= "Username = '" .$parameter. "'";
					break;
				case "email":
					$query .= "email = '" .$parameter. "'";
					break;			
			}
			
			$exist = $myDBConn->SQLSelect($query);
			
			return sizeof($exist);
		}	
		
		// For Testing purposes
		public function display()
		{
			$string = $this->FirstName. "<br>";
			$string .= $this->LastName. "<br>";
			$string .= $this->email. "<br>";
			$string .= $this->Username. "<br>";
			$string .= $this->Password. "<br>";
			
			return $string;
		}		

	}
	
?>
