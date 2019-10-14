<?php 

/*

Front-end:
- Needs picturefill.js
- Maybe ofi.browser.js if we are using object-fit
- imagesloaded.js
- jquery.cycle.js
- logic

CSS:
- All styles inside scss/components/banner.scss


*/

$images = get_sub_field('photos'); 
$classes = get_sub_field('class_override'); 

?>
<section class="module module-banner sr-fade <?php echo $classes; ?>">
    <div class="banner-preloader">
        <?php foreach( $images as $image ): ?>
        <img src="<?php echo $image['sizes']['wide']; ?>" alt="">
        <?php endforeach; ?>
    </div>
    <div class="banner-wrap">
        <div class="banner">
            
            <!-- <div class="banner-body banner-flex">
                <div class="row">
                    <div class="title">Header</div>
                    <div class="subtitle">Subheader</div>
                </div>
            </div> -->
            
            <?php foreach( $images as $image ): ?>
                <div class="banner-slide">
                    <img src="<?php echo $image['sizes']['wide']; ?>" alt="">
                </div>
            <?php endforeach; ?>

            <?php if( count($images) > 1 ): ?>
            <div class="banner-pager banner-pager-center"></div>
            <div class="banner-prev"></div>
            <div class="banner-next"></div>
            <?php endif; ?>

        </div>
    </div>
</section>
