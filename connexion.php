<?php 
// FONCTION DE CONNEXION
	function oursConnection()
	{
		$server = "localhost";
		$login = "root";
		$bd = "film_api";
		$psw = "";

		$exeOursConnection = mysqli_connect($server, $login, $psw, $bd);

		return $exeOursConnection;
	}

 ?>
