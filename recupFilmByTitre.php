<?php
header("Content-Type: application/json");

require_once 'connexion.php';

$con = oursConnection();

if (!$con) {
    $response = array(
        'error' => true,
        'message' => "Impossible de se connecter"
    );
} else {

    $response = array();

    if (isset($_GET["titre"])) {
        
        $titre = $_GET["titre"];

        $query = $con->prepare("SELECT id, titre, description, langue, genre, date_de_sortie, box_office, duree, nombre_etoile FROM CINEMA WHERE titre = ?");
        $query->bind_param("s", $titre);

        if ($query->execute()) {
            
            $query->bind_result($id, $titre, $description, $langue, $genre, $date_de_sortie, $box_office, $duree, $nombre_etoile);
            
            $query->fetch();

            $films = array(
                'id' => $id,
                'titre' => $titre,
                'description' => $description,
                'langue' => $langue,
                'genre' => $genre,
                'date_de_sortie' => $date_de_sortie,
                'box_office' => $box_office,
                'duree' => $duree,
                'nombre_etoile' => $nombre_etoile,
            );

            $response['error'] = false;
            $response['films'] = $films;
            $response['message'] = "Le film recherché est dans la base de données";

            $query->close();
        } 
    } else {
        $response['error'] = true;
        $response['message'] = "Fournissez un titre de film à rechercher";
    }
}

echo json_encode($response);
?>