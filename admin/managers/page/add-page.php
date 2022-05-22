
<form method="post" action="<?php echo SITE_URL.'admin/action.php';?>" enctype="multipart/form-data">
	<div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Add New Page</h3>
 <table align="center">
           <tr><td class="label">Page Name</td><td><input type="text" name="page_name" class="form-control" required /></td></tr>
            <tr><td class="label">Description</td><td><textarea name="page_desc" class="form-control" required=""></textarea></td></tr>
             <tr>
              <td class="label">Page Image</td>
              <td><input type="file" name="uploadfile" class="form-control"/></td>
             </tr> 
            <tr>
            <td><input type="submit" name="add_page_submit" value="Add Page" class="btn btn-info"/></td></tr>
          </table>  
      </div>
</form>