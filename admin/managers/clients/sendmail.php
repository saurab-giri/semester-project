<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_clients WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $sch_row = mysqli_fetch_assoc($result);  
}
?>
<h3 class="text-center head">Send Mail To Client</h3>
      <form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data" align="center">
      <table align="center">
        <tr>
          <td>Name: </td>
          <td>
            <input type="text" name="name" value="<?php echo $sch_row['name'];?>" class="form-control col-sm-8 col-lg-8" required/>
          </td>
        </tr>
        <tr>
          <td>Email: </td>
          <td>
            <input type="text" name="email" value="<?php echo $sch_row['email'];?>" class="form-control col-sm-8"/>
          </td>
        </tr>
        <tr>
          <td>Message: </td>
          <td>
            <textarea name="message"  class="form-control col-sm-8"></textarea>
          </td>
        </tr>
        
         <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
        <tr><td></td><td><br> <input type="submit"  name="send_mail" value="Send Mail" class="btn btn-info"/></td></tr>
      </table>  