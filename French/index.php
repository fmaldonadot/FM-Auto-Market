<?php 
	Ob_Start();
	header('Access-Control-Allow-Origin: *'); 
?>
<?php include "Classes/clsDBConnection.php" ?>
<?php include_once "includes/connect.php" ?>
<?php include "Classes/clsCars.php" ?>
<?php include "Classes/clsMembers.php"?>
<?php
	//////////////////////////////////////////////
	//////////// TO REGISTER A MEMBER ////////////
	//////////////////////////////////////////////
	if( isset($_POST["btnSubmit"]) )
	{
		$fName = $_POST["txtFName"];
		$lName = $_POST["txtLName"];
		$email = $_POST["txtEmail"];
		$uname = $_POST["txtUsername"];
		$pwd = $_POST["txtPWD"];
		$cPwd = $_POST["txtCPWD"];
		if ($pwd == $cPwd)
		{		
			$errorMsg = "";
			
			// check if userName or email exist
			//$query = "SELECT Username, email FROM members WHERE Username = '" .$uname. "' OR email = '" .$email. "'";		
//			$myRecord = $_SESSION['DBConnection']->SQLSelect($query);
			$unameExist = clsMembers::MemberExist("uname", $uname, $_SESSION['DBConnection']);
			$emailExist = clsMembers::MemberExist("email", $email, $_SESSION['DBConnection']);
			
			//$errorMsg = $unameExist. " /// " .$emailExist;
			
			if($unameExist == 0 && $emailExist == 0 )
			{
				// User can register
				$errorMsg = "<span style='color:blue'>Inscription terminée</span>";
				
				// Create a new object member
				$newMember = new clsMembers($fName, $lName, $uname, $pwd, $email, $_SESSION['DBConnection']);
				
				// Add the new member to table
				$newMember->AddMember();
							
			}
			else
			{
				//$errorMsg = "";
				if ($unameExist > 0 )
					$errorMsg .= "Erreur. Nom d'utilisateur existe déjà <br>";
				if ($emailExist > 0 )
					$errorMsg .= "Erreur. L'adresse e-mail existe déjà";
			}
			
		}
		else
		{
			$errorMsg = "Erreur. Confirmer le mot de passe est incorrect!";
		}
			
	}
	
	
?>
<!doctype html>
<html>
<head>

	<title>Index</title>
<link href="css/Modal.css" rel="stylesheet" type="text/css">
<link type="text/css" href="css/pageDesign.css" />
<style type="text/css">
	
		.auto-style1 {
			margin-left: 0px;
		}
		.auto-style2 {
			margin-bottom: 0px;
		}
		.auto-style4 {
			text-align: center;
		}
		.auto-style5 {
			text-align: left;
		}
		.auto-style6 {
			font-size: medium;
		}
		.auto-style7 {
		 text-align: right;
		}
		.form-group{
			padding-bottom: 10px;
			font-family: Courgette;
		}
		.form-control, .btnSubmit{
			font-family: Courgette;
			
		}
		.btnSubmit{
			font-size: 20px;
			padding: 5px 15px 5px 15px;
			background-color: #890F0F;
			color: white;
			border-radius: 10px;
			box-shadow: 2px 2px 5px black;
		}
    </style>
	<script type="text/javascript">	
		function showContent() 
		{
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) 
        {
           	element.style.display='block';
        }
        else 
        {
           	element.style.display='none';
        }
    }	
    function getModel(varValue, varID, varFile) 
    {
       	var xmlhttp = new XMLHttpRequest();
		  	xmlhttp.withCredentials = true;
			//xmlhttp.responseType = "text";
        xmlhttp.onreadystatechange = function r() 
        {
        	if (this.readyState == 4 && this.status == 200) 
         	{
             	document.getElementById(varID).innerHTML = this.responseText;
              //alert(this.responseText);
          }
        };
        xmlhttp.open("GET", "includes/" + varFile + "?makeid=" + varValue, true);
        xmlhttp.send();
    }
  </script>

</head>
<body style="background-color: whitesmoke">
<div class="auto-style4">
&nbsp;
														
	<div class="container">
		<?php include "includes/header.php"; ?>
		<div>
			<table width="962px" height="40px" align="center" >
				<tr>
					<td width="46" align="right"><a href="index.php" >ACCUEIL</a></td>
					<td width="72" align="right"><a href="#" name="mdlRegister" id="mdlRegister">REGISTRE</a></td>
					
					<td width="49" align="right"><a href="#" name="mdlLogin" id="mdlLogin">S'IDENTIFIER</a></td>
							
					<td width="46" align="right"><a href="includes/changeLanguage.php?lang='F'" title="Allez au Français"><img src="img/United-Kingdom-Flag.png" width="46" height="30" /></a></td>
				</tr>
			</table>     
		</div>
		<!-- Register Option -->
		<div id="myModal" class="modal">

			  <!-- Register Modal content -->
			  <div class="modal-content">
					<div class="modal-header">
					  <span class="close">&times;</span>
					  <h2 style="font-family: Courgette">Inscription des membres</h2>
					</div>
						<div class="modal-body">

							<form action="" method="post">
							<div style="text-align: right; margin-right: 70px">
								<div class="form-group">
									<label for="exampleInputFName">Prénom&nbsp;&nbsp;</label>
									<input name="txtFName" type="text" class="form-control" id="exampleInputFName" placeholder="First Name" required><span style="color: red">*</span>
								</div>
								<div class="form-group">
									<label for="exampleInputLName">Nom&nbsp;&nbsp;</label>
									<input name="txtLName" type="text" class="form-control" id="exampleInputLName" placeholder="Last Name" required><span style="color: red">*</span>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address&nbsp;&nbsp;</label>
									<input name="txtEmail" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required><span style="color: red">*</span>
								</div>
								<div class="form-group">
									<label for="exampleInputUName">Nom d'utilisateur&nbsp;&nbsp;</label>
									<input name="txtUsername" type="text" class="form-control" id="exampleInputUName" placeholder="Enter an User Name" required><span style="color: red">*</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Mot de passe&nbsp;&nbsp;</label>
									<input name="txtPWD" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required><span style="color: red">*</span>
								</div>
								<div class="form-group">
									<label for="exampleInputConfirmPWD">Confirmer le Mot de passe&nbsp;&nbsp;</label>
									<input name="txtCPWD" type="password" class="form-control" id="exampleInputConfirmPWD" placeholder="Confirm Password" required><span style="color: red">*</span>
								</div>
							</div>
								<button name="btnSubmit" type="submit" class="btnSubmit">Soumettre</button>
							</form>
							
						</div>
						<div class="modal-footer">
						  <h3 style="font-family: Courgette">Votre prochaine voiture est là!</h3>
						</div>
			</div>

		</div>

		<!-- Login Option -->
		<div id="myModalLogin" class="modal">

			  <!-- Login Modal content -->
			  <div class="modal-content">
					<div class="modal-header">
					  <span class="closeLogin">&times;</span>
					  <h2 style="font-family: Courgette">Identifiant</h2>
					</div>
						<div class="modal-body">

							<form action="includes/Login.php" method="post">
							<div style="text-align: right; margin-right: 90px">
								<div class="form-group">
									<label for="exampleInputUNameLogin">Nom d'utilisateur&nbsp;&nbsp;</label>
									<input name="txtUsernameLogin" type="text" class="form-control" id="exampleInputUNameLogin" placeholder="Enter an User Name" required><span style="color: red">*</span>
								</div>
								<div class="form-group">
									<label for="exampleInputPasswordLogin">Mot de Passe&nbsp;&nbsp;</label>
									<input name="txtPWDLogin" type="password" class="form-control" id="exampleInputPasswordLogin" placeholder="Password" required><span style="color: red">*</span>
								</div>
							</div>	
								<button name="btnSubmitLogin" type="submit" class="btnSubmit">Entrer</button>
							</form>
							
						</div>
						<div class="modal-footer">
						  <h3 style="font-family: Courgette">Entrez dans le meilleur marché de l'automobile!</h3>
						</div>
			</div>

		</div>

		<div>
			<div class="form-group" style="color: red">
				<?php 
					if (isset($_POST["btnSubmit"])||isset($_POST["btnSubmitLogin"]))
						{
							echo $errorMsg; 										
						}
				?>	
				<br><?php 
						if (!empty($_GET["errorMsg"]))
							echo $_GET["errorMsg"];
				?>
			</div>
			
			<!---------------------------------------------->
			<!---------------- Search Form ----------------->
			<form action="" method="post"> 
					<table border="0" align="center" style="border-radius: 30px 30px 0px 30px; background-color: grey; color: white; width: 650px; height: auto; margin-top:20px;">

					<tr>
						<td style="width: 58px; height: 1px;" class="auto-style5">

							<input type="checkbox" name="chkNew" style="width: 19px; margin-left: 90px" value="New"><span style="font-size: 16px; margin-right: 30px">Neuf</span>
							<input type="checkbox" name="chkUsed" value="Used" ><span style="font-size: 16px;">D'ocassion</span>
						</td>
						<td style="width: 4px; height: 1px;"></td>
					</tr>
					<tr>
						<td style="height: 25px; width: 58px" class="auto-style4">


							   <select title="Any Make" id="comboMake" name="cmbMake" style="font-size:16px;" class="auto-style2" onchange="getModel(this.value, 'cmbModel', 'getModels.php')">
								  <option value = "">Choisir une marque</option>
								  <?php
										  // Looking for cars Makes
										  $query = "SELECT DISTINCT Make FROM cars";

										  $rows = $_SESSION['DBConnection']->SQLSelect($query);

										  foreach($rows as $v)
										  { 
											 echo "<option value = '" .$v['Make']. "'>" .$v['Make']. "</option>"; 
										  }
									 ?>	

							</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


							<select title="Any Model" id="cmbModel" name="cmbModelN" style="font-size:16px">
								  <option value = ''>Choisir un modèle</option>
							</select>      			

						</td>
						<td style="height: 25px; width: 4px" class="auto-style4">
							   <input name="btnSearch" style="padding: 3px; width: 88px; background-color: navy; font-size: 16px; color:white; text-align: center;" type="submit" value="Search" class="auto-style1">&nbsp;</td>
				  </tr>
				  <tr>
						<td style="width: 58px; height: 29px;" class="auto-style4"></td>
						<td style="width: 4px; height: 29px;" class="auto-style4"><input name="chkAdvanced" id="check" type="checkbox" value="1" onchange="javascript:showContent()"><span class="auto-style6">Recherche Avancée</span></td>
				  </tr>


				<table id="content" style="display:none; border-radius: 0px 0px 30px 30px; background-color: gray; color: white; width: 300px; margin-left: 633px" border="0" >

					<tr>
						<td style="height: 2px; width: 146px" class="auto-style7">
							<select title="Select Min Price" name="cmbMinPrice" id="cmbMinPrice" style="font-size:14px" class="auto-style2" onchange="getModel(this.value, 'cmbMaxPrice', 'getMaxPrice.php')">
							 <option value = "">Min Prix</option>
							 <?php
								  for ($i = 1000; $i <= 100000; $i= $i+1000)
								  {
									 echo "<option value = '" .$i. "'>" .$i. " $</option>";

								  }
							 ?>
						</select>
						</td>
						<td style="width: 104px; height: 2px;" class="auto-style5">
						<select title="Select Max Price" name="cmbMaxPrice" id="cmbMaxPrice" style="font-size:14px">
							<option value = "">Max Prix</option>

							</select></td>
					</tr>
					<tr>
						<td style="height: 18px; width: 146px" class="auto-style7">
							 <select title="Select Min Km" name="cmbMinKm" id="cmbMinKm" style="font-size:14px" class="auto-style2" onchange="getModel(this.value, 'cmbMaxKm', 'getMaxKm.php')">>
								<option value = "">Min Km</option>
								<?php
								for ($i = 0; $i <= 400000; $i= $i+30000)
								{
									echo "<option value = '" .$i. "'>" .$i. " Km</option>";

								}
								?>

							</select>
						</td>
						<td style="width: 104px; height: 18px;" class="auto-style5">
							<select title="Select Max Km" name="cmbMaxKm" id="cmbMaxKm" style="font-size:14px">
								<option value = "">Max Km</option>

							</select></td>
					</tr>

					<tr>
						<td style="width: 146px" class="auto-style7">
						<select title="Select Min Year" name="cmbMinYear" id="cmbMinYear" style="font-size:14px" class="auto-style2" onchange="getModel(this.value, 'cmbMaxYear', 'getMaxYear.php')">
								<option value = "">Min Année</option>
								<?php
								for ($i = 1970; $i <= 2018; $i++)
								{
									echo "<option value = '" .$i. "'>" .$i. "</option>";

								}
								?>

							</select>
						</td>
						<td style="width: 104px; " class="auto-style5">
							<select title="Select Max Year" name="cmbMaxYear" id="cmbMaxYear" style="font-size:14px">
								<option value = "">Max Année</option>


							</select></td>
					</tr>

				</table>

					</table>

			</form>
			<!---------------------------------------------->
			<!---------------------------------------------->
			<!---------------------------------------------->
			
			<center><div style="margin-top: 20px; margin-bottom: 20px; width: 550px;">

				<?php 
					include "includes/search.php";

					if(!empty($_POST['btnSearch']))
					{
						$showCars = SearchCars();
						echo $showCars;
					}
				?>

			</div></center>		
		</div>	

		<?php include "includes/footer.html" ; ?>  
	</div>

</div>
<script>
	// Get the modal for Register
	var modal = document.getElementById('myModal');
	// Get the modal for Login
	var modalLogin = document.getElementById('myModalLogin');

	
	// Get the button that opens the Register modal
	var btn = document.getElementById("mdlRegister");
	// Get the button that opens the Login modal
	var btnLogin = document.getElementById("mdlLogin");

	
	// Get the <span> element that closes the modal Register
	var span = document.getElementsByClassName("close")[0];
	// Get the <span> element that closes the modal Login
	var spanLogin = document.getElementsByClassName("closeLogin")[0];

	
	// When the user clicks the button, open the modal Register
	btn.onclick = function() {
    	modal.style.display = "block";
	}
	// When the user clicks the button, open the modal Login
	btnLogin.onclick = function() {
    	modalLogin.style.display = "block";
	}

	
	
	// When the user clicks on <span> (x), close the modal Register
	span.onclick = function() {
    	modal.style.display = "none";
	}
	// When the user clicks on <span> (x), close the modal Login
	spanLogin.onclick = function() {
    	modalLogin.style.display = "none";
	}

	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    	if (event.target == modal) {
        	modal.style.display = "none";
    	}
		if (event.target == modalLogin) {
        	modalLogin.style.display = "none";
    	}
	}
	
</script>
</body>
</html>
