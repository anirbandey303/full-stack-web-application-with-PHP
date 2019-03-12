<?php 

	$server = 		"localhost";
	$user =			"root";
	$passsword =	"";
	$databas=		"uemk";

	$connection = new mysqli($server,$user,$passsword,$databas);

	if($connection -> connect_error)
	{
		die($connection->connect_error);
	}
?>