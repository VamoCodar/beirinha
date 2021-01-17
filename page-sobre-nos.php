<?php
/*
Template Name: Sobre Nós
*/

get_header();?>

<div class="container sobre-container">
	<div class="row">
		<div class="col-md-6">

			<div class="text-sobre">
				<h2 class="mb-4"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
		</div>    
		
		<div class="col-md-6">
		<?php $images = acf_photo_gallery('galeria', $post->ID); 
		
		if( count($images) <= 1){
		?>
		   <div class="grid-layout">
				<?php 
				$i = 1;
				if( count($images) ):
				  //Cool, we got some data so now let's loop over it
				  foreach($images as $image):
					  $id = $image['id']; // The attachment id of the media
					  $title = $image['title']; //The title
					  $caption= $image['caption']; //The caption
					  $full_image_url= $image['full_image_url']; //Full size image url
					  $full_image_url = acf_photo_gallery_resize_image($full_image_url, 650, 560); //Resized size to 262px width by 160px height image url
				 
				  ?>		

					  <div class="grid-item grid-item-1 span-<?php echo $i; ?>">
						 
							  <img class="img-about img<?php echo $i; ?>" src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
					   
					  </div>

					  <?php $i++; endforeach; endif; ?> 

			 </div>
			 <?php }else{ ?>

			 <div id="galeria" class="owl-carousel owl-theme about-img">
						
				<?php $images = acf_photo_gallery('galeria', $post->ID); 
				if( count($images) ):
					//Cool, we got some data so now let's loop over it
					foreach($images as $image):
						$id = $image['id']; // The attachment id of the media
						$title = $image['title']; //The title
						$full_image_url= $image['full_image_url']; //Full size image url
						$alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
						$full_image_url = acf_photo_gallery_resize_image($full_image_url, 650, 560); //Resized size to 262px width by 160px height image url

				?>
				<img src="<?php echo $full_image_url; ?>">
			
				<?php endforeach; endif; ?>
			</div>
			
			<?php } ?>


		</div>

	</div>
	   <link href="<?php bloginfo( 'template_url' ); ?>/css/map.css" rel="stylesheet">
	
</div>
</div>
</div>

<div id="mapid"></div>



<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/leaflet2.js"></script>

<script>

    // MAP
    var map = L.map('mapid', {
    scrollWheelZoom: false
}).setView([40.231143, -7.510231], 16);

L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png').addTo(map);


var markicon = L.icon({
     iconUrl: '<?php bloginfo( 'template_url' ); ?>/images/mark-icon.svg',
     iconSize: [38, 95], // size of the icon
     popupAnchor: [0,-15]
     });
	 

       // create marker object, pass custom icon as option, pass content and options to popup, add to map
    L.marker([40.231143, -7.510231], {icon: markicon}).addTo(map);





</script>

<?php get_footer(); ?>