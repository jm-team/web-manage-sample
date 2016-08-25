<?php
header("Content-Type: application/json; charset=utf-8");
$data=array(
	array(),
	array(
		array(
			"id" => "62",
			"text" => "aaaaaaaaaaaaa",
			"extMap" => (object)array()
		), 
		array(
			"id" => "63",
			"text" => "bbbbbbbbbbbbb",
			"extMap" => (object)array()
		)
	),
	array(
		array(
			"id" => "64",
			"text" => "ccccccccccccc",
			"extMap" => (object)array()
		), 
		array(
			"id" => "65",
			"text" => "ddddddddddddd",
			"extMap" => (object)array()
		)
	),
	array(
		array(
			"id" => "66",
			"text" => "eeeeeeeeeeeee",
			"extMap" => (object)array()
		), 
		array(
			"id" => "67",
			"text" => "fffffffffffff",
			"extMap" => (object)array()
		)
	)		
);
$index=$_GET['companyId']=='' ? '0':$_GET['companyId'];
$result=array(
	"statusCode" => 200,
	"message" => "操作成功",
	"data" => $data[$index]
);
echo json_encode($result);
?>