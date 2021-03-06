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
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <title>IPR Homepage</title>
    <?php
    require_once 'requirements.php';
    ?>
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="logo">
                <img src="./images/IPR logo.png">
            </div>&nbsp; &nbsp;
            <a class="navbar-brand" href="index.php">SAKEC IPR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#events">
                            Events
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#roles">
                            Our Team
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#news">
                            News
                        </a>

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
                        <a href="login.php" class="button" style=" padding: 5px 15px; color: white;">Login</a>
                    <?php
                    } else {
                    ?>
                        <a href="logout.php" class="button" style=" padding: 5px 15px; color: white;">Logout</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- navbar ends -->
    <!-- banner -->

    <div class="header">

        <div class="content">

            <div class="main-text">

                <h1>??????????????????? ??????????</h1>
                <p class="mt-4">
                    To create awareness about the rules and regulations of the IPR policy amongst the
                    students and faculty </p>
                <a type="button" class="button btn-home">Upcoming Events <i class="fas fa-chevron-right"></i></a>
                <!-- <a type="button" class="btn btn-second">How we work <i class="fas fa-chevron-right"></i></a> -->
            </div>
            <div class="model">
            </div>
        </div>
        <a class="btn youtube-btn" href=""><i class="far fa-play-circle" style="font-size: 60px; color: rgb(12, 174, 196);"></i></a>
        <a class="btn down-arrow" href="#rolls-responsibilities"> <i class="fas fa-angle-double-down"></i></a>
    </div>
    <!-- banner ends -->

    <!-- Rolls and Respnsibilities  -->

    <section id="rolls-responsibilities" class="new-section">

        <div class="container">
            <div class="col-sm-12 text-center heading">
                <p class="roles-red">Lorem, ipsum dolor sit amet
                    consectetur adipisicing elit</p>
                <h1>Roles and responsibilities of IPR</h1>
            </div>
            <div class="row rolls-content my-4">
                <div class="col-sm-1 text-center rolls-icon"><i class="far fa-lightbulb fa-3x"></i></div>
                <div class="col-sm-3">
                    <p>To create awareness about the rules and regulations of the IPR policy amongst the students and
                        faculty.</p>
                </div>
                <div class="col-sm-1 text-center rolls-icon"><i class="fas fa-microphone-alt fa-3x"></i></div>
                <div class="col-sm-3">
                    <p>To encourage and provide direction to students and faculty on filing IPR applications..</p>
                </div>
                <div class="col-sm-1 text-center rolls-icon"><i class="fas fa-search fa-3x"></i></div>
                <div class="col-sm-3">
                    <p>To build a research environment through continued thirst for acquiring new knowledge through
                        innovation.</p>
                </div>

            </div>
        </div>

    </section>

    <!-- Rolls and responsibilities ends -->


    <!-- about us section -->

    <section id="about" class="row new-section align-items-center">
        <div class="about-content text-center">
            <a href=""> <img class="about-icon" src="images/play (1).png" alt="" height="80px" width="80px"></a>

            <h4 class="my-4">About Us</h4>
            <p class="my-4">Shah & Anchor Kutchhi Engineering College established Intellectual Property Rights Cell
                (IPRC) in 2019. <br> SAKEC-IPRC aims to protect the Intellectual Property of the entities of SAKEC to
                enrich
                professional standard. <br>
                Intellectual property (IP) is a category of property that includes intangible creations of the human
                intellect; <br> such as design, music, art, technological invention and writing. <br> IPR is the legal
                rights
                for
                intellectual activity undergone in the industrial, scientific, literary and artistic field.
            </p>
        </div>
    </section>
    <!-- about us ends -->

    <!-- events -->
    <section id="events" class="new-section">

        <div class="container text-center">
            <div class="col-sm-12  heading ">

                <h1>Events</h1>
            </div>
                <br>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Upcoming Events</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Past Events</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="events/events.php" class="nav-link">All Events</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> 24 </span><span class="event_date">April 2021</span>
                                        </div>
                                        <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                            different sensors like DHT11, The event
                                            ended with an encouraging speech </p>
                                        <a class="button" type="submit">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> 24 </span><span class="event_date">April 2021</span>
                                        </div>
                                        <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                            different sensors like DHT11, The event
                                            ended with an encouraging speech </p>
                                        <a class="button" type="submit">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> 24 </span><span class="event_date">April 2021</span>
                                        </div>
                                        <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                            different sensors like DHT11, The event
                                            ended with an encouraging speech </p>
                                        <a class="button" type="submit">Read More</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> 24 </span><span class="event_date">April 2021</span>
                                        </div>
                                        <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                            different sensors like DHT11, The event
                                            ended with an encouraging speech </p>
                                        <a class="button" type="submit">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> 24 </span><span class="event_date">April 2021</span>
                                        </div>
                                        <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                            different sensors like DHT11, The event
                                            ended with an encouraging speech </p>
                                        <a class="button" type="submit">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="posts">
                                    <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                                    <div class="blog-inner">
                                        <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                                        <div class="mh-blog-post-info">
                                            <p><strong>Event on </strong><span class="event_date"> 24 </span><span class="event_date">April 2021</span>
                                        </div>
                                        <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                            different sensors like DHT11, The event
                                            ended with an encouraging speech </p>
                                        <a class="button" type="submit">Read More</a>
                                    </div>
                                </div>
                            </div>
                           
                          
                        </div>
                 </div>
                    

                </div>












                </div>
                   
                 
             
            <?php
            // $sql = "SELECT * FROM events";
            // $query=mysqli_query($conn,$sql);
            // $result=mysqli_fetch_all($query,MYSQLI_ASSOC);
            ?>

        </div>
    </section>
    <!-- events ends -->

    <!-- Testimonials -->
    <section id="testimonial" class="new-section">

        <div class="container text-center">
            <div class="col-sm-12  heading">

                <h1>WHAT PEOPLE SAY</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ab facere accusantium corrupti, error
                    deleniti quidem saepe odit quos atque, animi velit quia laudantium esse blanditiis. Magni animi
                    eaque impedit?</p>
            </div>


            <!-- Set up your HTML -->
            <div class="responsive-slides">


                <div class="rounded testim testim-1">
                    <img class="img-fluid testimonial-img my-4" src="images/man.png" alt="">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                        consectetur!
                        Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                        nisi iure
                        dolor
                        asperiores nemo dolore quas at.</p>
                    <hr class="blue-line">
                    <!-- <img class="img-fluid testimonial-symbol mt-4" src="images/left-quote-1.png" alt=""> -->
                    <p class="testimonial-name mt-2">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>
                </div>


                <div class="rounded testim testim-3">
                    <img class="img-fluid testimonial-img my-4" src="images/user.png" alt="">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                        consectetur!
                        Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                        nisi iure
                        dolor
                        asperiores nemo dolore quas at.</p>

                    <hr class="blue-line">
                    <p class="testimonial-name mt-2">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>
                </div>

                <div class="rounded testim testim-2">
                    <img class="img-fluid testimonial-img my-4" src="images/man.png" alt="">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                        consectetur!
                        Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                        nisi iure
                        dolor
                        asperiores nemo dolore quas at.</p>

                    <hr class="blue-line">
                    <p class="testimonial-name mt-2">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>
                </div>
                <div class="rounded testim testim-2">
                    <img class="img-fluid testimonial-img my-4" src="images/man.png" alt="">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                        consectetur!
                        Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                        nisi iure
                        dolor
                        asperiores nemo dolore quas at.</p>

                    <hr class="blue-line">
                    <p class="testimonial-name mt-2">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>
                </div>



            </div>
        </div>
    </section>

    <!-- Testimonial ends -->


    <!-- Team Section -->
    <section id="roles" class="new-section">

        <div class="container text-center">
            <div class="col-sm-12  heading">

                <h1>Creative People</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ab facere accusantium corrupti, error
                    deleniti quidem saepe odit quos atque, animi velit quia laudantium esse blanditiis. Magni animi
                    eaque impedit?</p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team13.jpg.webp" alt="">
                        <div class="overlay">

                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team15.jpg.webp" alt="">
                        <div class="overlay">

                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team13.jpg.webp" alt="">
                        <div class="overlay">

                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team15.jpg.webp" alt="">
                        <div class="overlay">

                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>


            <div class="row new-team-row">
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team13.jpg.webp" alt="">
                        <div class="overlay">

                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team15.jpg.webp" alt="">
                        <div class="overlay">
                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team15.jpg.webp" alt="">
                        <div class="overlay">
                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="red-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="images/team13.jpg.webp" alt="">
                        <div class="overlay">
                            <div class="text">
                                <p class="team-name">Israil Alam</p>
                                <p class="team-designition mt-4">Head</p>
                            </div>
                        </div>
                    </div>
                    <p class="testimonial-name mt-3">Israil Alam</p>
                    <p class="testimonial-designition">Head</p>

                    <div class="social-team">
                        <hr class="blue-line">
                        <a href="#" class="fab-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="fab-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fab-linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="fab-envelope"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teams Section ends -->


    <!-- News -->
    <section id="news" class="new-section">

        <div class="container">
            <div class="col-sm-12  heading text-center">

                <h1>News and Courses</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos ab facere accusantium corrupti, error
                    deleniti quidem saepe odit quos atque, animi velit quia laudantium esse blanditiis. Magni animi
                    eaque impedit?</p>
            </div>
            <div class="responsive-slides">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-4">
                    <div class="blogs">
                        <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                        <div class="real-blog-inner  p-3">
                            <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                            <div class="mh-blog-post-info">
                                <p>Posted on <span class="blog-date"> 20 April 2021</span>
                            </div>
                            <hr>
                            <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                different sensors like DHT11... </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-4">
                    <div class="blogs">
                        <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                        <div class="real-blog-inner  p-3">
                            <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                            <div class="mh-blog-post-info">
                                <p>Posted on <span class="blog-date"> 20 April 2021</span>
                            </div>
                            <hr>
                            <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                different sensors like DHT11... </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-4">
                    <div class="blogs">
                        <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                        <div class="real-blog-inner  p-3">
                            <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                            <div class="mh-blog-post-info">
                                <p>Posted on <span class="blog-date"> 20 April 2021</span>
                            </div>
                            <hr>
                            <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                different sensors like DHT11... </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch p-4">
                    <div class="blogs">
                        <img src="images/homepage ipr 2.jpg" alt="" class="img-fluid">
                        <div class="real-blog-inner  p-3">
                            <h2><a href="blog-single.html">World of IOT with NODEMCU</a></h2>
                            <div class="mh-blog-post-info">
                                <p>Posted on <span class="blog-date"> 20 April 2021</span>
                            </div>
                            <hr>
                            <p>Introduction to IoT, Basics of NodeMCU, Configuring LEDs with NodeMCU, using
                                different sensors like DHT11... </p>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- News ends -->

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contactUs'])) {
        unset($_POST['contactUs']);
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $name = $_SESSION['user_name'];
        } else {
            $email = $_POST['email'];
            $name = $_POST['name'];
        }
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $sql = "INSERT INTO `ipr_contact_us`(`name`, `emailId`, `subject`, `query`) VALUES ('$name','$email','$subject','$message')";
        $query = mysqli_query($conn, $sql);
        // $to = "rahullsoni04@gmail.com";
        // $headers = "From: guptvan96@gmail.com" . "\r\n"."CC: rahul.soni_19@sakec.ac.in";
        // $txt = "You have received a new message from " . $name . "." . "\r\n" . "Here is the message: " . "\r\n" . $message;
        // $test=mail($to, $subject, $txt, $headers);
        if ($query) {
            echo "<script>alert('Your Query has been sent successfully')</script>";
        } else {
            echo "<script>alert('Your Query has not been sent successfully')</script>";
        }
    }
    ?>
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
                <?php
                // $sql="SELECT`headlines`, `links` FROM `ipr_news` WHERE `live`='yes'";
                // $result=mysqli_query($conn,$sql);
                ?>
                <div class="col-sm-3">
                    <h2>Recent News and Courses</h2>
                    <hr>
                    <?php
                    // while($news = mysqli_fetch_assoc($result)){


                    ?>
                    <p><a href="<?php  //echo $news['links'];
                                ?>" target="new" style="text-decoration: none;"><?php  //echo $news['headlines'];
                                                                                ?></a></p>

                    <?php
                    // }
                    ?>
                </div>
                <div class="col-sm-3">
                    <h2>Get In Touch For Any Query</h2>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <?php
                        if (!isset($_SESSION['email'])) {
                            echo '<div class="mb-3 form-group">';
                            echo '<input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Your Name">';
                            echo '</div>';
                            echo '<div class="mb-3 form-group">';
                            echo '<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Your Email">';
                            echo '</div>';
                        }
                        ?>
                        <div class="mb-3 form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div class="mb-3 form-group">
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Your Query"></textarea>
                        </div>
                        <button type="submit" name="contactUs" class="mb-2 btnp">Send Message</button>
                    </form>
                </div>
            </div>

            <hr>
            <div class="copyright">
                <div class="row justify-content-between">
                    <div class="col-4">
                        ?? IPR SAKEC, All Right Reserved.
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
    <!-- footer ends -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="plugins/slick-master/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $('.responsive-slides').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
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

        $(function() {
            $(document).scroll(function() {
                var $nav = $(".bg-dark");
                var $navbtn = $(".btn-outline-info");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
                $navbtn.toggleClass('scrolled', $(this).scrollTop() > $navbtn.height());
            });
        });
    </script>
    <script src="https://smtpjs.com/v3/smtp.js">
    </script>
    <script type="text/javascript">
        function sendEmail() {
            Email.send({
                    Host: "smtp.gmail.com",
                    Username: "sender@email_address.com",
                    Password: "Enter your password",
                    To: 'receiver@email_address.com',
                    From: "sender@email_address.com",
                    Subject: "Sending Email using javascript",
                    Body: "Well that was easy!!",
                })
                .then(function(message) {
                    alert("mail sent successfully")
                });
        }
    </script>
</body>

</html>