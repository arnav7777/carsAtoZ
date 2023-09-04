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

  <!-- 
    - #HEADER
  -->

  <?php include('navbar.php');?>
  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home">
        <div class="container">

          <div class="hero-content">
            <h2 class="h1 hero-title">Welcome Admin</h2>

            <p class="hero-text">
              Search for your cars :
            </p>
          </div>

          <div class="hero-banner"></div>

          <form action="" class="hero-form">

            <div class="input-wrapper">
              <label for="input-1" class="input-label">Car, model, or brand</label>

              <input type="text" name="car-model" id="input-1" class="input-field"
                placeholder="What car are you looking?">
            </div>

            <div class="input-wrapper">
              <label for="input-2" class="input-label">Rent fee</label>

              <input type="text" name="monthly-pay" id="input-2" class="input-field" placeholder="Add an amount in $">
            </div>

            <div class="input-wrapper">
              <label for="input-3" class="input-label">Make Year</label>

              <input type="text" name="year" id="input-3" class="input-field" placeholder="Add a minimal make year">
            </div>

            <button type="submit" class="btn">Search</button>

          </form>

        </div>
      </section>





      <!-- 
        - #FEATURED CAR
      -->

      <section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Your cars</h2>

            <a href="carpanel.php?id=<?php echo $id;?>" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
          </div>

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
                {if($sn==7)
                  {
                    exit();
                  }?>
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
                    <a href="editcar.php?id=<?php echo $rows['VehicleID'];?>&aid=<?php echo $id;?>"><button class="btn">Edit</button></a>
                    

                  </div>

                </div>

              </div>
            </li>
            <?php
                $sn++;}
            }
        }
        ?>
          </ul>

        </div>
      </section>





      
     
      <section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Booked cars</h2>

            <a href="carpanel.php?id=<?php echo $id?>" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
          </div>

          <ul class="featured-car-list">

          <?php
          $sql="SELECT *FROM vehicle where agency_id=$id and status='booked'";
          $res=mysqli_query($conn,$sql);
          if($res==TRUE)
           {
            $count= mysqli_num_rows($res);
            $sn=1;
            if($count>0)
             {
               while($rows=mysqli_fetch_assoc($res))
                {
                  if($sn==7)
                  {
                    exit();
                  }?>
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
                    <a href="editcar.php?id=<?php echo $rows['VehicleID'];?>&aid=<?php echo $id;?>"><button class="btn">Edit</button></a>
                    

                  </div>

                </div>

              </div>
            </li>
            <?php
                $sn++;}
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
  <script src="../assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>