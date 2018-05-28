<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    $('#addMaterialRequisitionForm').submit(function(event) {
        var formData = $('#addMaterialRequisitionForm').serialize();

        $.ajax({
            url: "/materialRequisition/addMaterialRequisition",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addMaterialRequisitionTable').remove();
                var row = JSON.parse(result);
                var header = ["領貨單編號", "原料", "供應商", "領料日期", "領料單位", "領料人員", "領料數量", "領料重量", "尚餘數量", "尚餘重量"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addMaterialRequisitionTable');
                table.appendTo($('#addMaterialRequisitionList'));
                var tr = $(document.createElement('tr'));
                tr.appendTo(table);
                for(var i in header)
                {
                    var th = $(document.createElement('th'));
                    th.text(header[i]);
                    th.appendTo(tr);
                }

                tr = $(document.createElement('tr'));
                tr.appendTo(table);
                for(var j in row)
                {
                    td = $(document.createElement('td'));
                    td.text(row[j]);
                    td.appendTo(tr);
                }
            }
        });
        event.preventDefault();
    });
});
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('materialRequisition/addMaterialRequisitionView');?>" data-role="button" data-icon="flat-plus" data-theme="d">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialRequisition/queryMaterialRequisitionView');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addMaterialRequisitionForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        領料單編號
        <input type="text" name="materialRequisitionID" size=20 maxlength=16>
        原料
        <input type="text" name="material" size=20 maxlength=16>
        供應商
        <input type="text" name="supplier" size=20 maxlength=16>
        領料日期
        <input type="date" name="requisitioningDate" min="2017-01-01">
        領料單位
        <input type="text" name="requisitioningDepartment" size=20 maxlength=16>
        領料人員
        <input type="text" name="requisitioningMember" size=20 maxlength=16>
        領料數量
        <input type="text" name="requisitionedPackageNumber" size=20 maxlength=16>
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        <input type="submit" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="addMaterialRequisitionList"></div>
