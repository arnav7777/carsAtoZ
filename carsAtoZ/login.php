<?php
session_start(); // Start the session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_agency";

    // Create a database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get user input
    

    // Check if the user is a customer
    if (isset($_POST["customer_login"])) {
        $email = $_POST["cemail"];
    $password = $_POST["cpassword"];
    $customer_query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
    $customer_result = mysqli_query($conn, $customer_query);
    $rows=mysqli_fetch_assoc($customer_result);

    if (mysqli_num_rows($customer_result) > 0) {
            $id=$rows['id'];
            header("Location:customer/index.php?id=$id"); // Redirect to the customer dashboard
            exit();
        
    }
}


if (isset($_POST["agency_login"])) {
    // Check if the user is an agency
    $email = $_POST["aemail"];
    $password = $_POST["apassword"];
    $agency_query = "SELECT * FROM agency WHERE email='$email' AND password='$password'";
    $agency_result = mysqli_query($conn, $agency_query);
    $rows=mysqli_fetch_assoc($agency_result);


    if (mysqli_num_rows($agency_result) > 0) {
                   // Authentication successful for agency
                   $id=$rows['id'];
                    header("Location:admin/index.php?id=$id"); // Redirect to the agency dashboard
            exit();
        
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarAtoZ Login</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/styles_login.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<form action="" method="post">
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
      <label for="tab-1" class="tab">Login as customer</label>
      <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Login as Agency</label>
      <div class="login-form">
        <div class="sign-in-htm">
          <div class="group">
            <label for="cemail" class="label">Username or Email</label>
            <input  type="text" name="cemail" id="cemail" class="input">
          </div>
          <div class="group">
            <label for="cpassword" class="label">Password</label>
            <input  type="password" name="cpassword"  id="cpassword" class="input" data-type="password">
          </div>
          <div class="group">
            <input type="submit" class="button"  name="customer_login" value="Login"><br>
            
          </div>
          <div class="hr"></div>
          <div class="group">
<p class="p"><i>new user? Register!</i></p>
            <a href="registration.php"><input type="button" class="button"  name="registration" value="Register"></a>
            </div>
          <!-- Display error message if authentication fails -->
          <?php if (isset($error_message)) : ?>
              <div class="error-message"><?php echo $error_message; ?></div>
          <?php endif; ?>
        </div>
        <div class="for-pwd-htm">
        <div class="group">
            <label for="aemail" class="label">Email</label>
            <input  type="text" name="aemail" id="aemail" class="input">
          </div>
          <div class="group">
            <label for="apassword" class="label">Password</label>
            <input  type="password" name="apassword" id="apassword"class="input" data-type="password">
          </div>
          <div class="group">
            <input type="submit" class="button" value="Login" name="agency_login"><br>
          </div>
          <div class="hr"></div>
          <div class="group">
<p class="p"><i>new user? Register!</i></p>
            <a href="registration.php"><input type="button" class="button"  name="registration" value="Register"></a>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
</form>

</body>
</html>
