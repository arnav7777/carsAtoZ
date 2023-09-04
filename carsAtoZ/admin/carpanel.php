<?php 
include('../config.php');
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CarsAtoZ - Rent your favourite car!</title>

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
</head>

<body>

 <?php include('navbar.php');?>

  <main>
    <article>
     
      <section class="section featured-car" id="featured-car">
        <div class="container">

          <ul class="featured-car-list">

          <?php
          $sql="SELECT *FROM vehicle where agency_id=$id";
          $res=mysqli_query($conn,$sql);
          if($res==TRUE)
           {
            $count= mysqli_num_rows($res);
            $sn=1;
            if($count>0)
             {
               while($rows=mysqli_fetch_assoc($res))
                {?>
            <li>
              <div class="featured-car-card">

                <figure class="card-banner">
                  <img src="http://localhost/carsAtoZ/assets/images/cars/<?php echo $rows['PhotoURL'];?>" alt="car_pic" loading="lazy" width="440" height="300"
                    class="w-100">
                </figure>

                <div class="card-content">

                  <div class="card-title-wrapper">
                    <h3 class="h3 card-title">
                      <a href="#"><?php echo $rows['VehicleModel'];?></a>
                    </h3>

                    <data class="year" value="vehicleNumber"><?php echo $rows['VehicleNumber'];?></data>
                  </div>

                  <ul class="card-list">

                    <li class="card-list-item">
                      <ion-icon name="people-outline"></ion-icon>

                      <span class="card-item-text"><?php echo $rows['SeatingCapacity'];?></span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="flash-outline"></ion-icon>

                      <span class="card-item-text"><?php echo $rows['engine'];?></span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="speedometer-outline"></ion-icon>

                      <span class="card-item-text"><?php echo $rows['e_spec'];?></span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>

                      <span class="card-item-text"><?php echo $rows['gear'];?></</span>
                    </li>
                    

                  </ul>

                  <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong><?php echo $rows['RentPerDay'];?></strong> / day
                    </p>

                    <button class="btn fav-btn" aria-label="Add to favourite list">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>

                    <button class="btn">Edit</button>

                  </div>

                </div>

              </div>
            </li>
            <?php
                }
            }
        }
        ?>
          </ul>

        </div>
      </section>

    </article>
  </main>

  <!-- 
    - #FOOTER
  -->

  <?php include('footer.php');?>
  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>