
<?php
header("Content-Type: application/json");
// FONCTION DE CONNEXION
require_once 'connexion.php';

$reponseFinal = array();

$con = oursConnection();
if(!$con)
{
    echo "Impossible de se connecter";
    die();
}
else{   
    $query = $con->prepare("SELECT * FROM CINEMA");
        
    if($query->execute())
    {

        $films = array();

        $result = $query->get_result();

        while($elm = $result->fetch_array(MYSQLI_ASSOC)){
            $films[] = $elm;
        }

        $reponseFinal['error'] = false;
        $reponseFinal['films'] = $films;
        $reponseFinal['message'] = "La commande a ete executer avec success";

        $query->close();
    }
    else{
        $reponseFinal['error'] = true;
        $reponseFinal['message'] = "Impossible de l'executer";
    }

    echo(json_encode($reponseFinal));
    print_r($reponseFinal);
}
?>