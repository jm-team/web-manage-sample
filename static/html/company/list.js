
//为子窗口刷新父窗口表格提供方法
var table;

$(function () {
	table=$('.table-content table.table');
	initTable(table,function(pageReqeust){
		var reqeust=common.getDetail($('.search-bar form'), pageReqeust);
		reqeust.codeStatus = $('.nav-tabs li.active').data("value");
		return reqeust;
	},{
		'click .btnDetail': function (e, value, row, index) {
			var url="html/company/companyDetail?id="+row.id;
			layer.open({
				type:2,
				title:'供应商详情',
				content:[url,'yes'],
				area:['935px','650px'],
				success :function(data) {
				
				}
			});
		},
		'click .btnPlusScore': function (e, value, row, index) {
			$.get("static/html/qualification/score.tpl.html",function(html){
				layer.open({
					type: 1,
					title:"加分",
					content: html,
					btn: "确定加分",
					success: function(layero, index){
						$(".t-form").validate({
							onfocusout: false,
							onclick: false,
							onkeyup: false,
							rules:{
								scoreValue: {
									number: true
								}
							},
							messages: {
								scoreValue: {
									number: "请输入正整数分值！"
								}
							},
							showErrors: function(errorMap,errorList){
								if(errorList.length){
									layer.alert(errorList[0].message,function(index){
										layer.close(index);
										$(errorList[0].element).focus();
									});
								}
							}
						});
					},
					yes:function(index,layero){
						if(!$(".t-form").valid()) return false;
						$.ajax({
							cache: true,
							type: "POST",
							url: "entrust/operScore",
							data: {
								"companyId": row.id,
								"amounts": $('#scoreValue',layero).val(),
								"reason": $('#description',layero).val()
							},
							//async: false,//是否同步,默认异步
							dataType: "json",
							error: function (request) {
								setErrorAlert("超时或系统异常");
							},
							success: function (data) {
								if (data && data.statusCode == 200) {
									layer.alert(data.message);
								} else {
									if (data.message) {
										layer.alert(data.message);
									} else {
										layer.alert("操作失败");
									}
								}
							}
						});
						layer.close(index);
					}
				})
			});
		},
		'click .btnReduceScore': function (e, value, row, index) {
			$.get("static/html/qualification/score.tpl.html",function(html){
				layer.open({
					type: 1,
					title:"减分",
					content: html,
					btn: "确定减分",
					success: function(layero, index){
						$(".t-form").validate({
							onfocusout: false,
							onclick: false,
							onkeyup: false,
							rules:{
								scoreValue: {
									number: true
								}
							},
							messages: {
								scoreValue: {
									number: "请输入正整数分值！"
								}
							},
							showErrors: function(errorMap,errorList){
								if(errorList.length){
									layer.alert(errorList[0].message,function(index){
										layer.close(index);
										$(errorList[0].element).focus();
									});
								}
							}
						});
					},
					yes:function(index,layero){
						if(!$(".t-form").valid()) return false;
						$.ajax({
							cache: true,
							type: "POST",
							url: "entrust/operScore",
							data: {
								"companyId": row.id,
								"amounts": -Number($('#scoreValue',layero).val()),
								"reason": $('#description',layero).val()
							},
							//async: false,//是否同步,默认异步
							dataType: "json",
							error: function (request) {
								setErrorAlert("超时或系统异常");
							},
							success: function (data) {
								if (data && data.statusCode == 200) {
									layer.alert(data.message);
								} else {
									if (data.message) {
										layer.alert(data.message);
									} else {
										layer.alert("操作失败");
									}
								}
							}
						});
						layer.close(index);
					}
				})
			});
		}
	});
	$(".btnSearch").click(function () {
		refreshTable();
	});
	$(".btnNew").click(function(){
		layer.open({
			type: 2,
			title: "新增供应商",
			content: ['html/company/detail.php','yes'],
			area:['935px','650px']
		});
	});
	$(".btnExportIn").click(function(){
		var timestamp = (new Date()).valueOf();
		var url="html/company/import.html?t="+timestamp;
		layer.open({
			type: 2,
			title: "导入",
			area: ['500px', '250px'],
			content: [url, 'no'],
			cancel: function(index){
				var body = layer.getChildFrame('body', index);
				var win = body[0].ownerDocument.defaultView; 
				var status = "";
				if(status=win.getRunStatus()){
					layer.alert(status);
					return false;
				}
			}
		}); 
	});
	
	// 状态切换
	$(".nav-tabs li a").click(function(e) {
		e.preventDefault();
  		$(this).tab('show');
		refreshTable();
	});
});
function initTable(table,queryParams,operateEvents){
	var options;
	table.bootstrapTable(options={
		url: 'html/company/_list.php',     //请求后台的URL（*）
		striped: true,           //是否显示行间隔色
		method: 'post',
		cache: false,            //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
		pagination: true,          //是否显示分页（*）
		sortable: false,           //是否启用排序
		queryParams: queryParams,
		sidePagination: "server",      //分页方式：client客户端分页，server服务端分页（*）
		pageNumber: 1,            //初始化加载第一页，默认第一页
		pageSize: 25,            //每页的记录行数（*）
		pageList: [25],        //可供选择的每页的行数（*）
		strictSearch: true,
		clickToSelect: false,        //是否启用点击选中行
		uniqueId: "id",           //每一行的唯一标识，一般为主键列
		cardView: false,          //是否显示详细视图
		detailView: false,          //是否显示父子表gradeName
		width: 1100,
		columns: [{
			class: 'th',
			align: 'center',
			field: 'companyName',
			title: '企业名称'
		}, {
			class: 'th',
			align: 'center',
			field: 'gradeName',
			title: '企业级别',
			width: 60
		}, {
			class: 'th',
			align: 'center',
			field: 'linkMan',
			title: '联系人',
			width: 85
		}, {
			class: 'th',
			align: 'center',
			field: 'codeStatus',
			title: '审核状态',
			width: 90,
			formatter: function (value, row, index) {
				//三证审核状态 3待审核 0审核中，1审核通过，2审核不通过
				var str = "";
				if(value == 0){
					str = "审核中";
				}else if(value == 1){
					str = "审核通过";
				}else if(value == 2){
					str = "审核不通过";
				}else if(value == 3){
					str = "待审核";
				}
				return str;
			}
		}, {
			class: 'th',
			align: 'center',
			field: 'codeStatus',
			title: '法人(姓名/联系方式)',
			formatter: function (value, row, index) {
				//三证审核状态 3待审核 0审核中，1审核通过，2审核不通过
				var str = nullProcess(row.legalPerson)+'/'+nullProcess(row.legalPhone);
				return str;
			}
		}, {
			class: 'th',
			align: 'center',
			field: 'bzLineNum',
			title: '标准线路数',
			width: 60
		}, {
			class: 'th',
			align: 'center',
			field: 'zkLineNum',
			title: '线路折扣数',
			width: 60
		}, {
			class: 'th',
			align: 'center',
			field: 'hcLineNum',
			title: '回程车数',
			width: 60
		},{
			class: 'th',
			align: 'center',
			field: 'pdDealOrders',
			title: '订单数',
			width: 60
		}, {
			class: 'th',
			align: 'center',
			field: 'falseOrders',
			title: '伪单数',
			width: 60
		}, {
			class: 'th',
			align: 'center',
			field: 'score',
			title: '积分',
			width: 50
		}, {
			class: 'th',
			align: 'center',
			field: 'createTime',
			title: '创建日期',
			width: 90,
			formatter: function(value,row,index){
				if(!value) return '';
				var date = new Date(value);
				var text = date.getFullYear()
					+"-"+("0"+(date.getMonth()+1)).slice(-2)
					+"-"+("0"+date.getDate()).slice(-2);
				return [text];
			}
		}, {
			class: 'th',
			align: 'center',
			field: 'companyName',
			title: '操作',
			width: 120,
			events: operateEvents,
			formatter:function(value,row,index){
				var str = '<a class="btn btnDetail" title="详情"></a>';
				if(row.status != 1){
					str += '<a class="btn btnPlusScore" title="加分"></a>'+
					'<a class="btn sub-btn btnReduceScore" title="减分"></a>';
				}
				return str;
			}
		}],
		onLoadSuccess: function (data) {

		}
	});
	if(options.width) table.width(options.width);
}
function refreshTable(){
	table.bootstrapTable('refresh');
	//table.bootstrapTable('refresh', {url: 'html/company/_list.php'});
}

