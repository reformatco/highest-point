<?php

/**
 * A custom ACF widget.
 */
class ACF_Custom_Widget extends WP_Widget {

    /**
    * Register widget with WordPress.
    */
    function __construct() {
        parent::__construct(
            'acf_custom_widget', // Base ID
            __('Logos', 'text_domain'), // Name
            array( 'description' => __( 'Add logos to footer', 'text_domain' ), 'classname' => 'acf-custom-widget' ) // Args
        );
    }

    /**
    * Front-end display of widget.
    *
    * @see WP_Widget::widget()
    *
    * @param array $args     Widget arguments.
    * @param array $instance Saved values from database.
    */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( !empty($instance['title']) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $widget_id = 'widget_' . $args['widget_id'];

        $title = get_field( 'title', $widget_id ) ? get_field( 'title', $widget_id ) : ''; 

        if ( $title ) {
          echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        if( have_rows('logos', $widget_id) ):

          ?><div class="widget-logos"><?php

          while ( have_rows('logos', $widget_id) ) : the_row();
            $img = get_sub_field('image', $widget_id);
            $link = get_sub_field('link', $widget_id);

            if( $link != "" ): ?>
            <a href="<?php echo $link['url']; ?>" <?php if( $link['target'] ): ?>target="<?php echo $link['target']; ?>"<?php endif; ?> class="widget-logo-item">
            <?php else: ?>  
            <div class="widget-logo-item">
            <?php endif;
            echo '<img src="'.$img['sizes']['logo'].'" alt="'.$img['alt'].'" />';
            if( $link != "" ): ?></a><?php else: ?></div><?php endif;
          endwhile;

          ?></div><?php

        endif;


        echo $args['after_widget'];
    }

    /**
    * Back-end widget form.
    *
    * @see WP_Widget::form()
    *
    * @param array $instance Previously saved values from database.
    */
    public function form( $instance ) {

    }

    /**
    * Sanitize widget form values as they are saved.
    *
    * @see WP_Widget::update()
    *
    * @param array $new_instance Values just sent to be saved.
    * @param array $old_instance Previously saved values from database.
    *
    * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance ) {

    }

} // class ACF_Custom_Widget

// register ACF_Custom_Widget widget
add_action( 'widgets_init', function(){
  register_widget( 'ACF_Custom_Widget' );
});