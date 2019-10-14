<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$classes = get_sub_field('class_override'); 

?>
<section class="module module-tiles sr-fade <?php echo $colourway; ?> <?php echo $classes; ?> is-padded">
	<div class="row">

		<div class="tiles tiles-for-content">
			
			<?php while( have_rows('items') ): the_row();	?>
			<div class="tile">
				<?php 
				if( get_sub_field('image') ):
					$img = get_sub_field('image');
				 ?>
				<figure class="tile-image">
					<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
				</figure>
				<?php endif; ?>
				<span class="tile-title"><h3 class="button is-m no-arrow"><?php the_sub_field('title'); ?></h3></span>
				<div class="tile-body">
					<?php the_sub_field('body'); ?>
				</div>
			</div>
			<?php endwhile; ?>

		</div>
		
		<?php 
		if( get_sub_field('footer_link') ): 
			$link = get_sub_field('footer_link');
			?>
		<footer class="tiles-footer">
			<a href="<?php echo $link['url']; ?>" aria-label="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>" class="button"><?php echo $link['title']; ?></a>
		</footer>
		<?php endif; ?>
	</div>
</section>