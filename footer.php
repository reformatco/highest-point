        
        </main>

        <?php get_template_part('template-parts/component','newsletter'); ?>

        <footer class="module site-footer is-centred is-padded bg-black">
            <div class="row">
                <div class="footer-widgets">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widgets") ) : ?><?php endif;?>
                </div>
                <div class="credits">
                    <p>&copy;<?php echo date('Y'); ?> Highest Point Festival. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
        <!-- Website made by Reformat (reformat.co) -->
    </body>
</html>