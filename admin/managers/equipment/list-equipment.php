<div class="table-responsive">
<table class="table table-hover table-bordered table-striped">
  <tbody class="page-list">
    	<tr>
    	<td colspan="9">
    		<a href="<?php echo SITE_URL.'/admin/index.php?manager=equipment&action=add-equipment';?>">
        <input type="button" value="Add New Equipment" class="btn btn-info btn-sm add-btn"/></a>

    	</td>
    	</tr>
    	<tr class="text-center"><th>SN</th><th class="col-2">Equipment Name</th><th class="col-4">Description</th><th class="col-2">Quantity</th><th class="col-2">Image</th><th class="col-2"></th></tr>
    	<?php 
      $conn = mysqli_connect(HOST,USER,PASS,DBNAME);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT * FROM gym_equipment ORDER BY equipment_name Asc";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
      	$sn=1;
        while($row = mysqli_fetch_assoc($result)) {
      	?>
          <tr class="text-center">
            <td><?php echo $sn++;?></td>
            <td><?php echo $row['equipment_name'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td>
              <?php 
              if(!empty($row['image'])){?>
              <img src="<?php echo SITE_URL.'/admin/images/'.$row['image'];?>" width="50" height="50">
              <?php }else{?>
              <p>No Image</p>
              <?php }?>
            </td>
            <td>
           	<a href="<?php echo SITE_URL.'/admin/index.php?manager=equipment&action=edit-equipment&id='.$row['id'];?>">
             <input type="button" value="Edit" class="btn btn-info btn-sm"/></a>
           	<a onClick="javascript: return confirm('Please confirm deletion');" href="<?php echo SITE_URL.'/admin/index.php?manager=equipment&action=delete-equipment&id='.$row['id'];?>">
             <input type="button" value="Delete" class="delete btn btn-danger btn-sm"/></a>
            </td> 
          </tr>  
    	<?php
      }
    } else {
      echo "0 results";
    }
    	?>
</tbody>
</table>
</div>