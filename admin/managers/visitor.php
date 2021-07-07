<h2 class="text-center head">Visitors Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('visitors/'.$action);
    
}else{
  include('visitors/list-visitor.php');
}?>