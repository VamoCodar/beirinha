<?php get_header(); ?>


		 <div class="back-button-p">  <p class="botao-back" onclick="history.back();">< <?php _e("VOLTAR","takemedia")?></p></div>
				<div class="produtos">
                    <div class="col-lg-12">
                    <div class="text-left uppercase">

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" class="pro-icon">
                            <g fill="#78102B" fill-rule="evenodd">
                                <circle cx="5.5" cy="16.5" r="5.5"/>
                                <circle cx="26" cy="16.5" r="5.5"/>
                                <circle cx="16" cy="5.5" r="5.5"/>
                                <circle cx="16" cy="27.5" r="5.5"/>
                            </g>
                        </svg>

                               <h2 class="home-title text-dark"><span class="subtitle-home"><?php _e("Lojas","sogarrafas")?> </span>   </h2> <h3 class="subtitle-home">Conheça todas as nossas lojas </h3>
                            </div>

                    </div>
                </div>
                <div class="row mt-12 lojas-filter ">
				
				<?php
       
           
            if (have_posts()) : while (have_posts()) :the_post(); ?>  

                    <div class="col-lg-4  lojas-item">
		               
					<div class="box-lojas">
					        <div class="lojas-box">
								<div class="text-lojas">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" class="loja-icon">
                                        <g fill="#78102B" fill-rule="evenodd">
                                            <circle cx="5.5" cy="16.5" r="5.5"/>
                                            <circle cx="26" cy="16.5" r="5.5"/>
                                            <circle cx="16" cy="5.5" r="5.5"/>
                                            <circle cx="16" cy="27.5" r="5.5"/>
                                        </g>
                                    </svg>

                                     <h2><?php the_title() ?></h2>     
                                </div>
                                <div class="lojas-content">
									<?php the_content();?> 
                                </div>
                            </div>

                    </div>
				        
                    </div>
					
			<?php $i++;  endwhile; wp_reset_postdata(); endif; ?>
                </div>




<div id="mapid"> </div>


<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/leaflet.js"></script>
<script>
var arrayOfLatLngs=[];
   <?php 
	$args = array('post_type' => 'lojas',
					'orderby' => 'post_date', 
					'order' => 'DES',
					'posts_per_page' => -1 );
	$homenews = new WP_Query($args);
	$i = 0; 
	if ($homenews->have_posts()) : while ($homenews->have_posts()) : $homenews->the_post(); ?>  
	
	arrayOfLatLngs.push([<?php echo get_post_meta(get_the_ID(), 'mapa', true); ?>]);
   
      <?php $i++;  endwhile; wp_reset_postdata(); endif; ?>

	var bounds = new L.LatLngBounds(arrayOfLatLngs);
	var map = L.map('mapid',{scrollWheelZoom:false}).fitBounds(bounds);
	//setView([37.138086, -8.536796], 12);    
   //L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png').addTo(map);
   L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.{ext}', {

    ext: 'png'
  }).addTo(map);
   

    var markicon = L.icon({
     iconUrl: '<?php bloginfo( 'template_url' ); ?>/images/mark-icon.svg',
     iconSize: [], // size of the icon
     popupAnchor: [0,-15]
     });
	 
    // create popup contents
	<?php 
	$args = array('post_type' => 'lojas',
					'orderby' => 'post_date', 
					'order' => 'DES',
					'posts_per_page' => -1 );
	$homenews = new WP_Query($args);
	$i = 0; if ($homenews->have_posts()) : while ($homenews->have_posts()) : $homenews->the_post(); ?>  
   
    // create marker object, pass custom icon as option, pass content and options to popup, add to map
    L.marker([<?php echo get_post_meta(get_the_ID(), 'mapa', true); ?>], {icon: markicon}).addTo(map);
   
      <?php $i++;  endwhile; wp_reset_postdata(); endif; ?>

	 
	
	
	

</script>

<?php get_footer(); ?>