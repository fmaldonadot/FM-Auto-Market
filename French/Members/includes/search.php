
<?php
	
	
	function SearchCars()
	{
		$make = "";
		$model = "";
		$new = "";
		$used = "";
		$minPrice = "";
		$maxPrice = "";
		$minKm = "";
		$maxKm = "";
		$minYear = "";
		$maxYear = "";
		$where = "";
		$putAND = "";
		$query= "";
		
		if( (!empty($_POST["chkNew"]))||(!empty($_POST["chkUsed"]))||(!empty($_POST["cmbMake"]))||(!empty($_POST["cmbModelN"]))||(!empty($_POST["cmbMinPrice"]))||(!empty($_POST["cmbMinKm"]))||(!empty($_POST["cmbMinYear"])))
		{
			$where = " WHERE";
		}
		if(!empty($_POST["chkNew"])) 
		{ 
			$new = " Status = '" .$_POST["chkNew"]. "'";
			$putAND=" AND";
		}
		if(!empty($_POST["chkUsed"])) 
		{ 
			$used = $putAND." Status = '" .$_POST["chkUsed"]. "'";
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMake"])) 
		{ 
			$make = $putAND." Make = '" .$_POST["cmbMake"]. "'";
			$putAND=" AND";
		}
		if(!empty($_POST["cmbModelN"]))
		{ 
			$model = $putAND." Model = '" .$_POST["cmbModelN"]. "'";
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMinPrice"]))
		{ 
			$minPrice = $putAND." CurrentPrice >= " .$_POST["cmbMinPrice"];
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMaxPrice"]))
		{ 
			$maxPrice = $putAND." CurrentPrice <= " .$_POST["cmbMaxPrice"];
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMinKm"]))
		{ 
			$minKm = $putAND." Mileage >= " .$_POST["cmbMinKm"];
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMaxKm"]))
		{ 
			$maxKm = $putAND." Mileage <= " .$_POST["cmbMaxKm"];
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMinYear"]))
		{ 
			$minYear = $putAND." RegYear >= " .$_POST["cmbMinYear"];
			$putAND=" AND";
		}
		if(!empty($_POST["cmbMaxYear"]))
		{ 
			$maxYear = $putAND." RegYear <= " .$_POST["cmbMaxYear"];
			
		}
		
		/////////////////////////////////////  Building the query
		
		$query = "SELECT StockNumber, Make, Model, Status, Transmission, RegYear, Mileage, ExtColor, CurrentPrice, OldPrice, Photo FROM cars" .$where.$new.$used.$make.$model.$minPrice.$maxPrice.$minKm.$maxKm.$minYear.$maxYear;

		
		$myRecord = $_SESSION['DBConnection']->SQLSelect($query);
		$response = "";
		foreach($myRecord as $value)
		{
			// Verify if the car is a members favorite selected
			$setFavorite = clsCFavorite::isFavorite( $_SESSION["Member_ID"], $value["StockNumber"] , $_SESSION['DBConnection'] );
			
			if ($setFavorite > 0 )
			{
				$pict = "favoriteON.png";
				$title = "Delete from Favorites";
			}
			else
			{
				$pict = "favoriteOFF.png";
				$title = "Add to Favorites";
			}
			
			$response .= '<a href="includes/viewCar.php?RefCar=' .$value["StockNumber"]. '">';
			$response .= '<table style="margin-bottom: 10px; border: 2px solid yellow; box-shadow: 3px 3px 5px; font-size: 18px;" width="100%" align="center">
			<tbody>
			<tr>
				<th width="47%" rowspan="5" bgcolor="#C9DDF5" scope="col"><img src="../img/CarsStock/' .$value["Photo"]. '" width="237" height="179" style="box-shadow: 2px 2px 5px" /></th>
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
					<td height="32" bgcolor="#C9DDF5" colspan="2" style="text-align: center"><a href="includes/setFavorite.php?carID=' .$value["StockNumber"]. '&favExist=' .$setFavorite. '"><img style="width: 10%; height: auto" src="../img/' .$pict. '" title="' .$title. '"></a></td>';

			
			
			$response .= '</tr>
			</tbody>
			</table>';
			$response .= '</a>';
		}
		return $response;
		//return $query;
	}

	

?>

