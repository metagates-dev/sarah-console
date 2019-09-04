<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control"   CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>警报设置</title>
    <link href="/static/font/iconfont.css?v=<?php echo $this->_symbol["css_version"]?>" rel="stylesheet" type="text/css"/>
    <link href="/static/style/embed/sarah.css?v=<?php echo $this->_symbol["css_version"]?>" rel="stylesheet" type="text/css"/>
    <style>
        .container{margin-top: 60px;}
        .sec{padding-bottom: 0;}
        .check-pos{margin-top: 20px;font-size: 14px;line-height: 17px;}
        #saveInformBtn{margin-top: 13px;margin-right: 15px;}
    </style>
</head>
<body>
    <nav class="nav">
        <a class="link" href="/alert/list?__skin=embed">警报列表</a>
        <a class="link active" href="/alert/setting?__skin=embed">警报设置</a>
    </nav>
    <div class="container">
        <div class="sec float-clear">
            <div class="sec-title">警报设置
                <div class="float-right">
                    <button class="btn-text state-blue btn-xs" id="editSetting">
                        <i class="iconfont iconbianji float-left"></i>&nbsp;编辑
                    </button>
                </div>
            </div>
            <table class="sarah-table">
                <thead>
                <tr class="table-title">
                    <th class="padding-left text-overflow">警报项</th>
                    <th class="padding-left text-overflow">系统负载</th>
                    <th class="padding-left text-overflow">内存使用率</th>
                    <th class="padding-left text-overflow">磁盘使用率</th>
                    <th class="padding-left text-overflow">上传带宽byte/s</th>
                    <th class="padding-left text-overflow">下载带宽byte/s</th>
                    <th class="padding-left text-overflow">自动报警</th>
                </tr>
                </thead>
                <tbody>
                <tr id="alertOption">
                    <td class="padding-left text-overflow">警报值</td>
                    <td class="padding-left text-overflow"><input class="input" id="loadavg" type="text" value="<?php echo $this->_symbol["setting"]["itemConfig"]["loadavg"]?>" readonly></td>
                    <td class="padding-left text-overflow"><input class="input" id="ram_percent" type="text" value="<?php echo $this->_symbol["setting"]["itemConfig"]["ram_percent"]?>" readonly></td>
                    <td class="padding-left text-overflow"><input class="input" id="disk_percent" type="text" value="<?php echo $this->_symbol["setting"]["itemConfig"]["disk_percent"]?>" readonly></td>
                    <td class="padding-left text-overflow"><input class="input" id="incoming_bd" type="text" value="<?php echo $this->_symbol["setting"]["itemConfig"]["incoming_bd"]?>" readonly></td>
                    <td class="padding-left text-overflow"><input class="input" id="outgoing_bd" type="text" value="<?php echo $this->_symbol["setting"]["itemConfig"]["outgoing_bd"]?>" readonly></td>
                    <td class="padding-left text-overflow">
                        <div class="config-value switch margin-top-v3 <?php echo $this->_symbol["setting"]["open_alert"] ? 'switch-active' : ''?>" id="autoAlert" data-edit="0">
                            <div class="circle"></div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="float-right margin-right-v3 margin-bottom-v1 sarah-hide" id="edit_btn">
                <button class="btn btn-cancel btn-xs margin-right-v2" id="cancelEdit">取消</button>
                <button class="btn btn-blue btn-xs " id="saveAlertBtn">保存</button>
            </div>
        </div>

        <div class="sec margin-top-v4 float-clear">
            <div>
                <div class="sec-title float-left">通知方式</div>
                <div class="float-left check-pos margin-left-v8">
                    <input class="check-box" id="mobile_alert" type="checkbox" name="mobile_alert" <?php if ($this->_symbol["setting"]["mobile_alert"] > 0) {?>checked<?php }?>>
                    <label class="check-label margin-right-v5"></label>手机短信
                </div>
                <div class="float-left check-pos margin-left-v8">
                    <input class="check-box" id="email_alert" type="checkbox" name="email_alert" <?php if ($this->_symbol["setting"]["email_alert"] > 0) {?>checked<?php }?>>
                    <label class="check-label margin-right-v5"></label>电子邮件
                </div>
                <div class="float-left check-pos margin-left-v8">
                    <input class="check-box" id="wechat_alert" type="checkbox" name="wechat_alert" <?php if ($this->_symbol["setting"]["wechat_alert"] > 0) {?>checked<?php }?>>
                    <label class="check-label margin-right-v5"></label>微信推送
                </div>
                <div class="float-right">
                    <button class="btn btn-blue btn-xs" id="saveInformBtn">保存修改</button>
                </div>
            </div>
        </div>

        <div class="sec margin-top-v4">
            <div class="sec-title">接收人管理
                <div class="float-right">
                    <button class="btn-text state-blue btn-xs" id="add_receiver">
                        <i class="iconfont icontianjia float-left"></i>
                        &nbsp;添加接收人
                    </button>
                </div>
            </div>
            <div id="receivers"></div>
        </div>
    </div>
    <div class="dialog" id="receiver_dialog">
        <div class="header" id="receiver_title">添加接收人</div>
        <div class="input-line margin-top-v2 float-clear">
            <label class="title">姓名：</label>
            <input class="content" id="name" type="text" placeholder="请输入接收人姓名">
        </div>
        <div class="input-line float-clear">
            <label class="title">手机号码：</label>
            <input class="content" id="mobile" type="text" placeholder="请输入接收人手机号码">
        </div>
        <div class="input-line float-clear">
            <label class="title">电子邮箱：</label>
            <input class="content" id="email" type="text" placeholder="请输入接收人电子邮箱">
        </div>
        <div class="input-line float-clear">
            <label class="title">微信openid：</label>
            <input class="content" id="openid" type="text" placeholder="请输入接收者微信的openid">
        </div>
        <div class="float-right margin-top-v4">
            <button class="btn btn-cancel btn-md letter-space" id="cancel_receiver">取消</button>
            <button class="btn btn-blue btn-md letter-space" id="save_receiver">确定</button>
        </div>
    </div>
    <?php include $this->getIncludeFile('common/dialog.html')?>
    <script type="text/template" id="receiver_tpl">
        <table class="sarah-table">
            <tr class="table-title">
                <td class="padding-left text-overflow table-row-v2">姓名</td>
                <td class="padding-left text-overflow table-row-v3">手机号码</td>
                <td class="padding-left text-overflow table-row-v6">电子邮箱</td>
                <td class="padding-left text-overflow">微信openid</td>
                <td class="padding-left text-overflow table-row-v5">添加时间</td>
                <td class="padding-left text-overflow table-row-v5">更新时间</td>
                <td class="padding-left text-overflow table-row-v3">操作</td>
            </tr>
            <%if({receivers}.length == 0){%>
                <tr class="table-row">
                    <td class="text-center" colspan="7"></td>
                </tr>
            <%}else{%>
                <%for(var i=0;i < {receivers}.length; i++){%>
                    <tr class="table-row">
                        <td class="padding-left text-overflow receiver-name" title="<%={receivers[i]}.name%>"><%={receivers[i]}.name%></td>
                        <td class="padding-left text-overflow receiver-mobile" title="<%={receivers[i]}.name%>"><%={receivers[i]}.mobile%></td>
                        <td class="padding-left text-overflow receiver-email" title="<%={receivers[i]}.email%>"><%={receivers[i]}.email%></td>
                        <td class="padding-left text-overflow receiver-openid" title="<%={receivers[i]}.wx_openid%>"><%if(!{receivers[i]}.wx_openid){%>no openid <%}else{%> <%={receivers[i]}.wx_openid%> <%}%></td>
                        <td class="padding-left text-overflow" title="<%={receivers[i]}.created_time%>"><%={receivers[i]}.created_time%></td>
                        <td class="padding-left text-overflow" title="<%={receivers[i]}.updated_time%>"><%={receivers[i]}.updated_time%></td>
                        <td class="padding-left" data-id="<%={receivers[i]}.Id%>">
                            <div class="select">
                                <div class="title state-blue more-option">更多操作 <i class="iconfont iconxiala icon"></i></div>
                                <ul class="option">
                                    <li class="item updata-receiver">修改资料</li>
                                    <li class="item delete-receiver">删除联系人</li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                <%}}%>
        </table>
    </script>
    <script src="/script/alert/setting?v=20190412"></script>
    <script>
        var config = {
            saveAlertBtn: "#saveAlertBtn",
            saveInformBtn: "#saveInformBtn",
            alert_container: document.getElementById("receivers"),
            alert_tpl: document.getElementById("receiver_tpl").innerHTML
        };
        window.alertset.init(config);
    </script>
</body>
</html>
