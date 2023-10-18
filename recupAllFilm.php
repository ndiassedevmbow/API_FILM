<?php
header("Content-Type: application/json");
// FONCTION DE CONNEXION
require_once 'connexion.php';

$con = oursConnection();
if(!$con)
{
    echo "Impossible de se connecter";
    die();
}
else{   

    $reponse = array();


        $query = $con->prepare("SELECT * FROM CINEMA");
        
        if($query->execute())
        {

            $films = array();

           $result = $query->get_result();

           while($elm = $result->fetch_array(MYSQLI_ASSOC)){
                $films[] = $elm;
            }

            $reponse['error'] = false;
            $reponse['films'] = $films;
            $reponse['message'] = "La commande a ete executer avec success";

            $query->close();
        }
        else{
            $reponse['error'] = true;
            $reponse['message'] = "Impossible de l'executer";
        }

        echo(json_encode($reponse));
}
?>