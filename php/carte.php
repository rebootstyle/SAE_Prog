<?php

// Paramètres persos
$host = "devbdd.iutmetz.univ-lorraine.fr"; // voir hébergeur
$user = "andrien11u_appli"; // vide ou "root" en local
$pass = "32112077"; // vide en local
$bdd = "andrien11u_SAEProgrammation"; // nom de la BD
// connexion

$dsn = "mysql:dbname=$bdd;host=$host;charset=UTF8";

try {
    $conn2 = new PDO($dsn, $user, $pass,
    [
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
    ]);
}
catch(PDOException $e) {
    print $e->getMessage();
    die();
}

$unbufferedResult = $conn2->query('select Commune,Donnee_carte.longitude as longitude_commune,Donnee_carte.latitude as lattitude_commune  from Gare_nom join Objet_perdu2 on Gare_nom.Code_UIC=Objet_perdu2.CodeUIC join Donnee_carte  on Donnee_carte.nom_commune_complet = Gare_nom.Commune where Commune is not null and Code_département = "57"   group by Commune');

function genererListe4($conn2)
{
    $label = [];
    $valeur_long = [];
    $valeur_lat=[];
    while ($row = $conn2->fetch()) {
        // Ajoutez la première colonne (indice 0) à la liste
        $label[] = $row["Commune"];
        $valeur_long[] = $row["longitude_commune"];
        $valeur_lat[] = $row["lattitude_commune"];
    }
    return (object) array('label' => $label, 'longitude' => $valeur_long, 'lattitude'=>$valeur_lat); 
}



$liste5 = genererListe4($unbufferedResult);


$label4 = $liste5->label;
$valeur_long = $liste5->longitude;
$valeur_lat= $liste5->lattitude;
?>
  