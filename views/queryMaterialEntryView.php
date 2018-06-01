<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function deleteMaterialEntry(deleteURL) {
    $.ajax({
        url: deleteURL,
        success: function(result) {
            queryMaterialEntry();
        }
    });
}

function queryMaterialEntry(isConfirmed) {
    $.ajax({
        url: "/materialentry/queryMaterialEntry/" + isConfirmed,
        success: function(result) {
            $('#queryMaterialEntryTable').remove();
            var row = JSON.parse(result);
            var header = ["進貨單編號", "倉儲流水號", "採購單編號", "儲放區域", "原料編號", "原料", "批號", "進貨條件", "進貨日期", "供應商", "包裝", "單位重量", "每棧板的原料數量", "棧板數", "入料數量", "入料重量", "使用單位", "價格"];
            if (0 == isConfirmed) {
                header.push("確認");
                header.push("修改");
            }
            header.push("刪除");

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
                        var materialEntryID = row[j][k];
                    }

                    if ("QRCode" == k) {
                        continue;
                    }

                    if ("confirmation" == k) {
                        if (1 == isConfirmed) {
                            continue;
                        }
                        else {
                            // Create confirmed button
                            var confirmedButton = $(document.createElement('button'));
                            var onclickFunction = "confirmMaterialEntry(\"/materialentry/confirmMaterialEntry/" + materialEntryID + "\")";
                            confirmedButton.attr({"class":"selfButtonG", "onclick":onclickFunction});
                            confirmedButton.text("確認");

                            td = $(document.createElement('td'));
                            confirmedButton.appendTo(td);
                            td.appendTo(tr);

                            // Create revised button
                            var revisedButton = $(document.createElement('button'));
                            var onclickFunction = "revisedMaterialEntry(\"/materialentry/revisedMaterialEntry/" + materialEntryID + "\")";
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

                var deleteButton = $(document.createElement('button'));
                var onclickFunction = "deleteMaterialEntry(\"/materialentry/deleteMaterialEntry/" + materialEntryID + "\")";
                deleteButton.attr({"class":"selfButtonR", "onclick":onclickFunction});
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
