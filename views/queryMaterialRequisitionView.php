<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function queryMaterialRequisition() {
    $.ajax({
        url: "/materialrequisition/queryMaterialRequisition",
        success: function(result) {
            $('#queryMaterialRequisitionTable').remove();
            var row = JSON.parse(result);
            var header = ["領料單編號", "原料編號", "原料", "供應商", "包裝", "儲放區域", "領料日期", "領料單位", "領料人員", "領料數量", "備註"];
            var table = $(document.createElement('table'));
            table.attr('id', 'queryMaterialRequisitionTable');
            table.appendTo($('#queryMaterialRequisitionList'));
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
                    var td = $(document.createElement('td'));
                    td.text(row[j][k]);
                    td.appendTo(tr);
                }
            }
	sortable_headers();    
        }
    });
}

$(document).ready(function(){

    var postData = 
                {
                    "model":"materialrequisitionmodel",
                    "queryfunction":"queryMaterialRequisitionData",
                    "header":["領料單編號", "原料編號", "原料", "供應商", "包裝", "儲放區域", "領料日期", "領料單位", "領料人員", "領料數量"]
                }

    $('.download-materialrequisition-excel').click( function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:'downloadMaterialRequisitionExcel',
            dataType: 'json',
            data: {excelBuildData:postData},
            success: function (data, textstatus) {
                          if( !('error' in data) ) {
                            var $a = $("#excel-materialrequisition-download");
                            var today = new Date();
                            var day = today.getDate();
                            var month_index = today.getMonth();
                            var year = today.getFullYear();
                            $a.attr("href",data.file);
                            $a.attr("download","領料單報表"+"-"+(month_index+1)+"-"+day+"-"+year+".xlsx");
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
    <div class="ui-block-a"><a href="<?php echo base_url('materialrequisition/addMaterialRequisitionView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('materialrequisition/queryMaterialRequisitionView');?>" data-role="button" data-icon="flat-bubble" data-theme="d">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="d" onclick="queryMaterialRequisition()">領料單查詢</button>
</div>

<div class="ui-block-b"><a id = "excel-materialrequisition-download" style="display:none;" href="" data-role="button" data-icon="flat-bubble" data-theme="c">Excel Download FGE</a></div>
<div class="ui-block-b download-materialrequisition-excel"><a href="" data-role="button" data-icon="flat-bubble" data-theme="d">下載領料單 Excel</a></div>

<br><br>
<div></div>
<br><br>
<div id="queryMaterialRequisitionList"></div>
