$(function () {
    $('#shop_reg').validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        }
    });


$('#shop_reg').on('submit',function(e){
    $.post('/admin/api/shop/save',$(this).serializeArray(),function(res){
        if (res.result == true) {
            alert('저장 되었습니다.')
            location.href='/admin/main/shop_reg';
            return false;
        }
        alert('매장 정보 등록 실패, 매장 정보를 모두 입력해주세요.');
        return false;
    },'json');
    e.preventDefault();
});

$('.delete-shop').on("click",function()
{
    var $id = $(this).data('id');
    if($id == '') {
        alert('삭제할 매장이 없습니다');
        return false;
    }
    if(confirm('매장을 삭제 하시겠습니까?')) {
        $.post('/admin/api/shop/delete',{'id':$(this).data('id')},function(){
            alert('삭제되었습니다')
            location.href='/admin/main/shop_list';
        })
    }
})
});