<?php
/* Template Name: Artist */

get_header(); ?>

	<?php while ( have_posts() ) : the_post();   ?>

	<div class="module module-artist bg-white">
		<div class="row">
			<div class="artist-wrap">

				<article class="artist">
					<figure class="artist-photo">
						<?php

						$size = ( get_field('image_size') ) ? get_field('image_size') : 'artist';

						if( function_exists('acf_get_attachment') ):
							$img = acf_get_attachment( get_post_thumbnail_id() );

						?>
						<img src="<?php echo $img['sizes'][$size]; ?>" alt="">
						<?php if( $img['caption'] ): ?><figcaption><?php echo $img['caption']; ?></figcaption><?php endif; ?>
						<?php endif; ?>
					</figure>
					<section class="artist-bio">
						<header class="artist-header">
							<h1><?php the_title(); ?></h1>
							<?php

							$terms = get_the_terms( get_the_ID(), 'day');
							foreach ( $terms as $term ) :
								$output .= $term->name;
								$output .= ' | ';
							endforeach;

							$terms = get_the_terms( get_the_ID(), 'stage');
							foreach ( $terms as $term ) :
								$output .= $term->name;
							endforeach;

							?>
							<?php if( $output ): ?><p class="meta"><?php echo $output; ?></p><?php endif; ?>
						</header>
						<?php the_content(); ?>

						<div class="artist-share">
							<h2 class="button">Social</h2>
							<div class="icons">
								<?php while( have_rows('social_links') ):  the_row();
									$icon = get_sub_field('icon');
									?>
									<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="me" role="button" class="fab <?php echo $icon->class; ?> share-button" aria-label="<?php the_sub_field('website'); ?>"><span class="screen-reader-text"><?php the_sub_field('website'); ?></span></a>
								<?php endwhile; ?>
							</div>
						</div>
					</section>
				</article>

				<nav class="artist-navbar">
					<ul>
						<li><a href="/line-up" class="button is-m is-ltr">Line Up</a></li>
						<li><a href="/tickets" class="button is-m">Buy Tickets</a></li>
					</ul>
				</nav>

			</div>
		</div>
	</div>

	<?php

	/*
	while( have_rows('modules') ): the_row();
        get_template_part('template-parts/module', get_row_layout() );
    endwhile;
	*/

	?>

	<?php endwhile; ?>

<?php get_footer(); ?>