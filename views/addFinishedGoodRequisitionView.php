<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    $('#addFinishedGoodRequisitionForm').submit(function(event) {
        var formData = $('#addFinishedGoodRequisitionForm').serialize();

        $.ajax({
            url: "/finishedGoodRequisition/addFinishedGoodRequisition",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addFinishedGoodRequisitionTable').remove();
                var row = JSON.parse(result);
                var header = ["出庫編號", "成品代號", "出庫日期", "出庫單位", "出庫人員", "數量", "棧板數", "總重量"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addFinishedGoodRequisitionTable');
                table.appendTo($('#finishedGoodRequisitionList'));
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
                    if ("remainingPackageNumber" == j) {
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
    <div class="ui-block-a"><a href="<?php echo base_url('finishedGoodRequisition/addFinishedGoodRequisitionView');?>" data-role="button" data-icon="flat-plus" data-theme="f">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('finishedGoodRequisition/queryFinishedGoodRequisitionView');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addFinishedGoodRequisitionForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="f">
        出庫編號
        <input type="text" name="finishedGoodRequistionID" size=20 maxlength=16>
        成品代號
        <input type="text" name="product" size=20 maxlength=16>
        出庫日期
        <input type="date" name="requisitioningDate" min="2017-01-01">
        出庫單位
        <input type="text" name="requisitioningDepartment" size=20 maxlength=16>
        出庫人員
        <input type="text" name="requisitioningMember" size=20 maxlength=16>
        數量
        <input type="text" name="requisitionedPackageNumber" size=20 maxlength=16>
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="f">
        <input type="submit" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="finishedGoodRequisitionList"></div>
