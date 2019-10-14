<section class="module module-intro sr-fade is-centred is-padded bg-orange bg-module-newsletter">
	<div class="row is-flex">
		<div class="intro">
			<p><a href="http://eepurl.com/c_2UrX" target="_blank" role="button" aria-label="Sign up for our newsletter" class="button is-m">Signup for our newsletter</a></p>
			<div class="social-icons is-lrg">
				<div class="component-social">
					<div class="icons">
						<?php while( have_rows('social_links','option') ):  the_row();
							$icon = get_sub_field('icon');
							?>
							<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="me" role="button" class="fab <?php echo $icon->class; ?>" aria-label="<?php the_sub_field('website'); ?> profile" title="<?php the_sub_field('website'); ?>""><span class="screen-reader-text"><?php the_sub_field('website'); ?></span></a>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>