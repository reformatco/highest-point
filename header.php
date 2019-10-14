<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if( get_field('theme_color','options') ): ?><meta name="theme-color" content="<?php the_field('theme_color','options'); ?>"><?php endif; ?>
        <?php wp_head(); ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <?php if( is_404() ): ?><meta name=”robots” content=”noindex,nofollow” /><?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
    
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hp' ); ?></a>

        <?php get_template_part('template-parts/component','navbar'); ?>

        <main class="site-content" id="content" role="main">