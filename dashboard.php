<?php
require_once 'requirements.php';
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
        <a class="active" href="#home">IPR Home</a>
        <a href="#news">Dashboard</a>
        <a href="#news">Copyright</a>
        <a href="#contact">Patent</a>
        <a href="#about">Certifications</a>
    </div>
    <div class="logo">
        <img src="/images/logo.png">

    </div>
    <div class="text-center content">
        <h2>Dashboard for IPR</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis accusantium deleniti quam id tenetur dolore
            debitis, autem similique minima labore suscipit sapiente qui. Eius laboriosam adipisci quibusdam molestias
            dolores eum!</p>
        <div class="main-buttons">
            <a type="button" href="noc.php" class="btn">Apply Noc</a>
            <button type="button" class="btn">Video Tutorial</button>
            <button type="button" class="btn">Contact Us</button>
        </div>
        <div class="table">
            <?php
            $sql = 'SELECT * FROM `ipr_copyrights` as `cp`,`ipr_users` as `users` WHERE users.email_id='.$_SESSION['email'].' and users.id=cp.presenter';
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($query, MYSQLI_BOTH);
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
                            <th scope="col">Download Noc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < mysqli_num_rows($query); $i++) {
                        ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><?php echo $row[$i]['title']; ?></td>
                                <td><?php echo $row[$i]['description']; ?></td>
                                <td><?php echo $row[$i]['diary_no']; ?></td>
                                <td><?php echo $row[$i]['status']; ?></td>
                                <td><button type="button" class="btn">Download Noc</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>