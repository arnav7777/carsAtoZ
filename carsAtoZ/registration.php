<?php
    // PHP code to handle form submission and database insertion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish a database connection (replace with your credentials)
        $conn = mysqli_connect("localhost", "root", "", "car_agency");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST["register_customer"])) {
            // Process customer registration form
            $first_name = $_POST["customer_first_name"];
            $last_name = $_POST["customer_last_name"];
            $email = $_POST["customer_email"];
            $phone = $_POST["customer_phone"];
            $password = $_POST["customer_password"];
            $security_question = $_POST["customer_security_question"];
            $security_answer = $_POST["customer_security_answer"];

            $sql = "INSERT INTO customer (first_name, last_name, email, phone, password, security_question, security_answer)
                    VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$security_question', '$security_answer')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="alert alert-success"  id="success-alert" role="alert">';
                echo 'Customer registration successful. Please Login to continue!';
                echo '</div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } 
        if (isset($_POST["register_agency"])) {
            // Process agency registration form
            $agency_name = $_POST["agency_name"];
            $registration_number = $_POST["registration_number"];
            $email = $_POST["agency_email"];
            $phone = $_POST["agency_phone"];
            $password = $_POST["agency_password"];
            $location = $_POST["agency_location"];
            $a_security_question = $_POST["agency_security_question"];
            $a_security_answer = $_POST["agency_security_answer"];

            $sql = "INSERT INTO agency (agency_name, registration_number, email, phone, password, location)
                    VALUES ('$agency_name', '$registration_number', '$email', '$phone', '$password', '$location')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="alert alert-success" id="success-alert" role="alert">';
                echo 'Agency registration successful. Please Login to continue!';
                echo '</div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarAtoZ Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/styles_reg.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
    <form action="" method="post">
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
               
                <a href="login.php"><input type="button" name="login" value="Login"/></a><br/>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Agency</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Customer</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Apply as an Agency</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="agency_name" placeholder="Agency Name *" value="" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="registration_number" placeholder="Registration Number *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="agency_password" placeholder="Password *" value="" required/>
                                </div>
                                
                                <div class="form-group">
                                    <div class="maxl">
                                    <input type="text" class="form-control" name="agency_location" placeholder="Location *" value="" required/>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="agency_email" placeholder="Email *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10"  name="agency_phone" class="form-control" placeholder="Phone Number *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="agency_security_question" required>
                                        <option class="hidden"  selected disabled>Please select your Security Question</option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="agency_security_answer" class="form-control" placeholder="Enter Your Answer *" value="" required/>
                                </div>
                                <input type="submit" class="btn btn-primary" name="register_agency"  id="register_agency_button" value="Register"/>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Apply as a Customer</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="customer_first_name" placeholder="First Name *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="customer_last_name" placeholder="Last Name *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="customer_email" placeholder="Email *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" minlength="10" name="customer_phone" class="form-control" placeholder="Phone *" value="" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="customer_password" placeholder="Password *" value="" required/>
                                </div>
                                
                                <div class="form-group">
                                    <select class="form-control" name="customer_security_question" required>
                                        <option class="hidden"  selected disabled>Please select your Security Question</option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="customer_security_answer" placeholder="Answer *" value="" required/>
                                </div>
                                <input type="submit" class="btn btn-primary" name="register_customer" id="register_customer_button"  value="Register"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
   document.getElementById('register_agency_button').addEventListener('click', function() {
            // Get all customer fields by their name attribute and make them not required
            var customerFields = document.querySelectorAll('[name^="customer_"]');
            customerFields.forEach(function(field) {
                field.required = false;
            });
        });
        document.getElementById('register_customer_button').addEventListener('click', function() {
            // Get all customer fields by their name attribute and make them not required
            var customerFields = document.querySelectorAll('[name^="agency_"]');
            customerFields.forEach(function(field) {
                field.required = false;
            });
        });
        // Automatically hide the alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 5000);
    </script>
</body>
</html>
