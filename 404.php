<?php get_header(); ?>

<style>
	/* 404 */
.error404 .mt-5 .row{
	display: block;
}
#notfound {  position: relative;  height: 60vh;}
#notfound .notfound {  position: absolute;  left: 50%;  top: 50%;  -webkit-transform: translate(-50%, -50%);      -ms-transform: translate(-50%, -50%);          transform: translate(-50%, -50%);}
.notfound {  max-width: 520px;  width: 100%;  line-height: 1.4;  text-align: center;}
.notfound .notfound-404 {  position: relative;  height: 200px;  margin: 0px auto 20px;  z-index: -1;}
 
.notfound .notfound-404 h1 {  font-size: 236px;  font-weight: 200;  margin: 0px;  color: #f1f1f1;  text-transform: uppercase;  position: absolute;
  left: 50%;  top: 50%;  -webkit-transform: translate(-50%, -50%);      -ms-transform: translate(-50%, -50%);          transform: translate(-50%, -50%);}
 
.notfound .notfound-404 h2 {  font-size: 28px;  font-weight: 400;  text-transform: uppercase;  color: #f1f1f1;  background: gray;  padding: 10px 5px;
  margin: auto;  display: inline-block;  position: absolute;  bottom: 0px;  left: 0;  right: 0;}
 
.notfound a {  display: inline-block;  font-weight: 700;  text-decoration: none;  color: #fff;  text-transform: uppercase;  padding: 13px 23px;
  background: #EA882D;  font-size: 18px;  -webkit-transition: 0.2s all;  transition: 0.2s all;}
 
.notfound a:hover {  color: #000;  background: #EA882D;}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 {    height: 148px;    margin: 0px auto 10px;  }
  .notfound .notfound-404 h1 {    font-size: 86px;  }
  .notfound .notfound-404 h2 {    font-size: 16px;  }
}

</style>


	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h2><?php _e("404 - A página não foi encontrada","freixianda")?></h2>
			</div>
			<a href="<?php echo get_bloginfo('url') ?>"><?php _e("Ir para a Home","freixianda")?></a>
		</div>
	</div>


<?php get_footer(); ?>