<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

?>
<section class="module module-intro sr-fade is-padded <?php echo $colourway; ?>">
	<div class="row is-flex">
		<div class="intro">
			<?php the_sub_field('text'); ?>
		</div>
	</div>
</section>