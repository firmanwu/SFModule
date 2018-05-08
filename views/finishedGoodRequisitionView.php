<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<?php echo form_open('finishedgoodrequisition/addFinishedGoodRequisition'); ?>
<h3>Add</h3>
finishedGoodRequistionID:<br>
<input type="text" name="finishedGoodRequistionID"><br>
product:<br>
<input type="text" name="product"><br>
requisitioningDate:<br>
<input type="text" name="requisitioningDate"><br>
requisitioningDepartment:<br>
<input type="text" name="requisitioningDepartment"><br>
requisitioningMember:<br>
<input type="text" name="requisitioningMember"><br>
requisitionedPackageNumber:<br>
<input type="text" name="requisitionedPackageNumber"><br>
requisitionedPalletNumber:<br>
<input type="text" name="requisitionedPalletNumber"><br>
requisitionedWeight:<br>
<input type="text" name="requisitionedWeight"><br>
<input type="submit" value="add">
</form>

<!-------------------------------------- -->
<?php echo form_open('finishedgoodrequisition/queryFinishedGoodRequisition'); ?>
<h3>Query</h3>
Item name:
<select name="queryMaterialRequisitionColumn">
    <option value="materialRequisitionID" selected>materialRequisitionID</option>
    <option value="material">material</option>
</select>
<input type="text" name="queryMaterialRequisitionValue"><br>
<input type="submit" value="query">
</form>
