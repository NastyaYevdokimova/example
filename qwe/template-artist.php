<?php get_header(); ?>
  <section class="content-area content-full-width">
<?php 
/*
Template Name: Шаблон художников
*/
            $args = array(
                   'post_type' => 'artist',
                   'publish' => true,
                   'paged' => get_query_var('paged'),
               );
            
            query_posts($args);

            if ( have_posts() ) : 
endif?>
<?php
			$psts  = get_posts( array(
  'post_type' => 'artists',
) );
$i=0;
foreach( $psts as $pst ){
  echo ++$i . ' <a href="'. get_permalink( $pst->ID ) .'">'. $pst->post_title .'</a><br>';
}?>
<?php get_footer(); ?>