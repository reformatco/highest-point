<?php

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$classes = get_sub_field('class_override'); 

?>
<section class="module module-lineup is-padded <?php echo $colourway; ?> <?php echo $classes; ?>">
<!-- <div class="module module-lineup is-padded bg-yellow bg-module-lineup"> -->
	<div class="row">
		<div class="poster">
			<div class="poster-wrap">
				<?php 
				$poster_img = get_sub_field('poster_img');
				$poster_file = get_sub_field('poster_file');

				?>
				<a class="poster-download" href="<?php echo $poster_file['url']; ?>">
					<img src="<?php echo $poster_img['sizes']['large']; ?>" alt="Download the poster">
				</a>
			</div>
		</div>
	</div>
</section>