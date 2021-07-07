<h2 class="text-center head">Equipment Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('equipment/'.$action);
    
}else{
  include('equipment/list-equipment.php');
}?>