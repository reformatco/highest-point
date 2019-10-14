<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$classes = $colourway;
$classes .= ' '.get_sub_field('class_override'); 

?>
<section class="module module-oembed <?php echo $classes; ?>">
	<div class="oembed">
		<?php 

		$iframe = get_sub_field('video'); 

		// use preg_match to find iframe src
		preg_match('/src="(.+?)"/', $iframe, $matches);
		$src = $matches[1];


		// add extra params to iframe src
		$params = array(
		    'autoplay'    => 0,
		    'loop'        => 1,
		    'mute'		=> 0,
		    'rel' => 0,
		    'controls' => 0,
		    'modestbranding' => 1
		);

		$new_src = add_query_arg($params, $src);

		$iframe = str_replace($src, $new_src, $iframe);

		// add extra attributes to iframe html
		$attributes = 'frameborder="0" title="Teaser for Highest Point festival"';

		
		$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
		?>
		<div class="video-wrap">
			<!-- <iframe src="<?php echo $new_src; ?>" width="560" height="240" frameborder="0"></iframe> -->
			<?php echo $iframe; ?>
		</div>
	</div>
</section>