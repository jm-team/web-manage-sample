<?php
header("Content-Type: application/json; charset=utf-8");
$result=array(
	"statusCode" => 200,
	"message" => "操作成功",
	"data" => $_POST['lineType']
);
echo json_encode($result);
?>