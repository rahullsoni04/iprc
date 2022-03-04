<?php
require_once '../requirements.php';
if(!isset($_SESSION['email'])){
    RedirectAfterMsg('Login to continue','login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/dashboard.css?v=<?php echo time(); ?>">
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
        <a href="#contact">Patient</a>
        <a href="#about">Certifications</a>
    </div>
    <div class="logo">
        <img src="../images/logo.png">

    </div>
    <div class="text-center content">
        <h2>Dashboard for IPR</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis accusantium deleniti quam id tenetur dolore
            debitis, autem similique minima labore suscipit sapiente qui. Eius laboriosam adipisci quibusdam molestias
            dolores eum!</p>
        <div class="main-buttons">
            <a href="cpLog.php" type="button" class="btn btn1">Copyrights Log</a>
            <button type="button" class="btn btn2">Vedio Tutorial</button>
            <button type="button" class="btn btn3">Contact Us</button>
        </div>
        <?php
        //Dsplay the copyright content with status filed
        $sql = 'SELECT * FROM `ipr_copyrights` WHERE `status`="filed"';
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($query, MYSQLI_BOTH);
        // print_r($row);
        if (!mysqli_num_rows($query)) {
            echo '<h3>No Records Found</h3>';
        } else {
        ?>
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Review</th>
                            <th scope="col">Presenter</th>
                            <th scope="col">Presenter Email</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Diary No</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $noOfRow=mysqli_num_rows($query);
                        for ($i = 0; $i < $noOfRow; $i++) {
                        ?>
                            <tr>
                                <td>
                                    <form action="letter.php" method="post">
                                        <button name="cpRecordId" value="<?php echo $row[$i]['id']; ?>" type="submit" class="btn"><i class="fas fa-eye"></i>&nbsp; Review</button>
                                    </form>
                                </td>
                                <td>
                                    <?php
                                    $pid = $row[$i]['presenter'];
                                    $sql = "SELECT `id`, `name`, `email_id`, `department`, `reg_no` FROM `ipr_users` WHERE `id`=" . $pid;
                                    $query = mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_assoc($query);
                                    ?>
                                    <?php echo $rows['name']; ?>
                                </td>
                                <!-- <td><?php //echo $i; ?></td> -->
                                <td><?php echo $rows['email_id']; ?></td>
                                <td><?php echo $row[$i]['title']; ?></td>
                                <td><?php echo $row[$i]['description']; ?></td>
                                <td><?php echo $row[$i]['diary_no']; ?></td>
                                <td><?php echo $row[$i]['status']; ?></td>
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