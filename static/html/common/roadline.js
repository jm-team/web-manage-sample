var departureProvince,departureCity,departureAreaId,
	destinationProvince,destinationCity,destinationAreaId;
$(function(){
	departureProvince = $("[name=departureProvince]");
	departureCity = $("[name=departureCity]");
	departureAreaId = $("[name=departureAreaId]");
	destinationProvince = $("[name=destinationProvince]");
	destinationCity = $("[name=destinationCity]");
	destinationAreaId = $("[name=destinationAreaId]");
	departureProvince.select2({width: "162px"});
	departureCity.select2({width: "162px"});
	departureAreaId.select2({width: "162px"});
	destinationProvince.select2({width: "162px"});
	destinationCity.select2({width: "162px"});
	destinationAreaId.select2({width: "162px"});
	// 地区更改
	departureProvince.on('change', function() {
		var areaCode = $(this).val(),
			lineType = $("[name=lineType]:checked").val();
		changeArea(areaCode, lineType, departureCity, departureAreaId);
	});
	// 地区更改
	departureCity.on('change', function() {
		var areaCode = $(this).val(),
			lineType = $("[name=lineType]:checked").val();
		changeArea(areaCode, lineType, departureAreaId);
	});
	// 地区更改
	destinationProvince.on('change', function() {
		var areaCode = $(this).val(),
			lineType = $("[name=lineType]:checked").val();
		changeArea(areaCode, lineType, destinationCity, destinationAreaId);
	});
	
	// 地区更改
	destinationCity.on('change', function() {
		var areaCode = $(this).val(),
			lineType = $("[name=lineType]:checked").val();
		changeArea(areaCode, lineType, destinationAreaId);
	});	
});

function resetDeparture(lineType, level) {
	changeLineType(lineType, [departureProvince]);
	setDepartureLevel(level);
}
function resetDestination(lineType, level) {
	changeLineType(lineType, [destinationProvince]);
	setDestinationLevel(level);
}
function setDepartureLevel(level) {
	if(level == 1) {
		departureCity.prev().hide();
		departureAreaId.prev().hide();
	} else if (level == 2){
		departureCity.prev().show();
		departureAreaId.prev().hide();
	} else {
		departureCity.prev().show();
		departureAreaId.prev().show();
	}
}
function setDestinationLevel(level) {
	if(level == 1) {
		destinationCity.prev().hide();
		destinationAreaId.prev().hide();
	} else if (level == 2){
		destinationCity.prev().show();
		destinationAreaId.prev().hide();
	} else {
		destinationCity.prev().show();
		destinationAreaId.prev().show();
	}
}