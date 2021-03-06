<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>导入</title>
<?php include("../../common/header1.html"); ?>
<link type="text/css" rel="stylesheet" href="/static/css/detail.css">
<style>
.t-content{
    padding-top: 30px;
    text-align: center;
}
.t-content a.btn,
.t-content input.btn{
    height:30px;
    line-height: 30px;
    margin-right: 5px;
    padding: 0 15px;
    font-size: 12px;
}
.t-footer{
    padding-top: 20px;
}
.t-footer input.btn{
    margin: 0 3px;
}
input.file[type='file']{
    display: none;
}
input[name='filePath'][type='text']{
    width: 230px;
    line-height: 30px;
    height: 30px;
    padding: 0 8px;
    vertical-align: middle;
}
/* for uploading progress  */
.t-layer .progress {
    position: relative;
    width: 200px;
    border: 1px solid #ddd;
    padding: 1px;
    border-radius: 3px;
}
.t-layer .bar {
    background-color: #B4F5B4;
    width: 0%;
    height: 20px;
    border-radius: 3px;
}
.t-layer .percent {
    text-align: center;
}
.t-layer .status{
    font-size: 14px;
    text-align: center;
    padding: 3px;
}
.uploadingProgress{
    padding: 5px;
    display: none;
}
</style>
</head>
<body>
<form method="post" action="_import.php">
<div class="t-wrapper">
    <div class="t-content">
        <input type="text" name="filePath" title="请选择要上传的导入文件！" readonly required>
        <input type="button" class="btn btn-blue btnSelectFile" value="浏览文档">
        <input type="file" class="file" name="file">
        <a class="btn btn-info" href="javascript:void(0)">下载模板</a>
    </div>
    <div class="t-footer">
        <div class="btn-area">
            <input type="submit" class="btn btn-yellow btnUpload" value="上传">
            <input type="button" class="btn btn-gray btnCancel" value="取消">
        </div>
    </div>
</div>
</form>
<div class="t-layer">
    <div class="uploadingProgress">
        <div class="status">正在导入数据...</div>
        <div class="progress">
            <div class="bar"><div class="percent">0%</div></div>
            
        </div>
    </div> 
</div>
<script type="text/javascript" src="/static/html/common/common.js"></script>
<script type="text/javascript" src="/static/html/company/import.js"></script>
</body>
</html>
