<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php echo form_open('materialentry/addMaterialEntry'); ?>
<h3>Add</h3>
Material entry ID:<br>
<input type="text" name="materialEntryID"><br>
Purchase order:<br>
<input type="text" name="purchaseOrder"><br>
storedArea:<br>
<input type="text" name="storedArea"><br>
serialNumber:<br>
<input type="text" name="serialNumber"><br>
QRCode:<br>
material:<br>
<input type="text" name="material"><br>
batchNumber:<br>
<input type="text" name="batchNumber"><br>
storedDate:<br>
<input type="text" name="storedDate"><br>
packageNumberOfPallet:<br>
<input type="text" name="packageNumberOfPallet"><br>
palletNumber:<br>
<input type="text" name="palletNumber"><br>
storedPackageNumber:<br>
<input type="text" name="storedPackageNumber"><br>
storedWeight:<br>
<input type="text" name="storedWeight"><br>
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