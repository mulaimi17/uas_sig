<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $setting->nama_app }}</title>
        <!-- Favicon -->
        <!-- <link rel="shortcut icon" type="image/x-icon" href="{{'/storage/favicon/favicon.png'}}" /> -->
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
                <style>
                    body,html {
                        font-family: 'Nunito', sans-serif;
                        padding: 0px;
                        margin: 0px;
                        height: 100%;
                    }
                    #map { height: 100%; }
                </style>
            </head>
            <body>
                <div id="map"></div>
                <nav class="navbar fixed-top navbar-light" style="background-color: #3e4676;padding:.1rem 1rem">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('storage/logo/' . $setting->logo) }}", width="30">
                        {{ $setting->nama_app }}
                    </a>
                </nav>
                
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('js/geojeson') }}/kelurahan prapen.js" type="text/javascript"></script>
    <!-- <script src="{{asset('js/geojeson') }}/Kelurahan sasake.js" type="text/javascript"></script> -->
    <!-- <script src="{{asset('js/geojeson') }}/lomboktengah.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/semayan.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/batunyala.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/lajut.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/batu jai.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/praya.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/prayabarat.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/prayabaratdaya.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/prayatengahh.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/prayatimur.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/pringgarata.js" type="text/javascript"></script>
    <script src="{{asset('js/geojeson') }}/pujut.js" type="text/javascript"></script> -->
    <script type="text/javascript">

   	//add map utama
	var mymap = L.map('map').setView([-8.7101231,116.2861788], 13);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(mymap);

	var marker1 = L.marker([-8.7334687,116.2721517]).addTo(mymap)
		.bindPopup("<b>Ini adalah Titik</b><br />kelurahan sasake.").openPopup();
	var popup = L.popup();




		function onEachFeature(feature, layer) {
		var popupContent = "<p>Selamat datang di, kelurahan sasake!</p>";

		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}

	L.geoJSON([keluarahan_sasake], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		},

		onEachFeature: onEachFeature,

		pointToLayer: function (feature, latlng) {
			return L.circleMarker(latlng, {
				radius: 8,
				fillColor: "#ff7800",
				color: "#000",
				weight: 1,
				opacity: 1,
				fillOpacity: 0.8
			});
		}
	}).addTo(mymap);

	var streets  = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            id: 'mapbox.streets',   
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });
        var satelit = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            id: 'mapbox.streets',
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            });

	var baseLayers = {
		"Streets": streets,
        "Satelite" : satelit
	};

	var mapIcon = L.Icon.extend({
	    iconSize:     [32, 37]
	});
	var sekolahIcon =  new mapIcon({iconUrl: "{{('asset/icon')}}/school.png"});

	//##############################################//
	// TAMAN BERMAIN
	//##############################################//
	var sekolah = L.marker([-8.7045539, 116.2712998],{icon: sekolahIcon}).bindPopup("SDN SASAKE <img src='img/SD sasake.jpg' alt='sdn sasake' width='350px'/>");
	


	var sekolah = L.layerGroup([sekolah]);
	
	var ooverlays = {
		"sekolah " : sekolah
	};
    L.control.layers(baseLayers, ooverlays).addTo(mymap);


	  //Layer Group
                    @foreach ($kategori as $row)
                    const  {{ strtolower(str_replace(' ', '_', $row->kategori)) }} = L.layerGroup();
                    @endforeach
                    const overlays = {
                        @foreach ($kategori as $row)
                        '{{ $row->kategori }}': {{ strtolower(str_replace(' ', '_', $row->kategori)) }},
                        @endforeach
                    };
                    @foreach ($lokasi as $lok)
                        const {{ strtolower(str_replace(' ', '_', preg_replace('~\P{L}+~u', '', $lok->nama_lokasi))) }} = L.marker([{{ $lok->latitude }},{{ $lok->longitude }}]).bindPopup('<h3>{{ $lok->nama_lokasi }}</h3>' 
                        + '<br><img src="{{ asset('storage/lokasi/' . $lok->gambar) }}", width="300" style="text-center">'
                        + '<p>{{ preg_replace('~\P{L}+~u', ' ', $lok->diskripsi)}}</p>').addTo({{ strtolower(str_replace(' ', '_',$lok->kategori))}});
                    @endforeach

                    
                    const layerControl = L.control.layers(baseLayers, overlays).addTo(map);;


    </script>

    </body>
</html>
