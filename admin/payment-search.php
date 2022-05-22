<?php
include('includes.php');
$conn=mysqli_connect(HOST,USER,PASS,DBNAME);
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}
if (isset($_POST['query'])) {
	$search = mysqli_real_escape_string($conn, $_POST['query']);
	$sql = "SELECT * FROM gym_payment WHERE name LIKE '%$search%' || 
			email LIKE '%$search%'";
}else{
	$sql = "SELECT * FROM gym_payment ORDER BY id DESC";
}
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {?>
	<table class="table table-hover table-bordered table-striped text-center ">
	<tr>
		<td colspan="12">
			<a href="<?php echo SITE_URL.'/admin/index.php?manager=payment&action=add-payment';?>"><input type="button" value="Add New Payment" class="btn btn-info btn-sm add-btn"/></a>
		</td>	
	</tr>
	<tr><th>SN</th><th>Name</th><th>Phone</th><th>Package</th><th>Received Amt</th><th>Outstanding Amt</th><th>Advance Amt</th><th>Payment Date</th><th>Expire Date</th><th></th></tr>
	<?php
	$sn=1;
	$exp_date='';
	while ($row = mysqli_fetch_assoc($query)) {?>
	    <tr>
          <td><?php echo $sn++;?>.</td>
          <?php 
          	$exp_date=$row['expire_date'];
			$today_date=date('y-m-d');
			//convert to strtotime
			$exp=strtotime($exp_date);
			$today=strtotime($today_date);
			if($today>$exp){
				$class="exp-msg";
			}
				else{
					$class = '';
				}
			
          ?>
          <td class="<?php echo $class; ?>"><?php echo $row['name'];?></td>
          <td><?php echo $row['phone'];?></td>
          <td><?php echo $row['package'];?></td>
          <td><?php echo $row['received'];?></td>
          <td class="msg"><?php echo $row['outstanding'];?></td>
          <td class="success"><?php echo $row['advance'];?></td>
          <td><?php echo $row['pay_date'];?></td>
          <td><?php echo $row['expire_date'];?></td>
      
          <td class="d-flex" >
         	<a href="<?php echo SITE_URL.'/admin/index.php?manager=payment&action=edit-payment&id='.$row['id'];?>"><input type="button" value="Edit" class="btn btn-info btn-sm"/></a>
         	<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo SITE_URL.'/admin/index.php?manager=payment&action=delete-payment&id='.$row['id'];?>"><input type="button" value="Delete" class="btn btn-danger btn-sm"/></a>
          </td> 
        </tr> 
    <?php
  		}
			} else {
				?>
				<table class="table table-hover table-bordered table-striped text-center ">
					<tr>
						<td colspan="12">
							<a href="<?php echo SITE_URL.'/admin/index.php?manager=payment&action=add-payment';?>"><input type="button" value="Add New Client" class="btn btn-info btn-sm add-btn"/></a>
						</td>	
					</tr>
					<tr><th>SN</th><th>Name</th><th>Phone</th><th>Email</th><th>Package</th><th>Received Amt</th><th>Outstanding Amt</th><th>Advance Amt</th><th>Payment Date</th><th>Expire Date</th><th></th></tr>
					<?php
 					 echo "0 results";
					}
	?> 
</table>
</table>


