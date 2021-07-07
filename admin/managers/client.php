<h2 class="text-center head">Clients Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('clients/'.$action);
    
}else{
  include('clients/list-client.php');
}?>