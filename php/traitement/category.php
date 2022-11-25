<?php
	header("content-Type: application/json");
	include("../inc/connection.php");
	include("../inc/function.php");

	$category = getCategory( connect() );
	echo json_encode($category);
