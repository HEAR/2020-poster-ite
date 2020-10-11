<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
	<title>Poster-ité</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendor/jquery-3.5.1.min.js"></script>
    <script>
    	
		var urls = <?php  

			$liste = GLOB("projets/*");

			$urls[] = "index.php?auto";
			shuffle($liste);

			foreach($liste as $dossier){

				$urls[] = 'projet.php?auto&projet='.$dossier;

			}
			
			echo json_encode($urls)
		?>

		$(function(){

			console.log("POSTER-ITÉ > demo mode", urls)

			let metro = setInterval(openUrl, 50000)

			openUrl()
		})

		let id = 0

		function openUrl(){
			console.log("new page > ", urls[id])
			$("iframe").attr("src", urls[id])
			id = (id+1)%urls.length
		}



    </script>
</head>
<body>

	<iframe src="" frameborder="0"></iframe>
	
</body>
</html>