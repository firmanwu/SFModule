<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
function queryUser() {
    $.ajax({
        url: "<?php echo base_url('user/queryUser'); ?>",
        success: function(result) {
            $('#queryUserTable').remove();
            var row = JSON.parse(result);
            var header = ["使用者ID", "使用者名稱", "權限"];
            var $table = $(document.createElement('table'));
            $table.attr('id', 'queryUserTable');
            $table.appendTo($('#userList'));
            var $tr = $(document.createElement('tr'));
            $tr.appendTo($table);
            for(var i in header)
            {
                var $th = $(document.createElement('th'));
                $th.text(header[i]);
                $th.appendTo($tr);
            }

            for(var j in row)
            {
                $tr = $(document.createElement('tr'));
                $tr.appendTo($table);
                for(var k in row[j])
                {
                    if ("password" != k) {
                        var $td = $(document.createElement('td'));
                        $td.text(row[j][k]);
                        $td.appendTo($tr);
                    }
                }
            }
        }
    });
}
</script>

<div data-role="content" role="main">
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><a href="<?php echo base_url('user/addUserView');?>" data-role="button" data-icon="flat-plus" data-theme="c">新增</a></div>
    <div class="ui-block-b"><a href="<?php echo base_url('user/queryUserView');?>" data-role="button" data-icon="flat-bubble" data-theme="b">查詢</a></div>
</fieldset>
<hr size="5" noshade>

<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-man" data-theme="b" onclick="queryUser()">使用者查詢</button>
</div>

<br><br>
<div id="userList"></div>
