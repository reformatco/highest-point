<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$classes = get_sub_field('class_override'); 

?>
<section class="module module-5050 sr-fade <?php echo $colourway; ?> <?php echo $classes; ?>">
	<?php 
	if( get_sub_field('photo') ):
		$img = get_sub_field('photo');
	 ?>
	<figure class="half-image">
		<img src="<?php echo $img['sizes']['square']; ?>" alt="<?php echo $img['alt']; ?>">
	</figure>
	<?php endif; ?>
	<div class="half-text">
		<article>
			<header class="half-text-header"><h1><?php the_sub_field('title'); ?></h1></header>
			<?php the_sub_field('body'); ?>
		</article>
	</div>
</section>