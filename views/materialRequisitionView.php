<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php echo form_open('materialrequisition/addMaterialRequisition'); ?>
<h3>Add</h3>
materialRequisitionID:<br>
<input type="text" name="materialRequisitionID"><br>
material:<br>
<input type="text" name="material"><br>
supplier:<br>
<input type="text" name="supplier"><br>
requisitioningDate:<br>
<input type="text" name="requisitioningDate"><br>
requisitioningDepartment:<br>
<input type="text" name="requisitioningDepartment"><br>
requisitioningMember:<br>
<input type="text" name="requisitioningMember"><br>
requisitionedPackageNumber:<br>
<input type="text" name="requisitionedPackageNumber"><br>
requisitionedWeight:<br>
<input type="text" name="requisitionedWeight"><br>
<input type="submit" value="add">
</form>

<!-------------------------------------- -->
<?php echo form_open('materialrequisition/queryMaterialRequisition'); ?>
<h3>Query</h3>
Item name:
<select name="queryMaterialRequisitionColumn">
    <option value="materialRequisitionID" selected>materialRequisitionID</option>
    <option value="material">material</option>
</select>
<input type="text" name="queryMaterialRequisitionValue"><br>
<input type="submit" value="query">
</form>
