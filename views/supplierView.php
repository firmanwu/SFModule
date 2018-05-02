<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php echo form_open('supplier/addSupplier'); ?>
<h3>Add</h3>
Supplier ID:<br>
<input type="text" name="supplierID"><br>
Supplier name:<br>
<input type="text" name="supplierName"><br>
Product:<br>
<input type="text" name="product"><br>
Using department:<br>
<input type="text" name="packaging"><br>
Unit weight:<br>
<input type="text" name="unitWeight"><br>
Unit price:<br>
<input type="text" name="price"><br>
<input type="submit" value="add">
</form>

<!-------------------------------------- -->

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