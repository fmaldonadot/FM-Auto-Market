<? ob_start() ?>
<?php include "../../Classes/clsDBConnection.php" ?>
<?php include_once "connect.php" ?>
<?php include "../../Classes/clsCFavorites.php" ?>
<?php 
	if(!isset($_SESSION))
	{
		session_start();
	}
	if ($_GET["favExist"] > 0)
	{
		// Delete favorite
		clsCFavorite::Delete( $_SESSION["Member_ID"], $_GET["carID"] , $_SESSION['DBConnection']);
	}
	else
	{
		// Add Favorite
		addFavorite( $_SESSION["Member_ID"], $_GET["carID"]);
	}

	
	function addFavorite( $memberID, $carID )
	{
		$favorite = new clsCFavorite( $memberID, $carID, $_SESSION['DBConnection']);
		
		$favorite->Add();
		
	}

	header('Location:' . getenv('HTTP_REFERER'). "?show=true");
	//header("Location:../index.php?show=true");
		
	//echo $_SESSION["Member_ID"]. "<br>";
//	echo $_GET["carID"]. "<br>";
?>


