<?php  

if(isset($_GET['auto'])){
	$automod = true;
}else{
	$automod = false;
}

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
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <title><?= $data->prenom . ' ' .$data->nom.' : '.$data->titre ?> | Poster-ité</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="assets/vendor/leaflet.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendor/leaflet.js"></script>
    <script src="assets/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/vendor/jquery-ui.js"></script>
    <script>
        
        var automod = <?= $automod==true ? "true\n" : "false\n" ?>
        var dossier = '<?= $dossier ?>'
        var images  = <?= json_encode($data->images) ?>
        
        var maxZoom = <?= count(GLOB($dossier."/affiche/*")) - 1  ?> 

    </script>
    <script src="assets/js/script.js"></script>
  </head>
  <body>

	<nav>
		<h1><a href="index.php">Poster-ité</a></h1>
		<span><?= $data->nom?></span>
		<button><?= $data->titre?> <span class="close">[x]</span></button>
	</nav>
    <div id="about">
      <p><?= $data->description ?></p>
    </div>
    <div id="map"></div>
    <div id="cadre"></div>
  </body>
</html>
