<?php
require_once 'requirements.php';
if (!isset($_SESSION['email'])) {
    RedirectAfterMsg('Login to continue', 'login.php');
}
// echo var_dump($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/dashboard.css">
    <title>IPR</title>
</head>

<body>
    <div class="sidebar">
        <div onclick="update()" class="toggle-collapse">
            <div class="toggle-icons text block">
                <span><i class="fas fa-bars"></i></span>
            </div>
        </div>
        <a class="active" href="#home">IPR Home</a>
        <a href="#news">Dashboard</a>
        <a href="#news">Copyright</a>
        <a href="#contact">Patent</a>
        <a href="#about">Certifications</a>
    </div>
    <div class="logo">
        <img src="./images/logo.png">

    </div>
    <div class="content text-center">
        <h2>Dashboard for IPR</h2>
        <p></p>
        <div class="main-buttons">
            <a type="button" href="noc.php" class="btn btn1">Apply Noc</a>
            <button type="button" class="btn btn2">Video Tutorial</button>
            <button type="button" class="btn btn3">Contact Us</button>
        </div>
        <div class="table">
            <?php
            $sql = 'SELECT *,cp.id as cpid FROM `ipr_copyrights` as `cp`,`ipr_users` as `users` WHERE users.email_id="' . $_SESSION['email'] . '" and users.id=cp.presenter';
            $query = mysqli_query($conn, $sql);
            if (!mysqli_num_rows($query)) {
                echo '<h3>No Records Found</h3>';
            } else {
                ?>
                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Diary No</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $path_file;
                        $row = mysqli_fetch_all($query, MYSQLI_BOTH);
                        for ($i = 0; $i < mysqli_num_rows($query); $i++) {
                        ?>
                            <tr>
                                <td><?php echo ($i + 1); ?></td>
                                <td><?php echo $row[$i]['title']; ?></td>
                                <td><?php echo $row[$i]['description']; ?></td>
                                <td><?php echo $row[$i]['diary_no']; ?></td>
                                <td><?php echo $row[$i]['status']; ?></td>
                                <td>
                                    <?php 
                                        if($row[$i]['link']!="" && $row[$i]['status']=="accepted"){
                                            echo '<a class="btn" href="./admin/noc/'.$row[$i]['link'].'" download>Download NOC</a>';
                                        }else if (!strcasecmp("rejected",$row[$i]['status'])) {
                                            $rejection_sql = "SELECT `reason` FROM `ipr_cp_reject` WHERE `cp_id`='".$row[$i]['cpid']."'";
                                            $rejection_query = mysqli_query($conn, $rejection_sql);
                                            $rejection_row = mysqli_fetch_assoc($rejection_query);
                                            (mysqli_num_rows($rejection_query)>0)?$reason = $rejection_row['reason']:$reason = "Some Error Occured";
                                            //Notify($rejection_row['rejection_reason']);
                                            ?>
                                            <button class="btn" onclick="alert('<?php echo $reason; ?>')">Rejection Reason</button>
                                            <?php
                                        }else{
                                            echo '<p>Pending Request</p=>';
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
            <button type="button" class="btn"><i class="fas fa-arrow-left"></i>&nbsp; Preview</button>
            <button type="button" class="btn">Next&nbsp;<i class="fas fa-arrow-right"></i></button>
            
        </div>
    </div>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- sidebar collapse -->
    <script>
        const toggleCollapse = documnet.querySelector('.toggle-collapse span');
        var sidebar = document.getElementsByClassName("sidebar");

        //onclick event on toggle Collapsse span tag
        toggleCollapse.addEventListener('click', function() {
            alert("Hello!");
          })

          function update(){
            sidebar.classList.toggle('collapse');
          }
    </script>

</body>

</html>