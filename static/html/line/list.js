
$(function(){
	$(".btn-detail").click(function(){
		layer.open({
			type: 2,
			title: "线路详情",
			content: ['html/line/detail.php','yes'],
			area:['935px','650px']
		});
	});	
});	