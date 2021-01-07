<?php
/*
Template Name: Sobre Nós
*/

get_header();?>

<div class="container sobre-container">
    <div class="row mt-5">

        <div class="text-sobre">
            <h2 class="mb-4"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>

</div>

<div class="mapa mt-5">
    <div id="mapid" style="width: 100%; height: 400px;"></div>
</div>

<script>

	var mymap = L.map('mapid').setView([51.505, -0.09], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=sk.eyJ1IjoicGVkcm9ocGltZW50YSIsImEiOiJja2ptYnR6MGgyYm1zMnJsb2V4Mm5kY2lwIn0.r6q85c6UZkRKDfNgHBU-MQ', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

</script>

<?php get_footer(); ?>