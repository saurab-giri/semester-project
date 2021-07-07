<h1 class="text-center head">Available trainer</h1>
<table class="table table-hover table-bordered table-striped">
  <tr>
  <td colspan="9">
    <?php //$fun_obj->display_message();?>
    <a href="<?php echo SITE_URL.'/admin/index.php?manager=trainer-manager&action=add-trainer';?>"><input type="button" value="Add New Trainer" class="btn btn-info btn-sm add-btn"/></a>

  </td>
  </tr>
  <tr><th>SN</th><th>Name</th><th>Address</th><th>phone</th><th>Professional</th><th>Image</th></tr>
  <?php 
$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM gym_trainer ORDER BY name Asc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $sn=1;
  while($row = mysqli_fetch_assoc($result)) {
  ?>
        <tr>
          <td><?php echo $sn++;?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['address']?></td>
          <td><?php echo $row['phone']?></td>
          <td><?php echo $row['qualification']?></td>
          <td>
              <?php 
              if(!empty($row['image'])){?>
              <img src="<?php echo SITE_URL.'/admin/images/'.$row['image'];?>" width="50" height="50">
              <?php }else{?>
              <p>No Image</p>
              <?php }?>
            </td>
          <td>
          <a href="<?php echo SITE_URL.'/admin/index.php?manager=trainer-manager&action=edit-trainer&id='.$row['id'];?>"><input type="button" value="Edit" class="btn btn-info btn-sm"/></a>
          <a onClick="javascript: return confirm('Please confirm deletion');" class="delete" href="<?php echo SITE_URL.'/admin/index.php?manager=trainer-manager&action=delete-trainer&id='.$row['id'];?>"><input type="button" value="Delete" class="btn btn-danger btn-sm"/></a>
          </td> 
        </tr>  
  <?php
  }
} else {
  echo "0 results";
}
  ?>
</table>