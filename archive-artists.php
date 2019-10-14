<?php

get_header();

?>

	<section class="module module-hero hero-flex is-fluid-height hero-no-image bg-yellow">
				<div class="hero-body">
			<div class="row">
				<div class="title"><h1>Artists</h1></div>
			</div>
		</div>
			<div class="arrow-down" aria-hidden="true"></div>
	</section>

	<section class="module module-article sr-fade is-padded bg-t ">
		<div class="row is-flex">
			<article class="article-content">
			<ul class="artist-list">
			<?php

            $args = array(
                'post_type' => 'artists',
				'posts_per_page' => -1,
				'orderby' => 'title',
                'order' => 'ASC',
            );

            $query = new WP_Query($args);
			while ($query->have_posts()) : $query->the_post();

				$output = '';
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
				<li>
					<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
						<?php
						if( function_exists('acf_get_attachment') && get_post_thumbnail_id() ):
							$img = acf_get_attachment( get_post_thumbnail_id() );
						?>
						<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="">
						<?php else: ?>
						<span class="img-dummy"></span>
						<?php endif; ?>
						<span class="artist-name"><?php the_title(); ?></span>
						<span class="artist-details"><?php echo $output; ?></span>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
			</article>
		</div>
	</section>

<?php get_footer(); ?>