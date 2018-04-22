<?php
	class clsCReviews extends clsDBConnection
	{
		private $ReviewID; 	
		private $MemberID; 	
		private $StockNumber; 	
		private $Stars; 	
		private $Review; 
		private $myDBConn;	
		
		public function __construct( $MemberID, $StockNumber, $Stars, $Review, $myDBConn, $ReviewID = null )
		{
			$this->ReviewID = $ReviewID; 	
			$this->MemberID = $MemberID; 	
			$this->StockNumber = $StockNumber; 	
			$this->Stars = $Stars; 	
			$this->Review = $Review; 
			$this->myDBConn = $myDBConn;
		}	
		
		public function Add()
		{
			$query = "INSERT INTO carreviews( MemberID, StockNumber, Stars, Review ) ";
			$query .= "VALUES(:1, :2, :3, :4 )"; 
			
			$stmt = $this->myDBConn->GetmyConn()->prepare($query);
			$stmt->bindParam(':1',$this->MemberID);
			$stmt->bindParam(':2',$this->StockNumber);
			$stmt->bindParam(':3',$this->Stars);
			$stmt->bindParam(':4',$this->Review);
			
			$added = $this->myDBConn->executeBind($stmt);
			
			return $added;
		}	
		
		public static function GetReviews($carID, $myDBConn)
		{
			$query = "SELECT * FROM carreviews WHERE StockNumber = '$carID' ";
			
			$reviews = $myDBConn->SQLSelect($query);
			
			return $reviews;
		}	
				
	}
	
?>
