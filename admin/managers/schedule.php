<h2 class="text-center head">Schedule Manager</h2>
<?php if(isset($_GET['action'])){
    $action = $_GET['action'].'.php';
    include('schedule-manager/'.$action);
    
}else{
  include('schedule-manager/list-schedule.php');
}?>