<?php include "../Classes/clsDBConnection.php" ?>
<?php include_once "./connect.php" ?>
<?php include "../Classes/clsCars.php" ?>
<?php
if (isset($_GET['makeid']))
    {
		$model  = $_GET['makeid'];
			
		// Setting for Max Prices
		if ($model == "")
		{
			echo "<option value = ''>Max Price</option>";
		}
		else
		{
			for ($i = $model+1000; $i <= 100000; $i= $i+1000)
      		{
      			echo "<option value = '" .$i. "'>" .$i. " $</option>";

      		}
		}
			
		
	}	
?>      	
