<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$classes = $colourway;
$classes .= ' '.get_sub_field('class_override'); 

?>
<section class="module module-video <?php echo $classes; ?>">
	<div class="oembed">
		<div class="video-wrap">
			<?php the_sub_field('video'); ?>
		</div>
	</div>
</section>