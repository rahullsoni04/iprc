<?php
require_once '../requirements.php';
if (isset($_POST['cpRecordId'])) {
    $id = $_POST['cpRecordId'];
} else {
    RedirectAfterMsg("Record not found check id", "dashboard.php");
}
?>
<!doctype html>
<html lang="en">

<!-- html2canvas library -->
<!-- <script src="html2canvas.min.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<!-- jsPDF library -->
<!-- <script src="jsPDF/dist/jspdf.min.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<!-- requirements js fie  -->
<script src="requirement.js"></script>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/noc.css?v=<?php echo time(); ?>">
    <title>NOC Letter</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM `ipr_copyrights` WHERE `id`=$id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $title = $row['title'];
    ?>
    <div class="container" id="notification"></div>
    <div class="main new-section">
        <h3 style="text-align: center;" id="preview-title">NOC Letter</h3>
        <hr>
        <div id="letter">
            <p align="right" id="date"><br></p>
            <p>To<br>
                The Principal,<br>
                Shah and Anchor Kutchhi Engineering College,<br>
                Chembur</p>
            <p><strong>Subject:</strong> Application for permission to carry out the work and request to issue No Objection
                Certificate
                to file Intellectual Property.</p>
            <p>Respected Sir,</p>
            <p>I/We request you to kindly grant me/us the permission to carry out the work. The details of the work and
                applicants are mentioned below. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio a eos enim fugit dolorum quibusdam veniam, maxime esse, earum dolores obcaecati vero et nisi recusandae quo consectetur temporibus quam fugiat.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit fuga qui sapiente repellendus nam consequuntur distinctio.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit fuga qui sapiente repellendus nam consequuntur distinctio.</p>
            <strong>
                <p>Details of the work:</p>
            </strong>
            <strong>
                <p>Topic Name:
            </strong> <?php echo $row['title']; ?></p>
            <strong>
                <p>Description:
            </strong> <?php echo $row['description'];  ?></p>

            <table class="table_applicant">
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                </tr>
                <?php
                // $id = (isset($_GET['cpRecordId']) ? $_GET['cpRecordId'] : '');
                $sql_applicant = "SELECT * FROM `ipr_cp_applicant` WHERE `cid`=$id";
                $query_applicant = mysqli_query($conn, $sql_applicant);
                $i = 1;
                while ($rows = mysqli_fetch_assoc($query_applicant)) {
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['role']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <br>
            <p>Thanking You.</p><br>
            <ol id="last">
                <?php
                // $i = 1;
                $query1 = mysqli_query($conn, $sql_applicant);
                while ($rows = mysqli_fetch_assoc($query1)) {
                ?>
                    <li><?php echo $rows['name']; ?></li>
                <?php
                }
                ?>
            </ol>
        </div>
        <hr>
        <div id="letter1">
            <p align="right" id="date1"><br></p>
            <p>
                To,<br>
                Registrar of Copyrights,<br>
                Copyright Office,<br>
                Department for Promotion of Industry and Internal Trade,<br>
                Ministry of Commerce and Industry,<br>
                Boudhik Sampada Bhawan,<br>
                Plot No. 32, Sector 14, Dwarka,<br>
                New Delhi-110078<br>
                Email Address: copyright@nic.in<br>
                Telephone No.: 011-28032496<br>
            </p>
            <p align="center">
                <b>Subject: No Objection letter</b>
            </p>
            <p>
                Respected Sir / Madam,
            </p>
            <p>
                On behalf of Shah & Anchor Kutchhi Engineering College, the institute does not have any objection on filing copyright for the work with title <b><?php echo $title; ?></b> by the following Shah & Anchor Kutchhi Engineering College faculty members and students
            </p>
            <p align="right">
                Dr.Bhavesh Patel<br>
                Principal
            </p>
            <ol>
                <?php
                // $i = 1;
                $query1 = mysqli_query($conn, $sql_applicant);
                while ($rows = mysqli_fetch_assoc($query1)) {
                ?>
                    <li><?php echo $rows['name']; ?></li>
                <?php
                }
                ?>
            </ol>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $sql_user = "SELECT `id`, `name`, `email_id` FROM `ipr_users` WHERE `id`=" . $row['presenter'];
            $query_user = mysqli_query($conn, $sql_user);
            $row_user = mysqli_fetch_assoc($query_user);
            $to = $row_user['email_id'];
            $headers = "From:IPR admin";

            if (isset($_POST['accept'])) {
                if (($_FILES['fileToUpload']['name'] != "")) {
                    // Where the file is going to be stored
                    $target_dir = "noc/";
                    $file = $_FILES['fileToUpload']['name'];
                    $path = pathinfo($file);
                    $filename = $path['filename'];
                    $ext = $path['extension'];
                    $temp_name = $_FILES['fileToUpload']['tmp_name'];
                    $path_filename_ext = $target_dir . $filename . "." . $ext;

                    // Check if file already exists
                    if (file_exists($path_filename_ext)) {
                        echo "Sorry, file already exists.";
                    } else {
                        move_uploaded_file($temp_name, $path_filename_ext);
                        echo "Congratulations! File Uploaded Successfully.";
                    }
                }
                $link_document = $path['filename'];
                $id = $_POST['accept'];
                // $sql = "UPDATE `ipr_copyrights` SET `status`='accepted',`action_by`='" . $_SESSION['user_name'] . "' WHERE `id`=$id";
                $sql = "UPDATE `ipr_copyrights` SET `status`='accepted', `link`='$link_document' ,`action_by`='" . $_SESSION['email'] . "' WHERE `id`=$id";
                $query = mysqli_query($conn, $sql);
                $row['status'] = "accepted";
                if ($query) {
                    $subject = "NOC Letter";
                    $message = "Your NOC Letter is ready\nPlease visit website or click below link to download the NOC Letter\n\n" . $link_document;
                    $mail_status = mail($to, $subject, $message, $headers);
                    if ($mail_status) {
                        RedirectAfterMsg("You accpeted the request", "dashboard.php");
                    } else {
                        RedirectAfterMsg("Request Accepted Email Sending Failed Something went wrong", "dashboard.php");
                    }
                }
                RedirectAfterMsg("Something went wrong Error updating status", "dashboard.php");
            } else if (isset($_POST['reject'])) {
                $id = $_POST['reject'];
                $reason = $_POST['rejectionMsg'];
                //sql will contain query that will update database to reuject the request
                // $sql = "UPDATE `ipr_copyrights` SET `status`='rejected',`action_by`='" . $_SESSION['user_name'] . "' WHERE `id`=$id";
                $sql = "UPDATE `ipr_copyrights` SET `status`='rejected',`action_by`='" . $_SESSION['email'] . "' WHERE `id`=$id";
                $query = mysqli_query($conn, $sql);
                $sql1 = "INSERT INTO `ipr_cp_reject`(`cp_id`, `reason`) VALUES ($id,'$reason')";
                $query = mysqli_query($conn, $sql1);
                $row['status'] = "rejected";
                if ($query) {
                    $subject = "Regarding NOC Letter";
                    $message = "Your NOC Letter is rejected because of following reason : \n" . $reason . "\nPlease visit website or contact admin to know more";
                    $mail_status = mail($to, $subject, $message, $headers);
                    if ($mail_status) {
                        RedirectAfterMsg("You rejected the request", "dashboard.php");
                    } else {
                        RedirectAfterMsg("Request Rejected, Email Sending Failed Something went wrong", "dashboard.php");
                    }
                    //PushNotification("You Rejected the Request");
                }
                RedirectAfterMsg("Something went wrong Error updating status", "dashboard.php");
            }
        }
        ?>
        <div class="container">
            <!-- <div>
            <button name="accept" class="btn">Accept</button>
            <button id="rejectBtn" class="btn">Reject</button>
            </div> -->
            <div>
                <?php
                if ($row['status'] == "accepted") {
                ?>
                    <h4>Status</h4>
                    <h5>This Request is Accepted</h5>
                    <button id="printApplication" class="btn" onclick="Letter.print()">Print Application</button>
                <?php
                } else if ($row['status'] == "rejected") {
                ?>
                    <h5>This Request is Rejected</h5>
                <?php
                } else {
                    // if ($row['status'] != "accepted"&&$row['status'] != "rejected") { 
                ?>
                    <div id="alert" style="display: none;margin-top:20px; margin-bottom :20px">
                        <div class="col-md-12">
                            <form method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload" />

                                <button id="upload-button" class="btn btn-danger my-2" name="accept" value="<?php echo $id ?>"> Upload </button>
                                <!-- <button name="accept" value="<?php //echo $id 
                                                                    ?>" class="btn btn-danger my-2">Yes</button> -->
                                <button id="acceptCancel" class="btn btn-primary">Cancel</button>
                            </form>

                        </div>
                    </div>
                    <div class="row">
                        <button id="acceptDialogue" class="btnp" onclick="print()">Print</button>&nbsp;
                        <!-- <button id="acceptDialogue" class="btnp">Accept</button>&nbsp; -->
                        <button id="rejectBtn" class="btn1">Reject</button>
                    </div>
                    <div id="rejectReason" style="display: none;margin-top:20px; margin-bottom :20px">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="cpRecordId" value="<?php echo $id; ?>">
                            <textarea name="rejectionMsg" class="form-control" id="rejectionMsg" rows="3" placeholder="Reason for rejection" required></textarea>
                            <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="confirmation">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        I confirm the above rejection message
                                    </label>
                                </div>
                                <button class="btn btn-danger my-2 mx-3" id="reject" name="reject" value="<?php echo $id ?>" disabled>Reject</button>
                        </form>
                        <button class="btn btn-primary my-2 mx-3" id="cancel" name="cancel">Cancel</button>
                    </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    //To hide the text area which will have the reason for rejection
                    document.getElementById('acceptDialogue').addEventListener("click", () => {
                        document.getElementById("alert").style.display = "block";
                        document.getElementById("acceptDialogue").style.display = "none";
                        document.getElementById("rejectBtn").style.display = "none";
                    });
                    document.getElementById('acceptCancel').addEventListener("click", () => {
                        document.getElementById("alert").style.display = "none";
                        document.getElementById("acceptDialogue").style.display = "block";
                        document.getElementById("rejectBtn").style.display = "block";
                    });
                    document.getElementById('rejectBtn').addEventListener("click", () => {
                        document.getElementById("rejectBtn").style.display = "none";
                        document.getElementById("acceptDialogue").style.display = "none";
                        document.getElementById("rejectReason").style.display = "block";
                    });
                    document.getElementById('cancel').addEventListener("click", () => {
                        document.getElementById("rejectBtn").style.display = "block";
                        document.getElementById("acceptDialogue").style.display = "block";
                        document.getElementById("rejectReason").style.display = "none";
                    });
                    document.getElementById('confirmation').addEventListener("click", () => {
                        let x = document.getElementById('rejectionMsg').value;
                        console.log(typeof(x));
                        if (x == "") {
                            alert("Please submit the reason before confirmation");
                            document.getElementById("confirmation").checked = false;
                        } else {
                            document.getElementById("reject").disabled = false;
                        }
                    });
                });
            </script>

        <?php } ?>
        </div>
    </div>
    </div>
    <!-- Html2  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- cdn to run jspdf code in js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <!-- cdn to run html2pdf code in js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            console.log('DOM fully loaded and parsed');
        });

        function convertPdf() {
            console.log("button clicked");
        }
    </script>
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var date = document.getElementById("date");
        var date1 = document.getElementById("date1");
        today = dd + '/' + mm + '/' + yyyy;
        date1.innerHTML = 'Date: ' + today;
        date.innerHTML = 'Date:' + today;
    </script>
</body>

</html>