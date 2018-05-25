<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- add -->
<?php echo form_open('materialusage/addMaterialUsage'); ?>
<h3>Add</h3>
Material ID:
<input type="text" name="material">
Using Department:
<input type="text" name="usingDepartment">
<input type="submit" value="add">
</form>
