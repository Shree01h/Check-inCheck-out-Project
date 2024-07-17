<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OceanOasis Hotel-Contact Us</title>
  <!-- boot strap links and css  -->
  <?php require('inc/links.php') ?>
  <link rel="stylesheet" href="css/comon.css">
  <style>
    img {
      width: 100%;
      object-fit: cover;
      object-position: center;
    }
  </style>
</head>

<body class="bg-light">
  <!-- navbar file  -->
  <?php require 'inc/header.php'; ?>

  <!-- room heading  -->
  <div class="my-4 px-4">
    <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
    <div class="h-line bg-dark"></div>
  </div>


  <div class="container">
    <div class="row">
      <!-- filter module  -->
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2">FILTERS</h4>
            <!-- button for show filters for small devices  -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- filters  -->
            <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropdown">
              <!-- availability filter  -->
              <div class="border bg-light p-2 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                <label class="form-label">Check-in</label>
                <input type="date" class="form-control shadow-none mb-3">
                <label for="form-label">Check-out</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <!-- facilities filter  -->
              <div class="border bg-light p-2 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                <div class="mb-2">
                  <input type="checkbox" id="f1" class="form-check-input   shadow-none mb-3">
                  <label class="form-check-label" for="f1">Facility one</label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" id="f1" class="form-check-input   shadow-none mb-3">
                  <label class="form-check-label" for="f1">Facility one</label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" id="f1" class="form-check-input   shadow-none mb-3">
                  <label class="form-check-label" for="f1">Facility one</label>
                </div>
              </div>
              <!-- guest filter  -->
              <h5 class="mb-3" style="font-size: 18px;">GUEST</h5>
              <div class="d-flex">
                <div class="me-2">
                  <label class="form-label">Adult</label>
                  <input type="number" class="form-control shadow-none">
                </div>
                <div>
                  <label class="form-label">Children</label>
                  <input type="number" class="form-control shadow-none">
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
      <!-- room cards -->
      <div class="col-lg-9 col-md-12 px-4">

        <div class="card mb-4 border-0 shadow">

          <div class="row g-0 p-3 align-items-center">
            <!-- room image  -->
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <!-- images of rooms  -->
              <img src="images/rooms/IMG_11892.png" class="img-fluid rounded-start">
            </div>
            <!-- name of room features,faciliteis, and guest-->
            <div class="col-md-5 px-lg-3 px-0">
              <h5 class="mb-1">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">features</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Rooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  1 BathRooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  3 sofa Rooms
                </span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Wifi
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  A/C
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Room Heater
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Television
              </div>
              <div class="guest mb-4">
                <h6 class="mb-1">Guest</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  5 Adult
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  4 Children
                </span>
              </div>
            </div>

            <div class="col-md-2 text -center">
              <h6 class="mb-4">₹200 per night</h6>

              <a href="#" class="btn btn-sm text-white custom-bg shadow-none mb-2 w-100">Book Now</a>

              <a href="#" class="btn btn-sm btn-outline-dark shadow-none w-100">More Details</a>
            </div>
          </div>

        </div>

        <div class="card mb-4 border-0 shadow">

          <div class="row g-0 p-3 align-items-center">
            <!-- room image  -->
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <!-- images of rooms  -->
              <img src="images/rooms/IMG_39782.png" class="img-fluid rounded-start" alt="...">
            </div>
            <!-- name of room features,faciliteis, and guest-->
            <div class="col-md-5 px-lg-3 px-0">
              <h5 class="mb-1">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">features</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Rooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  1 BathRooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  3 sofa Rooms
                </span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Wifi
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  A/C
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Room Heater
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Television
              </div>
              <div class="guest mb-4">
                <h6 class="mb-1">Guest</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  5 Adult
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  4 Children
                </span>
              </div>
            </div>

            <div class="col-md-2 text -center">
              <h6 class="mb-4">₹200 per night</h6>

              <a href="#" class="btn btn-sm text-white custom-bg shadow-none mb-2 w-100">Book Now</a>

              <a href="#" class="btn btn-sm btn-outline-dark shadow-none w-100">More Details</a>
            </div>
          </div>


        </div>

        <div class="card mb-4 border-0 shadow">

          <div class="row g-0 p-3 align-items-center">
            <!-- room image  -->
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <!-- images of rooms  -->
              <img src="images/rooms/IMG_42663.png" class="img-fluid rounded-start" alt="...">
            </div>
            <!-- name of room features,faciliteis, and guest-->
            <div class="col-md-5 px-lg-3 px-0">
              <h5 class="mb-1">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">features</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Rooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  1 BathRooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  3 sofa Rooms
                </span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Wifi
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  A/C
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Room Heater
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Television
              </div>
              <div class="guest mb-4">
                <h6 class="mb-1">Guest</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  5 Adult
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  4 Children
                </span>
              </div>
            </div>

            <div class="col-md-2 text -center">
              <h6 class="mb-4">₹200 per night</h6>

              <a href="#" class="btn btn-sm text-white custom-bg shadow-none mb-2 w-100">Book Now</a>

              <a href="#" class="btn btn-sm btn-outline-dark shadow-none w-100">More Details</a>
            </div>
          </div>


        </div>
        
        <div class="card mb-4 border-0 shadow">

          <div class="row g-0 p-3 align-items-center">
            <!-- room image  -->
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <!-- images of rooms  -->
              <img src="images/rooms/IMG_65019.png" class="img-fluid rounded-start" alt="...">
            </div>
            <!-- name of room features,faciliteis, and guest-->
            <div class="col-md-5 px-lg-3 px-0">
              <h5 class="mb-1">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">features</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Rooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  2 Balcony
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  1 BathRooms
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  3 sofa Rooms
                </span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Wifi
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  A/C
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Room Heater
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  Television
              </div>
              <div class="guest mb-4">
                <h6 class="mb-1">Guest</h6>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  5 Adult
                </span>
                <span class="badge rounded-pill bg-light text-dark  lh-base text-wrap">
                  4 Children
                </span>
              </div>
            </div>

            <div class="col-md-2 text -center">
              <h6 class="mb-4">₹200 per night</h6>

              <a href="#" class="btn btn-sm text-white custom-bg shadow-none mb-2 w-100">Book Now</a>

              <a href="#" class="btn btn-sm btn-outline-dark shadow-none w-100">More Details</a>
            </div>
          </div>


        </div>
      </div>

    </div>

  </div>
  </div>

  <!-- footer file -->
  <?php require('inc/footer.php'); ?>
</body>

</html>