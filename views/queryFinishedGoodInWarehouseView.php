<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function queryFinishedGoodInWarehouse() {
    $.ajax({
        url: "/finishedgoodinwarehouse/queryFinishedGoodInWarehouse",
        success: function(result) {
            $('#queryFinishedGoodInWarehouseTable').remove();
            var row = JSON.parse(result);
            var header = ["入庫單編號", "倉儲流水號", "批號", "成品編號", "成品", "包裝", "狀態", "儲放區域", "入庫日期", "棧板數", "入庫數量", "入庫重量", "尚餘數量"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryFinishedGoodInWarehouseTable');
            table.appendTo($('#finishedGoodInWarehouseList'));
            var tr = $(document.createElement('tr'));
            tr.appendTo(table);
            for(var i in header)
            {
                var th = $(document.createElement('th'));
                th.text(header[i]);
                th.appendTo(tr);
            }

            for(var j in row)
            {
                tr = $(document.createElement('tr'));
                tr.appendTo(table);
                for(var k in row[j])
                {
                    var td = $(document.createElement('td'));
                    td.text(row[j][k]);
                    td.appendTo(tr);
                }
            }
        }
    });
}

$(document).ready(function(){

    var postData = 
                {
                    "model":"finishedgoodinwarehousemodel",
                    "queryfunction":"queryFinishedGoodInWarehouseData",
                    "header":["入庫單編號", "倉儲流水號", "批號", "成品編號", "成品", "包裝", "狀態", "儲放區域", "入庫日期", "棧板數", "入庫數量", "入庫重量", "尚餘數量"]
                }

    $('.download-finishedgoodinwarehouse-excel').click( function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:'downloadFinishedGoodInWarehouseExcel',
            dataType: 'json',
            data: {excelBuildData:postData},
            success: function (data, textstatus) {
                          if( !('error' in data) ) {
                            var $a = $("#excel-finishedgoodinwarehouse-download");
                            var today = new Date();
                            var day = today.getDate();
                            var month_index = today.getMonth();
                            var year = today.getFullYear();
                            $a.attr("href",data.file);
                            $a.attr("download","成品庫存報表"+"-"+(month_index+1)+"-"+day+"-"+year+".xlsx");
                            $a[0].click();
                          }
                          else {
                              console.log(data.error);
                          }
                    }
        });
        return false; 
    });
});
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('finishedgoodentry/addFinishedGoodEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="c">成品入庫</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('finishedgoodinwarehouse/queryFinishedGoodInWarehouseView');?>" data-role="button" data-icon="flat-bubble" data-theme="f">查詢成品庫存</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="f" onclick="queryFinishedGoodInWarehouse()">成品庫存查詢</button>
</div>

<div class="ui-block-b"><a id = "excel-finishedgoodinwarehouse-download" style="display:none;" href="" data-role="button" data-icon="flat-bubble" data-theme="c">Excel Download FGE</a></div>
<div class="ui-block-b download-finishedgoodinwarehouse-excel"><a href="" data-role="button" data-icon="flat-bubble" data-theme="f">下載成品庫存 Excel</a></div>

<br><br>
<div></div>
<br><br>
<div id="finishedGoodInWarehouseList"></div>
