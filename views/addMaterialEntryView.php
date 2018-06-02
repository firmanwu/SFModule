<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    // Auto-generate serial number
    $.ajax({
        url: "/materialentry/getSerialNumber",
        success: function(serialNumber) {
            $("input[name = 'serialNumber']").attr({"value":serialNumber, "readonly":true});
        }
    });

    // Auto-fill purchase order ID
    $.ajax({
        url: "/purchaseorder/queryPurchaseOrderID",
        success: function(result) {
            var row = JSON.parse(result);

            for(var i in row)
            {
                var selectOption = $(document.createElement('option'));
                for(var j in row[i])
                {
                    selectOption.attr('value', row[i][j]);
                    selectOption.text(row[i][j]);
                }
                selectOption.appendTo($('#purchaseOrder'));
            }
        }
    });

    // Auto-fill in current date into storeDate
    var dateObject = new Date();
    var month = (dateObject.getMonth() + 1);
    var date = dateObject.getDate();

    if (2 > month.toString().length) {
        month = '0' + month;
    }
    if (2 > date.toString().length) {
        date = '0' + date;
    }
    currentDate = dateObject.getFullYear() + "-" + month + "-" + date;
    $("input[name = 'storedDate']").attr('value', currentDate);

    $('#addMaterialEntryForm').submit(function(event) {
        var formData = $('#addMaterialEntryForm').serialize();

        $.ajax({
            url: "/materialentry/addMaterialEntry",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addMaterialEntryTable').remove();
                var row = JSON.parse(result);
                var header = ["進貨單編號", "倉儲流水號", "採購單編號", "儲放區域", "批號", "進貨日期", "每棧板的原料數量", "棧板數", "入料數量", "入料重量", "入料金額"];
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

                $.ajax({
                    url: "/materialentry/increaseSerialNumber"
                });
            }
        });
        event.preventDefault();
    });
});
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('materialentry/addMaterialEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="d">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialentry/queryMaterialEntryView/1');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢已確認入料</a></div>
    <div class="ui-block-a"><a href="<?php echo base_url('materialentry/queryMaterialEntryView/0');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢未確認入料</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addMaterialEntryForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        進貨單編號
        <input type="text" name="materialEntryID" size=20 maxlength=16>
        倉儲流水號
        <input type="text" name="serialNumber" size=20 maxlength=16>
        採購單編號
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d" id="purchaseOrderSelection">
        <select id="purchaseOrder" name="purchaseOrder">
        <option>請選擇</option>
        </select>
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        儲放區域
        <input type="text" name="storedArea" size=20 maxlength=16>
        批號
        <input type="text" name="batchNumber" size=20 maxlength=16>
        進貨日期
        <input type="date" name="storedDate" min="2017-01-01">
        每棧板的原料數量
        <input type="number" name="packageNumberOfPallet">
        棧板數
        <input type="number" name="palletNumber">
        <input type="submit" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="addMaterialEntryList"></div>
