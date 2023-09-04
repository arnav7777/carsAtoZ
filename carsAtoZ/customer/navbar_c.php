<header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="#" class="logo">
        <h1><b>carsAtoZ</b></h1>
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="index.php?id=<?php echo $id;?>" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="customer_cars.php?id=<?php echo $id;?>" class="navbar-link" data-nav-link>Your Booked cars</a>
          </li>
          <li>
            <a href="logout.php" class="navbar-link" data-nav-link>Logout</a>
          </li>

          

        </ul>
      </nav>

      <div class="header-actions">

        <div class="header-contact">
          <a href="tel:phone" class="contact-link">+91 XXXXXXXXXX</a>

          <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
        </div>

        <a href="customer_cars.php" class="btn" aria-labelledby="aria-label-txt">
          <ion-icon name="car-outline"></ion-icon>

          <span id="aria-label-txt">add a car!</span>
        </a>

      

        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>

      </div>

    </div>
  </header><br><br>