<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function deleteFinishedGoodEntry(deleteURL) {
    $.ajax({
        url: deleteURL,
        success: function(result) {
            queryFinishedGoodEntry();
        }
    });
}

function queryFinishedGoodEntry() {
    $.ajax({
        url: "/finishedGoodEntry/queryFinishedGoodEntry",
        success: function(result) {
            $('#queryFinishedGoodEntryTable').remove();
            var row = JSON.parse(result);
            var header = ["儲放區域", "倉儲流水號", "狀態", "成品代號", "成品種類", "入庫日期", "批號", "入庫數量", "單位重量", "數量", "總重量", "刪除"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryFinishedGoodEntryTable');
            table.appendTo($('#finishedGoodEntryList'));
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
                    if ("finishedGoodEntryID" == k) {
                        var finishedGoodEntryID = row[j][k];
                        continue;
                    }

                    var td = $(document.createElement('td'));
                    td.text(row[j][k]);
                    td.appendTo(tr);
                }

                var deleteButton = $(document.createElement('button'));
                var onclickFunction = "deleteFinishedGoodEntry(\"/finishedGoodEntry/deleteFinishedGoodEntry/" + finishedGoodEntryID + "\")";
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
    <div class="ui-block-a"><a href="<?php echo base_url('finishedGoodEntry/addFinishedGoodEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('finishedGoodEntry/queryFinishedGoodEntryView');?>" data-role="button" data-icon="flat-bubble" data-theme="f">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="f" onclick="queryFinishedGoodEntry()">成品查詢</button>
</div>

<br><br>
<div id="finishedGoodEntryList"></div>
