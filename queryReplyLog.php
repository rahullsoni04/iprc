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
    <link rel="stylesheet" href="css/query.css">
    <title>IPR</title>
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <div class="logo">
                <img src="/images/IPR logo.png">
            </div>&nbsp;
            &nbsp;<a class="navbar-brand" href="#">SAKEC IPR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Query</a>
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
                <form class="example" action="action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <!-- navbar ends -->

    <div class="text-center content">
        <h2>Log</h2>
        <div class="row">
            <div class="main-buttons">
                <button type="button" class="btn"><i class="fas fa-arrow-left"></i>&nbsp; Back</button>
                <button type="button" class="btn" onclick="<?php echo "window.location='query.php'" ?>"><i class="fas fa-file-alt"></i>&nbsp; Query</button>
            </div>
        </div>
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Query</th>
                        <th scope="col">Reply Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    $sql = "SELECT * FROM `ipr_contact_us` WHERE replyStatus=1";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                            <tr>
                                <td><?php echo $id++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['emailId']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['query']; ?></td>
                                <td><?php echo $row['replyMsg']; ?></td>
                            </tr>
                    <?php
                        }
                    } else
                        echo "No records found";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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