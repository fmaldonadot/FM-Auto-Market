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
			echo "<option value = 'na'>Max Km</option>";
		}
		else
		{
			for ($i = $model+30000; $i <= 400000; $i= $i+30000)
      		{
      			echo "<option value = '" .$i. "'>" .$i. " Km</option>";

      		}
		}
			
		
	}	
?>      	
