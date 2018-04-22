
<?php
	class clsCFavorite extends clsDBConnection
	{
		
			private $RefFavorite; 	
			private $MemberID; 	
			private $StockNumber; 		
			private $myDBConn;
		
			public function __construct( $MemberID, $StockNumber, $myDBConn, $RefFavorite = null )
			{
				$this->RefFavorite = $RefFavorite; 	
				$this->MemberID = $MemberID; 	
				$this->StockNumber = $StockNumber; 		
				$this->myDBConn = $myDBConn;
			}	
		
			public function Add()
			{
				$query = "INSERT INTO favoritescars( MemberID, StockNumber ) ";
				$query .= "VALUES(:1, :2 )"; 
			
				$stmt = $this->myDBConn->GetmyConn()->prepare($query);
				$stmt->bindParam(':1',$this->MemberID);
				$stmt->bindParam(':2',$this->StockNumber);				
			
				$added = $this->myDBConn->executeBind($stmt);
			
				return $added;
			}
		
			public static function Delete( $memberID, $carID , $myDBConn)
			{
				$query = "DELETE FROM favoritescars WHERE  MemberID = '" .$memberID. "' AND StockNumber = '" .$carID. "'";
				
				$added = $myDBConn->executeQuery($query);
			
				return $added;
			}
		
			public static function GetFavorites($memberID, $myDBConn)
			{
				$query = "SELECT * FROM favoritescars WHERE MemberID = '$memberID' ";
			
				$myFavorites = $myDBConn->SQLSelect($query);
			
				return $myFavorites ;
			}			
		
			public static function isFavorite( $memberID, $carID , $myDBConn)
			{
				$query = "SELECT * FROM favoritescars WHERE MemberID = '" .$memberID. "' AND StockNumber = '" .$carID. "'";
				
				$isFav = $myDBConn->SQLSelect($query);
			
				return sizeof($isFav);
			}
	}
	
?>
