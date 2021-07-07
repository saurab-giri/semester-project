<h2 class="text-center head">Admin Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('admin/'.$action);
    
}else{
  include('admin/list-admin.php');
}?>