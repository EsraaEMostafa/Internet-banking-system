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
    <form action="login.php" method="post">
      <div class="container">
        <label for="email"><b>Email</b></label
        ><br />
        <input
          type="email"
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

        <button type="submit">Login</button><br />
        <h4>
          Or you don't have an account,
          <a class="btn" href="register.php">Register</a>
        </h4>
      </div>
      <br />
    </form>
  
  </body>
</html>
