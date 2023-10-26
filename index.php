
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="css/style_test.css" rel="stylesheet" type="text/css" />
  <link href="js/script.js" rel="codejs" type="text/javascript" />
  <link href="https://db.onlinewebfonts.com/c/a2d0496797fe97e7e6c9016d8de356de?family=Dapifer_Stencil_Blackbe677b9701_Regular" rel="stylesheet"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
  <link rel="icon" type="image/x-icon" href='d_cube_scan_icon_257072.ico'>
</head>
<header><img src="images/logouniv.png" alt="logo univ" /></header>
  
  <div class="entete">
    <h1>Nos graphiques</h1>
    <button type="button" onclick="toggle_box();"> Tout afficher </button>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script src="js/script.js"></script>
    <script src="js/graph1.js"></script>
    <script src="js/graph2.js"></script>
    <script src="js/graph3.js"></script>
    
    

  </div>
<body>
<?php
    include("php/graph1.php");
    $label=json_encode($label) ;   
    $values=json_encode($values) ; 
    include("php/graph2.php");
    $label2=json_encode($label2) ;
    $values2=json_encode($values2) ;  
    include("php/graph3.php");
    $label3=json_encode($label3) ;
    $values3=json_encode($values3) ;  
    $objet=json_encode($objet) ; 
    include("php/carte.php");
    $label4=json_encode($label4) ;
    $valeur_long=json_encode($valeur_long) ; 
    $valeur_lat = json_encode($valeur_lat)

?>



  <div class="graphiques">
    <details id="carte">
      <summary>Carte objets perdus du Grand Est</summary>
      <p class="description">
        Cette carte répresente toutes les gares du Grand Est ayant perdu un objet.
      </p> 
      <div id="map"></div>
      
    </details>
    <details id="Graph1">
      <summary>Courbe du nombre de gares en France</summary>
      <p class="description">
        Ce graphique répresente le nombre total de gares dans toute la France, les départements possédent en moyenne 40 gares. Le département de l'Ardeche est le département, qui posséde le moins de gares (2 gares). Le département du Nord, est le département où il y a le plus de gares (140 gares).

      </p>
      <canvas id="myChart"></canvas>

    </details>
    <details id="Graph2">
      <summary>Courbe du nombre d'objets perdus en fonction de l'heure</summary>
      <p class="description">
       Ce graphique représente le nombre d'objets perdus en fonction de l'heure. Nous pouvons voir que le moment de la journée où le plus d'objets ont été perdu est 11 heure.
      </p>
      <canvas id="myChart2"></canvas>
    </details>
    <details id="Graph3">
      <summary>Donut représentant le % d'objets perdus par gare du Grand-Est</summary>
      <p class="description">
        Ce graphique représente le pourcentage d'objets perdus par gare dans le departement 57. Nous pouvons nous apercevoir que Metz compte 94% des objets perdus du 57, Sarrebourg compte 0.3% dees objets perdus. Pour finir, Thionville compte 4% des objets perdus.

      </p>
      <canvas id="myChart3"></canvas>
    </details>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
  
  
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script src="js/script.js"></script>
    <script src="js/graph1.js"></script>
    <script src="js/graph2.js"></script>
    <script src="js/graph3.js"></script>

</body>
<script>
   affichergraph1(<?php echo $label?>,<?php echo $values?>)
      
   affichergraph2(<?php echo $label2  ?>,<?php echo $values2?>)
     
    affichergrahp3(<?php echo $label3;?>,<?php echo $values3;?>)
    recuperdonneeaffciher(<?php echo $objet?>)
 </script>
   

<footer>
  <div class="intitule">
    <p>SAE Programmation Web</p>
  </div>
  <div class="noms">
    <p>CARRILLO Théo</p>
    <p>ANDRIEN Kévin</p>
    <p>GOFFREDI Pablo</p>
  </div>
</footer>

</html>

