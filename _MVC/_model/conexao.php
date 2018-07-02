<?php

	function getConnection(){
		//mysqli_connect(host(nome do servidor),username,password,dbname,port,socket);
		$con = mysqli_connect("localhost","root","","crud_php");

		mysqli_set_charset($con, 'utf8');

		return $con;
	}
	

?>