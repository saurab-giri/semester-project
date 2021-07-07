<h1 class="text-center head">Available Schedule</h1>
<table class="table table-hover table-bordered table-striped">
	<tr>
	<td colspan="9">
		<?php //$fun_obj->display_message();?>
		<a href="<?php echo SITE_URL.'/admin/index.php?manager=schedule&action=add-schedule';?>"><input type="button" value="Add New Schedule" class="btn btn-info btn-sm add-btn"/></a>

	</td>
	</tr>
	<tr><th>SN</th><th>Day</th><th>Time</th><th>Session</th><th>Shift</th><th></th></tr>
	<?php 
$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM gym_schedule";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
	$sn=1;
  while($row = mysqli_fetch_assoc($result)) {
	?> 
        <tr>
           <td><?php echo $sn++;?></td>
          <td><?php echo $row['day'];?></td>
          <td><?php echo $row['time'];?></td>
          <td><?php echo $row['session'];?></td>
          <td><?php echo $row['class'];?></td>
          <td>
         	<a href="<?php echo SITE_URL.'/admin/index.php?manager=schedule&action=edit-schedule&id='.$row['id'];?>"><input type="button" value="Edit" class="btn btn-info btn-sm"/></a>
         	<a onClick="javascript: return confirm('Please confirm deletion');" class="delete" href="<?php echo SITE_URL.'/admin/index.php?manager=schedule&action=delete-schedule&id='.$row['id'];?>"><input type="button" value="Delete" class="btn btn-danger btn-sm"/></a>
          </td> 
        </tr>  
	<?php
  }
} else {
  echo "0 results";
}
	?>
</table>