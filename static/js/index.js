$(function(){
	$(".btn-detail1").click(function(){
		layer.open({
			type: 2,
			title: "公司详情",
			content: ['html/company/detail.php','yes'],
			area:['935px','650px']
		});
	});
	$(".btn-detail2").click(function(){
		layer.open({
			type: 2,
			title: "线路详情",
			content: ['html/line/detail.php','yes'],
			area:['935px','650px']
		});
	});	
});