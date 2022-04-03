<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="plugins/slick-master/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="plugins/slick-master/slick/slick-theme.css" />
  <link rel="stylesheet" href="../css/eventdetail.css?v=<?php echo time(); ?>">
  <title>Event Detail</title>
</head>
<?php
  require_once '../requirements.php';
  ?>
<body>

  <?php
  if(!isset($_GET['id'])) {
    header("Location: events.php");
  }
  $id = $_GET['id'];
  // fetching from event table
  $sql = 'SELECT * FROM `ipr_events` WHERE `id`= 2';
  $query = mysqli_query($conn, $sql);
  if (!mysqli_num_rows($query)) {
    echo '<h3>No Records Found</h3>';
  } else {
    $event_row = mysqli_fetch_assoc($query);
  }

  ?>


  <!-- banner -->
  <div id="detail">
    <div class="content">
      <div class="main-text">
        <h1><?php echo $event_row['title']; ?></h1>
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
            <p><i class="fas fa-calendar-alt"></i><span class="event_date">&nbsp;
                <?php
                echo date('j F Y', strtotime($event_row['from_date']));
                ?> to
                <?php
                echo date('j F Y', strtotime($event_row['to_date']));
                ?> </span>
              <br><br>
              <i class="fas fa-clock"></i>&nbsp;
              <?php
              echo date('h:i', strtotime($event_row['from_time']));
              ?> -

              <?php
              echo date('h:i', strtotime($event_row['to_time']));
              ?>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <h4 class="mt-6">For any Queries :</h4>
            <?php
            // fetching from coordinator table
            $sql = 'SELECT * FROM `ipr_event_coordinator` WHERE `event_id`= 1';
            $query = mysqli_query($conn, $sql);
            if (!mysqli_num_rows($query)) {
              echo '<h3>No Records Found</h3>';
            } else {
              while ($event_coordinator_row = mysqli_fetch_assoc($query)) {

            ?>
                <p class="my-4"><?php echo $event_coordinator_row['name']; ?> - <i class="fas fa-phone"></i>&nbsp;<?php echo $event_coordinator_row['contact']; ?> </p>

            <?php

              }
            }

            ?>

          </div>
          <div class="col-sm-12 col-lg-4 col-md-6"><br>

          </div>
          <div class="col-sm-12 col-lg-4 col-md-6">
            <br><br>
            <?php
            echo '<img  src="data:image/jpeg;base64,' . base64_encode($event_row['banner']) . '" alt="banner" class="banner" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >';

            ?> <br>

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
              <?php echo $event_row['description']; ?>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <hr>
            <p><strong>Venue : </strong> <?php echo $event_row['venue']; ?></p>
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
                    <?php
                    echo '<img  src="data:image/jpeg;base64,' . base64_encode($event_row['banner']) . '"  alt="banner" class="banner-popup" >';

                    ?>


                  </div>

                </div>
              </div>
            </div>
            <!-- Modal ends -->





            <div class="speaker-info text-center">
              <h4 class="mt-4">Speaker For the Event</h4>

              <div class="responsive-slides">


                <?php
                // fetching from event table
                $sql = 'SELECT * FROM `ipr_speakers` WHERE `event_id`= 1';
                $query = mysqli_query($conn, $sql);
                if (!mysqli_num_rows($query)) {
                  echo '<h3>No Records Found</h3>';
                } else {
                  while ($event_speaker_row = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="speakers">

                      <?php
                      echo '<img  src="data:image/jpeg;base64,' . base64_encode($event_speaker_row['img']) . '"  alt="banner" class="speaker-img" >';

                      ?>



                      <p class="mt-4 speaker-name"><?php echo $event_speaker_row['name']; ?></p>
                      <p class="speaker-designation"><?php echo $event_speaker_row['designation']; ?></p>
                      <p class="speaker-description"><?php echo $event_speaker_row['description']; ?></p>
                      <i class="fab fa-facebook-square"> <a href=<?php echo $event_speaker_row['facebook']; ?>></i></a> &nbsp; &nbsp;
                      <i class="fab fa-instagram"> <a href=<?php echo $event_speaker_row['instagram']; ?>> </i></a> &nbsp; &nbsp;
                      <i class="fab fa-linkedin"><a href=<?php echo $event_speaker_row['linkedin']; ?>></i></a> &nbsp; &nbsp;
                    </div>

                <?php
                  }
                }
                ?>




              </div>


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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript">
    $('.responsive-slides').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 900,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  </script>

  <script>
    $(function() {
      $(document).scroll(function() {
        var $nav = $(".bg-dark");
        var $navbtn = $(".btn-outline-info");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        $navbtn.toggleClass('scrolled', $(this).scrollTop() > $navbtn.height());
      });
    });
  </script>
</body>

</html>