<?php

/*

Navbar

****************************************************/

?>
<div class="navbar is-fixed">

	<div class="row is-flex">

		<div class="navbar-brand">
			
			<div class="navbar-logo">
				<?php the_custom_logo(); ?>
			</div>

		</div>

		<nav class="navbar-menu" id="navbarMenu" role="navigation" aria-label="main navigation">
			<?php 
            $args = array(
                'menu' => 'Primary',
                'container' => '',
                'depth' => 0
            );
            wp_nav_menu($args);
            ?>
		</nav>

		<div class="navbar-social">
			<div class="social-icons">
				<div class="component-social">
					<div class="icons">
						<?php while( have_rows('social_links','option') ):  the_row();
							$icon = get_sub_field('icon');
							?>
							<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="me" tabindex="-1" class="fab <?php echo $icon->class; ?>"><span class="screen-reader-text"><?php the_sub_field('website'); ?></span></a>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="navbar-toggle">
			<a role="button" class="navbar-burger" aria-label="Mobile menu" aria-label="Toggle navigation" tabindex="0" aria-expanded="false">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

		<div class="mobile-menu">
			<!-- loaded in with js -->
		</div>

	</div>

</div>

