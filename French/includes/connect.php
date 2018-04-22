<?php
	
	session_start( );
	$_SESSION['DBConnection']=null;
	$_SESSION['DBConnection'] = new clsDBConnection( "fmautomarketdb" );			
	
?>