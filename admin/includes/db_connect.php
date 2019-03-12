<<<<<<< HEAD
<?php 

	$server = 		"localhost";
	$user =			"root";
	$passsword =	"sh@tT@k123";
	$databas=		"uemk";

	$connection = new mysqli($server,$user,$passsword,$databas);

	if($connection -> connect_error)
	{
		die($connection->connect_error);
	}
=======
<?php 

	$server = 		"localhost";
	$user =			"root";
	$passsword =	"sh@tT@k123";
	$databas=		"uemk";

	$connection = new mysqli($server,$user,$passsword,$databas);

	if($connection -> connect_error)
	{
		die($connection->connect_error);
	}
>>>>>>> 1c309511aaacd0f4bc1953db4c8ee79ba7c1d8eb
?>