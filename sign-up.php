<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/signup.css?v=<?php echo time(); ?>">
    <title>IPR | Signup | Login</title>
</head>
<?php
require_once 'requirements.php';
?>

<body>
    <div class="container" id="container">
        <!-- sinUp PHP starts here -->
        <?php
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['signup'])) {
            //optionally checking all the input fields are not empty because html can get manipulated
            unset($_POST['signup']);
            if (!(empty($_POST['lname']) || empty($_POST['fname']) || empty($_POST['mname'])) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmPassword'])) {
                $name = $_POST['lname'] . " " . $_POST['fname'] . " " . $_POST['mname'] . " ";
                $email = $_POST['email'];
                $sql = "SELECT * FROM `ipr_users` WHERE `email_id`='$email'";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if (!$count) {
                    $password = $_POST['password'];
                    $confirmPassword = $_POST['confirmPassword'];
                    if ($password === $confirmPassword) {
                        $department = $_POST['department'];
                        $role = (preg_match('#sakec.ac.in$#', $email)) ? '2' : '3';
                        $regNo = (preg_match('#sakec.ac.in$#', $email)) ? $_POST['regNo'] : 'NULL';
                        // insert into database
                        $sql = "INSERT INTO `ipr_users` (`name`, `email_id`, `password`, `department`, `role`, `reg_no`) VALUES ('$name','$email','$password','$department','$role','$regNo')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<div class='alert alert-danger'>
                <strong>Success!</strong> You have been registered successfully.
                </div>";
                            Alert("You have been registered successfully.");
                        } else {
                            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> You have not been registered successfully.
                </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
            <strong>Error!</strong> Password and Confirm Password does not match.
            </div>";
                    }
                } else if ($count) {
                    echo "<div class='alert alert-danger'>
        <strong>Error!</strong> User Exist <br> Please Login to continue
        </div>";
                }
            } else {
                echo "<div class='alert alert-danger'>
    <strong>Error!</strong> inputs cannot be empty.
    </div>";
            }
        }
        ?>



        <div class="form-container sign-up-container col-sm-12">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <h1>SIGN UP</h1>
                <p>Please enter all the fields carefully</p>

                <?php //please do not modify name attribute and required status of the input fields
                ?>

                <input name="fname" id='fname' type="text" placeholder="Enter First Name" required />
                <input name="mname" id='mname' type="text" placeholder="Enter Middle Name" required />
                <input name="lname" id='lname' type="text" placeholder="Enter Last Name" required />
                <input name="email" id='email' type="email" placeholder="Enter Email" required />

                <!-- <label class="form__field" for="cars"></label> -->

                <select name="department" id="department" required>
                    <option value="none" selected disabled hidden>Select department</option>
                    <option value="elec">Electronics and Computer Science</option>
                    <option value="elc">Electronic Engineering</option>
                    <option value="cs">Computer Engineering</option>
                    <option value="it">Information Tecnology</option>
                    <option value="extc">Electronics and Telecommunication</option>
                    <option value="aids">Artificial Intelligence and Data Science</option>
                    <option value="cybsec">Cyber Security</option>
                </select>
                <input name="password" id='password' type="password" placeholder="Enter password" required />
                <input name="confirmPassword" id='cpassword' type="password" class="form__field" placeholder="Enter Comfirm password" required />



                <button name="signup">Sign Up</button>
                <div class="spacer" style="height: 10px;"></div>
                <div class="small-device">
                    <p>Already have an Account! </p>
                    <a class="btn" id="login">Sign-In</a>
                </div>


            </form>
        </div>


        <!-- Login starts -->

        <div class="form-container sign-in-container">
            <!-- Login PHP -->
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
                            $_SESSION['user_name'] = $rows['name'];
                            RedirectAfterMsg('Login Successfull', 'index.php');
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <h1>LOGIN</h1>
                <input type="email" name="emailid" class="form__field" placeholder="Enter Username" id='username' required />

                <input type="password" name="password" class="form__field" placeholder="Enter Password" id='name' required />

                <button value="login" name="loginbtn" href="#">Login</button>

            </form>
            <div class="spacer" style="height: 20px;"></div>
            <div class="small-device">
                <p>Don't have an Account? </p>
                <a class="btn" id="signUp">Create Now</a>
            </div>


        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left col-md-12">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us.</p>
                    <p>Already have an Account! </p>
                    <button class="btn" id="login-big">Sign-In</button>
                </div>
                <div class="overlay-panel overlay-right col-md-12">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal information.</p>
                    <p>Don't have an Account? </p>
                    <button class="btn" id="signUp-big">Create Now</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('login');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () =>
            container.classList.add('right-panel-active')
        );

        signInButton.addEventListener('click', () =>
            container.classList.remove('right-panel-active')
        );
    </script>

    <script>
        // bigger devices
        const signUpButtonBig = document.getElementById('signUp-big');
        const signInButtonBig = document.getElementById('login-big');

        signUpButtonBig.addEventListener('click', () =>
            container.classList.add('right-panel-active')
        );

        signInButtonBig.addEventListener('click', () =>
            container.classList.remove('right-panel-active')
        );
    </script>
</body>

</html>