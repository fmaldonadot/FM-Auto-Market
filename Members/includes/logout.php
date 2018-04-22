<?php 
ob_start();
if(!empty($_SESSION)){
	$_SESSION["Member_ID"] = null;
	$_SESSION["Privileges"] = false;
}
header("Location:../../index.php");
?>