<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>公司信息</title>
<?php include("../../common/header1.html"); ?>
<link type="text/css" rel="stylesheet" href="/static/css/detail.css">
<!-- uploadify start -->
<link type="text/css" rel="stylesheet" href="/static/lib/jquery-uploadify/uploadify.css">
<script type="text/javascript" src="/static/lib/jquery-uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/static/js/upload.js"></script>
<!-- uploadify end -->
</head>
<body>
<form method="post" action="_form.php">
<input type="hidden" name="id" id="id" value="">
<input type="hidden" name="imgUrl" id="imgUrl">
<div class="t-wrapper">
    <div class="t-content">
        <table class="content">
            <tr>
                <td class="t-label"><i>*</i>企业名称：</td>
                <td colspan="2"><input name="companyName" type="text" class="input-txt" value="" datatype="s6-18" errormsg="昵称至少6个字符,最多18个字符" nullmsg="请输入6-18位字符" title="请输入企业名称！" required></td>
                <td class="t-label"><i>*</i>公司性质：</td>
                <td colspan="2">
                    <select name="enterpriseType" id="enterpriseType" title="请选择公司性质！" required>
                        <option value="51">国企</option>
                        <option value="52">外企</option>
                        <option value="53">合资</option>
                        <option value="54">私企</option>
                   </select>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>企业邮箱：</td>
                <td colspan="2"><input name="linkEmail" type="text" class="input-txt" value="" datatype="e" title="请输入企业邮箱！" errormsg="请输入正确企业邮箱" nullmsg="请输入企业邮箱" required></td>
                <td class="t-label"><i>*</i>法定代表人：</td>
                <td colspan="2"><input name="legalPerson" id="legalPerson" type="text" class="input-txt" value="" datatype="s2-18" title="请输入法定代表人！" errormsg="请输入2-18位字符" nullmsg="请输入2-18位字符" required>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>企业联系人：</td>
                <td colspan="2"><input name="linkMan" type="text" class="input-txt" value="" datatype="s2-18" title="请输入企业联系人！" errormsg="请输入2-18位字符" nullmsg="请输入2-18位字符" required></td>
                <td class="t-label"><i>*</i>联系电话：</td>
                <td colspan="2"><input name="linkMobile" type="text" class="input-txt" value="" datatype="/^(\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14}$/" title="请输入联系电话!" errormsg="请输入联系电话" nullmsg="请输入联系电话" required>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>法人证件类型：</td>
                <td colspan="2">
                    <select name="idType" id="idType" title="请选择法人证件类型！" required>
                        <option value="0">身份证</option>
                        <option value="1">护照</option>
                    </select>
                </td>
                <td class="t-label"><i>*</i>法人证件号：</td>
                <td colspan="2"><input type="text" class="input-txt" name="idNumber" id="idNumber" title="请输入法人证件号！" value="" required>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>法人手机号：</td>
                <td colspan="2"><input datatype="m" title="请输入法人手机号！" errormsg="请输入正确的法人手机号" nullmsg="请输入法人手机号" type="text" name="legalPhone" id="legalPhone"  value="" required></td>
                <td class="t-label"><i>*</i>所属行业：</td>
                <td colspan="2"><input datatype="*" title="请输入所属行业！" errormsg="请输入所属行业" type="text" name="industry" id="industry" value="" required></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>上传证件：</td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>地址：</td>
                <td colspan="5"><input datatype="*" title="请输入地址！" errormsg="请输入地址！" type="text" name="address"  value="" required></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>注册地址：</td>
                <td colspan="5"><input datatype="*" title="请输入注册地址！" errormsg="请输入注册地址！" type="text" name="registeredAddress"  value="" required></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>企业级别：</td>
                <td colspan="2">
                    <select name="serviceLevel" class="" id="serviceLevel" title="请选择企业级别！" required>
                        <option value="1">一级</option>
                        <option value="2">二级</option>
                        <option value="3">三级</option>
                        <option value="4">四级</option>
                    </select>
                </td>
                <td class="t-label"><i>*</i>公司人数：</td>
                <td colspan="2"><input datatype="n" title="请输入公司人数！" errormsg="请输入所属行业" type="text" name="totalStaff" id="totalStaff" value="" number="true" required></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>企业网站：</td>
                <td colspan="2"><input datatype="url" title="请输入企业网站！" errormsg="请输入正确的企业网址" type="text" name="website" value="" required></td>
                <td class="t-label"><i>*</i>开户行：</td>
                <td colspan="2"><input type="text" datatype="*" title="请输入开户行！" errormsg="请输入开户行" name="openingBank" id="openingBank" value="" required></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>所属支行：</td>
                <td colspan="2"><input type="text" datatype="*" title="请输入所属支行！" errormsg="请输入支行"  name="branchBank" id="branchBank" value="" required></td>
                <td class="t-label"><i>*</i>开户行账号：</td>
                <td colspan="2"><input datatype="*" title="请输入开户行账号！" errormsg="请输入开户行账号" type="text" name="accountBank" id="accountBank"  value="" required></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>纳税类型：</td>
                <td colspan="2">
                    <label><input type="radio" name="taxTypes" value="" title="请选择纳税类型！" checked="checked" required>一般纳税人</label>
                    <label><input type="radio" name="taxTypes" value="" title="请选择纳税类型！" required>小企业纳税人</label>                 
                </td>
                <td class="t-label"><i>*</i>发票类型：</td>
                <td colspan="2">
                    <label><input type="radio" name="invoiceType" value="" title="请选择发票类型！" checked="checked" required>增值税普通发票</label>
                    <label><input type="radio" name="invoiceType" value="" title="请选择发票类型！" required>增值税专用发票</label>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>增值税税率：</td>
                <td colspan="2">
                    <label><input type="radio" name="vatRate" value="301" title="请选择增值税税率！" checked="checked" required>6%</label>
                    <label><input type="radio" name="vatRate" value="302">11%</label>
                    <label><input type="radio" name="vatRate" value="303">17%</label>
                    <label><input type="radio" name="vatRate" value="304">其他</label>
                </td>
                <td class="t-label"><i>*</i>社会信用代码：</td>
                <td colspan="2">
                    <input type="text" name="creditCode" id="creditCode" title="请输入社会信用代码！" required>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>经营范围：</td>
                <td colspan="5">
                    <label><input type="checkbox" name="businessScope" value="21" title="请选择经营范围！" required>公路运输</label>
                    <label><input type="checkbox" name="businessScope" value="210">港口服务</label>
                    <label><input type="checkbox" name="businessScope" value="211">其他</label>
                    <label><input type="checkbox" name="businessScope" value="22">铁路运输</label>
                    <label><input type="checkbox" name="businessScope" value="23">水路运输</label>
                    <label><input type="checkbox" name="businessScope" value="24">航空运输</label>
                    <label><input type="checkbox" name="businessScope" value="25">管道运输</label>
                    <label><input type="checkbox" name="businessScope" value="26">危化品运输</label>
                    <label><input type="checkbox" name="businessScope" value="27">冷链运输</label>
                    <label><input type="checkbox" name="businessScope" value="28">仓储服务</label>
                    <label><input type="checkbox" name="businessScope" value="29">通关服务</label>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>成立日期：</td>
                <td colspan="2">
                    <input type="text" name="registerDate" id="registerDate" id="d4325" title="请选择成立日期！" onFocus="WdatePicker({})" required>
                </td>
                <td class="t-label"><i>*</i>有效期：</td>
                <td colspan="2">
                    <input type="text" name="expiryDate" id="expiryDate" title="请选择有效期！" onFocus="WdatePicker({})" required>
                </td>
            </tr>
            <tr>
                <td class="t-label-x">备注：</td>
                <td colspan="5">
                    <textarea name="memo"></textarea>
                </td>
            </tr>
        </table>
    </div>
    <div class="t-footer">
        <div class="btn-area">
            <input type="submit" class="btn btn-blue" value="保存">
            <input type="button" class="btn btn-yellow" value="审核通过">
            <input type="button" class="btn btn-danger js-failure" value="审核不通过">
        </div>
    </div>
</div>
</form>
<script type="text/javascript" src="/static/html/common/common.js"></script>
<script type="text/javascript" src="/static/html/company/detail.js"></script>
</body>
</html>
