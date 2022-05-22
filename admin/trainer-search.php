<?php
include('includes.php');
$conn=mysqli_connect(HOST,USER,PASS,DBNAME);
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}
if (isset($_POST['query'])) {
	$search = mysqli_real_escape_string($conn, $_POST['query']);
	$sql = "SELECT * FROM gym_trainer WHERE name LIKE '%$search%' || 
			qualification LIKE '%$search%'";
}else{
	$sql = "SELECT * FROM gym_trainer ORDER BY id DESC";
}
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {?>
	<table class="table table-hover table-bordered table-striped text-center ">
	<tr>
		<td colspan="9">
    <?php //$fun_obj->display_message();?>
    <a href="<?php echo SITE_URL.'/admin/index.php?manager=trainer-manager&action=add-trainer';?>"><input type="button" value="Add New Trainer" class="btn btn-info btn-sm add-btn"/></a>

  </td>
  </tr>
  <tr><th>SN</th><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Professional</th><th>Image</th></tr>
	<?php
	$sn=1;
	while ($row = mysqli_fetch_assoc($query)) {?>
		<tr>
          <td><?php echo $sn++;?></td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['address']?></td>
          <td><?php echo $row['phone']?></td>
          <td><?php echo $row['email']?></td>
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
				?>
				<table class="table table-hover table-bordered table-striped text-center ">
					<tr>
						<td colspan="12">
							<a href="<?php echo SITE_URL.'/admin/index.php?manager=trainer-manager&action=add-trainer';?>"><input type="button" value="Add New Trainer" class="btn btn-info btn-sm add-btn"/></a>
						</td>	
					</tr>
					<tr><th>SN</th><th>Name</th><th>Address</th><th>phone</th><th>Professional</th><th>Image</th></tr>
					<?php
 					 echo "0 results";
					}
	?> 
</table>