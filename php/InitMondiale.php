<?php

	include("./inc/connection.php");
	include("./inc/function.php");

	initMondiale( connect() );
	header('location:./Mondiale.php');

?>