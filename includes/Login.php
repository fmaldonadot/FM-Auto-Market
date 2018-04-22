<?php include "../Classes/clsDBConnection.php" ?>
<?php include_once "connect.php" ?>
<?php include "../Classes/clsMembers.php"?>
<?php
	ob_start();
	//////////////////////////////////////////////
	//////////// TO LOGIN AS A MEMBER ////////////
	//////////////////////////////////////////////
	$errorMsg = "";
	if( isset($_POST["btnSubmitLogin"]) )
	{
		$errorMsg = "";
		// Charge username and password to verify
		$unameLogin = $_POST["txtUsernameLogin"];
		$pwdLogin = $_POST["txtPWDLogin"];
		
		// Verify user and password
		
		$query = "SELECT MemberID, FirstName, LastName FROM members WHERE Username = '" .$unameLogin. "' AND Password = '" .$pwdLogin. "'";
		
		$member = clsMembers::GetMemberInfo($query, $_SESSION['DBConnection']);
		
		if ( sizeof($member) > 0 )
		{
			// Is a member
			// Set Header Title
			$_SESSION["headerTitle"] = "<span style= 'font-size:45px;' >" .$member[0]["FirstName"]. " " .$member[0]["LastName"]. "</span>";
			
			// Save ID in a session Varialble
			$_SESSION["Member_ID"] = $member[0]["MemberID"];
			
			// Create a session Variable to activate member features
			$_SESSION["Privileges"] = true;
			
			// Redirecting to Members Folder
			header("Location:../Members");
		}
		else
		{			
			$errorMsg = "Login Error.  Wrong Username or Password!";			
			//Redirecting to main
			header("Location:../index.php?errorMsg=" .$errorMsg);
		}
		
	}
?>
	