/*! slide transition plugin for Cycle2;  version: 20140128 */
(function($) {
"use strict";

$.fn.cycle.transitions.slideHorz = {

    transition: function( opts, currEl, nextEl, fwd, callback ) {

        var width = opts.container.css( 'overflow', 'hidden' ).width();
        var speed = opts.speed; // slide has 2 transitions
        // var element = fwd ? currEl : nextEl;
        var element = nextEl;

        $( nextEl ).css({
            display: 'block',
            visibility: 'visible',
            left: width
        });

        opts = opts.API.getSlideOpts( fwd ? opts.currSlide : opts.nextSlide );
        var props1 = { left:0, top:0 };
        var props2 =  opts.slideCss || { left:0, top:0 };

        if ( opts.slideLeft !== undefined ) {
            props1.left = props1.left + parseInt(opts.slideLeft, 10) || 0;
        } 
        else if ( opts.slideRight !== undefined ) {
            props1.left = width + parseInt(opts.slideRight, 10) || 0;
        } 
        if ( opts.slideTop ) {
            props1.top = opts.slideTop;
        }

        // transition slide in 3 steps: move, re-zindex, move
        $( element )
            .queue( 'fx', $.proxy(reIndex, this))
            .animate( props1, speed, opts.easeIn || opts.easing, callback  );

        function reIndex(nextFn) {
            /*jshint validthis:true */
            this.stack(opts, currEl, nextEl, fwd);
            nextFn();
        }
    },

    stack: function( opts, currEl, nextEl, fwd ) {
        var i, z;

        if (fwd) {
            opts.API.stackSlides( nextEl, currEl, fwd );
            // force curr slide to bottom of the stack
            $(currEl).css( 'zIndex', 1 );
        }
        else {
            z = 1;
            for (i = opts.nextSlide - 1; i >= 0; i--) {
                $(opts.slides[i]).css('zIndex', z++);
            }
            for (i = opts.slideCount - 1; i > opts.nextSlide; i--) {
                $(opts.slides[i]).css('zIndex', z++);
            }
            $(nextEl).css( 'zIndex', opts.maxZ );
            $(currEl).css( 'zIndex', opts.maxZ - 1 );
        }
    }
};

})(jQuery);