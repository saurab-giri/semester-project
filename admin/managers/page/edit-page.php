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

<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Edit Page Detail</h3>
    <div class="form-input form-group">
      <label class="col-form-label col-2">Title:</label>
      <input type="text" name="title" class=" input form-control-static" value="<?php echo $sch_row['title'];?>"required>
    </div>
    <div class="form-input form-group">
      <label class="col-form-label col-2">Description:</label>
      <textarea type="text" name="description" class=" input form-control-static" required><?php echo $sch_row['description'];?></textarea>
    </div>
    <div class="form-input form-group">
      <label class="col-form-label col-2">Image:</label>
      <input type="file" name="uploadfile" class="image-input">
    </div>
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <div class="submit-botton">
      <input type="submit" name="edit_page" value="Edit Page" class="btn btn-info"/></tr>
    </div>
  </div>
</form>