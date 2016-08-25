$(function(){
	$("#companyId").select2({width : "93%"});
	$("#cateId").select2({width : "100%"});	
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
	$("#companyId").on('change', function() {
		var _this = $(this),
		companyId = _this.val(),
		contractElement = $("#contractTplId");
		$.ajax({
            cache: true,
            type: "get",
            url:"./_contractTemplates.php",
            data:{"companyId" : companyId},
            dataType:"json",
            error: function(request) {
            	layer.alert("超时或系统异常");
            },
            success: function(res) {
            	if(res && res.statusCode == 200){
            		contractElement.empty();
            		var list = res.data;
            		var html = '<option value="">请选择</option>';
            		for(var i = 0; i < list.length; i++) {
            			html += '<option value="' + list[i].id + '">' + list[i].text + '</option>';
            		}
            		contractElement.append(html);
        		}else{
        			layer.alert(res.message);
        		}
            }
        });
	});
	//类型控制
	$('input[name=lineType]').on("change",function(){
	    var curVal = $(this).val();
	    for(var i = 231; i<=234; i++){
	        $("tr[name=lineType-"+i+"]").addClass("hide");
	    }
	    $("tr[name=lineType-"+curVal + "]").removeClass("hide");
	    $("input[name=loadSpec]").attr("required",false);
	    $("tr[name=lineType-"+curVal + "] input[name=loadSpec]").attr("required",true);
	    
	    if(curVal == 232){  //铁路
	    	$("#transNum").html("车皮数：");
	    	//resetDeparture(curVal,2);
	    	//resetDestination(curVal,2);
	    	
	    	$('[name=departureAreaId]').attr("required",false);
	    	$('[name=destinationAreaId]').attr("required",false);
	    }else if(curVal == 231){  //公路
	    	$("#transNum").html("车辆数：");
	    	//resetDeparture(curVal,2);
	    	//resetDestination(curVal,2);
	    	
	    	$('[name=departureAreaId]').attr("required",false);
	    	$('[name=destinationAreaId]').attr("required",false);
	    }else{
	    	$("#transNum").html("船舶数：");
	    	//resetDeparture(curVal,3);
	    	//resetDestination(curVal,3);
	    	
	    	$('[name=departureAreaId]').attr("required",true);
	    	$('[name=destinationAreaId]').attr("required",true);
	    }
	});
	$("#discountType").on("change",function(){
	    if($(this).is(':checked')){
	        $(".discountType").removeClass('hide');
	        $("#rebate").attr("required",true);
	        $("#discountDateStart").attr("required",true);
	        $("#discountDateEnd").attr("required",true);
	    }else{
	        $(".discountType").addClass('hide');
	        $("#rebate").attr("required",false);
	        $("#discountDateEnd").attr("required",false);
	        $("#discountDateStart").attr("required",false);
	    }

	});
	$(".btnCancel").click(function(){
		closeLayer();
	});
});
window.closeLayer=function(){
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
}