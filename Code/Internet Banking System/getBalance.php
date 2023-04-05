<?php
session_start();
$q = intval($_REQUEST['q']);
$connection=mysqli_connect("localhost","root","","internetbankingsystem");
if($connection) {
    //echo "success"; 
} 
else {
    die("Error". mysqli_connect_error()); 
}
mysqli_select_db($connection,"ajax_demo");

$_SESSION['accountNo']=$q;  

$accounttable="select currentBalance from account where (accountNo='$q');";
$res=mysqli_query($connection,$accounttable) or die ( mysqli_error($connection));  
$row = $res->fetch_assoc();
$balance=$row['currentBalance'];
echo "<b>$balance LE</b>";

mysqli_close($connection);
?>
