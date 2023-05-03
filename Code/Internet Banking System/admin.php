<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/png" href="/icon.png" />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,500,600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style.css" />
    <title>Internet Banking System</title>
  </head>
  <body>
    <center>
      <div class="part1">
        <h2>Welcome Back,</h2>
        <img src="logo.jpeg" class="logo" width="100px" height="100px" />
        <div class="closeaccs">
        
          <form class="closeclientAcc" method="post" action="viewAdmin.php" >
            <input
              type="number"
              placeholder="Account No."
              class="closeAcc"
              name="closeAccount"
              required
            />
            <br />
            <button type="submit" class="closeAccBtn" name="closeAccountButton">Close Account</button>

          </form>
         <button style="width:60%;height:30%;margin-top:7px;"class="logout" onclick="location.href='logout.php'">
         Log Out
          </button>
        </div>
        
      </div>
      
      <table class="allaccounts">
        <tr>
          
          <th>Account Number</th>
          <th>Client ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
        <?php include("viewAdmin.php");
              viewAllAccountsAdmin();?>
      </table>
    </center>
  </body>
</html>
