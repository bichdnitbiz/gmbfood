(function ($) {
  'use strict';
    //Fixed Menu
    var MQL =200;
    var windowHeight = $(window).height();
    var windowWidth = $(window).width();
    //primary navigation slide-in effect
    if(jQuery(window).width() > MQL) {
        var headerHeight = $('.header').height();
        jQuery(window).on('scroll',
        {
            previousTop: 0
        },
        function () {
            var currentTop = $(window).scrollTop();
            if (currentTop < this.previousTop ) {
                jQuery('.sticky-header').addClass('header__visible')
                if (currentTop < 1)   {
                    jQuery('.sticky-header').removeClass('header__fixed').removeClass('header__visible');
                }
            } else {
                if (currentTop > headerHeight) {
                    jQuery('.sticky-header').addClass('header__fixed').removeClass('header__visible');
                }
            }
            this.previousTop = currentTop;
        });
    }
})(jQuery);