<?php include "../Classes/clsDBConnection.php" ?>
<?php include_once "./connect.php" ?>
<?php include "../Classes/clsCars.php" ?>
<?php
if (isset($_GET['makeid']))
    {
		$model  = $_GET['makeid'];
			
		// Looking for cars Models
		$query = "SELECT DISTINCT Model FROM cars WHERE Make ='" .$model. "'";

		$rows = $_SESSION['DBConnection']->SQLSelect($query);
  		echo("<option value = ''>Choice a Model</option>");			
		foreach($rows as $v)
		{ 
			echo "<option value = '" .$v['Model']. "'>" .$v['Model']. "</option>"; 
		}
			
		
	}	
?>      	
