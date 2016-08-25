<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>线路信息</title>
<?php include("../../common/header1.html"); ?>
<link type="text/css" rel="stylesheet" href="/static/css/detail.css">
</head>
<body>
<form method="post" action="_form.php">
<input type="hidden" name="id" id="id" value="">
<div class="t-wrapper">
    <div class="t-content">
        <table class="content">
            <tbody class="main-content">
            <tr>
                <td class="t-label"><i>*</i>供应商：</td>
                <td colspan="2">
                    <select name="companyId" id="companyId" title="请选择供应商！" required>
                        <option value="">请选择</option>
                        <option value="1">11111</option>
                        <option value="2">22222</option>
                        <option value="3">33333</option>
                    </select>
                </td>
                <td class="t-label"><i>*</i>运力类型：</td>
                <td colspan="2">
                    <label><input type="radio" name="lineType" title="请选择运力类型！" value="231" checked required>公路</label>
                    <label><input type="radio" name="lineType" value="232">铁路</label>
                    <label><input type="radio" name="lineType" value="233">内河航运</label>
                    <label><input type="radio" name="lineType" value="234">海运</label>
                </td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>联系人：</td>
                <td colspan="2"><input name="linkMan" type="text" title="请输入联系人！" required/></td>
                <td class="t-label"><i>*</i>手机号：</td>
                <td colspan="2"><input name="linkMobile" maxlength="20" mobile="true" type="text" title="请输入正确的联系人手机号！" required/></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>始发地：</td>
                <td colspan="5" class="departure"><?php include("../../common/departure.html");?></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>目的地：</td>
                <td colspan="5" class="destination"><?php include("../../common/destination.html");?></td>
            </tr>            
            <tr>
                <td class="t-label"><i>*</i>有效时间：</td>
                <td colspan="2">
                    <input type="text" class="ipt-among1" name="availableFrom" id="createTimeStart" onFocus="WdatePicker({minDate:'%y-%M-%d',maxDate:'#F{$dp.$D(\'createTimeEnd\',{d:-1});}'})" title="请输入有效时间！" required/> - 
                    <input type="text" class="ipt-among1" name="availableTo" id="createTimeEnd" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'createTimeStart\',{d:1})||\'%y-%M-%d\';}'})"  title="请输入有效时间！" required/>
                </td>
                <td class="t-label"><i>*</i>运输时效：</td>
                <td colspan="2"><input type="text" name="expiryDays" value="" class="ipt-among1" title="运输时效为必输字段且为数字型" number="true" required><i>天</i></td>
            </tr>
            <tr>
                <td class="t-label"><i>*</i>装载量：</td>
                <td colspan="2">
                    <input type="text" name="loadLimit" class="ipt-among1" title="装载量为必输字段且为数字型" number="true" required>
                    <select class="units" name="unit">
                        <option value="1">吨</option>
                        <option value="2">立方</option>
                    </select>
                </td>
                <td class="t-label"><i>*</i>装载类型：</td>
                <td colspan="2"><input type="text" name="loadType" title="请输入装载类型！" required /></td>
            </tr>
            <tr>
                <td class="t-label">
                    <i>*</i><span id="transNum">车皮数</span>
                </td>
                <td colspan="5">
                    <input type="text" name="transportNum" class="ipt-among1" title="请输入正确的运输工具数！" number="true" required /><i>台</i>
                </td>
            </tr>
            </tbody>
            <tbody class="tab-content">
            <tr name="lineType-231" class="commType">
                <td class="t-label">覆盖范围：</td>
                <td colspan="2"><input type="text"  name="licenseScope"  value="" class="input-txt " /></td>
                <td class="t-label"><i>*</i>装载规格：</td>
                <td colspan="2">
                    <input type="text" name="loadSpec" title="请输入装载规格!" value="" class="input-txt " required/>
                </td>
            </tr>
            <tr name="lineType-232" class="commType hide">
                <td class="t-label">覆盖范围：</td>
                <td colspan="2"><input type="text" name="licenseScope"></td>
                <td class="t-label">铁路公司：</td>
                <td colspan="2">
                    <input type="text" name="operatorCompany">
                </td>
            </tr>
            <tr name="lineType-233" class="commType hide">
                <td class="t-label">覆盖范围：</td>
                <td colspan="2"><input type="text"  name="licenseScope"></td>
                <td class="t-label"><i>*</i>装载规格：</td>
                <td colspan="2"><input type="text" name="loadSpec" title="请输入装载规格!" required></td>
            </tr>
            <tr name="lineType-233" class="commType hide">
                <td class="t-label">船舶名称：</td>
                <td colspan="5"><input type="text" name="shipName" class="ipt-full"></td>
            </tr>
            <tr name="lineType-234" class="commType hide">
                <td class="t-label">航线：</td>
                <td colspan="2">
                    <select class="units" name="route">
                        <option value="371">澳新线</option>
                        <option value="372">南太平洋线</option>
                        <option value="373">香港线</option>
                        <option value="374">东南亚线</option>
                        <option value="375">俄远东线</option>
                        <option value="376">印巴线</option>
                        <option value="377">红海线</option>
                        <option value="378">欧洲线</option>
                        <option value="379">地西线</option>
                        <option value="380">亚得里亚海</option>
                        <option value="381">地东线</option>
                        <option value="382">黑海线</option>
                        <option value="383">北非线</option>
                        <option value="384">欧地线内陆</option>
                        <option value="385">西非线</option>
                        <option value="386">南非线</option>
                        <option value="387">东非线</option>
                        <option value="388">墨西哥线</option>
                        <option value="389">墨西哥内陆点</option>
                        <option value="390">巴拿马线</option>
                        <option value="391">加勒比线</option>
                        <option value="392">中美洲</option>
                        <option value="393">南美东</option>
                        <option value="394">南美西</option>
                        <option value="395">韩国线</option>
                        <option value="396">台湾线</option>
                        <option value="397">日本线</option>
                        <option value="398">美加线</option>
                    </select>
                </td>
                <td class="t-label">船舶名称：</td>
                <td colspan="2">
                    <input type="text" name="shipName">
                </td>
            </tr>
            <tr name="lineType-234" class="commType hide">
                <td class="t-label">船舶公司：</td>
                <td colspan="2">
                    <input type="text" name="operatorCompany">
                </td>
                <td class="t-label"><i>*</i>装载规格：</td>
                <td colspan="2"><input type="text" title="请输入装载规格!" name="loadSpec" required></td>
            </tr>
            </tbody>
            <tbody class="common-content">
                <tr>
                    <td class="t-label">适运类型：</td>
                    <td colspan="5">
                        <select class="select-multiple" multiple="multiple" name="cateId" id="cateId">
                            <option value="200">有色</option>
                            <option value="202">锌锭</option>
                            <option value="203">铝锭</option>
                            <option value="300">化工</option>
                            <option value="301">有机化工</option>
                            <option value="302">塑料</option>
                            <option value="303">橡胶</option>
                            <option value="400">矿产</option>
                            <option value="403">铝土矿</option>
                            <option value="404">镍矿</option>
                            <option value="405">锰矿</option>
                            <option value="500">钢材</option>
                            <option value="501">热卷</option>
                            <option value="502">建材</option>
                            <option value="503">中厚板</option>
                            <option value="506">冷轧</option>
                            <option value="600">能源</option>
                            <option value="601">煤炭</option>
                            <option value="602">成品油</option>
                            <option value="603">焦炭</option>
                            <option value="700">农产品</option>
                            <option value="701">豆类</option>
                            <option value="702">粕类</option>
                            <option value="703">糖类</option>
                            <option value="704">油类</option>
                            <option value="3039047">电解镍</option>
                            <option value="3039442">电工电气/电子设备/安防</option>
                            <option value="3039443">电工器材</option>
                            <option value="3039450">电气工控</option>
                            <option value="3039457">手机/数码/家电</option>
                            <option value="3039458">手机配件</option>
                            <option value="3039460">数码及配件</option>
                            <option value="3039461">电脑及配件</option>
                            <option value="3039462">食品/制药/保健品</option>
                            <option value="3039463">大家电</option>
                            <option value="3039464">食品机械</option>
                            <option value="3039465">小家电</option>
                            <option value="3039477">电气设备</option>
                            <option value="3039480">食品配料</option>
                            <option value="3039484">制药机械</option>
                            <option value="3039495">安防用品</option>
                            <option value="3039515">消防器材</option>
                            <option value="3039521">家具/日用/床上用品</option>
                            <option value="3039522">家纺</option>
                            <option value="3039524">家饰</option>
                            <option value="3039526">家具</option>
                            <option value="3039528">美妆日用</option>
                            <option value="3039535">工程机械/机械工业</option>
                            <option value="3039538">工程整机</option>
                            <option value="3039540">行业机械</option>
                            <option value="3039542">通用机械</option>
                            <option value="3039544">零配件</option>
                            <option value="3039559">服装/纺织/配饰</option>
                            <option value="3039561">女装</option>
                            <option value="3039563">内衣</option>
                            <option value="3039565">男装</option>
                            <option value="3039567">童装</option>
                            <option value="3039584">办公用品/运动器材</option>
                            <option value="3039587">办公用品</option>
                            <option value="3039592">办公设备及耗材</option>
                            <option value="3039595">运动器材</option>
                            <option value="3039612">汽车用品/汽车配件</option>
                            <option value="3039613">汽车配件</option>
                            <option value="3039614">汽车用品</option>
                            <option value="3039615">汽车电子</option>
                            <option value="3039631">冶金</option>
                            <option value="3039632">铜合金</option>
                            <option value="3039633">铝合金</option>
                            <option value="3039634">铅合金</option>
                            <option value="3039635">镀锌板</option>
                            <option value="3039636">建材/五金/家装</option>
                            <option value="3039637">建材</option>
                            <option value="3039638">化学原料/橡胶/精细化学品</option>
                            <option value="3039639">五金</option>
                            <option value="3039640">化工原料</option>
                            <option value="3039641">涂料</option>
                            <option value="3039642">卫浴</option>
                            <option value="3039643">塑料橡胶产品</option>
                            <option value="3039644">灯具</option>
                            <option value="3039645">精细化学品</option>
                            <option value="3039679">石油制品/天然气</option>
                            <option value="3039680">石油制品</option>
                            <option value="3039681">天然气</option>
                            <option value="3039690">农资/农机</option>
                            <option value="3039691">农资</option>
                            <option value="3039692">农机</option>
                            <option value="3039721">铁合金</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="t-label">装卸服务：</td>
                    <td colspan="2">
                        <label><input type="radio" name="loadService" value="0" title="请选择装卸服务！" checked>是</label>
                        <label><input type="radio" name="loadService" value="1">否</label>
                    </td>
                    <td class="t-label">清关服务：</td>
                    <td colspan="2">
                        <label><input type="radio" name="clearanceService" value="0" title="请选择清关服务！" checked>是</label>
                        <label><input type="radio" name="clearanceService" value="1" checked>否</label>
                    </td>
                </tr>
                <tr>
                    <td class="t-label">联运服务：</td>
                    <td colspan="2">
                        <select name="transportService">
                            <option value="">请选择</option>
                            <option value="280">无</option>
                            <option value="281">门到门</option>
                            <option value="282">门到港</option>
                            <option value="283">门到仓</option>
                        </select>
                    </td>
                    <td class="t-label"></td>
                    <td colspan="2">
                        <label><input type="checkbox" id="discountType" value="0" name="discountType">运费特惠/线路折扣</label>
                    </td>
                </tr>
                <tr class="discountType hide">
                    <td class="t-label"><i>*</i>折扣/特惠：</td>
                    <td colspan="2"><input type="text" name="rebate" id="rebate" class="ipt-among1" title="折扣/特惠为必输字段且为数字类型！" number="true"/><i>折</i></td>
                    <td class="t-label"><i>*</i>特惠时间：</td>
                    <td colspan="2">
                        <input type="text" name="discountDateFrom" id="discountDateStart" title="请输入特惠时间！" class="ipt-among1"  onFocus="WdatePicker({minDate:'%y-%M-%d',maxDate:'#F{$dp.$D(\'discountDateEnd\',{d:-1});}'})"/> - 
                        <input type="text" name="discountDateTo" id="discountDateEnd" title="请输入特惠时间！" class="ipt-among1" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'discountDateStart\',{d:1})||\'%y-%M-%d\';}'})"/>
                    </td>
                </tr>
            <tr>
                <td class="t-label"><i>*</i>报价：</td>
                <td colspan="2">
                    <input type="text" name="offerContent" title="请输入报价！" required>
                </td>
                <td class="t-label">合同模板：</td>
                <td colspan="2">
                    <select name="contractTplId" id="contractTplId">
                        <option value="">请选择</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="t-label">备注：</td>
                <td colspan="5">
                    <input type="text" name="remark" style="width: 100%" value="">
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="t-footer">
        <div class="btn-area">
            <input type="submit" class="btn btn-blue btnPublish" value="发布">
            <input type="button" class="btn btn-gray btnCancel" value="取消">
        </div>
    </div>
</div>
</form>
<script type="text/javascript" src="/static/html/common/common.js"></script>
<script type="text/javascript" src="/static/html/common/area.js"></script>
<script type="text/javascript" src="/static/html/common/roadline.js"></script>
<script type="text/javascript" src="/static/html/line/detail.js"></script>
</body>
</html>
