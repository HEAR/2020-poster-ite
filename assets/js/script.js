var dureeAutoMode = 5000

function init() {
	var mapMinZoom = 0
	var mapMaxZoom = 6
	var map = L.map('map', {
		maxZoom: mapMaxZoom,
		minZoom: mapMinZoom,
		crs: L.CRS.Simple
	}).setView([0, 0], mapMaxZoom)

	var xy = function(x, y) {
		return map.unproject( [x, y], map.getMaxZoom() )
	}

	var mapBounds = new L.LatLngBounds(
		map.unproject([0, 10240], mapMaxZoom),
		map.unproject([7168, 0], mapMaxZoom))

	map.fitBounds(mapBounds)
	L.tileLayer(dossier + '/affiche/{z}/{x}/{y}.png', {
		minZoom: mapMinZoom, maxZoom: mapMaxZoom,
		bounds: mapBounds,
		noWrap: true          
	}).addTo(map)


	let markers = new Array()

	images.forEach( image => {
		markers.push(
			L.circleMarker( xy(image.x,image.y),{
				stroke: false,
				fill: 'blue',
				opacity: 1,
				fillOpacity: 1,
				radius: 5
			}  )
			.addTo(map)
			.on('click',function(){

				let closeBtn = $("<button>[x]</button>").click(function(event){
					$(this).parent().remove()
				})

				var largeur = Math.random()* ($('body').width()*2/3 )

				let cadre = $("<div class='cadre'>")
				.width( largeur )
				.css('top', Math.random() * $('body').height() / 2)
				.css('left', Math.random() * ( $('body').width() - largeur ) )
				.append( `<img src="${dossier}/images/${image.fichier}" >` )
				.append( closeBtn )
				.draggable({
					stack: ".cadre"
				})

				console.log(cadre)

				$('#cadre').append(cadre)
			})
		)

	})

	if(automod){
		let clickId = 0

		
		// PROJET
		console.log("projet auto")
		let metro = setInterval(function(){
			if(clickId >= markers.length){
				clearInterval(metro)

				$("nav>button").trigger("click")
			}else{
				markers[clickId].fire('click')
				console.log("click",$(markers[clickId]))
			}
			clickId ++
		}, dureeAutoMode)
	}
}



$(function(){

	console.log( "POSTER-ITÉ > mode Auto : ", automod)

	$("#about, .close").hide()

	$("nav>button").click(function(){
		$("#about").toggle()
		$(this).find(".close").toggle()
		$("main, #map, #cadre, .cadre").toggleClass("hidden")
	})

	
	if( $('#map').length > 0 ){
		init()
	}

	if(automod && $('body').hasClass('home')){
		let clickId = 0
		// ACCUEIL
		console.log("home auto")
		let metro = setInterval(function(){
			$("section").removeClass('hover')
			if(clickId >= $("section").length){
				clearInterval(metro)

				$("nav>button").trigger("click")
			}else{
				$("section").eq(clickId).addClass('hover')
				console.log("over",$("section").eq(clickId))
			}
			clickId ++
		}, dureeAutoMode)
	}
})