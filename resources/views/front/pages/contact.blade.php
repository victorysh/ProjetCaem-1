@extends('front.layouts.default')

@section('pageTitle')
CAEM - Contactez-nous
@endsection

@section('ogtags')
    @include('front.includes.og_tags', ['title' => 'CAEM Besançon École de musique - Contact'])
		{{-- you can precise title, type, url, image, description--}}
@stop

@section('pageContent')
<main class="container mainContact">


	<section class="col-md-6">
		<h2>Contactez nous :</h2>

		<h3>Horaires d'ouverture du bureau</h3>
		<p>Du lundi au jeudi : de 9h30 à 16h00</p>

		<h3>Adresse</h3>
		<p>13 A avenue Ile-de-France</p>
		<p>25000 Besançon</p>

		<h3>Téléphone</h3>
		<p>03.81.51.21.36</p>

		<h3>Email</h3>
		<p><a href="mailto:&#097;&#099;&#099;&#117;&#101;&#105;&#108;&#064;&#099;&#097;&#101;&#109;&#045;&#098;&#101;&#115;&#097;&#110;ç&#111;&#110;&#046;&#102;&#114;">&#097;&#099;&#099;&#117;&#101;&#105;&#108;&#064;&#099;&#097;&#101;&#109;&#045;&#098;&#101;&#115;&#097;&#110;ç&#111;&#110;&#046;&#102;&#114;</a></p>
	</section>


	<aside id="mapid" class="col-md-6"></aside>


</main>
@endsection


@section('pageScript')
<script>

	/*affichage de la map et définition du point d'arrivée sur la carte*/
	var mymap = L.map('mapid').setView([47.221299, 5.967714], 15);


	/*type de "tiles" pour la map, on peut en changer (skin)*/	L.tileLayer('https://api.mapbox.com/styles/v1/benoitm/ciy5sprke005d2rpb6dxry2ah/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYmVub2l0bSIsImEiOiJjaXk1c24ycGYwMDJwMzNyamhmaXc2dTNnIn0.065FxCTP4WiqVfnlubCMmA', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
		'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	id: 'mapbox.streets'
	}).addTo(mymap);


	var marker = L.marker([47.221299, 5.967714]).addTo(mymap);
	marker.bindPopup("<b>CAEM Besançon</b><br>13 A avenue Ile-de-France<br>25000 Besançon").openPopup();

</script>
@endsection
