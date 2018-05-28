<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function deleteFinishedGoodRequisition(deleteURL) {
    $.ajax({
        url: deleteURL,
        success: function(result) {
            queryFinishedGoodRequisition();
        }
    });
}

function queryFinishedGoodRequisition() {
    $.ajax({
        url: "/finishedgoodrequisition/queryFinishedGoodRequisition",
        success: function(result) {
            $('#queryFinishedGoodRequisitionTable').remove();
            var row = JSON.parse(result);
            var header = ["領貨編號", "出庫日期", "成品代號", "成品種類", "出庫單位", "出庫人員", "出庫數量", "單位重量", "棧板數", "出庫重量", "尚餘數量", "尚餘重量", "刪除"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryFinishedGoodRequisitionTable');
            table.appendTo($('#finishedGoodRequisitionList'));
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
                    if ("finishedgoodrequisitionID" == k) {
                        var finishedGoodRequisitionID = row[j][k];
                    }

                    var td = $(document.createElement('td'));
                    td.text(row[j][k]);
                    td.appendTo(tr);
                }

                var deleteButton = $(document.createElement('button'));
                var onclickFunction = "deleteFinishedGoodRequisition(\"/finishedgoodrequisition/deleteFinishedGoodRequisition/" + finishedGoodRequisitionID + "\")";
                deleteButton.attr({"class":"selfButton", "onclick":onclickFunction});
                deleteButton.text("刪除");

                td = $(document.createElement('td'));
                deleteButton.appendTo(td);
                td.appendTo(tr);
            }
        }
    });
}
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('finishedgoodrequisition/addFinishedGoodRequisitionView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('finishedgoodrequisition/queryFinishedGoodRequisitionView');?>" data-role="button" data-icon="flat-bubble" data-theme="f">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="f" onclick="queryFinishedGoodRequisition()">出庫查詢</button>
</div>

<br><br>
<div id="finishedGoodRequisitionList"></div>
