<?php get_header(); ?>
	
	
	<?php while ( have_posts() ) : the_post();   ?>
	
	<?php 

	while( have_rows('modules') ): the_row();
        get_template_part('template-parts/module', get_row_layout() );
    endwhile;

    ?>

		<?php 

		$posts = get_field('headline_acts');
		if( $posts ):
		
		?>

		<section class="module module-tiles bg-green is-padded bg-module-grid1">
			<div class="row">
				<header class="tiles-header subtitle"><h2>Headline Acts</h2></header>

				<div class="tiles tiles-default">
					
					<?php foreach( $posts as $post ): setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" class="tile" aria-label="<?php the_title(); ?> bio">
						<span class="tile-image">
							<?php 
							$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); 
							$img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
							if( $img ):
							?>
							<img src="<?php echo $img[0]; ?>" alt="<?php echo $img_alt; ?>">
							<?php else: ?>
								<span class="img-dummy"></span>
							<?php endif; ?>
						</span>
						<span class="tile-title button is-m no-arrow"><?php the_title(); ?></span>
					</a>
					<?php endforeach; wp_reset_postdata(); ?>

				</div>

				<footer class="tiles-footer">
					<a href="/line-up" class="button is-l" aria-label="View full line up">View full lineup</a>
				</footer>
			</div>
		</section>
		<?php endif; ?>
		
		<?php if( get_field('related_links') ): ?>
		<section class="module module-tiles bg-yellow is-padded bg-module-grid2">
			<div class="row">
				<h2 class="screen-reader-text" hidden>Quick Links</h2>
				<?php while( have_rows('related_links') ): the_row(); ?>
				<div class="tiles-row">
					<?php 
					while( have_rows('item') ): the_row(); 
						$link = get_sub_field('link');

					?>
					<a href="<?php echo $link['url']; ?>" class="tile" aria-label="<?php echo $link['title']; ?>">
						<?php 
						if( get_sub_field('photo') ):
							$img = get_sub_field('photo');
						 ?>
						<figure class="tile-image">
							<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
						</figure>
						<?php else: ?>
							<span class="img-dummy"></span>
						<?php endif; ?>

						<span class="tile-title button is-m"><?php echo $link['title']; ?></span>
					</a>
					<?php endwhile; ?>
				</div>
				<?php endwhile; ?>
			</div>
		</section>
		<?php endif; ?>

	<?php endwhile;  ?>

<?php get_footer(); ?>