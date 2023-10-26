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

$unbufferedResult = $conn2->query('sELECT hour(DateInc)as heure, count(hour(DateInc))as nb_objet_perdu from Objet_perdu2 group by heure');

function genererListe2($conn2)
{
    $label = [];
    $valeur = [];
    while ($row = $conn2->fetch()) {
        // Ajoutez la première colonne (indice 0) à la liste
        $label[] = $row["heure"];
        $valeur[] = $row["nb_objet_perdu"];
    }
    return (object) array('label' => $label, 'values' => $valeur); 
}



$liste3 = genererListe2($unbufferedResult);


$label2 = $liste3->label;
$values2 = $liste3->values;
?>
  