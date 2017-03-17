<?php
$page= "form.php";
session_start();
if (isset($_GET['itemid']))
{
	$itemid=$_GET['itemid'];
	$_SESSION['item_'.$itemid]+=1;
	
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
$dyn_table = '<tr><td>' . '<a style="text-decoration:none; height:30px; width:100px; display:block; text-align:center;
                              background-color:#2E59A4; color:#FFFFFF;  padding-top: 10px;"  href="form.php?itemid=text">Text Field</a>'
			      . '</td>
				  </tr></br>' . 
			'<tr><td>' . '<a style="text-decoration:none; height:30px; width:100px; display:block; text-align:center;
                              background-color:#2E59A4; color:#FFFFFF;  padding-top: 10px;"  href="form.php?itemid=6">Email Field</a>'
			      . '</td>
				  </tr></br>' .	  
			 '<tr><td>' . '<a style="text-decoration:none; height:30px; width:100px; display:block; text-align:center;
                              background-color:#2E59A4; color:#FFFFFF;   padding-top: 10px;" href="form.php?itemid=2">Radio Button</a>'
			      . '</td></tr></br>' . 	  
			 '<tr><td>' . '<a style="text-decoration:none; height:30px; width:100px; display:block; text-align:center;
                              background-color:#2E59A4; color:#FFFFFF;   padding-top: 10px;" href="form.php?itemid=3">Check Box</a>'
			      . '</td></tr></br>' . 
			'<tr><td>' . '<a style="text-decoration:none; height:30px; width:100px; display:block; text-align:center;
                              background-color:#2E59A4; color:#FFFFFF;   padding-top: 10px;" href="form.php?itemid=4">Text Area</a>'
			      . '</td></tr></br>' .
			'<tr><td>' . '<a style="text-decoration:none; height:30px; width:100px; display:block; text-align:center;
                              background-color:#2E59A4; color:#FFFFFF;   padding-top: 10px;" href="form.php?itemid=5">Button</a>'
			      . '</td></tr></br>'	  
				  ;
echo $dyn_table;


?>
</div><!--end of leftcol div-->

<div id="rightcol">

<?php
$_SESSION['item_'.$itemid]+=1;
$_SESSION['item_2']=1;
$_SESSION['item_1']=1;

foreach ($_SESSION as $name => $quantaty) {
$id = substr ($name,5, (strlen($name) -5));
//echo $id;
}

if(isset($itemid)) {
	if($itemid=='text') {
$dyn_table = '<tr>
                <td>' . '<input type="text" value="Text goes here" style="text-decoration:none; height:30px; width:200px; display:block;
                                text-align:center; background-color:#2E59A4; color:#FFFFFF; padding-top: 10px;" />' . '</td>
	</tr></br>'; }
	if($itemid==2) {
$dyn_table =
			  '<tr>
                <td>' . '<input type="radio" style="text-decoration:none; height:20px; width:200px; display:block;
                                text-align:center; background-color:#2E59A4; color:#FFFFFF; padding: 10px 0;" />' . '</td>
	</tr></br>' ; } 
if($itemid==3) {
$dyn_table =			  '<tr>
                <td>' . '<input type="checkbox" style="text-decoration:none; height:20px; width:200px; display:block;
                                text-align:center; background-color:#2E59A4; color:#FFFFFF;  padding-top: 10px;" />' . '</td>
</tr></br>' ; } 
if($itemid==4) {
$dyn_table =			  '<tr>
                <td>' . '<textarea rows="5" cols="50" style="text-decoration:none; display:block;
                                text-align:center; background-color:#2E59A4; color:#FFFFFF;  padding-top: 10px;" >Enter your text here.</textarea>' . '</td>
</tr></br>' ; }
if($itemid==5) {
$dyn_table =			  '<tr>
                <td>' . '<input type="button" value="SUBMIT" style="text-decoration:none; height:30px; width:100px; display:block;
                                text-align:center; background-color:#2E59A4; color:#FFFFFF;  padding-top: 10px;" >' . '</td>
</tr></br>'; }
if($itemid==6) {
$dyn_table = '<tr>
                <td>' . '<input type="email" value="Type your email" style="text-decoration:none; height:30px; width:200px; display:block;
                                text-align:center; background-color:#2E59A4; color:#FFFFFF; padding-top: 10px;" />' . '</td>
	</tr></br>'; }
			  
echo $dyn_table;

}
cart();
//call the display form function
//displayitem ();

?>
</div><!--end of rightcol div-->
</body>
</html>