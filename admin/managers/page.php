
<h2 class="text-center head">Page Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('page/'.$action);
    
}else{
  include('page/list-page.php');
}?>