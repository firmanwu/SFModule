<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php echo form_open('user/addUserAccount'); ?>
<h3>Add</h3>
User name:<br>
<input type="text" name="userName"><br>
Password:<br>
<input type="password" name="password"><br>
<input type="submit" value="add">
</form>

<?php echo form_open('user/deleteUserAccount'); ?>
<h3>Delete</h3>
User name:<br>
<input type="text" name="userName"><br>
<input type="submit" value="delete">
</form>

<?php echo form_open('user/updateUserPassword'); ?>
<h3>Update</h3>
User name:<br>
<input type="text" name="userName"><br>
Password:<br>
<input type="password" name="password"><br>
<input type="submit" value="update">
</form>