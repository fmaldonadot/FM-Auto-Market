<?php include "../../Classes/clsDBConnection.php" ?>
<?php include_once "./connect.php" ?>
<?php include "../../Classes/clsCars.php" ?>
<?php
if (isset($_GET['makeid']))
    {
		$model  = $_GET['makeid'];
			
		// Setting for Max Prices
		if ($model == "")
		{
			echo "<option value = ''>Max Year</option>";
		}
		else
		{
			for ($i = $model + 1; $i <= 2018; $i++)
      		{
      			echo "<option value = '" .$i. "'>" .$i. "</option>";

      		}
      				
		}
			
		
	}	
?>      	
