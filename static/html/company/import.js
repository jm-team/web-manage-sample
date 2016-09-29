var uploading=false;
//for close button of window
function getRunStatus(){
    if(uploading){
        return "正在导入数据，请稍后...";
    }
}
$(function(){
    $("form").validate({
        onfocusout: false,
        onclick: false,
        onkeyup: false,
        ignore: "",
        showErrors: function(errorMap,errorList){           
            if(errorList.length){
                layer.alert(errorList[0].message,function(index){
                    layer.close(index);
                    $(errorList[0].element).focus();
                });
            }
        },
        submitHandler: function(form){
            uploading=true;
            var statusIndex=layer.open({   
                type: 1,
                shade: 0.2,
                closeBtn: 0,
                area: [],
                title: false, 
                content: $('.uploadingProgress')
            });
            var bar = $('.uploadingProgress .bar');
            var percent = $('.uploadingProgress .percent');
            var status = $('.uploadingProgress .status');
            $(form).ajaxSubmit({
                beforeSend: function() {
                    status.html("正在导入数据...");
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                    if(percentComplete==100){
                        status.html("完成！");
                    }
                },                
                error: function(request) {
                    uploading=false;
                    layer.close(statusIndex);
                    layer.alert("超时或系统异常");
                },                
                success: function(res) {
                    uploading=false;
                    if(res && res.statusCode == 200){
                        setTimeout(function(){
                            closeLayer();
                        },1500);
                        /*
                        layer.msg(res.message||"导入数据成功！", {
                            time: 1500
                        }, function(){
                            closeLayer(); 
                        });
                        */
                    }else{
                        layer.close(statusIndex);
                        layer.alert(res&&res.message||"操作失败");
                    }
                }
            });
            return false;
        }
    });    
    $(".btnSelectFile").click(function(){
        $("input[name='file']").trigger("click");
    });
    $("input[name='file']").on("change",function(){
        $("input[name='filePath']").val($(this).val());
    });
    $(".btnCancel").click(function(){
        closeLayer();
    });
});
window.closeLayer=function(){
    var index = parent.layer.getFrameIndex(window.name);
    parent.layer.close(index);
}