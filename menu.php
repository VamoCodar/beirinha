<ul id="menu">		    

    <li class="menuiten">
    <a href="<?php bloginfo('wpurl'); ?>/produtos" class="<?php if(strrpos($_SERVER['REQUEST_URI'],'produtos')) echo "active"; ?>"><?php _e("Produtos","sogarrafas")?></a>
    </li>
    <li class="menuiten">
    <a href="<?php bloginfo('wpurl'); ?>/campanhas/" class="<?php if(strrpos($_SERVER['REQUEST_URI'],'campanhas')) echo "active"; ?>"><?php _e("Campanhas","sogarrafas")?></a>			
    </li>		    

    <!--<li class="menuiten">
    <a href="<?php bloginfo('wpurl'); ?>/noticias/" class="<?php if(strrpos($_SERVER['REQUEST_URI'],'noticias')) echo "active"; ?>"><?php _e("Notícias","sogarrafas")?></a>			
    </li>-->

                         <?php //langlist() ?>	 

                        <div class="search-box__input">
							
							<form action="<?php echo home_url(); ?>" id="search-form" method="get">
							<label>
							<img src="<?php bloginfo('template_url');?>/images/search-icon.svg" class="search-icon"/>
								<input type="text" class="search-field" name="s" id="s" value="Pesquise aqui..." onblur="if(this.value=='')this.value='Pesquise aqui...'"
									onfocus="if(this.value=='Pesquise aqui...')this.value=''" />
								<input type="hidden" value="submit" />
								</label>
							</form>
		
						</div>
                           

    <li class="menuiten menu-right">
    <a href="<?php bloginfo('wpurl'); ?>/contactos" class="<?php if(strrpos($_SERVER['REQUEST_URI'],'contactos')) echo "active"; ?>"><?php _e("Contactos","sogarrafas")?></a>
    </li>

    <li class="menuiten menu-right">
    <a href="<?php bloginfo('wpurl'); ?>/lojas/" class="<?php if(strrpos($_SERVER['REQUEST_URI'],'lojas')) echo "active"; ?>"><?php _e("Lojas","sogarrafas")?></a>			
    </li>
    
</ul>
