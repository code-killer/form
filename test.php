<?php
session_start();
if (isset($_GET['itemid']))
{
	$itemid=$_GET['itemid'];
	$_SESSION['t1cart_'.$itemid]+=1;
}

foreach ($_SESSION as $name => $quantaty) {

echo $name.' '.$quantaty.'</br>';

}




?>