$(function(){


    var $gnb = $('#gnb');
    var $menuBtn = $('.menu');
    $menuBtn.on('mouseenter',function(){
        $gnb.find('.menu-bg').show().addClass("fadeIn");
        $gnb.find('.menu-bg').removeClass("fadeOut");
        $gnb.find('.black').show();
        $gnb.find('.white').hide();
    })
    $gnb.hover(function(){},
    function(){
        $gnb.find('.black').hide();
        $gnb.find('.white').show();
        $gnb.find('.menu-bg').removeClass("fadeIn")
        setTimeout(function(){
            $gnb.find('.menu-bg').hide();
        },600)

        $gnb.find('.menu-bg').addClass("fadeOut");
        if ( $menuWrap.hasClass("fadeIn") ) {
            menuToggle(0,"fadeOut");
        } else {
            menuToggle(0);
        }

    })

    var $menuBtn = $('.menu-toggle'),
        $menuWrap = $('.menu-text'),
        menu_img = ['/asset/img/menu/menu_btn_over.png','/asset/img/menu/menu_btn_click.png'],
        toggle_check = 0,
        current_class = 'fadeOut',
        menuToggle = function(toggle,_class)
        {
            $menuWrap.removeClass('fadeIn fadeOut');
            var button_target = $('.menu-toggle').find('img');
            button_target.attr('src',menu_img[toggle]);
            if (_class) {
                $menuWrap.addClass(_class)
            }
            toggle_check = toggle;
        };

    $menuBtn.on('click',function(e)
    {
        if ( toggle_check == 0 )
        {
            toggle_check = 1;
            current_class = 'fadeIn';
        } else {
            toggle_check = 0;
            current_class = 'fadeOut';
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
                        auto: false,
                        pause: 4000,
                        controls: true,
                        pager: false,
                        prevText : '<img src="/asset/img/layer_left_btn.png" />',
                        nextText : '<img src="/asset/img/layer_right_btn.png" />',
                        onSliderLoad : function(){
                            console.log(this)
                            $(this).find('img').css('opacity',1);
                        }
                    });
                    $('.simple_layer_bg').show();
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
    })
})