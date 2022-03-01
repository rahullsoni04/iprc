<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
    integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/eventdetail.css">
  <title>Event Detail</title>
</head>

<body>
  <!-- Navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <div class="logo">
        <img src="/images/IPR logo.png">
      </div>&nbsp; &nbsp;
      <a class="navbar-brand" href="#">SAKEC IPR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="#">
              Events
            </a>

          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#">
              Our Team
            </a>

          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#">
              Contact Us
            </a>

          </li>

        </ul>
        <div class="d-flex justify-content-center">
          <a class="button" style=" padding: 5px 15px; color: white;">Back</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- navbar ends -->

  <!-- banner -->
  <div id="detail">
    <div class="content">
      <div class="main-text">
        <h1>Patent Drawing</h1>
        <p>Event 2021-2022</p>

      </div>
    </div>
  </div>
  <!-- banner ends -->

  <!-- Event Details section -->
  <div class="spacer" style="height: 15px;"></div>
  <section>
    <div class="about-content text-left">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-4 col-md-6">
            <br>
            <p><i class="fas fa-calendar-alt"></i><span class="event_date">&nbsp; 24th </span>
              <span class="event_date">January 2022 <br><br>
                <i class="fas fa-clock"></i>&nbsp; 3:00pm - 5:00pm
              </span></p>
              <div class="spacer" style="height: 20px;"></div>
              <h4 class="mt-6">For any Queries :</h4>
              <p class="my-4">Pallavi Pandey - <i class="fas fa-phone"></i>&nbsp; +91-958-958-958 </p>
              <p> Pallavi Pandey -  <i class="fas fa-phone"></i>&nbsp; +91-958-958-958</p>
          </div>
          <div class="col-sm-12 col-lg-4 col-md-6"><br>

          </div>
          <div class="col-sm-12 col-lg-4 col-md-6">
            <br><br>
           
            <img src="/images/Banner.png" alt="banner" class="banner" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><br>
            <div class="spacer" style="height: 20px;"></div>
            <a class="register" type="submit">Register</a>
          </div>
        </div>
        <br>
        <hr class="new-row">
      </div>
    
     
      <div class="spacer" style="height: 40px;"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">

            <h4>Event Overview</h4>

            <p class="my-4">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              when an unknown printer took a galley of type and scrambled it to make a type specimen book.
              It has survived not only five centuries, but also the leap into electronic typesetting,
              remaining essentially unchanged.
              It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
              and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <hr>
            <p><strong>Venue : </strong> Microsoft Teams</p>
            <strong>Follow Us : </strong> &nbsp;
            <i class="fab fa-facebook-square"></i>&nbsp; &nbsp;
            <i class="fab fa-instagram"></i>&nbsp; &nbsp;
            <i class="fab fa-linkedin"></i>&nbsp; &nbsp;
            <i class="fab fa-youtube"></i>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-4">
            
<!-- popup image -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Event Banner
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="/images/Banner.png" alt="banner" class="banner-popup"><br>
      </div>
     
    </div>
  </div>
</div>
<!-- Modal ends -->
<div class="speaker-info text-center">
<h4>Speaker For the Event</h4>
<img src="/images/team13.jpg.webp" alt="banner" class="speaker-img"><br>
            <p class="mt-4 speaker-name">Israil Alam</p>
            <p class="speaker-designation">CEO - Tesla</p>
            <p class="speaker-description">Very very kind and motivated person</p>          
            <i class="fab fa-facebook-square"></i>&nbsp; &nbsp;
            <i class="fab fa-instagram"></i>&nbsp; &nbsp;
            <i class="fab fa-linkedin"></i>&nbsp; &nbsp;
            <div class="spacer" style="height: 20px;"></div>
          
          </div>
          </div>
        </div>
      </div>


  </section>
  <hr>
  <!-- Event Details ends -->



  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="plugins/slick-master/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
    integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $(function () {
      $(document).scroll(function () {
        var $nav = $(".bg-dark");
        var $navbtn = $(".btn-outline-info");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        $navbtn.toggleClass('scrolled', $(this).scrollTop() > $navbtn.height());
      });
    });
  </script>
</body>

</html>