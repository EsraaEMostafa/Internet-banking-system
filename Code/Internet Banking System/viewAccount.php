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
            <form action="viewClient.php">
              <button type="submit" class="accbtn" name="addNewAccount">Add New Account</button>
            </form>
            
            <!--select name="accounts" id="account" onchange="showUser(this.value);showUserBalance(this.value)">
              <option selected disabled>Select Account No.</option>
              <!?php include("viewClient.php");
              viewAccountsList();?>
            
            </select-->
            <h2 class="accountNumber">
              <?php 
              include("viewClient.php");
              viewAccountNumber();?>
            </h2>
              
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
            <p class="balance__value">
              <!--?php
                include("viewClient.php");
                getBalance();
              ?-->
            </p>
          </div>

          <!-- MOVEMENTS -->
          <div class="movements">
            <!--div class="movements__row">
              <div class="movements__type movements__type--sent">
                
              </div>
              <div class="movements__date"></div>
              <div class="movements__value"></div>
            </div-->
            <?php 
              require_once("viewClient.php");
              viewTransactions();
            ?>
            
            
          </div>
        </div>
        <!-- OPERATION: TRANSFERS -->
        <div class="column">
          <div class="operation operation--transfer">
            <h2>Transfer money</h2>

            <form class="form form--transfer" action="viewClient.php" method="post">
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
                    
                  />
                </div>
                <div class="form2">
                  <label for="amount" class="moneyamount"><b>Amount</b></label>
                  <input
                    type="number"
                    placeholder="Amount"
                    name="amount"
                    class="amountmoney"
                    
                  />
                </div>
              </div>
              <button type="submit" class="transferbtn" name="transferMoney"><b>Transfer</b></button>
            </form>
          </div>
          <button class="logout" onclick="location.href='logout.php'">
            <b>Log Out</b>
          </button>
        </div>
      </div>
    </div>
    
    <?php
      
      require_once('viewClient.php');

// Call the function
      viewClientNameandDate();
      getBalance();
      
      
    ?>
  </body>
</html>
