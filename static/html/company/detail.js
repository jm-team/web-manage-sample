$(function(){
    $("form").validate({
        onfocusout: false,
        onclick: false,
        onkeyup: false,
        ignore: "",
        rules: {
            linkMobile: {
                number: true,
                minlength: 11,
                maxlength: 11
            }
        },
        messages: {
            linkMobile: {
                number: "请输入正确的手机号！",
                minlength: "请输入正确的手机号！",
                maxlength: "请输入正确的手机号！"
            }
        },
        showErrors: function(errorMap,errorList){           
            if(errorList.length){
                layer.alert(errorList[0].message,function(index){
                    layer.close(index);
                    $(errorList[0].element).focus();
                });
            }
        },
        submitHandler: function(form){
        	$(form).ajaxSubmit({
        		error: function(request) {
            		layer.alert("超时或系统异常");
	            },
	            success: function(res) {
	            	if(res && res.statusCode == 200){
            			layer.msg(res.message||"操作成功", {
                		  	time: 1500
                		}, function(){
                			closeLayer(); 
                		});
	        		}else{
	        			layer.alert(res&&res.message||"操作失败");
	        		}
	            }
        	});
        	return false;
        }
    });
});
window.closeLayer=function(){
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
}