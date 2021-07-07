
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Add New Trainer</h3>
    <table align="center">
     <tr><td>Name: </td><td><input type="text" name="name" class="form-control" required /></td></tr>
      <tr><td>Address: </td><td><input type="text" name="address" class="form-control" required /></td></tr>
       </tr> 
       <tr><td>Phone: </td><td><input type="text" name="phone" class="form-control" required /></td></tr>
       </tr> 
       <tr><td>Professional: </td><td><input type="text" name="qualification" class="form-control" required /></td></tr>
       </tr> 
       <tr><td>Image: </td><td><input type="file" name="uploadfile" class="form-control"/></td></tr>
      <tr><td></td><td><br><input type="submit" name="add_trainer" value="Add Trainer" class="btn btn-info"/></td></tr>
    </table>  
  </div>
</form>

