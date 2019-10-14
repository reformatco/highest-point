<?php 

get_header();

	while ( have_posts() ) : the_post();
		while( have_rows('modules') ): the_row();
    		get_template_part('template-parts/module', get_row_layout() );
    	endwhile;
	endwhile;

get_footer(); 

?>

