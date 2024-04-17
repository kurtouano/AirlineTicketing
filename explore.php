<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    
    <style>

        .singapore-img {
            background-image: url(assets/singaporee-img.jpg);
            background-size: cover;
            background-position: 0 20%;
            width: 100%;
            height: 520px;
        }

        .singapore-img2 {
            background-image: url(assets/singapore2.jpg);
            background-size: cover;
            width: 100%;
            height: 500px;
        }

        .japan-img {
            background-image: url(assets/japan-img.jpg);
            background-size: cover;
            background-position: 0 10%;
            width: 100%;
            height: 520px;
        }

        .japan-img2 {
            background-image: url(assets/japan2.jpeg);
            background-size: cover;
            background-position: 48% 50%;
            width: 100%;
            height: 500px;
            
        }

        .canada-img {
            background-image: url(assets/canadaa-img.jpg);
            background-size: cover;
            background-position: 0 29%;
            width: 100%;
            height: 520px;
        }

        .canada-img2 {
            background-image: url(assets/canada2.jpg);
            background-size: cover;
            width: 100%;
            height: 500px;
        }

        .featurette-heading {
            font-family: 'Mulish';
        }

        .lead {
            font-family: 'system-ui';
        }

        .carousel-caption {
            font-family: 'Playfair Display';
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



    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="singapore-img"></div>
                <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Marina Bay Sands</h1>
                    <p class="opacity-75">Singapore</p>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="japan-img"></div>
                <div class="container">
                <div class="carousel-caption">
                    <h1>Mount Fuji</h1>
                    <p>Japan</p>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="canada-img"></div>
                <div class="container">
                <div class="carousel-caption text-end">
                    <h1>Moraine Lake</h1>
                    <p>Canada</p>
                </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
  </div>
    
  <div class="container marketing">
    <br><br><br><br><br>

    <div class="row featurette">
      <div id="singapore" class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1 mb-4">Marina Bay Sands, Singapore</h2>
        <p class="lead">Aside from their luxury hotel and iconic infinity pool, Marina Bay Sands is also known for their high end shopping center filled with all the top brands and their observation deck where you can get a glimpse of the Singapore skyline.

            Marina Bay Sands also hosts the famous Art Science Museum.

            Location: 10 Bayfront Avenue, Singapore
            Best for: Shopping aficionados, Museum lovers
            Highlight(s): The main attraction at Marina Bay Sands is their infinity pool, which is the largest in the world.
</p>
      </div>
      <div class="col-md-5">
        <div class="singapore-img2"></div>
      </div>
    </div>

    <hr class="featurette-divider mb-5 mt-5">

    <div class="row featurette">
      <div id="japan" class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1 mb-4">Mount Fuji, Japan</h2>
        <p class="lead">Without a doubt Japan's most recognizable landmark, majestic Mount Fuji (Fuji-san) is also the country's highest mountain peak. Towering 3,776 meters over an otherwise largely flat landscape to the south and east, this majestic and fabled mountain is tall enough to be seen from Tokyo, more than 100 kilometers away.

            Mount Fuji has for centuries been celebrated in art and literature and is now considered so important an icon that UNESCO recognized its world cultural significance in 2013. Part of the Fuji-Hakone-Izu National Park, Mount Fuji is climbed by more than a million people each summer as an act of pilgrimage, which culminates in watching the sunrise from its summit.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <div class="japan-img2"></div>
      </div>
    </div>

    <hr class="featurette-divider mb-5 mt-5">

    <div class="row featurette">
      <div id="canada" class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1 mb-4">Moraine Lake, Canada</h2>
        <p class="lead">In Banff National Park, the water is a sparkling gemstone surrounded by glacial peaks. Moraine Lake`s intense blue colors cast a spell on those that visit, while creating a dream destination for photographers.
                With the famed Ten Peaks forming vast triangles around the lake, you`ll immediately want to explore. Trails can take you around the water`s edge to splendid viewpoints. But for the best experience, one must jump in a kayak and see the turquoise spread around you as you feel infinitely small among the jagged summits.</p>
      </div>
      <div class="col-md-5">
        <div class="canada-img2"></div>
      </div>
    </div>

    <hr class="featurette-divider">
  </div>

    <script src="search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>