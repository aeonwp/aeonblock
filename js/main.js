/**
 * File aeonblock.
 * @package   AeonBlock
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2022, AeonWP
 * @link      https://aeonwp.com/aeonblock
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
*/
(function($) {
	"use strict";
		//Check to see if the window is top if not then display button
		jQuery(window).scroll(function($){
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.go-to-top').addClass('gotop');
				jQuery('.go-to-top').fadeIn();
			} else {
				jQuery('.go-to-top').fadeOut();
			}
		});
		
		//Click event to scroll to top
		jQuery('.go-to-top').click(function($){
			jQuery('html, body').animate({scrollTop : 0},800);
			return false;
		});

		if ($('.site-header').length) {
			var mainHeader = $('.site-header'),
            mainHeaderHeight = mainHeader.height(),
            menu_toggle = mainHeader.find('#mobile-menu-toggle'),
            mainMenuListWrapper = $('.main-menu > ul');

			menu_toggle.click(function(){
	            mainMenuListWrapper.slideToggle();
	            $('.site-navigation').toggleClass('menu-open');
	            $(this).toggleClass('active');
	        });
		}

		/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if ($(window).width() < 1024) {
    $("#main-menu")
      .find("li")
      .last()
      .bind("keydown", function (e) {
        if (e.which === 9) {
          e.preventDefault();
          $("#site-navigation").find("#mobile-menu-toggle").focus();
        }
      });

    $("#site-navigation > li:last-child button:not(.active)").bind("keydown", function (e) {
      if (e.which === 9) {
        e.preventDefault();
        $("#site-navigation").find(".bar-menu").focus();
      }
    });
} else {
    $("#primary-menu").find("li").unbind("keydown");
}
menu_toggle.on('keydown', function (e) {
    var tabKey = e.keyCode === 9;
    var shiftKey = e.shiftKey;

    if( menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            mainMenuListWrapper.slideUp();
            $('#site-navigation').removeClass('menu-open');
            menu_toggle.removeClass('active');
        };
    }
});
	}
)(jQuery);
