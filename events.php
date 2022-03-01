<?php
require_once 'requirements.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/events.css">
    <title>Events</title>
</head>

<body>
    <!-- Navbar -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="logo">
                <img src="/images/IPR logo.png">
            </div>&nbsp; &nbsp;
            <a class="navbar-brand" href="#">SAKEC IPR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#">
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
                    <a class="button" style=" padding: 5px 15px; color: white;">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- navbar ends -->
    <!-- events -->
    <?php
    $getYearquery = "SELECT DISTINCT YEAR(`to_date`) AS year FROM ipr_events  order by to_date  DESC";
    $getYear = mysqli_query($conn, $getYearquery);

    $getTopYearquery = "SELECT DISTINCT YEAR(`to_date`) AS year FROM ipr_events  order by to_date  DESC limit 1";
    $getTopYear = mysqli_query($conn, $getTopYearquery);
    while ($top = mysqli_fetch_assoc($getTopYear)) {
        $topYear = $top['year'];
        $getbeyondTop = "SELECT MONTH(`to_date`) FROM ipr_events WHERE MONTH(`to_date`)>6 and YEAR(`to_date`)=$topYear";
        $beyondTop = mysqli_query($conn, $getbeyondTop);
        $count = mysqli_num_rows($beyondTop);
        if ($count > 0) {
            $endYear = $topYear + 1;
            $previousYear = $endYear - 1;
            $eventsQuery = "SELECT *,YEAR(to_date) as year,MONTH(to_date) as month,DAY(to_date) as day FROM ipr_events where (YEAR(to_date) = $endYear and MONTH(to_date) <= 6) or (YEAR(to_date) = $previousYear and MONTH(to_date) > 6)  order by to_date  DESC";
            $eventResult = mysqli_query($conn, $eventsQuery);
            $currentDate = date('Y-m-d');
    ?>

            <section id="events" class="new-section">

                <div class="container">
                    <div class="col-sm-12  heading-first text-center">

                        <h1>Event of <?php echo $previousYear . "-" . $endYear; ?></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ab facere accusantium corrupti, error
                            deleniti quidem saepe odit quos atque, animi velit quia laudantium esse blanditiis. Magni animi
                            eaque impedit?</p>
                    </div>

                    <div class="row ">
                        <?php
                        while ($eveRow = mysqli_fetch_assoc($eventResult)) {
                        ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <div class="image-overlay-card">
                                        <!-- <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid image"> -->
                                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($eveRow['banner']) . '" alt="" class="img-fluid image" > '; ?>
                                        <div class="text-block">
                                            <h5><i class="fas fa-calendar-alt"></i> &nbsp;<?php echo date('d F, Y', mktime(0, 0, 0, $eveRow['month'], $eveRow['day'], $eveRow['year'])) ?></span></h4>
                                                <p><i class="far fa-clock"></i> &nbsp; All Day</p>
                                        </div>
                                    </div>
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html"><?php echo $eveRow['title'] ?></a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> <?php echo $eveRow['day'] ?></span><span class="event_date"><?php echo date('F Y', mktime(0, 0, 0, $eveRow['month'], $eveRow['day'], $eveRow['year'])) ?></span>
                                        </div>
                                        <p><?php echo $eveRow['description'] ?></p>

                                        <div class="d-flex justify-content-between price-btn">
                                            <?php
                                            if ($currentDate <= $eveRow['to_date']) {
                                            ?>
                                                <h4>&nbsp;Upcoming</h4>
                                                <!-- <td>Upcoming</td> -->
                                            <?php
                                            } else {
                                            ?>
                                                <h4>&nbsp;Completed</h4>
                                            <?php
                                            }
                                            ?>
                                            <!-- <h4><i class="fas fa-money-check-alt"></i> &nbsp;$12</h4> -->
                                            <a class="button event-datail" href="eventdetail.php?id=<?php echo $eveRow['id'] ?>" type="submit">More details</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>


            </section>
        <?php
        }
    }
    while ($row = mysqli_fetch_assoc($getYear)) {
        $endYear = $row['year'];
        $previousYear = $endYear - 1;
        $eventsQuery = "SELECT *,YEAR(to_date) as year,MONTH(to_date) as month,DAY(to_date) as day FROM ipr_events where (YEAR(to_date) = $endYear and MONTH(to_date) <= 6) or (YEAR(to_date) = $previousYear and MONTH(to_date) > 6)  order by to_date  DESC";
        $eventResult = mysqli_query($conn, $eventsQuery);
        $currentDate = date('Y-m-d');
        $count1 = mysqli_num_rows($eventResult);
        if ($count1 > 0) {
        ?>

            <section id="events" class="new-section">

                <div class="container">
                    <div class="col-sm-12  heading-first text-center">

                        <h1>Event of <?php echo $previousYear . "-" . $endYear; ?></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ab facere accusantium corrupti, error
                            deleniti quidem saepe odit quos atque, animi velit quia laudantium esse blanditiis. Magni animi
                            eaque impedit?</p>
                    </div>

                    <div class="row ">
                        <?php
                        while ($eveRow = mysqli_fetch_assoc($eventResult)) {
                        ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <div class="image-overlay-card">
                                        <!-- <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid image"> -->
                                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($eveRow['banner']) . '" alt="" class="img-fluid image" > '; ?>
                                        <div class="text-block">
                                            <h5><i class="fas fa-calendar-alt"></i> &nbsp;<?php echo date('d F, Y', mktime(0, 0, 0, $eveRow['month'], $eveRow['day'], $eveRow['year'])) ?></span></h4>
                                                <p><i class="far fa-clock"></i> &nbsp; All Day</p>
                                        </div>
                                    </div>
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html"><?php echo $eveRow['title'] ?></a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> <?php echo $eveRow['day'] ?></span><span class="event_date"><?php echo date('F Y', mktime(0, 0, 0, $eveRow['month'], $eveRow['day'], $eveRow['year'])) ?></span>
                                        </div>
                                        <p><?php echo $eveRow['description'] ?></p>

                                        <div class="d-flex justify-content-between price-btn">
                                            <?php
                                            if ($currentDate <= $eveRow['to_date']) {
                                            ?>
                                                <h4>&nbsp;Upcoming</h4>
                                                <!-- <td>Upcoming</td> -->
                                            <?php
                                            } else {
                                            ?>
                                                <h4>&nbsp;Completed</h4>
                                            <?php
                                            }
                                            ?>
                                            <!-- <h4><i class="fas fa-money-check-alt"></i> &nbsp;$12</h4> -->
                                            <a class="button event-datail" href="eventdetail.php?id=<?php echo $eveRow['id'] ?>" type="submit">More details</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
    <?php }
    } ?>
    <!-- events ends -->

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
</body>

</html>