<?php
session_start();
$connection=mysqli_connect("localhost","root","","internetbankingsystem");
if($connection) {
    //echo "success"; 
} 
else {
    die("Error". mysqli_connect_error()); 
}
$clienttables="select clientID, IFNULL(accountNo,'No account') as accountNo, CONCAT(firstName, ' ', lastName) as Name, email
from client left join account
on client.clientID=account.client_ID";
$res2=mysqli_query($connection,$clienttables) or die ( mysqli_error($connection));  
if ($res2->num_rows > 0){
    while ($row2 = $res2->fetch_assoc()){
        echo "<tr>";
        
        echo "<td>$row2[accountNo]</td>";
        echo "<td>$row2[clientID]</td>";
        echo "<td>$row2[Name]</td>";
        echo "<td>$row2[email]</td>";
        echo "</tr>";
    }
}

mysqli_close($connection);
?>
