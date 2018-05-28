<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function deleteMaterialRequisition(deleteURL) {
    $.ajax({
        url: deleteURL,
        success: function(result) {
            queryMaterialRequisition();
        }
    });
}

function queryMaterialRequisition() {
    $.ajax({
        url: "/materialRequisition/queryMaterialRequisition",
        success: function(result) {
            $('#queryMaterialRequisitionTable').remove();
            var row = JSON.parse(result);
            var header = ["領料單編號", "領料日期", "原料", "領料單位", "領料人員", "供應商", "包裝", "單位重量", "領料數量", "領料重量", "尚餘數量", "尚餘重量", "刪除"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryMaterialRequisitionTable');
            table.appendTo($('#queryMaterialRequisitionList'));
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
                    if ("materialRequisitionID" == k) {
                        var materialRequisitionID = row[j][k];
                    }

                    var td = $(document.createElement('td'));
                    td.text(row[j][k]);
                    td.appendTo(tr);
                }

                var deleteButton = $(document.createElement('button'));
                var onclickFunction = "deleteMaterialRequisition(\"/materialRequisition/deleteMaterialRequisition/" + materialRequisitionID + "\")";
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
    <div class="ui-block-a"><a href="<?php echo base_url('materialRequisition/addMaterialRequisitionView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialRequisition/queryMaterialRequisitionView');?>" data-role="button" data-icon="flat-bubble" data-theme="d">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="d" onclick="queryMaterialRequisition()">領料查詢</button>
</div>

<br><br>
<div id="queryMaterialRequisitionList"></div>
