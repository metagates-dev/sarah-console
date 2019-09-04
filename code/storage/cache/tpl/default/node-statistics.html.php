<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>节点统计 - 正舵者矿机云监测</title>
    <link href="/static/style/common/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/style/default/style.css" rel="stylesheet" type="text/css"/>
    <style>
        .widget-map-chart{
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<?php include $this->getIncludeFile('default/blade/header.blade.html')?>
<div class="main">
<div class="container">
    <div class="widget-header">
        <h4 class="sub-header"><em class="glyphicon glyphicon-stats"></em>&nbsp;节点统计</h4>
    </div>
    <div class="widget-container">
        <h4 class="sub-header"><em class="glyphicon glyphicon-hdd"></em>&nbsp;硬件资源</h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>总节点数</th>
                <th>总vCPU</th>
                <th>平均vCPU</th>
                <th>总内存</th>
                <th>总存储空间</th>
                <th>更新时间</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $this->_symbol["stat"]["total"]?></td>
                <td><?php echo $this->_symbol["stat"]["cpu_cores"]?></td>
                <td><?php echo $this->_symbol["stat"]["avg_cpu_cores"]?></td>
                <td><?php echo $this->_symbol["stat"]["ram_kb"]?>KB&nbsp;≈&nbsp;<?php echo $this->_symbol["stat"]["ram_str"]?></td>
                <td><?php echo $this->_symbol["stat"]["disk_kb"]?>KB&nbsp;≈&nbsp;<?php echo $this->_symbol["stat"]["disk_str"]?></td>
                <td><?php echo $this->_symbol["stat"]["updated_time"]?></td>
              </tr>
            </tbody>
        </table>
        <div class="vertical-5"></div>
        <h4 class="sub-header"><em class="glyphicon glyphicon-headphones"></em>&nbsp;基础监测</h4>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>平均系统负载</th>
                <th>内存使用</th>
                <th>磁盘使用</th>
                <th>下载带宽</th>
                <th>上传带宽</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $this->_symbol["stat"]["avg_loadavg"]?></td>
                <td><?php echo $this->_symbol["stat"]["ram_used_kb"]?>&nbsp;≈&nbsp;<?php echo $this->_symbol["stat"]["ram_used_str"]?>, <?php echo $this->_symbol["stat"]["ram_used_percent"]?>%</td>
                <td><?php echo $this->_symbol["stat"]["disk_used_kb"]?>&nbsp;≈&nbsp;<?php echo $this->_symbol["stat"]["disk_used_str"]?>, <?php echo $this->_symbol["stat"]["disk_used_percent"]?>%</td>
                <td><?php echo $this->_symbol["stat"]["incoming_db"]?>B/sec&nbsp;≈&nbsp;<?php echo $this->_symbol["stat"]["incoming_db_str"]?></td>
                <td><?php echo $this->_symbol["stat"]["outgoing_bd"]?>B/sec&nbsp;≈&nbsp;<?php echo $this->_symbol["stat"]["outgoing_bd_str"]?></td>
              </tr>
            </tbody>
        </table>
        <div class="vertical-20"></div>
        <h4 class="sub-header"><em class="glyphicon glyphicon-globe"></em>&nbsp;节点分布</h4>
        <div class="widget-map-chart" id="widget_map" style="width: 100%;height: 600px;margin-bottom: 20px;"></div>
    </div>

</div>
</div>
<script src="/static/js/common/jquery.1.11.js"></script>
<script src="/static/js/common/bootstrap.min.js"></script>
<script src="/static/js/common/echarts.min.js"></script>
<script src="/static/js/dark/node-map.js"></script>
<script src="http://echarts.baidu.com/asset/map/js/world.js"></script>
<script type="text/javascript">
    var nodeData = [
        {name:"China",value:"1538",coordinate:[102.947956, 33.759559]},
        {name:"United States",value:"586",coordinate: [-102.560794, 39.830238]},
        {name:"Canada",value:"264",coordinate: [-118.493369, 60.197298]},
        {name:"Australia",value:"582",coordinate: [132.740687, -25.042580]},
        {name:"Japan",value:"465",coordinate: [138.265336, 36.196679]},
        {name:"United Kingdom",value:"256",coordinate: [-2.946899, 54.710688]},
    ];
    var skin = {
        bgColor: "#fff",
        textColor:"#132a60",
        tooltipBgColor: "",
        tooltipBdColor: "",
        geoBgColor: "#2791c8",
        geoBdColor: "#fff",
        geoHoverBgColor:"#1f648a",
        legendColor: ["rgba(134,229,244,0.9)"]
    };
    window.NodeMap.init({
        map_dom: document.getElementById('widget_map'),
        data: nodeData,
        skin: skin
    });
</script>
</body>
</html>
