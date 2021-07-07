<?php 
session_start();
?>
<h1 class="text-center head">Our Clients</h1>
<table class="table table-hover table-bordered table-striped">
	<tr>
	<td colspan="9">
		<?php //$fun_obj->display_message();?>
		<a href="<?php echo SITE_URL.'/admin/index.php?manager=client&action=add-client';?>"><input type="button" value="Add New Client" class="btn btn-info btn-sm add-btn"/></a>

	</td>
	</tr>
	<tr><th>SN</th><th>Name</th><th>Address</th><th>Age</th><th>Gender</th><th>Phone</th><th>Email</th><th>Image</th><th></th></tr>
	<?php 
  $conn = mysqli_connect(HOST,USER,PASS,DBNAME);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM gym_clients ORDER BY name Asc";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
  	$sn=1;
    while($row = mysqli_fetch_assoc($result)) {
	?>
        <tr>
          <td><?php echo $sn++;?></td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['address'];?></td>
          <td><?php echo $row['age'];?></td>
          <td><?php echo $row['gender'];?></td>
          <td><?php echo $row['phone'];?></td>
          <td><?php echo $row['email'];?></td>
          <td>
              <?php 
              if(!empty($row['image'])){?>
              <img src="<?php echo SITE_URL.'/admin/images/'.$row['image'];?>" width="50" height="50">
              <?php }else{?>
              <p>No Image</p>
              <?php }?>
            </td>
          <td>
         	<a href="<?php echo SITE_URL.'/admin/index.php?manager=client&action=edit-client&id='.$row['id'];?>"><input type="button" value="Edit" class="btn btn-info btn-sm"/></a>
          <a href="<?php echo SITE_URL.'/admin/index.php?manager=client&action=sendmail&id='.$row['id'];?>"><input type="button" value="Send Mail" class="btn btn-primary btn-sm"/></a>
         	<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo SITE_URL.'/admin/index.php?manager=client&action=delete-client&id='.$row['id'];?>"><input type="button" value="Delete" class=" delete btn btn-danger btn-sm"/></a>
          </td> 
          <div class="msg email-msg success">         
          <span>
            <?php if( isset($_SESSION['mail_message']) ){
              echo $_SESSION['mail_message'];
              unset($_SESSION['mail_message']);      
            }
            ?>
          </span>    
              </div>
        </tr>  

	<?php
  }
} else {
  echo "0 results";
}
	?>
</table>