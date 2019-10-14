<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$classes = get_sub_field('class_override'); 

?>
<section class="module module-article sr-fade is-padded <?php echo $colourway; ?> <?php echo $classes; ?>">
	<div class="row is-flex">
		<article class="article-content">
			<?php the_sub_field('content'); ?>
		</article>
	</div>
</section>