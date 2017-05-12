/**
 * Created by Administrator on 2017/5/8.
 */
$(function () {

    $('.selectAll').click(function () {
        $('.select').prop('checked',$(this).prop('checked'));
    });

    $('.select').click(function () {
        $('.selectAll').prop('checked',$('.select:not(:checked)').length==0);
    });



    $('.ajax-get').click(function () {

        var url=$(this).attr('href');

        $.get(url,showLayer);

        return false;
    });

    $('.ajax-post').click(function () {

        var form=$(this).closest('form');
        if(form.length!=0){
            // var url=form.attr('action');
            // var param=form.serialize();
            // $.post(url,param,showLayer);
            form.ajaxSubmit({success:showLayer});
        }else{
            var url=$(this).attr('url');
            var param=$('.select:checked').serialize();
            $.post(url,param,showLayer);
        }



        return false;
    });

    function showLayer(data) {
        var icon;
        if(data.status){
            icon=1;
        }else{
            icon=2;
        }

        layer.msg(data.info,{
            time:1000,
            offset:0,
            icon:icon,
        },function () {
            if(data.url){
                location.href=data.url;
            }
        });
    }

});
