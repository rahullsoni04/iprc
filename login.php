<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fontawesome.com/v5.15/icons?d=gallery&p=2">
    <link rel="stylesheet" href="css/forms.css">
    <title>IPR | Login</title>

    <?php

    use FontLib\Table\Type\post;

        require_once 'requirements.php';
    ?>

</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loginbtn'])) {
        unset($_POST['loginbtn']);
        if (isset($_SESSION['email'])) {
            echo "<div class='alert alert-danger'>
        <strong>Error!</strong> You are already logged \n Please log out before logging to another account.
        </div>";
        } else if (!(empty($_POST['emailid']) || empty($_POST['password']))) {
            $username = $_POST['emailid'];
            $password = $_POST['password'];
            $sql = "SELECT `email_id`, `password`,`name` FROM `ipr_users` WHERE `email_id`= '$username'";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            if ($count) {
                $rows = mysqli_fetch_assoc($query);
                if ($rows['password'] == $password) {
                    $_SESSION['email'] = $username;
                    $_SESSION['user_name']=$rows['name'];
                    RedirectAfterMsg('Login Successfull','index.php');
                } else {
                    echo "<div class='alert alert-danger'>
            <strong>Error!</strong> Invalid Password.
            </div>";
                }
            } else {
                echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Invalid credentials <br> Account Does not exist .
                </div>";
            }
        } else {
            echo "<div class='alert alert-danger'>
    <strong>Error!</strong> inputs empty found.
    </div>";
        }
    }

    ?>
    <div class="container login-page text-center ">
        <div class="row align-items-center">
            <div class="quote col-lg-6 col-sm-12 col-md-12">
                <i>
                    <p><i class="fas fa-quote-left"></i><br>The Copyright law <br>
                        allows us as students <br>
                        and educaters some <br>
                        wiggle room for <br>
                        scholary use. <br> <i class="fas fa-quote-right"></i></p>
                </i></i>
            </div>

            <div class="col-lg-6 col-sm-12 col-md-12 main-content">
                <div class="login">

                    <h1>LOGIN</h1>
                    <p>Please enter username and password</p>
                    <div class="form__group field">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <input type="email" name="emailid" class="form__field" placeholder="Enter Username" id='username' required />
                            <br>
                            <input type="password" name="password" class="form__field" placeholder="Enter Password" id='name' required />

                    </div>
                    <br>

                    <button value="login" name="loginbtn" class="btn" href="#">Login</button>
                    </form>
                    <p class="mt-4">Don't have an Account </p>
                    <a href="signup.html" class="btn">Create Now</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>