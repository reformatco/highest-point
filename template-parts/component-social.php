<div class="component-social">
	<div class="icons">
		<?php while( have_rows('social_links','option') ):  the_row();
			$icon = get_sub_field('icon');
			?>
			<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="me" role="button" class="fab <?php echo $icon->class; ?>" aria-label="<?php the_sub_field('website'); ?>"><span class="screen-reader-text"><?php the_sub_field('website'); ?></span></a>
		<?php endwhile; ?>
	</div>
</div>