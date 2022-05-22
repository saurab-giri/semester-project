<?php
session_start();
include('includes.php');
$conn=mysqli_connect(HOST,USER,PASS,DBNAME);
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}
if (isset($_POST['query'])) {
	$search = mysqli_real_escape_string($conn, $_POST['query']);
	$sql = "SELECT * FROM gym_clients WHERE name LIKE '%$search%' || 
			email LIKE '%$search%'";
}else{
	$sql = "SELECT * FROM gym_clients ORDER BY id DESC";
}
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {?>
	<table class="table table-hover table-bordered table-striped text-center ">
	<tr>
		<td colspan="12">
			<a href="<?php echo SITE_URL.'/admin/index.php?manager=client&action=add-client';?>"><input type="button" value="Add New Client" class="btn btn-info btn-sm add-btn"/></a>
		</td>	
	</tr>
	<tr><th>SN</th><th>Name</th><th>Address</th><th>Age</th><th>Gender</th><th>Phone</th><th>Email</th><th>Image</th><th></th></tr>
	<?php
	$sn=1;
	while ($row = mysqli_fetch_assoc($query)) {?>
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
				?>
				<table class="table table-hover table-bordered table-striped text-center ">
					<tr>
						<td colspan="12">
							<a href="<?php echo SITE_URL.'/admin/index.php?manager=client&action=add-client';?>"><input type="button" value="Add New Client" class="btn btn-info btn-sm add-btn"/></a>
						</td>	
					</tr>
					<tr><th>SN</th><th>Name</th><th>Address</th><th>Age</th><th>Gender</th><th>Phone</th><th>Email</th><th>Image</th><th></th></tr>
					<?php
 					 echo "0 results";
					}
	?> 
</table>