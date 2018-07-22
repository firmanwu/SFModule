<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {

    $('input[name="requisitionDepartment"]').focusout(function() {
        var department = $('input[name="requisitionDepartment"]').val();
        $.ajax({
            url: "/requisitiondepartment/queryRequisitionMemberByDepartment/" + department,
            success: function(result) {
                $('#addedRequisitionMemberTable').remove();
                var row = JSON.parse(result);
                var header = ["已新增的領料人員"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addedRequisitionMemberTable');
                table.appendTo($('#addedRequisitionMemberList'));
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
                        var td = $(document.createElement('td'));
                        td.text(row[j][k]);
                        td.appendTo(tr);
                    }
                }
            }
        });
    });

    $('#addRequisitionDepartmentForm').submit(function(event) {
        var formData = $('#addRequisitionDepartmentForm').serialize();

        $.ajax({
            url: "/requisitiondepartment/addRequisitionDepartment",
            type: "POST",
            data: formData,
            success: function(result) {
                $('#addRequisitionDepartmentTable').remove();
                var row = JSON.parse(result);
                var header = ["領料單位", "領料人員"];
                var table = $(document.createElement('table'));
                table.attr('id', 'addRequisitionDepartmentTable');
                table.appendTo($('#requisitionDepartmentList'));
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

    // When click reset button
    $('input[type="reset"]').click(function() {
        // Remove added requisition member information table
        $('#addedRequisitionMemberTable').remove();
        // Remove current adding requisition department information table
        $('#addRequisitionDepartmentTable').remove();
    });
});
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('requisitiondepartment/addRequisitionDepartmentView');?>" data-role="button" data-icon="flat-plus" data-theme="d">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('requisitiondepartment/queryRequisitionDepartmentView');?>" data-role="button" data-icon="flat-bubble" data-theme="c">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<form id="addRequisitionDepartmentForm">
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        領料單位
        <input type="text" name="requisitionDepartment" size=20 maxlength=16>
    </div>
    <div id="addedRequisitionMemberList"></div>
    <div data-role="controlgroup" data-type="horizontal" data-theme="d">
        領料人員
        <input type="text" name="requisitionMember" size=20 maxlength=16>
        <input type="submit" value="確定" data-role="button">
        <input type="reset" value="新增" data-role="button">
    </div>
</form>

<br><br>
<div id="requisitionDepartmentList"></div>
