<?php 

if( get_sub_field('colourway') ):
	$colourway = get_sub_field('colourway');
	$colourway = 'bg-'.$colourway['label'];
endif;

$hero = get_sub_field('graphic');
$hero_mobile = get_sub_field('mobile');

?>
<section class="module module-hero sr-fade <?php if( !$hero ): ?>hero-flex is-fluid-height hero-no-image<?php endif; ?> <?php echo $colourway; ?>">
	<?php if( $hero ): ?>
		<div class="hero-bg">
			<picture>
				<source media="(orientation:landscape) and (max-device-width:812px)" srcset="<?php echo $hero['url']; ?>">
				<source media="(min-width:768px)" srcset="<?php echo $hero['url']; ?>">
				<img src="<?php echo $hero_mobile['url']; ?>" alt="<?php echo $hero['alt']; ?>">
			</picture>
		</div>
	<?php endif; ?>
	<?php if( !$hero ): ?>
	<div class="hero-body">
		<div class="row">
			<div class="title"><h1><?php the_sub_field('title'); ?></h1></div>
		</div>
	</div>
	<?php else: ?>
		<h1 class="screen-reader-text"><?php if( get_sub_field('title') ) : the_sub_field('title'); else: the_title(); endif; ?></h1>
	<?php endif; ?>
	<div class="arrow-down" aria-hidden="true"></div>
</section>
<div class="scroll-target"></div>