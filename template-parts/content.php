<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package celeuma
 */

	$show_excerpt = get_theme_mod( 'celeuma_blog_excerpt', 0 );
	$hide_meta	  = get_theme_mod( 'celeuma_index_hide_meta', 0 );
	$hide_date    = get_theme_mod( 'celeuma_index_hide_date', 0 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
	<figure class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'celeuma-large-thumb' ); ?>
		</a>
	</figure>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( !$hide_meta ) : ?>
		<div class="entry-meta">
			<?php celeuma_show_cats(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( $show_excerpt ) : ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>
	<?php endif; ?>

	<?php if ( !$hide_date ) : ?>
	<footer class="entry-meta">
		<?php celeuma_posted_on(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
