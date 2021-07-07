<h2 class="text-center head">Clients Payment</h2>
<?php
if (isset($_GET['action'])) {
	$action=$_GET['action'].'.php';
	 include('payment/'.$action);
}else{
  include('payment/payment-list.php');
}?>