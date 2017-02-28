<?php
$page= "form.php";

if (isset($_GET['itemid']))
{
	$itemid=$_GET['itemid'];
	//$_SESSION['t1cart_'.$itemid]=1;
	
	//header ('location:'.$page);
}
function cart()
{	
if(isset($itemid)) {
	echo "here we come";
}
else "no item id";

}


?>


<!DOCTYPE html>
<html>
<head>
<link rel=stylesheet type=text/css href=main.css>


</head>
<body>
<div id="leftcol" >
<?php
// call the fielitem list funtion here
$dyn_table = '<tr><td>' . '<a style="text-decoration:none; height:60px; width:90px; display:block; text-align:center; background-color:#2E59A4; color:#FFFFFF;" href="form.php?itemid=1">Text Filed</a>' . '</td>';
echo $dyn_table;
//require "table1cart.php";
//include ('connection.php');
//cart();

?>
</div><!--end of leftcol div-->

<div id="rightcol">

<?php
if(isset($itemid)) {
$dyn_table = '<tr><td>' . '<input type="text" style="text-decoration:none; height:30px; width:200px; display:block; text-align:center; background-color:#2E59A4; color:#FFFFFF;" />' . '</td>';
echo $dyn_table;
echo "here we come";
}
cart();
//call the display form function
//displayitem ();
echo "hello ";
?>
</div><!--end of rightcol div-->
</body>
</html>