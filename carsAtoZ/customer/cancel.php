<?php include('../config.php'); 
$cid=$_GET['id'];?>



<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CarsAtoZ - Rent your favorite car!</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">
  
  <style>
    body {
      text-align: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .hero-title {
      font-size: 24px;
    }

    .hero-text {
      margin-top: 20px;
    }

    .btn {
      margin: 10px;
    }
  </style>
</head>
<body class="section hero">
  <div class="container">
    <h2 class="h1 hero-title">Do You Want To Book a Car?</h2>
    <form action="" method="POST">
      <a href="index.php?id=<?php echo $cid;?>" class="hero-text">
        <button type="button" class="btn btn-outline-danger" name="n">Cancel</button>
      </a>
      <button type="submit" class="btn btn-outline-warning" name="y">Yes! Do it</button>
    </form>
  </div>
</body>
</html>


<?php 


 $vid= $_GET['VehicleID'];   
if(isset($_POST['y']))
       {
       
          $sql= "UPDATE vehicle SET status='rent',customer_id='' WHERE VehicleID=$vid";
          $res= mysqli_query($conn,$sql);
        
         if($res==true)
         {
          $_SESSION['add'] ="<div class='alert alert-danger'>SUCCESSFULLY Cancelled booked CAR!!</div>";

          header("Location:index.php?id=$cid");
         }
         else{
              echo "unSuccessful";
              header("Location:index.php?id=$cid");
            }
        }
        
  
?>

