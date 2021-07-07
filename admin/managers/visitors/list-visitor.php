<h1 class="text-center head">Website Visitors</h1>
<table class="table table-hover table-bordered table-striped">
  <tr>
  </td>
  </tr>
  <tr><th>SN</th><th>Name</th><th>Address</th><th>Age</th><th>Contact</th><th>Email</th><th>Shift</th><th></th></tr>
  <?php 
$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM gym_visitor ORDER BY name Asc";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $sn=1;
  while($row = mysqli_fetch_assoc($result)) {
  ?>
        <tr>
           <td><?php echo $sn++;?>.</td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['address']?></td>
          <td><?php echo $row['age']?></td>
          <td><?php echo $row['contact']?></td>
          <td><?php echo $row['email']?></td>
          <td><?php echo $row['shift']?></td>
          <td>
          <a href="<?php echo SITE_URL.'/admin/index.php?manager=visitor&action=edit-visitor&id='.$row['id'];?>"><input type="button" value="Edit" class="btn btn-info btn-sm"/></a>
          <a onClick="javascript: return confirm('Please confirm deletion');" class="delete" href="<?php echo SITE_URL.'/admin/index.php?manager=visitor&action=delete-visitor&id='.$row['id'];?>"><input type="button" value="Delete" class="btn btn-danger btn-sm"/></a>
          </td> 
        </tr>  
  <?php
  }
} else {
  echo "0 results";
}
  ?>
</table>
