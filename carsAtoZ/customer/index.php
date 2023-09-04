<?php include('../config.php');

$id=$_GET['id'];?>

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
<?php include('navbar_c.php');?>
 



  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home">
        <div class="container">

          <div class="hero-content">
            <h2 class="h1 hero-title">The easy way to takeover a lease</h2>

            <p class="hero-text">
              Live Young, Live Free!
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
              <label for="input-2" class="input-label">Max. monthly payment</label>

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
            <h2 class="h2 section-title">Featured cars</h2>

            <a href="c_allcars.php?id=<?php echo $id;?>" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
          </div>

          <ul class="featured-car-list">

          <?php
          $sql="SELECT *FROM vehicle WHERE status='rent'";
          $res=mysqli_query($conn,$sql);
          if($res==TRUE)
           {
            $count= mysqli_num_rows($res);
            $sn=1;
            if($count>0)
             {
             
               while($rows=mysqli_fetch_assoc($res))
                { if($sn==7)
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
                    <a href="book.php?VehicleID=<?php echo $rows['VehicleID'];?>&id=<?php echo $id;?>"><button class="btn">Rent now</button></a>
                    

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





      <!-- 
        - #GET START
      -->

      <section class="section get-start">
        <div class="container">

          <h2 class="h2 section-title">Get started with 4 simple steps</h2>

          <ul class="get-start-list">

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-1">
                  <ion-icon name="person-add-outline"></ion-icon>
                </div>

                <h3 class="card-title">Create a profile</h3>

                <p class="card-text">
                  Register with us to rent a car and live free!!.Enjoy the daily discounts on car rents
                </p>

               

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-2">
                  <ion-icon name="car-outline"></ion-icon>
                </div>

                <h3 class="card-title">Tell us what car you want</h3>

                <p class="card-text">
                 Tell us what car you want and we wil get it for you.The best cars at best prices!!
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-3">
                  <ion-icon name="person-outline"></ion-icon>
                </div>

                <h3 class="card-title">Talk with Agency</h3>

                <p class="card-text">
                  We verify the car agencies so that you live and enjoy our cars and journey hassle free!
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-4">
                  <ion-icon name="card-outline"></ion-icon>
                </div>

                <h3 class="card-title">Make a deal</h3>

                <p class="card-text">
                  We offer you the best prices in the market.. So why wait Book a car now!
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #BLOG
      -->

      <section class="section blog" id="blog">
        <div class="container">

          <h2 class="h2 section-title">Car Blogs</h2>

          <ul class="blog-list has-scrollbar">

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="https://www.forbes.com/sites/forbestechcouncil/2022/03/28/how-innovation-can-determine-the-winners-as-rental-car-competition-increases/?sh=5fc55700332e">
                    <img src="../assets/images/blog-1.jpg" alt="Changing the world" loading="lazy"
                      class="w-100">
                  </a>

                  <a href="https://www.forbes.com/sites/forbestechcouncil/2022/03/28/how-innovation-can-determine-the-winners-as-rental-car-competition-increases/?sh=5fc55700332e" class="btn card-badge">Company</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="https://www.forbes.com/sites/forbestechcouncil/2022/03/28/how-innovation-can-determine-the-winners-as-rental-car-competition-increases/?sh=5fc55700332e">Changing the world with renting cars</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">August 14, 2023</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="https://www.cars.com/articles/these-vehicles-are-most-vulnerable-to-theft-says-iihs-457296/">
                    <img src="../assets/images/blog-2.jpg" alt="What cars are most vulnerable" loading="lazy"
                      class="w-100">
                  </a>

                  <a href="https://www.cars.com/articles/these-vehicles-are-most-vulnerable-to-theft-says-iihs-457296/" class="btn card-badge">Repair</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="https://www.cars.com/articles/these-vehicles-are-most-vulnerable-to-theft-says-iihs-457296/">What cars are most vulnerable</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="https://hedgescompany.com/blog/2022/02/how-old-are-cars/#:~:text=The%20average%20age%20of%20a%20car%20compared%20to%20the%20average,be%20an%20all%2Dtime%20high.">
                    <img src="../assets/images/blog-3.jpg" alt="Statistics showed which average age" loading="lazy"
                      class="w-100">
                  </a>

                  <a href="https://hedgescompany.com/blog/2022/02/how-old-are-cars/#:~:text=The%20average%20age%20of%20a%20car%20compared%20to%20the%20average,be%20an%20all%2Dtime%20high." class="btn card-badge">Cars</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="https://hedgescompany.com/blog/2022/02/how-old-are-cars/#:~:text=The%20average%20age%20of%20a%20car%20compared%20to%20the%20average,be%20an%20all%2Dtime%20high.">Statistics showed which average age of cars</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="https://www.innovahire.in/what-to-check-when-renting-a-car/">
                    <img src="../assets/images/blog-4.jpg" alt="What´s required when renting a car?" loading="lazy"
                      class="w-100">
                  </a>

                  <a href="https://www.innovahire.in/what-to-check-when-renting-a-car/" class="btn card-badge">Cars</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="https://www.innovahire.in/what-to-check-when-renting-a-car/">What´s required when renting a car?</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner">

                  <a href="#">
                    <img src="../assets/images/blog-5.jpg" alt="New rules for handling our cars" loading="lazy"
                      class="w-100">
                  </a>

                  <a href="#" class="btn card-badge">Company</a>

                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">New rules for handling our cars</a>
                  </h3>

                  <div class="card-meta">

                    <div class="publish-date">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="2022-01-14">January 14, 2022</time>
                    </div>

                    <div class="comments">
                      <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                      <data value="114">114</data>
                    </div>

                  </div>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <?php include('footer_c.php')?>


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