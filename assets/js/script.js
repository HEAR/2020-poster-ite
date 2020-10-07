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

	map.fitBounds(mapBounds);
	L.tileLayer(dossier + '/affiche/{z}/{x}/{y}.png', {
		minZoom: mapMinZoom, maxZoom: mapMaxZoom,
		bounds: mapBounds,
		attribution: 'Rendered with <a href="http://www.maptiler.com/">MapTiler</a>',
		noWrap: true          
	}).addTo(map)


	let markers = new Array()

	images.forEach( image => {
		console.log(image)

		markers.push(
			L.marker( xy(image.x,image.y)  )
			.addTo(map)
			.on('click',function(){
				$("#cadre")
				.empty()
				.append( `<img src="${dossier}/images/${image.fichier}" >` )
				.show()

			}
		))

	})

	
}





$(function(){

	$("#cadre, #about").hide()

	$("nav>button").click(function(){
		$("#about").toggle()
	})

	$("section")
	.mouseenter(function(event){
		$(this).addClass( "is-flipped" )
	})
	.mouseleave(function(event){
		$(this).removeClass( "is-flipped" )
	})

	$("#cadre").click(function(event){
		$(this).hide()

		event.stopEventPropagation()
	});

	console.log("ok")
	// console.log(images)
	// 
	
	if($('#map').length > 0){
		init()
	}

})