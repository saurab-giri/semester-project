<?php
$id = isset($_GET['id'])?$_GET['id']:'';

$conn = mysqli_connect(HOST,USER,PASS,DBNAME);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from gym_payment WHERE id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    $pay_row = mysqli_fetch_assoc($result);
}


?>
<form method="post" action="<?php echo SITE_URL.'/admin/action.php';?>" enctype="multipart/form-data">
  <div class="form-div form-group bg-dark text-white">
    <h3 class="text-center head">Edit Payment Information</h3>
    <table align="center">
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="name" value="<?php echo $pay_row['name'];?>" class="form-control col-sm-8" required/>
        </td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>
          <input type="number" name="phone" value="<?php echo $pay_row['phone'];?>" class="form-control col-sm-8"/>
        </td>
      </tr>
      <tr class="msg email-msg error">         
        <span>
          <?php if( isset($_SESSION['contact_message']) ){
            echo $_SESSION['contact_message'];
             unset($_SESSION['contact_message']);      
            }
            ?>
        </span>    
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <input type="email" name="email" value="<?php echo $pay_row['email'];?>" class="form-control col-sm-8"/>
        </td>
      </tr>
      <tr class="msg email-msg error">         
        <span>
          <?php if( isset($_SESSION['email_message']) ){
            echo $_SESSION['email_message'];
            unset($_SESSION['email_message']);      
          }
          ?>
        </span>    
      </tr>
      <tr>
        <td>Choosen Package:</td>
        <td class="form-check-inline">
          <input type="radio" class="form-check-input" name="package" <?php if($pay_row['package'] == "1 month") { echo "checked"; }?> value="1 month"/> 1 month Package
        </td>
        <td class="form-check-inline">
          <input type="radio" class="form-check-input" name="package" <?php if($pay_row['package'] == "2 month") { echo "checked"; }?> value="2 month"/> 2 month Package
        </td>
        <td class="form-check-inline">
          <input type="radio" class="form-check-input" name="package" <?php if($pay_row['package'] == "3 month") { echo "checked"; }?> value="3 month" /> 3 month Package 
        </td>
      </tr>
      <tr>
        <td>Received Amount</td>
        <td>
          <input type="text" name="received" value="<?php echo $pay_row['received'];?>" class="form-control col-sm-5"/>
        </td>
      </tr>
      <tr>
        <td>Payment Date: </td>
        <td>
          <input type="date"  name="pay-date"  value="<?php echo $pay_row['pay_date'];?>" class="form-control" required>
        </td>
      </tr>
      <tr>
        <td>Expire Date: </td>
        <td>
          <input type="date"  name="expire-date"  value="<?php echo $pay_row['expire_date'];?>" class="form-control" required>
        </td>
      </tr> 
      <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
      <tr><td></td><td><br><input type="submit" name="edit_payment" value="Edit Payment" class="btn btn-info"/></td></tr>
    </table>  
  </div>
</form>