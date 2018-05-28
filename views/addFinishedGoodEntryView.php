<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    $('#addFinishedGoodEntryForm').submit(function(event) {
        var formData = $('#addFinishedGoodEntryForm').serialize();

        $.ajax({
            url: "/finishedgoodentry/addFinishedGoodEntry",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addFinishedGoodEntryTable').remove();
                var row = JSON.parse(result);
                var header = ["入庫編號", "倉儲流水號", "狀態", "儲放區域", "成品代號", "批號", "入庫日期", "入庫數量"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addFinishedGoodEntryTable');
                table.appendTo($('#finishedGoodEntryList'));
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
                    if ("palletNumber" == j){
                        break;
                    }

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
    <div class="ui-block-a"><a href="<?php echo base_url('finishedgoodentry/addFinishedGoodEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="f">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('finishedgoodentry/queryFinishedGoodEntryView');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addFinishedGoodEntryForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="f">
        入庫編號
        <input type="text" name="finishedGoodEntryID" size=20 maxlength=16>
        倉儲流水號
        <input type="text" name="serialNumber" size=20 maxlength=16>
        狀態
        <input type="text" name="status" size=20 maxlength=16>
        儲放區域
        <input type="text" name="storedArea" size=20 maxlength=16>
        成品代號
        <input type="text" name="product" size=20 maxlength=16>
        批號
        <input type="text" name="batchNumber" size=20 maxlength=16>
        入庫日期
        <input type="date" name="storedDate" min="2017-01-01">
        入庫數量
        <input type="text" name="storedPackageNumber" size=20 maxlength=16>
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="f">
        <input type="submit" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="finishedGoodEntryList"></div>
