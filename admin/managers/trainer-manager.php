<h2 class="text-center head">Trainer Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('trainer/'.$action);
    
}else{
  include('trainer/trainer-list.php');
}?>