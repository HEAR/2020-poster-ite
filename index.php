<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Poster-ité</title>
	<link rel="stylesheet" href="assets/css/style.css">
    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>

	<nav>
		<h1></h1>
		<button>à propos</button>
	</nav>
	

	<div id="about">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis illum maiores ut assumenda impedit, corrupti, numquam explicabo, eius obcaecati quis cumque in temporibus natus consequatur nostrum ab sed qui perferendis.<br>Odio temporibus error voluptatum magni nemo soluta harum nulla quas numquam! Quam amet harum, esse reprehenderit voluptas illum asperiores sapiente molestias, ducimus quaerat! Iusto, porro, ipsum. Recusandae dolor, esse veritatis.</p>
	</div>

	<main>

	<?php foreach (GLOB("projets/*") as $key => $dossier) : ?>

		<!-- <?= $dossier?> -->
		
		<section>
			<div class="front">
				<a href="projet.php?projet=<?= $dossier?>">
					<img src="<?= $dossier?>/vignette.jpg" alt="">
				</a>
			</div>
			<div class="back">
				<h2>nom</h2>
				<h3>titre</h3>
			</div>
		</section>

	<?php endforeach; ?>
	</main>



</body>
</html>