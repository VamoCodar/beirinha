<div class="menu-filtro">
    <div class="container inner-filter">

        <div class="row small text-white padding-filter" onclick="toggleMenu()">



           <div class="col-md-3 text-center"> 
                <a href="#" class="product-filter-link no-decoration"> 
                    <span class="text-noto-normal text-light">Estilo</span> <span class="icon icon-vinha-arrow-bold small"></span> </a>
            </div>

            <div class="col-md-3 text-center"> 
                <a href="#" class="product-filter-link no-decoration"> 
                    <span class="text-noto-normal text-light">Região</span> <span class="icon icon-vinha-arrow-bold small"></span> </a>
            </div>

            <div class="col-md-3 text-center"> 
                <a href="#" class="product-filter-link no-decoration"> 
                    <span class="text-noto-normal text-light">Tipo</span> <span class="icon icon-vinha-arrow-bold small"></span> </a>
            </div>


            <div class="col-md-3 text-center"> 
                <a href="#" class="product-filter-link no-decoration"> 
                    <span class="text-noto-normal text-light">Preço</span> <span class="icon icon-vinha-arrow-bold small"></span> </a>
            </div>



        </div>

        <ul id="menu-box" style="display: none">
        
        <?php
 
 if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
     <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
     <?php dynamic_sidebar( 'custom-header-widget' ); ?>
     </div>
      
 <?php endif; ?>
        </ul>
        
    </div>
</div>