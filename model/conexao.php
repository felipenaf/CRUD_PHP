<?php

	function getConnection(){

		$con = mysqli_connect("localhost","felipe","123","crud");
		mysqli_set_charset($con, 'utf8');

		return $con;
	}
?>