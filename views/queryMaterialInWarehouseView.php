<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>

function updateStoredAreaInWareHouse() {
    var materialEntry = $("input[name='materialEntry']").val();
    var storedArea = $("input[name='storedArea']").val();

    $.ajax({
        url: "/materialinwarehouse/updateStoredArea/" 
        + materialEntry + "/" 
        + storedArea,
        success: function(result) {
            queryMaterialInWarehouse();
        }
    });
}

function reviseStoredArea(
        storedArea,
        materialEntry) {
    $('#queryMaterialInWarehouseTable').remove();
    $('#reviseStoredAreaForm').remove();

    var divForm = $(document.createElement('div'));
    divForm.attr('id', 'reviseStoredAreaForm');
    divForm.appendTo($('#reviseStoredAreaArea'));

    var div = $(document.createElement('div'));
    div.html("入料單編號");
    div.appendTo(divForm);

    var input = $(document.createElement('input'));
    input.attr({"type":"text", "name":"materialEntry", "value":materialEntry, "readonly":true});
    input.appendTo(divForm);

    var div = $(document.createElement('div'));
    div.html("儲放區域");
    div.appendTo(divForm);

    var input = $(document.createElement('input'));
    input.attr({"type":"text", "name":"storedArea", "value":storedArea});
    input.appendTo(divForm);

    div = $(document.createElement('div'));
    div.html("");
    div.appendTo(divForm);

    var button = $(document.createElement('button'));
    button.attr({'id':'revisionButton', 'class':'selfButtonB', 'onclick':'updateStoredAreaInWareHouse()'});
    button.text("修改");
    button.appendTo(divForm);
}

function queryMaterialInWarehouse() {
    $.ajax({
        url: "/materialinwarehouse/queryMaterialInWarehouse",
        success: function(result) {
            $('#queryMaterialInWarehouseTable').remove();
            $('#reviseStoredAreaForm').remove();
            var row = JSON.parse(result);
            var header = ["原料編號", "原料", "入料單編號", "供應商", "包裝", "儲放區域", "入料時間", "儲放數量", "儲放重量", "儲放金額", "尚餘數量", "尚餘金額", "修改儲放區域"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryMaterialInWarehouseTable');
            table.appendTo($('#materialInWarehouseList'));
            var tr = $(document.createElement('tr'));
            tr.appendTo(table);
            for(var i in header)
            {
                var th = $(document.createElement('th'));
                th.attr('class', 'sortable');
                th.attr('style', 'cursor:pointer');
                th.text(header[i]);
                th.appendTo(tr);
            }

            for(var j in row)
            {
                tr = $(document.createElement('tr'));
                tr.appendTo(table);
                for(var k in row[j])
                {
                    if ("materialEntry" == k) {
                        materialEntry = row[j][k];
                    }

                    if ("storedArea" == k) {
                        storedArea = row[j][k];
                    }

                    var td = $(document.createElement('td'));
                    td.text(row[j][k]);
                    td.appendTo(tr);

                    if ("remainingMoney" == k) {
                        // Create revised button
                        var revisedButton = $(document.createElement('button'));
                        var onclickFunction = "reviseStoredArea(\"" 
                        + storedArea + "\", \"" 
                        + materialEntry + "\")";
                        revisedButton.attr({"class":"selfButtonB", "onclick":onclickFunction});
                        revisedButton.text("修改");

                        td = $(document.createElement('td'));
                        revisedButton.appendTo(td);
                        td.appendTo(tr);
                    }
                }
            }
            sortable_headers();    
        }
    });
}

$(document).ready(function(){

    var postData = 
                {
                    "model":"materialinwarehousemodel",
                    "queryfunction":"queryMaterialInWarehouseData",
                    "header":["原料編號", "原料", "入料單編號", "供應商", "包裝", "儲放區域", "入料時間", "儲放數量", "儲放重量", "儲放金額", "尚餘數量"]
                }

    $('.download-materialinwarehouse-excel').click( function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:'downloadMaterialInWarehouseExcel',
            dataType: 'json',
            data: {excelBuildData:postData},
            success: function (data, textstatus) {
                          if( !('error' in data) ) {
                            var $a = $("#excel-materialinwarehouse-download");
                            var today = new Date();
                            var day = today.getDate();
                            var month_index = today.getMonth();
                            var year = today.getFullYear();
                            $a.attr("href",data.file);
                            $a.attr("download","原料庫存報表"+"-"+(month_index+1)+"-"+day+"-"+year+".xlsx");
                            $a[0].click();
                          }
                          else {
                              console.log(data.error);
                          }
                    }
        });
        return false; 
    });
});
function sortable_headers (){
    $('th').click(function(){
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc){rows = rows.reverse()}
        for (var i = 0; i < rows.length; i++){table.append(rows[i])}
    });
}

function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}
function getCellValue(row, index){ return $(row).children('td').eq(index).text() }

</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('materialentry/queryUnconfirmedMaterialEntryView');?>" data-role="button" data-icon="flat-plus" data-theme="c">原料入庫</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialinwarehouse/queryMaterialInWarehouseView');?>" data-role="button" data-icon="flat-bubble" data-theme="d">查詢原料庫存</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="d" onclick="queryMaterialInWarehouse()">原料庫存查詢</button>
</div>

<div class="ui-block-b"><a id = "excel-materialinwarehouse-download" style="display:none;" href="" data-role="button" data-icon="flat-bubble" data-theme="c">Excel Download FGE</a></div>
<div class="ui-block-b download-materialinwarehouse-excel"><a href="" data-role="button" data-icon="flat-bubble" data-theme="d">下載原料庫存 Excel</a></div>

<br><br>
<div></div>
<br><br>
<div id="materialInWarehouseList"></div>
<div id="reviseStoredAreaArea"></div>
