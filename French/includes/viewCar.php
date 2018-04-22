<?php include "../Classes/clsDBConnection.php" ?>
<?php include_once "connect.php" ?>
<?php
	$query = "SELECT * FROM cars WHERE StockNumber = " .$_GET["RefCar"]; 
		
	$myRecord = $_SESSION['DBConnection']->SQLSelect($query);
	
	$Make = $myRecord[0]["Make"];	
	$Model = $myRecord[0]["Model"];	
	$Status = $myRecord[0]["Status"];	
	$RegYear = $myRecord[0]["RegYear"];	
	$BodyType = $myRecord[0]["BodyType"];	
	$Engine = $myRecord[0]["Engine"];	
	$DriveTrain = $myRecord[0]["DriveTrain"];
	$Transmission = $myRecord[0]["Transmission"];	
	$FuelType = $myRecord[0]["FuelType"];
	$OldPrice = $myRecord[0]["OldPrice"];	
	$CurrentPrice = $myRecord[0]["CurrentPrice"];	
	$Mileage = $myRecord[0]["Mileage"];	
	$Doors = $myRecord[0]["Doors"];	
	$Seats = $myRecord[0]["Seats"];	
	$ExtColor = $myRecord[0]["ExtColor"];	
	$IntColor = $myRecord[0]["IntColor"];	
	$Photo = $myRecord[0]["Photo"];
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Show</title>
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
      		<td width="28%"><img src="../img/Logo.png" style="border:thin; width: 150px; height: auto; margin-left: 80px; margin-top: 0px"/></td>
      		<td width="72" align="margin-left" >
			<p class="auto-style1" style="font-family: Courgette; width: 555px;margin-top: 0px"><?php echo $RegYear. " " .$Status. " " .$Make. " " .$Model; ?></p></td>
      	</tr>
      </table>
    </div>
<div>
     	<table width="962px" height="40px" align="center" >
     		<tr>
      			<td width="46" align="right"><a href="<?=$_SERVER['HTTP_REFERER']?>" >RETOURNER</a></td>
        		<td width="46" align="right"><a href="changeLanguage.php" title="Go To English"><img src="../img/United-Kingdom-Flag.png" width="46" height="30" /></a></td>
        		
        	</tr>
        </table>     
    </div>
	
<div style="margin-top: 30px; margin-bottom: 30px; font-size: 16px; font-style: oblique; font-weight: bold; text-align: center; color: #000000;">
  <table width="50%" border="1" align="center">
	  <tbody>
	    <tr>
	      <th scope="col" colspan="4" style="background-color: black"><img style="width:90%; height: auto" src="../img/CarsStock/<?php echo $Photo ?>" ></th>
	      
        </tr>
	    <tr>
	      <td colspan="4" bgcolor="#125BB3"><span style="text-align: center; color: white; font-size: 36px; font-weight: bolder; font-style: oblique;">Informations sur le véhicule</span></td>
	      
        </tr>
	    <tr>
	      <td width="25%" bgcolor="#E2ECF9">Stock #:</td>
	      <td width="16%" bgcolor="#E2ECF9"><?php echo $_GET["RefCar"] ?></td>
	      <td width="36%" bgcolor="#E2ECF9"><span style="font-size: 20px"><?php echo $CurrentPrice ?> $</span></td>
	      <td width="23%" bgcolor="#E2ECF9"><span style="text-decoration: line-through;color: red"><?php echo $OldPrice ?> $</span></td>
        </tr>
	    <tr>
	      <td bgcolor="#E2ECF9">Marque:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Make ?></td>
	      <td bgcolor="#E2ECF9">Type de carrosserie:</td>
	      <td bgcolor="#E2ECF9"><?php echo $BodyType ?></td>
        </tr>
	    <tr>
	      <td bgcolor="#E2ECF9">Modèle:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Model ?></td>
	      <td bgcolor="#E2ECF9">Moteur:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Engine ?></td>
        </tr>
	    <tr>
	      <td bgcolor="#E2ECF9">État:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Status ?></td>
	      <td bgcolor="#E2ECF9">Entraînement:</td>
	      <td bgcolor="#E2ECF9"><?php echo $DriveTrain ?></td>
        </tr>
        <tr>
	      <td bgcolor="#E2ECF9">Transmission:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Transmission ?></td>
	      <td bgcolor="#E2ECF9">Km:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Mileage ?></td>
        </tr>
        <tr>
	      <td bgcolor="#E2ECF9">Portes:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Doors ?></td>
	      <td bgcolor="#E2ECF9">Places:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Seats ?></td>
        </tr>
        <tr>
	      <td bgcolor="#E2ECF9">Couleur Extérieur:</td>
	      <td bgcolor="#E2ECF9"><?php echo $ExtColor ?></td>
	      <td bgcolor="#E2ECF9">Couleur Intérieur:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Make ?></td>
        </tr>
        
    </tbody>
  </table>
</div>	

<?php include "footer.html" ; ?>  
</div>

</div>

</body>
</html>