<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/forms.css">
    <title>IPR | Signup</title>
</head>
<?php
    require_once 'requirements.php';
?>

<body>
    <div class="container">
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
                    if ($password == $confirmPassword) {
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
        <strong>Error!</strong> User Exist <br> Contact admin if you think this is a mistake.
        </div>";
                }
            } else {
                echo "<div class='alert alert-danger'>
    <strong>Error!</strong> inputs cannot be empty.
    </div>";
            }
        }
        ?>
    </div>
    <div class="container" style="padding:25px,">
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
                    </d iv>
                    <div class="col-lg-6 col-sm-12 col-md-12">
                        <div class="login" style="padding: 7.5px;">
                            <h1>SIGN UP</h1>
                            <p>Please enter all the fields carefully</p>
                            <div class="form__group field">
                                <?php //please do not modify name attribute and required status of the input fields
                                ?>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <input name="fname" id='fname' type="text" class="form__field" placeholder="Enter First Name" required />
                                    <input name="mname" id='mname' type="text" class="form__field" placeholder="Enter Middle Name" required />
                                    <input name="lname" id='lname' type="text" class="form__field" placeholder="Enter Last Name" required />
                                    <input name="email" id='email' type="email" class="form__field" placeholder="Enter Email" />
                                    <input name="password" id='password' type="password" class="form__field" placeholder="Enter password" required />
                                    <input name="confirmPassword" id='cpassword' type="password" class="form__field" placeholder="Enter Comfirm password" required />
                                    <br>
                                    <label class="form__field" for="cars">Department :</label>
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
                                    <br>
                                    <!-- <input type="text" class="form__field" placeholder="Enter Registration Number" name="regNo" id='regNo' required /> -->
                                    <br>
                                    <button class="btn" name="signup">Sign Up</button>
                                </form>
                            </div>
                            <p class="mt-4">Already have an Account </p>
                            <a href="login.html" class="btn">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>