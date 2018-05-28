<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    $.ajax({
        url: "/material/queryMaterialNameWithID",
        success: function(result) {
            var row = JSON.parse(result);
            var selection = $(document.createElement('select'));
            selection.attr({"name":"product","data-native-menu":"false"});
            selection.appendTo($('#materialSelection'));

            for(var i in row)
            {
                selectOption = $(document.createElement('option'));
                for(var j in row[i])
                {
                    if ("materialID" == j) {
                        selectOption.attr('value', row[i][j]);
                    }
                    if ("materialName" == j) {
                        selectOption.text(row[i][j]);
                    }
                }
                selectOption.appendTo(selection);
            }
        }
    });

    $('#addSupplierForm').submit(function(event) {
        var formData = $('#addSupplierForm').serialize();

        $.ajax({
            url: "/supplier/addSupplier",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addSupplierTable').remove();
                var row = JSON.parse(result);
                var header = ["供應商", "產品", "包裝", "單位重量", "價格"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addSupplierTable');
                table.appendTo($('#supplierList'));
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
    <div class="ui-block-a"><a href="<?php echo base_url('supplier/addSupplierView');?>" data-role="button" data-icon="flat-plus" data-theme="d">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('supplier/querySupplierView');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addSupplierForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        供應商
        <input type="text" name="supplierName" size=20 maxlength=16>
        產品
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d" id="materialSelection">
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        包裝
        <input type="text" name="packaging" size=20 maxlength=16>
        單位重量
        <input type="text" name="unitWeight" size=20 maxlength=16>
        價格
        <input type="text" name="price" size=20 maxlength=16>
    </div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        <input type="submit" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="supplierList"></div>