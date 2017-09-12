# 레이어 모듈
 특별한 기능 없이 간단한 레이어를 사용할 때 사용해주세요.
# requirement
 이 라이브러리는 반드시 jQuery를 로드 해야 합니다.
# STEP.1 : HTML 파일 정의

<ul>
<li> 1. 스타일시트는 원하는 레이어 모양으로 작성하시면 됩니다.</li>
<li> 2. html 은 layerid, closeBtnClassName , inputClassName 은 반드시 설정 되어야 합니다.</li>
<li> layerid : 레이어 전체를 감싸는 태그</li>
<li> closeBtnClassName : layerid 의 자식요소 이며, 해당 클레스를 가진 요소를 클릭하면 레이어가 사라집니다.</li>
<li> inputClassName : layerid 의 자식요소 이며, 해당 클레스를 가진 요소를 체크한 후 닫으면 하루동안 레이어가 표시 되지 않습니다.</li>
 </ul>

```html
<style type="text/css">
.sl_layer{width:400px; height:400px;border:0px solid #2bA5B3;position:absolute;z-index:9999;left:100px;top:180px;display:none;}

.closeBox2 {position:absolute;left:0px;top:400px;height:20px;width:400px;background-color:#000000;margin-top:0;padding:0;}
.closeBox2 .closeLeft{float:left;padding-left:4px;margin-top:2px;}
.closeBox2 .closeRight{float:right;padding-right:10px;}
.closeBox2 .closeRight img{margin-top:1px;}
.closeBox2 .closeRight:after{clear:both;content:"";display:block;}

.top_cnts3{width:600px; height:400px;border:0px solid #2bA5B3;position:absolute;z-index:9999;left:530px;top:180px;display:none;}
</style>
<script src="PATH_TO_FILE_LOCATION/sl_layer.js" ></script>
<!-- 위 스크립트 파일은 저장된 위치를 직접 입력해주세요 -->
<div id="sample_layer" class="sl_layer">
	<a href="http://realclinic.co.kr/inquiry/notice_view.php?num=18" target="_parent">
		<img src="http://placehold.it/200x200">
	</a>
	<div class="closeBox2">
		<p class="closeLeft">
			<input style='border:0px' type='checkbox' class="nomorepop" name='chkbox' id='chkbox' >
			<a href="#!"><img src="./images/txt.png" alt="오늘하루 안보임?" /></a>
		</p>
		<p class="closeRight closeBtn"><a href="#!;"><img src="./images/exbtn.png" alt="btnclose" /></a></p>
	</div>
</div>
```

# STEP.2 : JAVSCRIPT 호출
```html
<script>
	var $layer = new layer({
		layerid : 'sample_layer',
		cookie_name : 'sample_pop_cookie_name',
		closeBtnClassName : 'closeBtn',
		inputClassName : 'nomorepop'
	})
</script>
```

