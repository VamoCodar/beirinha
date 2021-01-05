
<link href="<?php bloginfo( 'template_url' ); ?>/map.css" rel="stylesheet">
<?php 
/*
Template Name: Contactos
*/
get_header(); 
?>
<div class="clear"></div>
<div class="clear"></div>
<div class="page-contact text-light">
    <div class="pwidth">
        <div class="row">
            <div class="col-md-6 mg-bottom">
            <h1>Contactos</h1>
            <span class="scontact">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
                endwhile; else: ?>
            <?php endif; ?>
          </span>
 

            </div>
            <div class="col-md-6">

            <ul class="ml-auto ul-mobile no-padding-mb">
                        <div class="icon-footer"> <img src="<?php bloginfo( 'template_url');?>/images/map.svg" class="icons"> </div>
						<li class="nav-item">
                          <p class="ft-contacts text-light"> Rua das Atafonas Nº70 <br/>
                          5150-542 Vila Nova de Foz Côa </p>
                        </li> 
                        <div class="icon-footer"> <img src="<?php bloginfo( 'template_url');?>/images/phone.svg" class="icons"> </div>						
                        <li class="nav-item">
                          <p class="ft-contacts text-light">Tlf:. 919 668 900</p>
                        </li>  
                        <div class="icon-footer"> <img src="<?php bloginfo( 'template_url');?>/images/mail.svg" class="icons"> </div>                        
						<li class="nav-item">
                          <p class="ft-contacts text-light">geral.projsteel@gmail.com</p>
                        </li>     
                     </ul>

            </div>
        </div>
    </div>
</div>

<div class="full-content text-center">
    <div class="full-content2">
    <div class="gradient"></div>
        <div class="fale text-fale"> 
        <h2>Não perca mais tempo e fale connosco</h2> 
        <h3> Tornamos o seu sonho realidade.</h3>
        <a href="mailto:geral.projesteel@gmail.com"> <h4> Fale Connosco </h4> </a>
        </div>
    </div>
</div>

<div id="mapid"></div>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/leaflet.js"></script>
<script type="text/javascript">
       // MAP
       var map = L.map('mapid', {
    scrollWheelZoom: false
    }).setView([41.084494, -7.140893], 16);


    L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.{ext}', {
      minZoom: 0,
      maxZoom: 20,
      ext: 'png'
    }).addTo(map);


      var markicon = L.icon({
     iconUrl: '<?php bloginfo( 'template_url' ); ?>/images/mark-icon.svg',
     iconSize: [38, 95], // size of the icon
     popupAnchor: [0,-15]
     });
	 


    L.marker([41.084494, -7.140893], {icon: markicon}).addTo(map);
</script>
<?php get_footer(); ?>