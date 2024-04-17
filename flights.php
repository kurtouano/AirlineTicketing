<?php
session_start();
  if(isset($_SESSION['to'])) {
      
      $to = $_SESSION['to'];

      $country;

      if ($to == 'Japan') {
          $country = 'Japan';
      } else if ($to == 'Canada') {
          $country = 'Canada';
      } else if ($to == 'Singapore') {
          $country = 'Singapore';
      }

  } else {
      echo "Session variables not set.";
      exit();
  }

?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

    <style>
        body {
          background-image: url('assets/book-2.png');
          background-size: cover;
        }
      
        .flights button{
            font-size: 14px;
            padding: 0 5px;
            border-radius: 5px;
            font-family: "Mulish";
            background-color: transparent;
            color: rgb(255, 193, 7);
            border: 1px solid rgb(255, 193, 7);

            transition: all 0.4s;
        }

        .flights button:hover {
            color: black;
            background-color: rgb(255, 193, 7);
            transform: scale(1.15);
        }

        .flights button a {
            text-decoration: none;
        }

    </style>
</head>
<body>

        <header class="p-3 text-bg-dark" style="z-index: 2;">
            <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center logo mb-2 mb-lg-0 text-white text-decoration-none">
                </a>
        
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="index.php" class="nav-link px-2 text-white">About</a></li>
                    <li><a href="explore.php" class="nav-link px-2 text-white">Explore</a></li>
                    <li><a href="myticket.php" class="nav-link px-2 text-white">My Ticket</a></li>
                </ul>
        
                <form class="search-bar-div col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="search search-input form-control form-control-dark text-bg-dark" id="searchInput"placeholder= 'Search a Country' autocomplete="off" oninput="showSuggestions()";>
                    <div class="suggestions"></div>
                </form>
                
                <a href="index.php"><button type="button" class="btn btn-warning"><img style="margin-right: 10px;" width="20" height="20" src="https://img.icons8.com/ios-filled/50/airplane-take-off.png" alt="airplane-take-off"/>Book Now</button></a>
        </header>


        <div class="flights container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Available Flights to <?php echo $country?></h2>
        
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
              <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('assets/plane-logo1.png'); background-size: contain; background-repeat: no-repeat; background-position: 0 0; ">
                  <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Cebu Pacific <br> 13:45 MNL </h3>
                    <ul class="d-flex list-unstyled mt-auto">
                      <li class="me-auto">
                        <a href="payment.php"><button> SELECT</button></a>
                      </li>
                      <li class="d-flex align-items-center me-3">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                        <small>PHP 14,000/Pax</small>
                      </li>
                      <li class="d-flex align-items-center">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                        <small>5h 10m</small>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
        
              <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('assets/plane-logo2.png'); background-size: contain; background-repeat: no-repeat; background-position: 0 40%;">
                  <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Philippines AirAsia <br> 9:45 MNL</h3>
                    <ul class="d-flex list-unstyled mt-auto">
                      <li class="me-auto">
                        <a href="payment.php"><button>SELECT</button></a>
                      </li>
                      <li class="d-flex align-items-center me-3">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                        <small>PHP 14,000/Pax</small>
                      </li>
                      <li class="d-flex align-items-center">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                        <small>4h 30m</small>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
        
              <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('assets/plane-logo3.png'); background-size: contain; background-repeat: no-repeat; background-position: 0 30%;">
                  <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Philippine Airlines <br> 23:30 MNL</h3>
                    <ul class="d-flex list-unstyled mt-auto">
                      <li class="me-auto">
                        <a href="payment.php"><button>SELECT</button></a>
                      </li>
                      <li class="d-flex align-items-center me-3">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                        <small>PHP 14,000/Pax</small>
                      </li>
                      <li class="d-flex align-items-center">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                        <small>4h 45m</small>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


  </body>
</html>