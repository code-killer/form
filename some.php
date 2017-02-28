
<?php
require 'security_cashier.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>


</head>

<body>

<?php
include 'connection.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$page= "table1.php";

if (isset($_GET['itemid']))
{
	$itemid=$_GET['itemid'];
	$_SESSION['t1cart_'.$itemid]+=1;
	
	header ('location:'.$page);
}

if (isset($_GET['remove']))
{
	$remove=$_GET['remove'];
	$_SESSION['t1cart_'.$remove]--;
	
	header ('location:'.$page);
}

if (isset($_GET['cancel']))
{
	$cancel=$_GET['cancel'];
	$_SESSION['t1cart_'.$cancel]='0';
	
	header ('location:'.$page);
}


function displayitem ()
{
	$query=mysql_query('SELECT * FROM pos.item');
		if (mysql_num_rows($query)==0){
		echo "there are nothing to display";
			}

		else {
			$i = 0;
// Establish the output variable
$dyn_table = '<table cellpadding="10">';
		while ($query_array=mysql_fetch_assoc($query))
				 {
				$itam_name=$query_array['itemName'];
				$itam_id=$query_array['itemID'];
				$itam_price=$query_array['itemPrice'];
				
				
				if ($i % 7 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table .= '<tr><td>' . '<a style="text-decoration:none; height:60px; width:90px; display:block; text-align:center; background-color:#2E59A4; color:#FFFFFF;" href="table1cart.php?itemid='.$itam_id.'">'.$itam_name.'('.number_format ($itam_price,2).')</a>' . '</td>';
    } else {
        $dyn_table .= '<td>' . '<a style="text-decoration:none; height:60px; width:90px; display:block; text-align:center; background-color:#2E59A4; color:#FFFFFF;" href="table1cart.php?itemid='.$itam_id.'">'.$itam_name.'('.number_format ($itam_price,2).')</a>'. '</td>';
    }
    $i++;
				
				

					}
					
					$dyn_table .= '</tr></table>';
					echo $dyn_table;
			}

}






function displayitem_popular ()
{
	$query=mysql_query('SELECT * FROM pos.item where popularity="popular"');
		if (mysql_num_rows($query)==0){
		echo "there are nothing to display";
			}

		else {
			$i = 0;
// Establish the output variable
$dyn_table = '<table cellpadding="10">';
		while ($query_array=mysql_fetch_assoc($query))
				 {
				$itam_name=$query_array['itemName'];
				$itam_id=$query_array['itemID'];
				$itam_price=$query_array['itemPrice'];
				
				
				if ($i % 7 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table .= '<tr><td>' . '<a style="text-decoration:none; height:60px; width:90px; display:block; text-align:center; background-color:#972829; color:#FFFFFF;" href="table1cart.php?itemid='.$itam_id.'">'.$itam_name.'('.number_format ($itam_price,2).')</a>' . '</td>';
    } else {
        $dyn_table .= '<td>' . '<a style="text-decoration:none; height:60px; width:90px; display:block; text-align:center; background-color:#972829; color:#FFFFFF;" href="table1cart.php?itemid='.$itam_id.'">'.$itam_name.'('.number_format ($itam_price,2).')</a>'. '</td>';
    }
    $i++;
				
				

					}
					
					$dyn_table .= '</tr></table>';
					echo $dyn_table;
			}
}




















function cart()
{	
	foreach ($_SESSION as $name => $quantaty)
	{
		if ($quantaty>0)
		{
					if (substr ($name,0,7)=='t1cart_') {
			$id = substr ($name,7, (strlen($name) -7));
			$query=mysql_query('SELECT * FROM pos.item where itemID='.mysql_real_escape_string ((int)$id));
						
		while ($query_array=mysql_fetch_assoc($query)) {
				$itam_name=$query_array['itemName'];
				$itam_id=$query_array['itemID'];
				$itam_price=$query_array['itemPrice'];
				
				$sub= $itam_price * $quantaty;
				@$total +=$sub;
				$_SESSION['totalt1']= number_format ($total,2);
				echo '<div class="cart">'.$quantaty.'&nbsp;&nbsp;&nbsp;'.$itam_name.'&nbsp;=&nbsp; &pound;'.number_format($sub,2).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="height:20px;width: 30px "  href="table1cart.php?itemid='.$itam_id.'">+</a> <a href="table1cart.php?remove='.$itam_id.'">-</a> <a href="table1cart.php?cancel='.$itam_id.'">Cancel</a> <br /></div>';
		}
			
			}
		}
	}
if(isset($total))
{

echo '<div class="total">Total: &nbsp;&pound;&nbsp;'.number_format ($total,2).'</div>';

}
else 
{
	echo "Start Ordering";
}}// end of cart function?>

</body>
</html>
