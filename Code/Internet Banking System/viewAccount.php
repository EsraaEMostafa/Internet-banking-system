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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Internet Banking System</title>
  </head>
  <body>
    <div class="accpage">
      <center>
        <div class="part1">
          <h2 class="welcomeTitle"></h2>
          <img src="logo.jpeg" class="logo" width="100px" height="100px" />
          <div class="accountspart">
            <form action="addAccount.php">
              <button class="accbtn">Add New Account</button>
            </form>
            
            <select name="accounts" id="account" onchange="showUser(this.value);showUserBalance(this.value)">
              <option selected disabled>Select Account No.</option>
              <?php include("insertAccountsinList.php");?>
            
            </select>
              
          </div>
        </div>
      </center>
      <div class="row">
        <div class="column">
          <div class="balance">
            <div>
              <p class="balance__label">Current balance</p>
              <p class="balance__date">
                As of <span class="date"></span>
              </p>
            </div>
            <p class="balance__value"></p>
          </div>

          <!-- MOVEMENTS -->
          <div class="movements">
            <!--div class="movements__row">
              <div class="movements__type movements__type--sent">
                
              </div>
              <div class="movements__date"></div>
              <div class="movements__value"></div>
            </div-->
            
          </div>
        </div>
        <!-- OPERATION: TRANSFERS -->
        <div class="column">
          <div class="operation operation--transfer">
            <h2>Transfer money</h2>

            <form class="form form--transfer" action="transferMoney.php" method="post">
              <div class="formm">
                <div class="form1">
                  <label for="accnum" class="accountnum"
                    ><b>Transfer to</b></label
                  >
                  <input
                    type="number"
                    placeholder="Account no."
                    name="accnum"
                    class="accNum"
                    required
                  />
                </div>
                <div class="form2">
                  <label for="amount" class="moneyamount"><b>Amount</b></label>
                  <input
                    type="number"
                    placeholder="Amount"
                    name="amount"
                    class="amountmoney"
                    required
                  />
                </div>
              </div>
              <button type="submit" class="transferbtn"><b>Transfer</b></button>
            </form>
          </div>
          <button class="logout" onclick="location.href='logout.php'">
            <b>Log Out</b>
          </button>
        </div>
      </div>
    </div>
    
    <?php
      
      if (isset($_SESSION['firstName'])) {
        echo '<script>document.querySelector(".welcomeTitle").innerHTML = "Welcome, '.$_SESSION['firstName'].'";</script>';
    }
    echo '<script>document.querySelector(".date").innerHTML = "'.date('Y-m-d').'";</script>';

    
    
    ?>
  </body>
</html>
