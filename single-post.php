<?php get_header(); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
		<section class="module module-article is-padded bg-white bg-module-content1">
			<div class="row is-flex">
				
				<div class="article-wrap">
					
					<article <?php post_class('article-content'); ?>>
						<h1><?php the_title(); ?></h1>
						<p class="post-time">Posted <time datetime="<?php the_time('r'); ?>"><?php the_time( get_option('date_format') ); ?></time></p>
						<?php the_content(); ?>

						<?php get_template_part('template-parts/component','share'); ?>
					</article>

					<nav class="article-navbar">
						<ul>
							<li><a href="/news" class="button is-m is-ltr">More news</a></li>
						</ul>
					</nav>

				</div>
				
			</div>
		</section>
		<?php endwhile; ?>

<?php get_footer(); ?>