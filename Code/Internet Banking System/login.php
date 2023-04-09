<?php
function navigateToViewAccount() {
    header('Location:viewAccount.php');
}
function navigateToAdminPage() {
    header('Location:admin.php');
}
function validate_login_admin_data($email, $password,$connection){
    $admintable="select * from admin where (email='$email')";
        $res2=mysqli_query($connection,$admintable) or die ( mysqli_error($connection)); 
        if (mysqli_num_rows($res2) ==1) {
            $row = mysqli_fetch_assoc($res2);
            if($row['passwords']==$password){
                navigateToAdminPage();
            }
            else{
                echo '<script>
            alert("invalid data");
            window.location.href="index.php";
            </script>';
            }
        }
        else{
            echo '<script>
        alert("invalid data");
        window.location.href="index.php";
        </script>';
        }

}
function validate_client_login_data($email,$password, $connection){
    $clienttable="select * from client where (email='$email');";
        $res=mysqli_query($connection,$clienttable) or die ( mysqli_error($connection));  
        
        if (mysqli_num_rows($res) ==1) {
            
            $row = mysqli_fetch_assoc($res);
            if(password_verify($password, $row['passwords'])){
                
                navigateToViewAccount();
                $_SESSION['clientID']= $row["clientID"];
                $_SESSION['firstName']= $row["firstName"];
            }
            else{
                echo '<script>
            alert("invalid data");
            window.location.href="index.php";
            </script>';
            }
            
        }
        else{
            echo '<script>
            alert("invalid data");
            window.location.href="index.php";
            </script>';
        }
}
function login($email, $password){
    session_start();
    $connection=mysqli_connect("localhost","root","","internetbankingsystem");
    if($connection) {
        //echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    }
    if(str_contains($email, 'admin')){
        validate_login_admin_data($email, $password,$connection);
    }
    else{
        validate_client_login_data($email,$password, $connection);
    }
    
    
      mysqli_close($connection);
}
$email=$_REQUEST['email'];
$password=$_REQUEST['psw'];
login($email, $password);
?>

