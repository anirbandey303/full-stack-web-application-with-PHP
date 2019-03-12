<?php 

	$server = 		"XXXXXXXXXXXXX";
	$user =			"XXXXXXXXXXXX";
	$passsword =	"XXXXXXX";
	$databas=		"XXXXXXXXXXXX";

	$connection = new mysqli($server,$user,$passsword,$databas);

	if($connection -> connect_error)
	{
		die($connection->connect_error);
	}
?>