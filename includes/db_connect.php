<?php 

	$server = 		"XXXXXXXX";
	$user =			"XXXX";
	$passsword =	"XXXX";
	$databas=		"XXXX";

	$connection = new mysqli($server,$user,$passsword,$databas);

	if($connection -> connect_error)
	{
		die($connection->connect_error);
	}
?>