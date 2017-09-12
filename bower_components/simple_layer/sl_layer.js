// 만든이 : 최승용
//version : 0.1
var layer = function(opt){
		this.layerid = '';
		this.cookie_name = '';
		this.closeBtnClassName = '';
		this.inputClassName = '';
		this.cookie_value = '1';
		this.is_cookie_check = true;
		this.before_show = function(){}
		this.before_hide = function(){}

		$.extend(this,opt);
		var that = this;
		$( '#'+ this.layerid + ' .' + this.closeBtnClassName ).on('click',function(){
			that.check();
			that.hide();
		});

		if( this.is_cookie_check == true ) {
            this.checkCookie();
		}

	}

	layer.prototype = {	
		show : function()
		{
			var that = this;
			$('#' + this.layerid ).show();
			that.before_show(that);

		},
		hide : function(){
		    this.before_hide(this);
			$('#' + this.layerid ).hide();
		},
		setCookie : function (cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+ d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		
		},
		getCookie : function(cname) {
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		},
		checkCookie : function(){
			if (this.getCookie(this.cookie_name) == this.cookie_value)
			{
				return false;
			}
			this.show();
		},
		check : function(){
			var checkVal = $( '#'+ this.layerid + ' .' + this.inputClassName ).is(':checked');
			
			if(checkVal){
				this.setCookie(this.cookie_name,this.cookie_value,1);
			}
		}
	}
