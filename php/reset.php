<?php

	include("./inc/function.php");
	include("./inc/connection.php");

	resetss( connect() );
	// resets(connect());

	header('location:./traitement/Delete.php');