<?php 

$photo = get_sub_field('photo');
$letterbox = get_sub_field('letterbox');

$size = ( $letterbox ) ? 'wide' : 'fullhd';
$classes = ( $letterbox ) ? 'photo-fixed' : '';

?>
<section class="module module-photo sr-fade <?php echo $classes; ?>">
	<figure>
		<img src="<?php echo $photo['sizes'][$size]; ?>" alt="<?php echo $photo['alt']; ?>">
	</figure>
</section>