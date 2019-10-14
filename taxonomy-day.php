<?php get_header(); ?>

	<section class="module module-posts is-padded bg-white" role="main">

		<div class="row is-flex">
			<div class="posts-grid">
				<?php while ( have_posts() ) : the_post();  ?>

					<article <?php post_class(); ?>>
						<a href="<?php the_permalink(); ?>" class="hentry-image">
							<?php
							$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'artist');
							$img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
							if( $img ):
							?>
							<img src="<?php echo $img[0]; ?>" alt="<?php echo $img_alt; ?>">
							<?php else: ?>
								<span class="img-dummy artist"></span>
							<?php endif; ?>
						</a>
						<div class="post-header"><h2><?php the_title(); ?></h2></div>
						<p class="post-time">Posted <time datetime="<?php the_time('r'); ?>"><?php the_time( get_option('date_format') ); ?></time></p>
			            <?php the_excerpt(); ?>
			            <p><a href="<?php the_permalink(); ?>" class="button is-s">Read more</a></p>
					</article>

				<?php endwhile; ?>
			</div>
			<nav class="pagination">
		        <?php
		        echo paginate_links(
			        	array(
			        	'prev_text' => __('Previous'),
						'next_text' => __('Next'),
			        )
			    ); ?>
		    </nav>
		</div>

	</section>



<?php get_footer(); ?>