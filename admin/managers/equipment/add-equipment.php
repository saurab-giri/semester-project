

<form method="post" action="<?php echo SITE_URL.'admin/action.php';?>" enctype="multipart/form-data">
	<div class="form-div form-group bg-dark text-white">
  <h3 class="text-center head">Add New Equipment</h3>
  <table align="center">
     <tr><td class="label">Equipment Name: </td><td><input type="text" name="equipment_name" class="form-control" required /></td></tr>
      <tr><td class="label">Description: </td><td><textarea name="description" class="form-control"></textarea></td></tr>
      <tr><td class="label">Quantity: </td><td><input type="text" name="quantity" class="form-control" required /></td></tr>
       <tr>
        <td class="label">Page Image: </td>
        <td><input type="file" name="uploadfile" class="form-control"/></td>
       </tr> 
      <tr>
      <td><input type="submit" name="add_equipment" value="Add Equipment" class="btn btn-info"/></td></tr>
    </table>  
   </div>
</form>
