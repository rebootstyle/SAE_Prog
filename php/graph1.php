<?php

// Paramètres persos
$host = "devbdd.iutmetz.univ-lorraine.fr"; // voir hébergeur
$user = "andrien11u_appli"; // vide ou "root" en local
$pass = "32112077"; // vide en local
$bdd = "andrien11u_SAEProgrammation"; // nom de la BD
// connexion

$dsn = "mysql:dbname=$bdd;host=$host;charset=UTF8";

try {
    $conn = new PDO($dsn, $user, $pass,
    [
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
    ]);
}
catch(PDOException $e) {
    print $e->getMessage();
    die();
}

$unbufferedResult = $conn->query('SELECT count(Code_gare)as Nb_gare,Département  from Gare_nom where Commune <>""   group by Département;');

function genererListe($conn)
{
    $liste = [];
    $liste2 = [];
    while ($row = $conn->fetch()) {
        // Ajoutez la première colonne (indice 0) à la liste
        $liste[] = $row["Département"];
        $liste2[] = $row["Nb_gare"];
    }
    return (object) array('label' => $liste, 'values' => $liste2); 
}



$liste = genererListe($unbufferedResult);


$label = $liste->label;
$values = $liste->values;
?>
  