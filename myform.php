<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simulateur Energie Solaire SUNBERRY</title>
    <meta name="description" content="A free HTML template and UI Kit built on Bootstrap">
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass">
    <meta name="author" content="Peter Finlan and Taty Grassini Codrops">
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon/favicon-32x32.png"
      sizes="32x32">
    <link rel="icon" type="image/png" href="./assets/img/favicon/android-chrome-192x192.png"
      sizes="192x192">
    <link rel="icon" type="image/png" href="./assets/img/favicon/favicon-96x96.png"
      sizes="96x96">
    <link rel="icon" type="image/png" href="./assets/img/favicon/favicon-16x16.png"
      sizes="16x16">
    <link rel="manifest" href="./assets/img/favicon/manifest.json">
    <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="./assets/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="./assets/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
  </head>
<body>
    <!-- Navigation
    ================================================== -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-inverse-custom">
      <div class="container">&nbsp; <a class="navbar-brand mr-auto" href="#"> <span
            class="sr-only">Land.io</span> </a>
        <div class="hidden-md-up"> <a class="navbar-toggler collapsed" data-toggle="collapse"
            href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">
            <div class="sr-only">Toggle mobile navigation</div>
          </a> </div>
        <div id="collapsingNavbar" class="collapse navbar-toggleable-custom">
          <ul class="nav navbar-nav navbar-nav-transparent float-right">
            <li class="nav-item nav-item-toggable"> <a class="nav-link" href="./index-carousel.html">Slides</a>
            </li>
            <li class="nav-item nav-item-toggable"> <a class="nav-link" href="./ui-elements.html">UI
                Kit</a> </li>
            <li class="nav-item nav-item-toggable"> <a class="nav-link" href="https://github.com/tatygrassini/landio-html"
                target="_blank" rel="nofollow">GitHub</a> </li>
            <li class="nav-item nav-item-toggable hidden-md-up">
              <form class="navbar-form"> <input class="form-control navbar-search-input"
                  placeholder="Type your search &amp; hit Enter…" type="text"> </form>
            </li>
            <li class="navbar-divider hidden-md-down" aria-hidden="true"><br>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Hero Section
    ================================================== -->
    <header class="jumbotron bg-dark d-md-flex flex-md-column justify-content-md-center align-items-md-center"
      role="banner">
      <div class="text-center">
        <h1 class="display-3">Sunberry</h1>
        <h2 class="m-b-lg">Simulateur Solaire</h2>
        <h2 class="mb-5"></h2>
        <a class="btn btn-outline-light btn-lg btn-outline-light mb-4 mb-md-0" href="#content"
          role="button">Résultats</a> </div>
    </header>	
    <!-- Intro
    ================================================== -->
    <section class="section-intro bg-light text-center">
		<a name="content"></a>
      <div class="container">
        <h3 class="wp wp-1">Simulez l'énergie solaire disponible pour votre habitation</h3>
        <p class="lead wp wp-2">Notre simulateur vous inquide l'énergie que vous pourrez collecter grâce à vos panneaux solaires thermiques Sunberry. Il tient compte de la position de votre habitation et du relief alentours (colinnes, montagnes) pour une très grande précision. <b>Les valeurs affichées sont des moyennes, elles tiennent compte des jours sans soleil, nuageux, pluvieux et des températures hivernales.</b></p>

Email: <?php echo $_POST['email']; ?><br />
<br />

Latitude: <?php echo $_POST['lat']; ?><br />
Longitude: <?php echo $_POST['lon']; ?><br />
Pente: <?php echo $_POST['pente']; ?><br />
Orientation: plein Sud<br />

<?php
$lat = floatval($_POST['lat']);
$lon = floatval($_POST['lon']);
$pente = floatval($_POST['pente']);

$somme = $lat + $lon;

$url = 'http://re.jrc.ec.europa.eu/pvgis5/MRcalc.php?lon='.$lon.'&lat='.$lat.'&angle='.$pente.'&startyear=2015&selectrad=1';
$pvgis = file_get_contents($url);

preg_match("/Jan\t\t(.+)/", $pvgis ,$matches);
$jan = $matches[1];
preg_match("/Feb\t\t(.+)/", $pvgis ,$matches);
$feb = $matches[1];
preg_match("/Mar\t\t(.+)/", $pvgis ,$matches);
$mar = $matches[1];
preg_match("/Apr\t\t(.+)/", $pvgis ,$matches);
$apr = $matches[1];
preg_match("/May\t\t(.+)/", $pvgis ,$matches);
$may = $matches[1];
preg_match("/Jun\t\t(.+)/", $pvgis ,$matches);
$jun = $matches[1];
preg_match("/Jul\t\t(.+)/", $pvgis ,$matches);
$jul = $matches[1];
preg_match("/Aug\t\t(.+)/", $pvgis ,$matches);
$aug = $matches[1];
preg_match("/Sep\t\t(.+)/", $pvgis ,$matches);
$sep = $matches[1];
preg_match("/Oct\t\t(.+)/", $pvgis ,$matches);
$oct = $matches[1];
preg_match("/Nov\t\t(.+)/", $pvgis ,$matches);
$nov = $matches[1];
preg_match("/Dec\t\t(.+)/", $pvgis ,$matches);
$dec = $matches[1];

$kwhfioul = 10.4;
$prixkwh = 0.76;
$surface = 10;
$rendsun = 0.5;
$rendphoto = 0.14;
$prixkwhrachat = 0.2354;
$prixm2photovolt = 200;
$prixm2sunb = 15;
?>

<br />RECAPITULATIF<br />

<table style="width:100%">
  <tr bgcolor="#ddd">
    <th colspan="2"><center><p style="font-size:40px">Production d'Energie<p>10m² de panneaux Sunberry (coût de fabrication 160€)</center></th>
  </tr>
  <tr bgcolor="#ea6153">
    <th colspan="2"><center>
		<p style="font-size:40px"><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?> kWh/an</p>
		<p></p>
		<p><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul/an</br><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros/an</p>
	</center></th>  
  </tr>  
  <tr>
    <td bgcolor="#ddd"><center>
		<p style="font-size:40px">Eté</p>
		Mai à Speptembre</br>
	</center></td> 
	<td bgcolor="#ddd"><center>
		<p style="font-size:40px">Hiver</p>
		Octobre à Avril</br>
	</center></td>   
  </tr> 
  <tr>
    <td bgcolor="#FF9400"><center>
		</br>Litres d'eau à 50°C / jour</br><p style="font-size:40px"><?php echo number_format((($may+$jun+$jul+$aug+$sep)*$rendsun*$surface)/0.001162/35/150, 0, '.', ''); ?> litres/jour</p>
		<p></p>
		<p><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul/été</br><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros/été</p>
	</center></td> 
	<td bgcolor="#4BB5FC"><center>
		</br>Litres d'eau à 50°C / jour</br><p style="font-size:40px"><?php echo number_format((($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface)/0.001162/35/210, 0, '.', ''); ?> litres/jour</p>
		<p></p>
		<p><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul/hiver</br><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros/hiver</p>
	</center></td>   
  </tr>   

</table> 

<br /><br />
<b><?php echo $surface; ?> m² de panneaux Sunberry (Soit 4 grands panneaux pour un coût total de 160€)</b> produiront <?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?> kWh chaque année. Ceci équivaut à l'énergie contenue dans <?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul, <b>soit <?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros</b> par an.<br /><br />
Cette production se répartie comme suit :<br />
- Hiver (Octobre à Avril) : <?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface; ?> kWh équivalent à <?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul, <b>soit <?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros</b> par an.<br />
Cette énergie permet de chauffer en moyenne <b><?php echo number_format((($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface)/0.001162/35/210, 0, '.', ''); ?> litres d'eau à 50°C</b> chaque jour.<br />
- Eté (Mai à Septembre) : <?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun*$surface; ?> kWh équivalent à <?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?>  litres de fioul, <b>soit <?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros</b> par an.<br />
Cette énergie permet de chauffer en moyenne <b><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$surface/0.001162/35/150, 0, '.', ''); ?> litres d'eau à 50°C</b> chaque jour.<br />
<br />
Inclinaison des panneaux idéale : 60° l'hiver, 45° au printemps, 20° l'été, tournés face au Sud.
<br /><br />
Pour chauffer un logement l'hiver, choisir un angle de 60° ou ajouter des panneaux pour compenser.<br />
Pour produire de l'eau chaude sanitaire toute l'année, choisir un angle de 45° ou ajouter des panneaux pour compenser.<br />
Pour chauffer une piscine l'été, choisir un angle de 20° ou posez vos panneaux à plat au sol.<br />
Pour chauffer un Spa, adaptez l'angle à la saison d'utilisation.<br />

<br />ENERGIE SOLAIRE TOTALE DISPONIBLE<br />
Total de l'énergie solaire disponible
<br /><br />


 <table style="width:100%">
  <tr bgcolor="#ea6153">
    <th>2015</th>
    <th colspan="3">Energie par m²</th>
    <th colspan="3">Energie pour 10m²</th>
  </tr>
  <tr bgcolor="#ea9289">
    <th></th>
    <th>Energie (kWh/m²)</th>
    <th>Energie (litre pétrole/m²)</th>
    <th>Energie (Euros/m²)</th>
    <th>Energie (kWh)</th>
    <th>Energie (litre pétrole)</th>
    <th>Energie (Euros)</th>    
  </tr>  
  <tr >
    <td><center>Janvier</center></td>
    <td><center><?php echo $jan; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jan*$surface; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Fevrier</center></td>
    <td><center><?php echo $feb; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $feb*$surface; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Mars</center></td>
    <td><center><?php echo $mar; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $mar*$surface; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>  
  <tr>
    <td><center>Avril</center></td>
    <td><center><?php echo $apr; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $apr*$surface; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
      <tr>
    <td><center>Mai</center></td>
    <td><center><?php echo $may; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $may*$surface; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Juin</center></td>
    <td><center><?php echo $jun; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jun*$surface; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Juillet</center></td>
    <td><center><?php echo $jul; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jul*$surface; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Aout</center></td>
    <td><center><?php echo $aug; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $aug*$surface; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Septembre</center></td>
    <td><center><?php echo $sep; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $sep*$surface; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Octobre</center></td>
    <td><center><?php echo $oct; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $oct*$surface; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Novembre</center></td>
    <td><center><?php echo $nov; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $nov*$surface; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Décembre</center></td>
    <td><center><?php echo $dec; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $dec*$surface; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ANNEE</center></td>
    <td><center><?php echo $jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr> 
  <tr>
    <td><center>Total HIVER (Novembre à Avril)</center></td>
    <td><center><?php echo $jan+$feb+$mar+$apr+$oct+$nov+$dec; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ETE (Mai à Septembre)</center></td>
    <td><center><?php echo $may+$jun+$jul+$aug+$sep; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$surface; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>  
</table> 

</br><br />ENERGIE SOLAIRE COLLECTEE PAR LES PANNEAUX SUNBERRY<br />
Energie solaire collectée par nos panneaux en tenant compte de leur rendement de 50%
<br /><br />


 <table style="width:100%">
  <tr bgcolor="#27ae60">
    <th>2015</th>
    <th colspan="3">Energie par m²</th>
    <th colspan="3">Energie pour 10m²</th>
  </tr>
  <tr bgcolor="#6dd79a">
    <th></th>
    <th>Energie (kWh/m²)</th>
    <th>Energie (litre pétrole/m²)</th>
    <th>Energie (Euros/m²)</th>
    <th>Energie (kWh)</th>
    <th>Energie (litre pétrole)</th>
    <th>Energie (Euros)</th>    
  </tr>  
  <tr>
    <td><center>Janvier</center></td>
    <td><center><?php echo $jan*$rendsun; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jan*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Fevrier</center></td>
    <td><center><?php echo $feb*$rendsun; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $feb*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Mars</center></td>
    <td><center><?php echo $mar*$rendsun; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $mar*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>  
  <tr>
    <td><center>Avril</center></td>
    <td><center><?php echo $apr*$rendsun; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $apr*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
      <tr>
    <td><center>Mai</center></td>
    <td><center><?php echo $may*$rendsun; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $may*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Juin</center></td>
    <td><center><?php echo $jun; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jun*$surface; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Juillet</center></td>
    <td><center><?php echo $jul; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jul*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Aout</center></td>
    <td><center><?php echo $aug*$rendsun; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $aug*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Septembre</center></td>
    <td><center><?php echo $sep*$rendsun; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $sep*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Octobre</center></td>
    <td><center><?php echo $oct*$rendsun; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $oct*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Novembre</center></td>
    <td><center><?php echo $nov*$rendsun; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $nov*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Décembre</center></td>
    <td><center><?php echo $dec*$rendsun; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $dec*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ANNEE</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr> 
  <tr>
    <td><center>Total HIVER (Novembre à Avril)</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ETE (Mai à Septembre)</center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>  
</table>

</br><br />COMPARATIF SUNBERRY/PHOTOVOLTAIQUE<br />
Comparatif entre l'énergie collectée par les panneaux Sunberry et des panneaux photovoltaïques (rendement 14%)
<br /><br />

 <table style="width:100%">
  <tr bgcolor="#ff942c">
    <th>2015</th>
    <th>Sunberry</th>
    <th>Photovoltaïque</th>
  </tr>
  <tr bgcolor="#ff942c">
    <td></th>
    <td><?php echo $surface.'m² de panneaux = '.($prixm2sunb*$surface).' €uros'; ?></br>Hors installation - Système complet 350€</th>
    <td><?php echo $surface.'m² de panneaux = '.($prixm2photovolt*$surface).' €uros'; ?></br>Hors installation et matériel (onduleur, régulateur, cables)</th>
    <!- https://www.quelleenergie.fr/economies-energie/panneaux-solaires-photovoltaiques/prix-economies ->
  </tr>  
  <tr bgcolor="#feb064">
    <th></th>
    <th>Energie (kWh)</th>
    <th>Energie (kWh)</th>
  </tr>  
  <tr>
    <td><center>Total ANNEE</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendphoto*$surface; ?></center></td>   
  </tr> 
  <tr>
    <td><center>Total HIVER (Octobre à Avril)</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendphoto*$surface; ?></center></td>
  </tr>
  <tr>
    <td><center>Total ETE (Mai à Septembre)</center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendphoto*$surface; ?></center></td>  
  </tr>  
</table>

</br><br />NOS FORMATIONS<br />
<p><script data-selz-s="sunberrychauffagesolairediy" data-selz-cb="7959c7" data-selz-cbt="ffffff" data-selz-cl="7959c7" data-selz-chbg="7959c7" data-selz-chtx="ffffff">if (typeof _$elz === "undefined") { var _$elz = {}; } if (typeof _$elz.s === "undefined") { _$elz.s = { e: document.createElement("script") }; _$elz.s.e.src = "https://selz.com/embed/store/sunberrychauffagesolairediy"; document.body.appendChild(_$elz.s.e); }</script>
<noscript><a href="https://sunberrychauffagesolairediy.selz.com" target="_blank"></a></noscript></p>

      </div>
    </section>    

    <link rel="stylesheet" href="./assets/css/landio.min.css">
    <script src="./assets/js/plugins/jquery.min.js"></script>
    <script src="./assets/js/plugins/popper.min.js"></script>
    <script src="./assets/js/plugins/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="./assets/js/landio.js"></script>
    
<?php
ob_start();
?> 
<html>
<br />RECAPITULATIF<br />

<table style="width:100%">
  <tr bgcolor="#ddd">
    <th colspan="2"><center><p style="font-size:40px">Production d'Energie<p>10m² de panneaux Sunberry (coût de fabrication 160€)</center></th>
  </tr>
  <tr bgcolor="#ea6153">
    <th colspan="2"><center>
		<p style="font-size:40px"><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?> kWh/an</p>
		<p></p>
		<p><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul/an</br><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros/an</p>
	</center></th>  
  </tr>  
  <tr>
    <td bgcolor="#ddd"><center>
		<p style="font-size:40px">Eté</p>
		Mai à Speptembre</br>
	</center></td> 
	<td bgcolor="#ddd"><center>
		<p style="font-size:40px">Hiver</p>
		Octobre à Avril</br>
	</center></td>   
  </tr> 
  <tr>
    <td bgcolor="#FF9400"><center>
		</br>Litres d'eau à 50°C / jour</br><p style="font-size:40px"><?php echo number_format((($may+$jun+$jul+$aug+$sep)*$rendsun*$surface)/0.001162/35/150, 0, '.', ''); ?> litres/jour</p>
		<p></p>
		<p><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul/été - <?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros/été</p>
	</center></td> 
	<td bgcolor="#4BB5FC"><center>
		</br>Litres d'eau à 50°C / jour</br><p style="font-size:40px"><?php echo number_format((($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface)/0.001162/35/210, 0, '.', ''); ?> litres/jour</p>
		<p></p>
		<p><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul/hiver - <?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros/hiver</p>
	</center></td>   
  </tr>   

</table> 

<br /><br />
<b><?php echo $surface; ?> m² de panneaux Sunberry (Soit 4 grands panneaux pour un coût total de 160€)</b> produiront <?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?> kWh chaque année. Ceci équivaut à l'énergie contenue dans <?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul, <b>soit <?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros</b> par an.<br /><br />
Cette production se répartie comme suit :<br />
- Hiver (Octobre à Avril) : <?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface; ?> kWh équivalent à <?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?> litres de fioul, <b>soit <?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros</b> par an.<br />
Cette énergie permet de chauffer en moyenne <b><?php echo number_format((($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface)/0.001162/35/210, 0, '.', ''); ?> litres d'eau à 50°C</b> chaque jour.<br />
- Eté (Mai à Septembre) : <?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun*$surface; ?> kWh équivalent à <?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?>  litres de fioul, <b>soit <?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?> €uros</b> par an.<br />
Cette énergie permet de chauffer en moyenne <b><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$surface/0.001162/35/150, 0, '.', ''); ?> litres d'eau à 50°C</b> chaque jour.<br />
<br />
Inclinaison des panneaux idéale : 60° l'hiver, 45° au printemps, 20° l'été, tournés face au Sud.
<br /><br />
Pour chauffer un logement l'hiver, choisir un angle de 60° ou ajouter des panneaux pour compenser.<br />
Pour produire de l'eau chaude sanitaire toute l'année, choisir un angle de 45° ou ajouter des panneaux pour compenser.<br />
Pour chauffer une piscine l'été, choisir un angle de 20° ou posez vos panneaux à plat au sol.<br />
Pour chauffer un Spa, adaptez l'angle à la saison d'utilisation.<br />

<br />ENERGIE SOLAIRE TOTALE DISPONIBLE<br />
Total de l'énergie solaire disponible
<br /><br />


 <table style="width:100%">
  <tr bgcolor="#ea6153">
    <th>2015</th>
    <th colspan="3">Energie par m²</th>
    <th colspan="3">Energie pour 10m²</th>
  </tr>
  <tr bgcolor="#ea9289">
    <th></th>
    <th>Energie (kWh/m²)</th>
    <th>Energie (litre pétrole/m²)</th>
    <th>Energie (Euros/m²)</th>
    <th>Energie (kWh)</th>
    <th>Energie (litre pétrole)</th>
    <th>Energie (Euros)</th>    
  </tr>  
  <tr>
    <td><center>Janvier</center></td>
    <td><center><?php echo $jan; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jan*$surface; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Fevrier</center></td>
    <td><center><?php echo $feb; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $feb*$surface; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Mars</center></td>
    <td><center><?php echo $mar; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $mar*$surface; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>  
  <tr bgcolor="#ddd">
    <td><center>Avril</center></td>
    <td><center><?php echo $apr; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $apr*$surface; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
      <tr>
    <td><center>Mai</center></td>
    <td><center><?php echo $may; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $may*$surface; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Juin</center></td>
    <td><center><?php echo $jun; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jun*$surface; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Juillet</center></td>
    <td><center><?php echo $jul; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jul*$surface; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Aout</center></td>
    <td><center><?php echo $aug; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $aug*$surface; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Septembre</center></td>
    <td><center><?php echo $sep; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $sep*$surface; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Octobre</center></td>
    <td><center><?php echo $oct; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $oct*$surface; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Novembre</center></td>
    <td><center><?php echo $nov; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $nov*$surface; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Décembre</center></td>
    <td><center><?php echo $dec; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $dec*$surface; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ANNEE</center></td>
    <td><center><?php echo $jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr> 
  <tr bgcolor="#ddd">
    <td><center>Total HIVER (Novembre à Avril)</center></td>
    <td><center><?php echo $jan+$feb+$mar+$apr+$oct+$nov+$dec; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ETE (Mai à Septembre)</center></td>
    <td><center><?php echo $may+$jun+$jul+$aug+$sep; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$surface; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>  
</table> 

</br><br />ENERGIE SOLAIRE COLLECTEE PAR LES PANNEAUX SUNBERRY<br />
Energie solaire collectée par nos panneaux en tenant compte de leur rendement de 50%
<br /><br />


 <table style="width:100%">
  <tr bgcolor="#27ae60">
    <th>2015</th>
    <th colspan="3">Energie par m²</th>
    <th colspan="3">Energie pour 10m²</th>
  </tr>
  <tr bgcolor="#6dd79a">
    <th></th>
    <th>Energie (kWh/m²)</th>
    <th>Energie (litre pétrole/m²)</th>
    <th>Energie (Euros/m²)</th>
    <th>Energie (kWh)</th>
    <th>Energie (litre pétrole)</th>
    <th>Energie (Euros)</th>    
  </tr>  
  <tr>
    <td><center>Janvier</center></td>
    <td><center><?php echo $jan*$rendsun; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jan*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($jan/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jan*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Fevrier</center></td>
    <td><center><?php echo $feb*$rendsun; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $feb*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($feb/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($feb*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Mars</center></td>
    <td><center><?php echo $mar*$rendsun; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $mar*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($mar/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($mar*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>  
  <tr bgcolor="#ddd">
    <td><center>Avril</center></td>
    <td><center><?php echo $apr*$rendsun; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $apr*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($apr/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($apr*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
      <tr>
    <td><center>Mai</center></td>
    <td><center><?php echo $may*$rendsun; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $may*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($may/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($may*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Juin</center></td>
    <td><center><?php echo $jun; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jun*$surface; ?></center></td>
    <td><center><?php echo number_format($jun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Juillet</center></td>
    <td><center><?php echo $jul; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $jul*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($jul/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($jul*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Aout</center></td>
    <td><center><?php echo $aug*$rendsun; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $aug*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($aug/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($aug*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Septembre</center></td>
    <td><center><?php echo $sep*$rendsun; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $sep*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($sep/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($sep*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Octobre</center></td>
    <td><center><?php echo $oct*$rendsun; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $oct*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($oct/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($oct*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Novembre</center></td>
    <td><center><?php echo $nov*$rendsun; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $nov*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($nov/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($nov*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr bgcolor="#ddd">
    <td><center>Décembre</center></td>
    <td><center><?php echo $dec*$rendsun; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo $dec*$surface*$rendsun; ?></center></td>
    <td><center><?php echo number_format($dec/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format($dec*$prixkwh/$kwhfioul*$surface*$rendsun, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ANNEE</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr> 
  <tr bgcolor="#ddd">
    <td><center>Total HIVER (Novembre à Avril)</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>
  <tr>
    <td><center>Total ETE (Mai à Septembre)</center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul, 2, '.', ''); ?></center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun/$kwhfioul*$surface, 2, '.', ''); ?></center></td>
    <td><center><?php echo number_format(($may+$jun+$jul+$aug+$sep)*$rendsun*$prixkwh/$kwhfioul*$surface, 2, '.', ''); ?></center></td>    
  </tr>  
</table>

</br><br />COMPARATIF SUNBERRY/PHOTOVOLTAIQUE<br />
Comparatif entre l'énergie collectée par les panneaux Sunberry et des panneaux photovoltaïques (rendement 14%)
<br /><br />

 <table style="width:100%">
  <tr bgcolor="#ff942c">
    <th>2015</th>
    <th>Sunberry</th>
    <th>Photovoltaïque</th>
  </tr>
  <tr bgcolor="#ff942c">
    <td></th>
    <td><?php echo $surface.'m² de panneaux = '.($prixm2sunb*$surface).' €uros'; ?></br>Hors installation - Système complet 350€</th>
    <td><?php echo $surface.'m² de panneaux = '.($prixm2photovolt*$surface).' €uros'; ?></br>Hors installation et matériel (onduleur, régulateur, cables)</th>
    <!- https://www.quelleenergie.fr/economies-energie/panneaux-solaires-photovoltaiques/prix-economies ->
  </tr>  
  <tr bgcolor="#feb064">
    <th></th>
    <th>Energie (kWh)</th>
    <th>Energie (kWh)</th>
  </tr>  
  <tr>
    <td><center>Total ANNEE</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dec)*$rendphoto*$surface; ?></center></td>   
  </tr> 
  <tr bgcolor="#ddd">
    <td><center>Total HIVER (Octobre à Avril)</center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo ($jan+$feb+$mar+$apr+$oct+$nov+$dec)*$rendphoto*$surface; ?></center></td>
  </tr>
  <tr>
    <td><center>Total ETE (Mai à Septembre)</center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendsun*$surface; ?></center></td>
    <td><center><?php echo ($may+$jun+$jul+$aug+$sep)*$rendphoto*$surface; ?></center></td>  
  </tr>  
</table>

</br><br />NOS FORMATIONS<br />
<a href="http://sunberry.io/fr"><img src="http://sunberry.io/landio/formations-chauffage-solaire-sunberry.png"></a>

</br><br />
<p>Simulation de production d'énergie solaire SUNBERRY SIMUL fournie gratuitement par <a href="https://www.sunberry.io">https://www.sunberry.io</a></p>

<p><b>Soutenez Sunberry ! likez et abonnez vous, c'est le meilleur moyen de nous aider!</b></p>

<p>Facebook: <a href="https://www.facebook.com/sunberrychauffage">https://www.facebook.com/sunberrychauffage</a></p>
<p>Youtube: <a href="https://www.youtube.com/channel/UCjs4gTNzsI_Tiz-jQhMxdNA<">https://www.youtube.com/channel/UCjs4gTNzsI_Tiz-jQhMxdNA</a></p>
<p>Twitter: <a href="https://twitter.com/SunberryIO">https://twitter.com/SunberryIO</a></p>
<p>Instagram: <a href="https://twitter.com/SunberryIO">https://www.instagram.com/sunberry_sun/</a></p>

      </div>
    </section>    

    <link rel="stylesheet" href="./assets/css/landio.min.css">
    <script src="./assets/js/plugins/jquery.min.js"></script>
    <script src="./assets/js/plugins/popper.min.js"></script>
    <script src="./assets/js/plugins/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/jquery.waypoints.min.js"></script>
    <script src="./assets/js/landio.js"></script>     
</html>      
<?php
 $message = ob_get_clean();
?>

<?php
$visitor_email = $_POST['email'];
$email_from = 'contact@sunberry.io';
$email_subject = "Votre simulation solaire SUNBERRY";
$email_body = "Bonjour,\nVeuillez trouver ci dessous la simulation solaire pour votre habitation.\nPour toute question vous pouvez nous contacter en répondant simplement à cet email.\n</br></br></br>".$_POST['email']."</br>".$_POST['lat'].";".$_POST['lon']."</br>".$_POST['pente']."</br></br></br>".$message;
$to = $visitor_email.",sunberrysolar@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: contact@sunberry.io \r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
mail($to,$email_subject,$email_body,$headers);
?>
<?php
$visitor_email = $_POST['email'];
$email_from = 'contact@sunberry.io';
$email_subject = "Simulation";
$email_body = $_POST['email']." - <a href=\"https://www.google.com/maps/@?api=1&map_action=map&center=".$_POST['lat'].",".$_POST['lon']."&zoom=5\">map</a>";
https://www.google.com/maps/@?api=1&map_action=map&center=-33.712206,150.311941&zoom=12
$to = "sunberrysolar@gmail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: contact@sunberry.io \r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
mail($to,$email_subject,$email_body,$headers);
?>  
    
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-86206346-1', 'auto');
ga('send', 'pageview');</script>

</body>
</html>
