<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function queryFinishedGoodRequisition() {
    $.ajax({
        url: "/finishedgoodrequisition/queryFinishedGoodRequisition",
        success: function(result) {
            $('#queryFinishedGoodRequisitionTable').remove();
            var row = JSON.parse(result);
            var header = ["領貨單編號", "成品代號", "成品", "包裝", "儲放區域", "領貨日期", "領貨單位", "領貨人員", "領貨數量"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryFinishedGoodRequisitionTable');
            table.appendTo($('#queryFinishedGoodRequisitionList'));
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
                    "model":"finishedgoodrequisitionmodel",
                    "queryfunction":"queryFinishedGoodRequisitionData",
                    "header":["領貨單編號", "成品代號", "成品", "包裝", "儲放區域", "領貨日期", "領貨單位", "領貨人員", "領貨數量"]
                }

    $('.download-finishedgoodrequisition-excel').click( function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:'downloadFinishedGoodRequisitionExcel',
            dataType: 'json',
            data: {excelBuildData:postData},
            success: function (data, textstatus) {
                          if( !('error' in data) ) {
                            var $a = $("#excel-finishedgoodrequisition-download");
                            var today = new Date();
                            var day = today.getDate();
                            var month_index = today.getMonth();
                            var year = today.getFullYear();
                            $a.attr("href",data.file);
                            $a.attr("download","領貨單報表"+"-"+(month_index+1)+"-"+day+"-"+year+".xlsx");
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
    <div class="ui-block-a"><a href="<?php echo base_url('finishedgoodrequisition/addFinishedGoodRequisitionView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('finishedgoodrequisition/queryFinishedGoodRequisitionView');?>" data-role="button" data-icon="flat-bubble" data-theme="f">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="f" onclick="queryFinishedGoodRequisition()">領貨單查詢</button>
</div>

<div class="ui-block-b"><a id = "excel-finishedgoodrequisition-download" style="display:none;" href="" data-role="button" data-icon="flat-bubble" data-theme="c">Excel Download FGE</a></div>
<div class="ui-block-b download-finishedgoodrequisition-excel"><a href="" data-role="button" data-icon="flat-bubble" data-theme="f">下載成品庫存 Excel</a></div>

<br><br>
<div></div>
<br><br>
<div id="queryFinishedGoodRequisitionList"></div>
