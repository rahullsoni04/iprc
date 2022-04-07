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
    <!-- Navbar -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="logo">
                <a href="../index.php">
                    <img src="../images/IPR logo.png">
                </a>
            </div>&nbsp; &nbsp;
            <a class="navbar-brand" href="../index.php">SAKEC IPR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#about">About</a>
                    </li>
                    <li class="nav-item ">
                        <?php 
                            if ((isset($_SESSION['email'])&& ($_SESSION['email']==="a@sakec.ac.in"))){
                                echo '<a class="nav-link " href="event_management.php">Events Management</a>';
                            } 
                        ?>
                    </li>
                    <li class="nav-item ">
                    <?php 
                            if ((isset($_SESSION['email'])&& ($_SESSION['email']==="a@sakec.ac.in"))){
                                echo '<a class="nav-link " href="../admin/landing.php">Edit Landing</a>';
                            } else {
                                echo '<a class="nav-link " href="../index.php#roles">Our Team</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item ">
                    <?php 
                            if ((isset($_SESSION['email'])&& ($_SESSION['email']==="a@sakec.ac.in"))){
                                echo '<a class="nav-link " href="../query.php">Query</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item ">
                    <?php 
                            if ((isset($_SESSION['email'])&& ($_SESSION['email']==="a@sakec.ac.in"))){
                                echo '<a class="nav-link " href="../roles.php">Edit Roles</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#footer">
                            Contact Us
                        </a>
                    </li>

                </ul>
                <div class="d-flex justify-content-center">
                    <?php
                    if (!isset($_SESSION['email'])) {
                    ?>
                        <a href="../sign-up.php" class="button" style=" padding: 5px 15px; color: white;">Login</a>
                    <?php
                    } else {
                    ?>
                        <a href="../logout.php" class="button" style=" padding: 5px 15px; color: white;">Logout</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div style="height: 60px;"></div>

    <!-- navbar ends -->
  <?php
  if (!isset($_GET['id'])) {
    header("Location: events.php");
  }
  $id = $_GET['id'];
  // fetching from event table
  $sql = 'SELECT * FROM `ipr_events` WHERE `id`= ' . $id;
  $query = mysqli_query($conn, $sql);
  if (!mysqli_num_rows($query)) {
    echo '<h3>No Records Found</h3>';
  } else {
    $event_row = mysqli_fetch_assoc($query);
  }
  ?>
  <div id="detail">
    <div class="content">
      <div class="main-text mt-4">
        <h1><?php echo $event_row['title']; ?></h1>
      </div>
    </div>
  </div>
  <!-- banner -->
  <div class="container text-center">
    <div class="row">

  
<div class="col-sm-7">

<?php echo '<img src="data:image/jpeg;base64,' . base64_encode($event_row['banner']) . '"  data-toggle="modal" data-target="#staticBackdrop" alt="" class="img-fluid image-banner" > '; ?>


</div>
<div class="col-sm-5">

<?php
            // fetching from event table
            $sql = 'SELECT * FROM `ipr_speakers` WHERE `event_id`=' . $id;
            $query = mysqli_query($conn, $sql);
            if ($query) {
              if (mysqli_num_rows($query)) {
            ?>

              <!-- Modal ends -->
              <div class="row text-center speaker-info ">
                <h4 class="mt-4">Speaker For the Event</h4>
                <div class="responsive-slides">
                  <?php
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
                }
                ?>
                </div>
                <div class="spacer" style="height: 20px;"></div>
              </div>
</div>


  </div>
  
  </div>


  <!-- Event Details section -->
  <div class="spacer" style="height: 15px;"></div>
  <section>
    <div class="about-content text-left">
      <div class="container top-event">
        <div class="row">
          <div class="col-sm-12 col-lg-4 col-md-5">
            <br>
            <p>
              <i class="fas fa-calendar-alt"></i>
              <span class="event_date">&nbsp; <?php echo date('j F Y', strtotime($event_row['from_date'])) . " to " . date('j F Y', strtotime($event_row['to_date'])); ?> </span>
              <br><br>
              <i class="fas fa-clock"></i>&nbsp;
              <?php echo date('h:i', strtotime($event_row['from_time'])) . " - " . date('h:i', strtotime($event_row['to_time'])); ?>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <h4 class="mt-6">For any Queries :</h4>
            <?php
            // fetching from coordinator table
            $sql = 'SELECT * FROM `ipr_event_coordinator` WHERE `event_id`= ' . $id;
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
          
         
       
          <div class="col-sm-12 col-lg-8 col-md-7">
          <h4>Event Overview</h4>
            <p class="my-4">
              <?php echo $event_row['description']; ?>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <a class="button event-datail" type="submit">Register</a>
            <hr>
            <p><strong>Venue : </strong> <?php echo $event_row['venue']; ?></p>
            <strong>Follow Us : </strong> &nbsp;
            <i class="fab fa-facebook-square"></i>&nbsp; &nbsp;
            <i class="fab fa-instagram"></i>&nbsp; &nbsp;
            <i class="fab fa-linkedin"></i>&nbsp; &nbsp;
            <i class="fab fa-youtube"></i>
          </div>
        </div>
        <br>
        <hr class="new-row">
      </div>
      <div class="spacer" style="height: 25px;"></div>
  <!-- Event Details ends -->
<!-- Footer -->
<footer class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 ">
                    <h2>Our College</h2>
                    <hr>
                    <p><i class="fas fa-map-marker-alt"></i> Mahavir Education Trust Chowk, W.T Patil Marg, D P Rd, next to Duke's Company, Chembur, Mumbai, Maharashtra 400088</p>
                    <p><i class="fas fa-phone"></i> 022-25580854, 022-67978100</p>
                    <p><i class="fas fa-envelope"></i> ipr@sakec.ac.in</p>
                </div>
                <div class="col-sm-3">
                    <h2>Quick Links</h2>
                    <hr>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                </div>
                <div class="col-sm-3">
                    <h2>Recent News and Courses</h2>
                    <hr>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                    <p>ipr@sakec.ac.in</p>
                </div>
                <div class="col-sm-3">
                    <h2>Get In Touch For Any Query</h2>
                    <hr>

                    <form>
                        <div class="mb-3 form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                        </div>
                        <div class="mb-3 form-group">
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                        </div>
                        <div class="mb-3 form-group">
                            <!-- <textarea name="message" id="" placeholder="Your query"></textarea> -->
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Query"></textarea>
                        </div>
                        <button type="submit" class="mb-2 btnp">Send Message</button>
                    </form>
                </div>
            </div>

            <hr>
            <div class="copyright">
                <div class="row justify-content-between">
                    <div class="col-4">
                        © IPR SAKEC, All Right Reserved.
                    </div>
                    <div class="col-4 text-center">
                        Follow Us : &nbsp
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>


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