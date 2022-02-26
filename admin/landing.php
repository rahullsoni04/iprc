<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../plugins/slick-master/slick/slick.scss" />
    <link rel="stylesheet" type="text/css" href="../plugins/slick-master/slick/slick-theme.css" />
    <link rel="stylesheet" href="../css/admin-edit.css?v=<?php echo time(); ?>">
    <title>Homepage - edit</title>
    <?php
    require_once '../requirements.php';
    ?>
</head>

<body>
    <!-- sidebar -->
    <section class="tabs-container"><br><br>
        <label for="tab1"> About Us </label>
        <label for="tab2"> Our Team </label>
        <label for="tab3"> Testimonials </label>
    </section>
    <div class="container" id="notification"><?php (isset($_SESSION['msg']))?"heeloo":"world"; ?></div>
    <?php
    //Notify(var_dump($_SESSION['REQUEST_METHOD']));
    if ($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['aboutUsBtn'])) {
        $about_us_content = $_POST['about_us_content'];
        $sql = "UPDATE `ipr_about_us` SET `description`='$about_us_content' WHERE `id`=1";
        $dir = "../images/about_us/";
        // $fileName=$_FILES['about_us_image']['name'];
        $sql = "INSERT INTO `ipr_about_us`(`description`, `img`) VALUES ('$about_us_content','####')";
        $response = UploadFile($conn, $sql, "about_us_image", $dir);
        unset($_POST['aboutUsBtn']);
        unset($_SERVER['REQUEST_METHOD']);
        $msg=$response['msg']."<br>"."About us section updated successfully";
        PushNotification($msg);
        //RedirectAfterMsg("About Us Content Updated Successfully", "../admin/landing.php");
    }
    ?>
    <?php
    $sql = "SELECT * FROM `ipr_about_us` ORDER BY `id`DESC;";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($query);
    ?>
    <!-- about Us -->
    <input name="tab" id="tab1" type="radio" checked />
    <section class="tab-content">
        <div class="col-sm-12 text-center  heading">
            <h2>Edit About Us section for Homepage</h2>
        </div>
        <div class="container my-4 new-section">

            <h5>Description</h5>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <textarea placeholder="Write description here..." rows="20" name="about_us_content" id="comment_text" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" value="<?php echo $rows['description']; ?>"><?php echo isset($rows['description'])?$rows['description']:""; ?></textarea>
                <div class="spacer" style="height: 40px;"></div>
                <img id="aboutUsImg" src="../images/about_us/<?php echo isset($rows['img'])?$rows['img']:""; ?>" alt="your image" style="display: none" onload="this.style.display=''" />
                <div class="spacer" style="height: 20px;"></div>
                <div class="wrapper ">
                    <h5> Change image</h5>
                    <input name="about_us_image" type="file" id="aboutUs" onchange="updateImg(this,'aboutUsImg')" />
                </div>
                <div class="spacer" style="height: 40px;"></div>
                <button class="btn btn-success" name="aboutUsBtn">Submit</button>
            </form>
        </div>
    </section>
    <!-- about us ends -->

    <!-- testimonials -->
    <input name="tab" id="tab3" type="radio" checked />
    <section class="tab-content">

        <div class="col-sm-12 text-center  heading">
            <h2>Edit Testimonials section for Homepage</h2>
        </div>
        <div class="container my-4 new-section">
            <img id="blah" src="#" alt="your image" style="display: none" onload="this.style.display=''" />
            <div class="spacer" style="height: 20px;"></div>
            <div class="wrapper ">
                <h5> Change image</h5>
                <input type="file" id="imgInp" />
            </div>
            <div class="spacer" style="height: 40px;"></div>
            <h5>Comment</h5>
            <textarea placeholder="Write your comment here..." rows="20" name="comment[text]" id="comment_text" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>


            <div class="spacer" style="height: 40px;"></div>
            <h5>Name</h5>
            <input type="text" name="name">
            <div class="spacer" style="height: 40px;"></div>
            <h5>Designition</h5>
            <input type="text" name="designition">
            <div class="spacer" style="height: 40px;"></div>
            <button class="btn btn-success">Submit</button>



            <div class="spacer" style="height: 50px;"></div>
            <!-- testimonial available -->

            <section id="testimonial" class="new-section">

                <div class="container text-center">
                    <div class="col-sm-12  heading">

                        <h1>Available feedbacks</h1>

                    </div>


                    <!-- Set up your HTML -->
                    <div class="responsive-slides">


                        <div class="rounded testim testim-1">
                            <img class="img-fluid testimonial-img my-4" src="../images/man.png" alt="">
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
                            <button class="btn btn-success">Enable</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>


                        <div class="rounded testim testim-3">
                            <img class="img-fluid testimonial-img my-4" src="../images/user.png" alt="">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                                consectetur!
                                Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                                nisi iure
                                dolor
                                asperiores nemo dolore quas at.</p>

                            <hr class="blue-line">
                            <p class="testimonial-name mt-2">Israil Alam</p>
                            <p class="testimonial-designition">Head</p>
                            <button class="btn btn-success">Enable</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>

                        <div class="rounded testim testim-2">
                            <img class="img-fluid testimonial-img my-4" src="../images/man.png" alt="">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                                consectetur!
                                Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                                nisi iure
                                dolor
                                asperiores nemo dolore quas at.</p>

                            <hr class="blue-line">
                            <p class="testimonial-name mt-2">Israil Alam</p>
                            <p class="testimonial-designition">Head</p>
                            <button class="btn btn-success">Enable</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                        <div class="rounded testim testim-2">
                            <img class="img-fluid testimonial-img my-4" src="../images/man.png" alt="">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis dolore
                                consectetur!
                                Dolore, facilis. Temporibus fuga pariatur cupiditate sint, doloremque nam culpa
                                nisi iure
                                dolor
                                asperiores nemo dolore quas at.</p>

                            <hr class="blue-line">
                            <p class="testimonial-name mt-2">Israil Alam</p>
                            <p class="testimonial-designition">Head</p>
                            <button class="btn btn-success">Enable</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>



                    </div>
                </div>
            </section>


            <!-- Testimonial ends -->
        </div>

        <!-- testimonials ends -->

    </section>

    <!-- Our Teams -->
    <!-- Edit modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Choose Preference</h5>
                    <select id="Preferences" name="Preferences">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <div class="spacer" style="height: 20px;"></div>


                    <img id="updatedImg" src="#" alt="your image" />
                    <div class="spacer" style="height: 20px;"></div>
                    <div class="wrapper ">
                        <h5> Change image</h5>
                        <input type="file" id="memberImg" onchange="updateImg(this,'updatedImg')" />
                    </div>

                    <div class="spacer" style="height: 20px;"></div>
                    <h5>Name</h5>
                    <input type="text" name="name">
                    <div class="spacer" style="height: 20px;"></div>
                    <h5>Designition</h5>
                    <input type="text" name="designition">
                    <div class="spacer" style="height: 20px;"></div>
                    <h5>Facebook Link</h5>
                    <input type="text" name="designition">
                    <div class="spacer" style="height: 20px;"></div>
                    <h5>Instagram Link</h5>
                    <input type="text" name="designition">
                    <div class="spacer" style="height: 20px;"></div>
                    <h5>LinkedIn Link</h5>
                    <input type="text" name="designition">
                    <div class="spacer" style="height: 20px;"></div>
                    <h5>Email ID</h5>
                    <input type="text" name="designition">
                    <div class="spacer" style="height: 20px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit modal ends -->

    <input name="tab" id="tab2" type="radio" checked />
    <section class="tab-content">
        <div class="col-sm-12 text-center  heading">
            <h2>Edit Our Team section for Homepage</h2>
        </div>
        <div class="container my-4 new-section">

            <div class="row">
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate text-center">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="../images/team13.jpg.webp" alt="">

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
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger mt-3">
                        Delete
                    </button>
                    <div class="spacer" style="height: 40px;"></div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate text-center">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="../images/team13.jpg.webp" alt="">

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
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger mt-3">
                        Delete
                    </button>
                    <div class="spacer" style="height: 40px;"></div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate text-center">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="../images/team13.jpg.webp" alt="">

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
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger mt-3">
                        Delete
                    </button>
                    <div class="spacer" style="height: 40px;"></div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate text-center">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="../images/team13.jpg.webp" alt="">

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
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger mt-3">
                        Delete
                    </button>
                    <div class="spacer" style="height: 40px;"></div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate text-center">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="../images/team13.jpg.webp" alt="">

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
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger mt-3">
                        Delete
                    </button>
                    <div class="spacer" style="height: 40px;"></div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 team-translate text-center">
                    <div class="team-member">
                        <img class="img-fluid teams-img" src="../images/team13.jpg.webp" alt="">

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
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger mt-3">
                        Delete
                    </button>
                    <div class="spacer" style="height: 40px;"></div>
                </div>

            </div>



        </div>


        </div>
    </section>



    <!-- team section ends -->
    <!-- sidebar -->



    <!-- requirements js fie  -->
    <script src="requirement.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../plugins/slick-master/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
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
        "use strict";
        let updateImg = (image, updateImg) => {
            let destination = document.getElementById(updateImg);
            let [file] = image.files
            if (file) {
                destination.src = URL.createObjectURL(file);
            }
        }
        // $('#memberImg').change(function(e) {
        //     // const [file] = memberImg.files
        //     // if (file) {
        //     //     updatedImg.src = URL.createObjectURL(file)
        //     // }
        //     updateImg0("memberImg","updatedImg",e.target.value);
        // });
    </script>

</body>

</html>