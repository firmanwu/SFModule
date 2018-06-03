<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
var materialEntryID;
var purchaseOrder;
var packageNumberOfPallet;
var palletNumber;

function deleteMaterialEntry(deleteURL) {
    $.ajax({
        url: deleteURL,
        success: function(result) {
            queryMaterialEntry();
        }
    });
}

function confirmMaterialEntry(confirmURL, isConfirmed) {
    $.ajax({
        url: confirmURL,
        success: function(result) {
            queryMaterialEntry(isConfirmed);
        }
    });
}

function revisedMaterialEntry(
        materialEntryID, 
        packageNumberOfPallet,
        palletNumber,
        purchaseOrder,
        isConfirmed) {
    $('#queryMaterialEntryTable').remove();

    var form = $(document.createElement('form'));
    form.attr('id', 'reviseMaterialEntryForm');
    form.appendTo($('#reviseMaterialEntryArea'));

    var div = $(document.createElement('div'));
    div.html("每棧板的原料數量");
    div.appendTo(form);

    var input = $(document.createElement('input'));
    input.attr({"type":"number", "name":"packageNumberOfPallet", "value":packageNumberOfPallet});
    input.appendTo(form);

    div = $(document.createElement('div'));
    div.html("棧板數");
    div.appendTo(form);

    input = $(document.createElement('input'));
    input.attr({"type":"number", "name":"palletNumber", "value":palletNumber});
    input.appendTo(form);

    input = $(document.createElement('input'));
    input.attr({"type":"text", "name":"materialEntryID", "value":materialEntryID, "hidden":true});
    input.appendTo(form);

    input = $(document.createElement('input'));
    input.attr({"type":"number", "name":"originalPackageNumberOfPallet", "value":packageNumberOfPallet, "hidden":true});
    input.appendTo(form);

    input = $(document.createElement('input'));
    input.attr({"type":"number", "name":"originalPalletNumber", "value":palletNumber, "hidden":true});
    input.appendTo(form);

    input = $(document.createElement('input'));
    input.attr({"type":"number", "name":"purchaseOrder", "value":purchaseOrder, "hidden":true});
    input.appendTo(form);

    div = $(document.createElement('div'));
    div.html("");
    div.appendTo(form);

    input = $(document.createElement('input'));
    input.attr({"type":"submit", "class":"selfButtonB", "value":"修改"});
    input.appendTo(form);
}

$('#reviseMaterialEntryForm').submit(function(event) {
    alert("here");
    var formData = $('#reviseMaterialEntryForm').serialize();

    alert(formData);
    $.ajax({
        url: "/materialentry/updateMaterialEntryPackageNumber",
        type: "POST",
        data: formData,
        success: function(result) {
            alert(result);
        }
    });
});

function queryMaterialEntry(isConfirmed) {
    $.ajax({
        url: "/materialentry/queryMaterialEntry/" + isConfirmed,
        success: function(result) {
            $('#queryMaterialEntryTable').remove();
            var row = JSON.parse(result);
            var header = ["進貨單編號", "倉儲流水號", "採購單編號", "儲放區域", "原料編號", "原料", "批號", "進貨條件", "進貨日期", "供應商", "包裝", "單位重量", "每棧板的原料數量", "棧板數", "入料數量", "入料重量", "使用單位", "單價", "入料金額"];
            if (0 == isConfirmed) {
                header.push("確認");
                header.push("修改");
            }
            //header.push("刪除");

            var table = $(document.createElement('table'));
            table.attr('id', 'queryMaterialEntryTable');
            table.appendTo($('#queryMaterialEntryList'));
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
                    if ("materialEntryID" == k) {
                        materialEntryID = row[j][k];
                    }

                    if ("packageNumberOfPallet" == k) {
                        packageNumberOfPallet = row[j][k];
                    }

                    if ("palletNumber" == k) {
                        palletNumber = row[j][k];
                    }

                    if ("purchaseOrder" == k) {
                        purchaseOrder = row[j][k];
                    }

                    if ("confirmation" == k) {
                        if (1 == isConfirmed) {
                            continue;
                        }
                        else {
                            // Create confirmed button
                            var confirmedButton = $(document.createElement('button'));
                            var onclickFunction = "confirmMaterialEntry(\"/materialentry/confirmMaterialEntry/" + materialEntryID + "\", " + isConfirmed + ")";
                            confirmedButton.attr({"class":"selfButtonG", "onclick":onclickFunction});
                            confirmedButton.text("確認");

                            td = $(document.createElement('td'));
                            confirmedButton.appendTo(td);
                            td.appendTo(tr);

                            // Create revised button
                            var revisedButton = $(document.createElement('button'));
                            var onclickFunction = "revisedMaterialEntry(\"" 
                            + materialEntryID + "\", " 
                            + packageNumberOfPallet + ", " 
                            + palletNumber + ", \"" 
                            + purchaseOrder + "\", " 
                            + isConfirmed + ")";
                            revisedButton.attr({"class":"selfButtonB", "onclick":onclickFunction});
                            revisedButton.text("修改");

                            td = $(document.createElement('td'));
                            revisedButton.appendTo(td);
                            td.appendTo(tr);
                        }
                    }
                    else {
                        var td = $(document.createElement('td'));
                        td.text(row[j][k]);
                        td.appendTo(tr);
                    }
                }

/*
                var deleteButton = $(document.createElement('button'));
                var onclickFunction = "deleteMaterialEntry(\"/materialentry/deleteMaterialEntry/" + materialEntryID + "\")";
                deleteButton.attr({"class":"selfButtonR", "onclick":onclickFunction});
                deleteButton.text("刪除");

                td = $(document.createElement('td'));
                deleteButton.appendTo(td);
                td.appendTo(tr);
*/
            }
        }
    });
}
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('materialentry/addMaterialEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialentry/queryMaterialEntryView/1');?>" data-role="button" data-icon="flat-bubble" data-theme="<?php echo $confirmedTheme; ?>">查詢已確認入料</a></div>
    <div class="ui-block-a"><a href="<?php echo base_url('materialentry/queryMaterialEntryView/0');?>" data-role="button" data-icon="flat-bubble" data-theme="<?php echo $unconfirmedTheme; ?>">查詢未確認入料</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="d" onclick="<?php echo $queryFunction; ?>"><?php echo $buttonCaption; ?></button>
</div>

<br><br>
<div id="queryMaterialEntryList"></div>
<div id="reviseMaterialEntryArea"></div>
