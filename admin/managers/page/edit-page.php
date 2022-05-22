<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_pages WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $sch_row = mysqli_fetch_assoc($result);  
}
?>


 <form method="post" action="<?php echo SITE_URL.'admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Edit Page Details</h3>
    <table align="center">
       <tr><td class="label">Title: </td><td><input type="text" name="title" value="<?php echo $sch_row['title'];?>" class="form-control" required /></td></tr>
        <tr><td class="label">Description: </td><td><textarea name="description" class="form-control">
          <?php echo $sch_row['description'];?>
        </textarea></td></tr>
         <tr><td>Image: </td>


        <td>image available
          <?php 
          if(!empty($sch_row['image'])){?>
          <img src="<?php echo SITE_URL.'/admin/images/'.$sch_row['image'];?>" width="50" height="50">
          <?php }else{?>
          <p>No Image</p>
          <?php }?></td>
        
          </tr>
    <tr><td></td><td><input type="file" name="uploadfile" class="image-input form-control"></td>
   </tr>
        <tr>
        <td><input type="submit" name="edit_page_detail" value="Edit Page" class="btn btn-info"/></td></tr>
      </table>  
  </div>
</form>