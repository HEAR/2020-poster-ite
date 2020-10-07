<?php  

if(!empty($_GET['projet'])){
  $dossier = $_GET['projet'];
}else{
  $dossier = "";
}

$data = new StdClass();
if(is_file($dossier.'/data.json')){
  $data = json_decode( file_get_contents( $dossier.'/data.json') );
}


?><!DOCTYPE html>
<html>
  <head>
    <title><?= $data->nom.' : '.$data->titre ?> | Poster-ité</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        
        var dossier = '<?= $dossier ?>'
        var images = <?= json_encode($data->images) ?>

    </script>
    <script src="assets/js/script.js"></script>
  </head>
  <body>

	<nav>
		<h1><a href="index.php">Poster-ité</a></h1>
		<button>à propos de <?= $data->titre?></button>
	</nav>
    <div id="about">
      <p><?= $data->description ?></p>
    </div>
    <div id="map"></div>
    <div id="cadre"></div>
  </body>
</html>
