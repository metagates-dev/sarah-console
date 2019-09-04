<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control"   CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>欢迎使用 - SarahOS</title>
    <link href="/static/font/iconfont.css?v=<?php echo $this->_symbol["css_version"]?>" rel="stylesheet" type="text/css"/>
    <link href="/static/style/embed/desktop.css?v=<?php echo $this->_symbol["css_version"]?>" rel="stylesheet" type="text/css"/>
</head>
<body id="desktop" onkeydown="return event.keyCode!=122">
    <div class="win-body">
        <ul class="win-ul">
            <li class="win_list" data-src="/statistics/?__skin=embed&__app=statistic" data-cache="true" title="双击打开节点统计" data-app="statistic">
                <div class="win-list-div">
                    <div class="win-icon box_1 move-icon"></div>
                    <div class="win-name">节点统计</div>
                </div>
            </li>
            <li class="win_list" data-src="/node/list?__skin=embed&__app=node" data-cache="true" data-cachesrc="/node/list?__skin=embed&__app=node" title="双击打开节点管理" data-app="node">
                <div class="win-list-div">
                    <div class="win-icon box_2 move-icon"></div>
                    <div class="win-name">节点管理</div>
                </div>
            </li>
            <li class="win_list" data-src="/alert/list?__skin=embed&__app=alert" data-cache="true" title="双击打开警报列表" data-app="alert">
                <div class="win-list-div">
                    <div class="win-icon box_3 move-icon"></div>
                    <div class="win-name">警报管理</div>
                </div>
            </li>
            <li class="win_list" data-src="/computing/task/?__skin=embed&__app=task" data-cache="true" title="双击打开任务面板" data-app="task">
                <div class="win-list-div">
                    <div class="win-icon box_4 move-icon"></div>
                    <div class="win-name">任务面板</div>
                </div>
            </li>
            <li class="win_list" data-src="/storage/ipfs/?__skin=embed&__app=storage" data-cache="true" title="双击打开节点统计" data-app="storage">
                <div class="win-list-div">
                    <div class="win-icon box_8 move-icon"></div>
                    <div class="win-name">IPFS存储</div>
                </div>
            </li>
            <li class="win_list" data-src="/application/list?__skin=embed&__app=task" data-cache="true" title="双击打开应用中心" data-app="task">
                <div class="win-list-div">
                    <div class="win-icon box_7 move-icon"></div>
                    <div class="win-name">应用中心</div>
                </div>
            </li>
            <?php foreach($this->_symbol["apps"] as $app){?>
                <li class="win_list custom-app" data-src="/application/node/?<?php echo $app["app"]["v_qstr"]?>&__skin=embed&__app=<?php echo $app["app"]["name"]?>" title="双击打开<?php echo $app["app"]["name"]?>" data-app="<?php echo $app["app"]["name"]?>" data-icon="img">
                    <div class="win-list-div">
                        <img class="win-icon-v2 move-icon" src="<?php echo $app["app"]["icon_url"]?>" alt="<?php echo $app["app"]["name"]?>">
                        <div class="win-name"><?php echo $app["app"]["name"]?></div>
                    </div>
                </li>
            <?php }?>

            <li class="win_list" data-src="/sdk/linux/?__skin=embed&__app=document" title="双击进入SDK下载" data-app="document">
                <div class="win-list-div">
                    <div class="win-icon box_6 move-icon"></div>
                    <div class="win-name">SDK下载</div>
                </div>
            </li>
            <li class="win_list_2" data-src="" id="full_screen" title="点击全屏显示">
                <div class="win-list-div">
                    <div class="win-icon box_11 move-icon"></div>
                    <div class="win-name">全屏显示</div>
                </div>
            </li>
            <!--不显示图标-->
            <li class="win_list sarah-hide" data-src="/user/?__skin=embed&__app=document" title="双击进入SDK下载" data-app="user">
                <div class="win-list-div">
                    <div class="win-icon box_5 move-icon"></div>
                    <div class="win-name">用户设置</div>
                </div>
            </li>
        </ul>
        <div class="win-footer">
            <div class="win_start" id="win_start">
                <i class="iconfont iconmenu menu-start"></i>
            </div>
            <ul class="win-footer-list">

            </ul>
        </div>
    </div>
    <ul class="win-start-dialog">
        <li class="win-start-list" id="user_info">
            <i class="iconfont icongeren win-start-logo"></i>
            <?php echo session('uname')?>
        </li>
        <li class="win-start-list" id="user_profile">
            <i class="iconfont iconshezhi win-start-logo"></i>
            用户设置
        </li>
        <li class="win-start-list">

            <a class="win-start-link" href="/admin/logOut"><i class="iconfont icontuichu win-start-logo"></i> 安全退出</a>
        </li>
    </ul>
    <div class="mark-logo"></div>
    <script src="/script/desktop/?cache_ttl=600&v=20190412"></script>
    <script>
        window.sarahWin.init();
    </script>
</body>
</html>
