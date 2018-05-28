<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    $('#addMaterialEntryForm').submit(function(event) {
        var formData = $('#addMaterialEntryForm').serialize();

        $.ajax({
            url: "/materialEntry/addMaterialEntry",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addMaterialEntryTable').remove();
                var row = JSON.parse(result);
                var header = ["進貨單編號", "倉儲流水號", "採購單編號", "儲放區域", "原料編號", "批號", "進貨日期", "供應商", "每棧板的原料數量", "棧板數", "入料數量", "入料重量"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addMaterialEntryTable');
                table.appendTo($('#addMaterialEntryList'));
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
    <div class="ui-block-a"><a href="<?php echo base_url('materialEntry/addMaterialEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="d">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialEntry/queryMaterialEntryView');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addMaterialEntryForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        進貨單編號
        <input type="text" name="materialEntryID" size=20 maxlength=16>
        倉儲流水號
        <input type="text" name="serialNumber" size=20 maxlength=16>
        採購單編號
        <input type="text" name="purchaseOrder" size=20 maxlength=16>
        儲放區域
        <input type="text" name="storedArea" size=20 maxlength=16>
        原料編號
        <input type="text" name="material" size=20 maxlength=16>
        批號
        <input type="text" name="batchNumber" size=20 maxlength=16>
        進貨日期
        <input type="date" name="storedDate" min="2017-01-01">
        供應商
        <input type="text" name="supplier" size=20 maxlength=16>
        每棧板的原料數量
        <input type="text" name="packageNumberOfPallet" size=20 maxlength=16>
        棧板數
        <input type="text" name="palletNumber" size=20 maxlength=16>
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        <input type="submit" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="addMaterialEntryList"></div>
