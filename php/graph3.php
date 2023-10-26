<?php

// Paramètres persos
$host = "devbdd.iutmetz.univ-lorraine.fr"; // voir hébergeur
$user = "andrien11u_appli"; // vide ou "root" en local
$pass = "32112077"; // vide en local
$bdd = "andrien11u_SAEProgrammation"; // nom de la BD
// connexion

$dsn = "mysql:dbname=$bdd;host=$host;charset=UTF8";

try {
    $conn3 = new PDO($dsn, $user, $pass,
    [
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
    ]);
}
catch(PDOException $e) {
    print $e->getMessage();
    die();
}

    $unbufferedResult = $conn2->query('select Commune,count(NatureObjets)as nb_objetperdu,(count(NatureObjets)/(select count(*)  from Gare_nom join Objet_perdu2 on Gare_nom.Code_UIC=Objet_perdu2.CodeUIC where Commune is not null and Code_département = "57"))*100 as Pourcentage_dobjet_perdu from Gare_nom join Objet_perdu2 on Gare_nom.Code_UIC=Objet_perdu2.CodeUIC where Commune is not null and Code_département = "57"   group by Commune');

function genererListe3($conn3)
{
    $label = [];
    $valeur = [];
    $nb_objet=[];
    while ($row = $conn3->fetch()) {
        // Ajoutez la première colonne (indice 0) à la liste
        $label[] = $row["Commune"];
        $valeur[] = $row["Pourcentage_dobjet_perdu"];
        $nb_objet[] = $row["nb_objetperdu"];
    }
    return (object) array('label' => $label, 'values' => $valeur,'objet'=>$nb_objet); 
}



$liste4 = genererListe3($unbufferedResult);


$label3 = $liste4->label;
$values3 = $liste4->values;
$objet=$liste4->objet;
?>
  