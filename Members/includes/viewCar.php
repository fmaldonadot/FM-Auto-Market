<?php include "../../Classes/clsDBConnection.php" ?>
<?php include_once "connect.php" ?>
<?php include "../../Classes/clsCReviews.php" ?>
<?php include "../../Classes/clsMembers.php" ?>
<?php 
	//////////////////////////////////////////
	// Verify if Member wrote a review
	//////////////////////////////////////////
	if (isset($_POST["btnReview"]))
	{
		$newReview = new clsCReviews( $_SESSION["Member_ID"], $_GET["RefCar"], $_POST["radStars"], $_POST["txtReview"], $_SESSION['DBConnection']);
		
		// Add Review
		$newReview->Add();
	}
	
	//////////////////////////////////////////
	// Search al information about the Cars
	//////////////////////////////////////////
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

	///////////////////////////////////////////
	// Search all the reviews about this car
	///////////////////////////////////////////
	$reviews = clsCReviews::GetReviews($_GET["RefCar"],$_SESSION['DBConnection']);
	$response = "";
	foreach( $reviews as $value )
	{
		// Search Member's username who wrote the review
		$member = clsMembers::GetMemberInfo("SELECT Username FROM members WHERE MemberID = " .$value['MemberID'] , $_SESSION['DBConnection']);
		
		$response .=  '<ul class="list-group">';
        $response .= '<div class="panel panel-default col-sm-12">';
        $response .=   '<div class="bg-primary">';
        $response .=    '<h3 class="panel-collapse">' .$member[0]["Username"]. '</h3>';
        $response .=   '</div>';
        $response .=   '<div class="panel-body">' .$value["Review"]. '</div>';
		
		// Add Stars
		$response .=   '<div class="panel-footer">';
		$stars = "";
		for ($i = 1; $i <= 5; $i++)
		{
			if ($i <= $value["Stars"])
			{
				$stars .= '<img src="../../img/favoriteON.png" style="width: 5%; height: auto">';
			}
			else
			{
				$stars .= '<img src="../../img/favoriteOFF.png" style="width: 5%; height: auto">';
			}
		}
		$response .=   $stars. '</div>';
        
		$response .= '</div>';
      	$response .= '</ul>';
	}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Show</title>
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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
			<p class="auto-style1" style="font-family: Courgette; width: 555px;margin-top: 0px"><?php echo $RegYear. " " .$Status. " " .$Make. " " .$Model; ?></p></td>
      	</tr>
      </table>
    </div>
<div>
     	<table width="962px" height="40px" align="center" >
     		<tr>
      			<td width="46" align="right"><a href="../index.php" >HOME</a></td>
      			<td width="46" align="right"><a href="favorites.php" >FAVORITES</a></td>
        		<td width="46" align="right"><a href="../includes/favorites.php" title="Allez au Français"><img src="../../img/french-flag-button-rectangular.png" width="46" height="30" /></a></td>
        		
        	</tr>
        </table>     
    </div>
	
<div style="margin-top: 30px; margin-bottom: 30px; font-size: 16px; font-style: oblique; font-weight: bold; text-align: center; color: #000000;">
 
<div style="float: left; border: 1px solid black; width: 20%; padding: 10px; background-color: #125BB3" align="left">
	<p style="color: white">Write a Review</p>
	<form action="#" method="post">
		<textarea name="txtReview" placeholder="Write your Review Here" style="font-size: 12px; text-align: left; width: 100%" required></textarea><br>
		
 	  <p style="margin-left: 20%">
	 	   <input type="radio" name="radStars" value="1" id="radStars_0" required>
	 	    <img src="../../img/favoriteON.png" style="width: 8%; height: auto">
	 	  <br>
	 	  
	 	    <input type="radio" name="radStars" value="2" id="radStars_1">
	 	    <img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto">
	 	  <br>
	 	 
	 	    <input type="radio" name="radStars" value="3" id="radStars_2">
	 	    <img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto">
	 	  <br>
	 	  
	 	    <input type="radio" name="radStars" value="4" id="radStars_3">
	 	    <img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto">
	 	  <br>
	 	  
	 	    <input type="radio" name="radStars" value="5" id="radStars_4">
	 	    <img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto"><img src="../../img/favoriteON.png" style="width: 8%; height: auto">
	 	  <br>
 	  </p>
 	  <center><input type="submit" name="btnReview" value="Send"></center>
    </form>
	
</div>  
    
  <table width="50%" border="1" align="center">
	  <tbody>
	    <tr>
	      <th scope="col" colspan="4" style="background-color: black"><img style="width:90%; height: auto" src="../../img/CarsStock/<?php echo $Photo ?>" ></th>
	      
        </tr>
	    <tr>
	      <td colspan="4" bgcolor="#125BB3"><span style="text-align: center; color: white; font-size: 36px; font-weight: bolder; font-style: oblique;">Vehicule Information</span></td>
	      
        </tr>
	    <tr>
	      <td width="25%" bgcolor="#E2ECF9">Stock #:</td>
	      <td width="16%" bgcolor="#E2ECF9"><?php echo $_GET["RefCar"] ?></td>
	      <td width="36%" bgcolor="#E2ECF9"><span style="font-size: 20px"><?php echo $CurrentPrice ?> $</span></td>
	      <td width="23%" bgcolor="#E2ECF9"><span style="text-decoration: line-through;color: red"><?php echo $OldPrice ?> $</span></td>
        </tr>
	    <tr>
	      <td bgcolor="#E2ECF9">Make:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Make ?></td>
	      <td bgcolor="#E2ECF9">Body Type:</td>
	      <td bgcolor="#E2ECF9"><?php echo $BodyType ?></td>
        </tr>
	    <tr>
	      <td bgcolor="#E2ECF9">Model:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Model ?></td>
	      <td bgcolor="#E2ECF9">Engine:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Engine ?></td>
        </tr>
	    <tr>
	      <td bgcolor="#E2ECF9">Status:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Status ?></td>
	      <td bgcolor="#E2ECF9">Drive Train:</td>
	      <td bgcolor="#E2ECF9"><?php echo $DriveTrain ?></td>
        </tr>
        <tr>
	      <td bgcolor="#E2ECF9">Transmission:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Transmission ?></td>
	      <td bgcolor="#E2ECF9">Km:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Mileage ?></td>
        </tr>
        <tr>
	      <td bgcolor="#E2ECF9">Doors:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Doors ?></td>
	      <td bgcolor="#E2ECF9">Seats:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Seats ?></td>
        </tr>
        <tr>
	      <td bgcolor="#E2ECF9">External Color:</td>
	      <td bgcolor="#E2ECF9"><?php echo $ExtColor ?></td>
	      <td bgcolor="#E2ECF9">Internal Color:</td>
	      <td bgcolor="#E2ECF9"><?php echo $Make ?></td>
        </tr>
        
    </tbody>
  </table>
</div>	
<div align="center" class="col-sm-offset-3 col-sm-6">
     <?php echo $response; ?> 
</div>

<?php include "footer.html" ; ?>  
</div>

</div>

</body>
</html>