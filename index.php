<?php 

if(isset($_GET['auto'])){
	$automod = true;
}else{
	$automod = false;
}

 ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Poster-ité</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="assets/vendor/leaflet.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendor/leaflet.js"></script>
    <script src="assets/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/vendor/jquery-ui.js"></script>
	<script>
		
		var automod = <?= $automod==true ? "true\n" : "false\n" ?>

	</script>
    <script src="assets/js/script.js"></script>
</head>
<body class="home">

	<nav>
		<h1>Poster-ité</h1>
		<span>HEAR Strasbourg</span>
		<button>à propos <span class="close">[x]</span></button>
	</nav>
	

	<div id="about">
		<p>L’atelier de Communication graphique de la Haute école des arts du Rhin (<a href="http://hear.fr" target="_blank">HEAR</a>) a pour vocation l’émergence de personnalités singulières dans le domaine du graphisme et forme plus généralement des auteurs dans les professions liées à la création visuelle, au sens le plus large. Les enseignements permettent à l’étudiant·e de se situer par rapport à ces métiers en perpétuelle évolution de la manière la plus contemporaine tout en étant nourris par l’histoire et les enjeux théoriques de la discipline et des champs artistiques connexes.</p>
		<p>L'exposition au Tri postal de Lille présente une série d'affiches accompagnée d'un site web réalisés par les diplômé·es de la promotion 2020.</p>
		<p>Exposition Émergences, Design is capital, Lille 10.10.2020→18.10.2020</p>
		<p>Coordination de l'exposition et du site web : Julie Bassinot, Lucie Clause✨, Marie Damageux✨, Loïc Horellou, Chani Pouzet.</p>
	</div>

	<main>

	<?php 

	$liste = GLOB("projets/*");
	shuffle($liste);

	foreach ( $liste as $key => $dossier ) : ?>

		<!-- <?= $dossier?> -->
		<?php if( is_file("$dossier/vignette.jpg") ) : ?>
		<section>
			<a href="projet.php?projet=<?= $dossier?>">
			<div class="card">
				<div class="side front">
					<img src="<?= $dossier?>/vignette.jpg" alt="">
				</div>
				<div class="side back">
					
					<?php $data = json_decode(file_get_contents("$dossier/data.json")) ?>

					<h2><?= $data->nom ?></h2>
					<h3><?= $data->titre ?></h3>
				</div>
			</div>
			</a>
		</section>
		<?php endif; ?>

	<?php endforeach; ?>
	</main>

</body>
</html>