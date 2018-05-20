<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
function queryUser() {
    $.ajax({
        url: "user/queryUser",
        success: function(content) {
            /*
            alert( "Data Saved: " + content );
            var row = JSON.parse(content);
            alert("id: " + row[0].userID + ", name: " + row[0].userName);
            */

            var row = JSON.parse(content);
            var header = ["使用者ID", "使用者名稱", "密碼" ,"權限"];
            var $table = $(document.createElement('table'));
            $table.appendTo($("#userList"));
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
                var $tr = $(document.createElement('tr'));
                $tr.appendTo($table);
                for(var k in row[j])
                {
                    $td = $(document.createElement('td'));
                    $td.text(row[j][k]);
                    $td.appendTo($tr);
                }
            }
        }
    });
}
</script>

<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>

<div data-role="content" role="main">
    <div data-role="controlgroup" data-type="horizontal" data-theme="b">
        <?php echo form_open('user/addUser'); ?>
        使用者名稱<input type="text" name="userName" size=20 maxlength=16>
        密碼<input type="password" name="password" size=20 maxlength=16>
        <input type="submit" value="add">
        </form>
    </div>

    <div data-role="controlgroup" data-type="horizontal" data-theme="b">
        <a href="#" data-icon="flat-mail" data-theme="a" data-iconpos="notext" data-role="button">Yes</a>
    </div>

<div id="userList"></div>
<div data-role="controlgroup" data-type="horizontal">
<button data-icon="flat-settings" data-theme="b" onclick="queryUser()">使用者查詢</button>
</div>

<div data-role="controlgroup" data-type="horizontal">
<?php echo form_open('user/deleteUserAccount'); ?>
<h3>Delete</h3>
User name:<br>
<input type="text" name="userName"><br>
<input type="submit" value="delete">
</form>
</div>

<div data-role="controlgroup" data-type="horizontal">
<?php echo form_open('user/updateUserPassword'); ?>
<h3>Update</h3>
User name:<br>
<input type="text" name="userName"><br>
Password:<br>
<input type="password" name="password"><br>
<input type="submit" value="update">
</form>
</div>
