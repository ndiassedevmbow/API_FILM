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

    $con = oursConnection();
    if(!$con)
    {
        echo "Impossible de se connecter";
        die();
    }
    else{
        echo "Connexion a la base de donnée effectuer avec success";
    }
?>