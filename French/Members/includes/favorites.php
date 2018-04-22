<?php include "../../Classes/clsDBConnection.php" ?>
<?php include_once "connect.php" ?>
<?php include "../../Classes/clsCFavorites.php" ?>
<?php include "../../Classes/clsCars.php" ?>
<?php
	function ShowFavorites()
	{
		/////////////////////////////////////  Building the query
		
		$query = "SELECT cars.StockNumber, cars.Make, cars.Model, cars.Status, cars.Transmission, cars.RegYear, cars.Mileage, cars.ExtColor, cars.CurrentPrice, cars.OldPrice, cars.Photo FROM cars INNER JOIN favoritescars ON cars.StockNumber = favoritescars.StockNumber WHERE favoritescars.MemberID = " .$_SESSION["Member_ID"];

		
		$myRecord = $_SESSION['DBConnection']->SQLSelect($query);
		$response = "";
		foreach($myRecord as $value)
		{
			// Verify if the car is a members favorite selected
			$setFavorite = 1;
			
			$pict = "favoriteON.png";
			$title = "Delete from Favorites";
			
			$response .= '<a href="viewCar.php?RefCar=' .$value["StockNumber"]. '">';
			$response .= '<table style="margin-bottom: 10px; border: 2px solid yellow; box-shadow: 3px 3px 5px; font-size: 18px;" width="100%" align="center">
			<tbody>
			<tr>
				<th width="47%" rowspan="5" bgcolor="#C9DDF5" scope="col"><img src="../../img/CarsStock/' .$value["Photo"]. '" width="237" height="179" style="box-shadow: 2px 2px 5px" /></th>
				 <th colspan="2" bgcolor="#C9DDF5" style="text-align: left; font-weight: bolder; font-size: 24px;" scope="col">' .$value["RegYear"].' '.$value["Status"].' '.$value["Make"].' '.$value["Model"]. '</th>
			</tr>
			<tr>
				<td width="23%" bgcolor="#C9DDF5" style="text-align: left">Transmission ' .$value["Transmission"]. '</td>
				<td width="30%" bgcolor="#C9DDF5" style="text-align: left; font-weight: bolder; font-size: 18px;">'.$value["CurrentPrice"]. ' $</td>
			</tr>
			<tr>
				<td bgcolor="#C9DDF5" style="text-align: left">' .$value["Mileage"]. ' Km</td>
				<td bgcolor="#C9DDF5" style="text-decoration: line-through; text-align: left; font-weight: bolder; color: rgba(255,0,0,1);">' .$value["OldPrice"]. ' $</td>
			</tr>
			<tr>
				<td bgcolor="#C9DDF5" style="text-align: left">' .$value["ExtColor"]. '</td>
				<td bgcolor="#C9DDF5" style="text-align: left">&nbsp;</td>
			</tr>';
			
					
			$response .= '<tr>
					<td height="32" bgcolor="#C9DDF5" colspan="2" style="text-align: center"><a href="setFavorite.php?carID=' .$value["StockNumber"]. '&favExist=' .$setFavorite. '"><img style="width: 10%; height: auto" src="../../img/' .$pict. '" title="' .$title. '"></a></td>';

			
			
			$response .= '</tr>
			</tbody>
			</table>';
			$response .= '</a>';
		}
		return $response;
		//return $query;
	}
	
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Favorites</title>
<link rel="stylesheet" type="text/css" href="../css/pageDesign.css">
<style type="text/css">
	.auto-style1 {
		text-align: left;
		margin-left:40px;
		font-size: 45px;
		color: #FFFFFF;
	}
	.auto-style4 {
		text-align: center;
	}
    </style>
</head>

<body style="background-color: whitesmoke">
<div class="auto-style4">
&nbsp;
														
	<div class="container">
		<div class="primary_header">
      		<table style="width: 100%;">
      			<tr>
      				<td width="28%"><img src="../../img/Logo.png" style="border:thin; width: 150px; height: auto; margin-left: 80px; margin-top: 0px"/></td>
      				<td width="72" align="margin-left" >
					<p class="auto-style1" style="font-family: Courgette; width: 555px;margin-top: 0px">Mes favoris<br><?php echo $_SESSION["headerTitle"]?></p></td>
      			</tr>
      		</table>
    	</div>
		<div>
			<table width="962px" height="40px" align="center" >
				<tr>
					<td width="46" align="right"><a href="../index.php" >BACK</a></td>
					<td width="46" align="right"><a href="changeLanguage.php" title="Go to English"><img src="../../img/United-Kingdom-Flag.png" width="46" height="30" /></a></td>
					
				</tr>
			</table>     
		</div>
		
		<center><div style="margin-top: 20px; margin-bottom: 20px; width: 550px;">

			<?php 
				$showCars = ShowFavorites();
				if ($showCars != "")
				{
					echo $showCars;		
				}
				else
				{
					echo "<center><h3>Vous n'avez aucun favori sélectionné</h3></center>";
				}
			?>

		</div></center>	
		
		

		<?php include "footer.html" ; ?>  
	</div>

</div>

</body>
</html>