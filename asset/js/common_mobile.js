$(function(){


    var $gnb = $('#gnb');
    var $menuBtn = $('.menu_btn');
    var $menuWrap = $('.menu-text'),
        menu_img = ['/asset/img/menu/menu_btn_over.png','/asset/img/menu/menu_btn_click.png'],
        toggle_check = 0,
        current_class = 'fadeOut',
        menuToggle = function(toggle,_class)
        {
//            $menuWrap.hide();
            var button_target = $('.menu-toggle').find('img');
            button_target.attr('src',menu_img[toggle]);
            toggle_check = toggle;
        };

    $menuBtn.on('click',function(e)
    {
        if ( toggle_check == 0 )
        {
            toggle_check = 1;
            current_class = 'fadeIn';
            $gnb.find('.menu-bg').show().addClass("fadeIn");
            $gnb.find('.menu-bg').removeClass("fadeOut");
            $menuWrap.show().addClass('fadeIn');
        } else {
            toggle_check = 0;
            current_class = 'fadeOut';
            $gnb.find('.menu-bg').hide();
            $menuWrap.hide().removeClass('fadeIn');
        }
        menuToggle(toggle_check,current_class);
        e.preventDefault();
    })
    var $slider = {};
    var $layer = new layer({
    		layerid : 'sample_layer',
    		cookie_name : 'sample_pop_cookie_name',
            is_cookie_check : false,
    		closeBtnClassName : 'closeBtn',
    		inputClassName : 'nomorepop',
    		before_show : function(me){
    		setTimeout(function(){
                    $slider = $('#' + me.layerid).find(".layer-bxslider").bxSlider({
                        auto: true,
                        pause: 4000,
                        controls: true,
                        pager: false,
                        prevText : '<img src="/asset/img/mobile/left_arrow.png" />',
                        nextText : '<img src="/asset/img/mobile/right_arrow.png" />',
                        onSliderLoad : function(){
                            $(this).find('img').css('opacity',1);
                        }
                    });
                    $('.simple_layer_bg').show();
                    $menuBtn.click();
                },0)
    		},
    		before_hide : function() {
    		    $('.simple_layer_bg').hide();
    		    $slider.destroySlider();
    		}
    	})
    var $showLayerBtn = $('.callLayerBtn');
    $showLayerBtn.on('click',function(e)
    {
        $layer.show();
        e.preventDefault();
    });
    $('.closeBtn').on('click',function(){
        $layer.hide();
    })

    window.addEventListener("orientationchange", function() {
      // Announce the new orientation number
      if (window.orientation == 90 || window.orientation == -90) {
        $('body').css('overflow','hidden');
        var _h = $(window).height();
        $('.sl_layer .layer-bxslider li>img').css('height',_h);
      } else {
        $('.sl_layer .layer-bxslider li>img').css('height','auto');
      }

    }, false);
})