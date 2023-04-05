<?php
session_start();
$connection=mysqli_connect("localhost","root","","internetbankingsystem");
if($connection) {
    //echo "success"; 
} 
else {
    die("Error". mysqli_connect_error()); 
}
$email=$_REQUEST['email'];
$password=$_REQUEST['psw'];

if(str_contains($email, 'admin')){
    $admintable="select * from admin where (email='$email')";
    $res2=mysqli_query($connection,$admintable) or die ( mysqli_error($connection)); 
    if (mysqli_num_rows($res2) ==1) {
        $row = mysqli_fetch_assoc($res2);
        if($row['passwords']==$password){
            header('Location:admin.php');
        }
        else{
            echo '<script>
        alert("invalid password");
        window.location.href="index.php";
        </script>';
        }
    }
    else{
        echo '<script>
    alert("invalid email");
    window.location.href="index.php";
    </script>';
    }
}
else{
    $clienttable="select * from client where (email='$email');";
$res=mysqli_query($connection,$clienttable) or die ( mysqli_error($connection));  

if (mysqli_num_rows($res) ==1) {
    
    $row = mysqli_fetch_assoc($res);
    if(password_verify($password, $row['passwords'])){
        $_SESSION['clientID']= $row["clientID"];
        $_SESSION['firstName']= $row["firstName"];
        
        header('Location:viewAccount.php');
        
        
    }
    else{
        echo '<script>
    alert("invalid password");
    window.location.href="index.php";
    </script>';
    }
    
  }
  else{
    echo '<script>
    alert("invalid email");
    window.location.href="index.php";
    </script>';
  }
}


  mysqli_close($connection);
?>

