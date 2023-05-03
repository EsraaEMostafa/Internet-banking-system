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
    <div class="name">
      <img src="logo.jpeg" width="100px" height="100px" />
      <h1>Internet Banking System</h1>
    </div>
    <form action="registerClient.php" method="post">
      <div class="container">
        <label for="fname"><b>First Name</b></label
        ><br />
        <input
          type="text"
          class="input-field"
          placeholder="Type your first name"
          name="fname"
          maxlength="15"
        /><br />
        <label for="lname"><b>Last Name</b></label
        ><br />
        <input
          type="text"
          class="input-field"
          placeholder="Type your last name"
          name="lname"
         maxlength="15"
        /><br />
        <label for="email"><b>Email</b></label
        ><br />
        <input
          type="text"
          class="input-field"
          placeholder="Type your email"
          name="email"
          
        /><br />

        <label for="psw"><b>Password</b></label
        ><br />
        <input
          type="password"
          class="input-field"
          placeholder="Type your password"
          name="psw"
          
        /><br />
        <label for="confirmpsw"><b>Confirm Password</b></label
        ><br />
        <input
          type="password"
          class="input-field"
          placeholder="Type your password"
          name="confirmpsw"
          
        /><br />

        <button type="submit">Register</button><br />
        <h4>
          Already have an account? <a class="btn" href="index.php">Login</a>
        </h4>
      </div>
      <br />
    </form>

  </body>
</html>
