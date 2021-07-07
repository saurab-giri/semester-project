
<h1 class="text-center head">Clients List</h1>
<div style="overflow-x:auto;">
<table class="table table-hover table-bordered table-striped ">
	<tr>
		<td colspan="8">
			<form method="post" action="<?php echo SITE_URL.'/admin/index.php?manager=payment&action=search';?>" enctype="multipart/form-data">
				<input type="text" name="query" />
				<input type="submit" name="search" value="Search" />
			</form>
		</td>
		<td colspan="4">
			<a href="<?php echo SITE_URL.'/admin/index.php?manager=payment&action=add-payment';?>"><input type="button" value="Add New Client" class="btn btn-info btn-sm add-btn"/></a>
		</td>	
	</tr>
	<tr><th>SN</th><th>Name</th><th>Phone</th><th>Email</th><th>Package</th><th>Received Amt</th><th>Outstanding Amt</th><th>Advance Amt</th><th>Payment Date</th><th>Expire Date</th><th></th></tr>
	<?php
		$conn=mysqli_connect(HOST,USER,PASS,DBNAME);
		if (!$conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM gym_payment ORDER BY name Asc";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		$sn=1;
	  		while($row = mysqli_fetch_assoc($result)) {
	?> 
        <tr>
          <td><?php echo $sn++;?>.</td>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['phone'];?></td>
          <td><?php echo $row['email'];?></td>
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
 					 echo "0 results";
					}
	?> 
</table>
</div>
