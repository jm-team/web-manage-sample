<?php
header("Content-Type: application/json; charset=utf-8");
$filename="_list.json";
$result=file_get_contents($filename);
echo print_r($result,true);
?>