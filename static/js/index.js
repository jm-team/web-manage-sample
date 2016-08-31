$(function(){
	$(".site-toolbar a").on("click",function(){
		var url;
		if(url=$(this).data("href")){
			$.get(url,function(html){
				$('.nav-menu li.active').removeClass("active");
				$('#content').html(html);
			});
		}
	});	
	$(".nav-menu li").on("click",function(){
		var url;
		$(this).addClass("active").siblings().removeClass("active");
		if(url=$(this).data("href")){
			$.get(url,function(html){
				$('#content').html(html);
			});
		}
	});	

});