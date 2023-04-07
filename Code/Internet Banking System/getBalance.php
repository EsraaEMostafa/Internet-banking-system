<?php
function getBalance($accountnum){
    

    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    mysqli_select_db($connection,"ajax_demo");


    $accounttable="select currentBalance from account where (accountNo='$accountnum');";
    $res=mysqli_query($connection,$accounttable) or die ( mysqli_error($connection));  
    $row = $res->fetch_assoc();
    $balance=$row['currentBalance'];
    echo "<b>$balance LE</b>";

    mysqli_close($connection);
}
$q = intval($_REQUEST['q']);
getBalance($q);
?>
