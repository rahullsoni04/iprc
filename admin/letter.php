<?php
require_once '../requirements.php';
session_start();
$id = 0;
// if (isset($_POST['cpRecordId'])) {
//     $id = $_POST['cpRecordId'];
// } else {
//     RedirectAfterMsg("Record not found check id", "dashboard.php");
// }
// ?>
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
    // $id = (isset($_GET['cpRecordId']) ? $_GET['cpRecordId'] : '');
    $id = ''; 
if( isset( $_POST['cpRecordId'])) {
    $id = $_POST['cpRecordId']; 
}
    $sql = "SELECT * FROM `ipr_copyrights` WHERE `id`=$id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    ?>
    <div class="container" id="notification"><?php (isset($_SESSION['msg'])) ? "heeloo" : "world"; ?></div>
    <div class="main">
        <h3 style="text-align: center;">NOC Letter</h3>
        <hr>
        <div id="letter">
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
                $sql = "SELECT * FROM `ipr_cp_applicant` WHERE `cid`=$id";
                $query = mysqli_query($conn, $sql);
                $i = 1;
                while ($rows = mysqli_fetch_assoc($query)) {
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
            <!-- <p>1. Pallavi Ramanuj Pandey</p> -->

            <?php
            $i = 1;
            $query1 = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($query1)) {
            ?>
                <p><?php echo $i++ . ". " . $rows['name']; ?></p>
            <?php
            }
            ?>
        </div>
        <hr>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['accept'])) {
                $link_document=$_POST['accept_url'];
                $id = $_POST['accept'];
                // $sql = "UPDATE `ipr_copyrights` SET `status`='accepted',`action_by`='" . $_SESSION['user_name'] . "' WHERE `id`=$id";
                $sql = "UPDATE `ipr_copyrights` SET `status`='accepted', `link`='$link_document' WHERE `id`=$id";
                $query = mysqli_query($conn, $sql);
                $row['status'] = "accepted";
                // Notify("You accepted the request");
                PushNotification("You Accepted the Message");
            } else if (isset($_POST['reject'])) {
                $id = $_POST['reject'];
                $reason = $_POST['rejectionMsg'];
                //sql will contain query that will update database to reuject the request
                // $sql = "UPDATE `ipr_copyrights` SET `status`='rejected',`action_by`='" . $_SESSION['user_name'] . "' WHERE `id`=$id";
                $sql = "UPDATE `ipr_copyrights` SET `status`='rejected' WHERE `id`=$id";
                $query = mysqli_query($conn, $sql);
                $sql1 = "INSERT INTO `ipr_cp_reject`(`cp_id`, `reason`) VALUES ($id,'$reason')";
                $query = mysqli_query($conn, $sql1);
                $row['status'] = "rejected";
                PushNotification("You Rejected the Message");
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
                    <h5>This Request is accepted</h5>
                    <button id="printApplication" class="btn" onclick="Letter.print()">Print Application</button>
                <?php
                } else if ($row['status'] == "rejected") {
                ?>
                    <h5>This Request is accepted</h5>
                <?php
                } else {
                    // if ($row['status'] != "accepted"&&$row['status'] != "rejected") { 
                ?>
                    <div id="alert" style="display: none;margin-top:20px; margin-bottom :20px">
                        <div class="col-md-12">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                    <p class="text-center">Are you sure want to accept</p>
                                    <input type="hidden" name="cpRecordId" value="<?php echo $id; ?>">
                                    <textarea name="accept_url" class="form-control" id="accept_url" rows="1" placeholder="URL of document" required></textarea>


                                    <button name="accept" value="<?php echo $id ?>" class="btn btn-danger my-2">Yes</button>
                                    <button id="acceptCancel" class="btn btn-primary  ">Cancel</button>
                                </form>
                                
                            </div>
                    </div>
                    <div class="row">
                        <button id="acceptDialogue" class="btn">Accept</button>
                        <button id="rejectBtn" class="btn">Reject</button>
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
                                <button class="btn btn-primary my-2 mx-3" id="reject" name="reject" value="<?php echo $id ?>" disabled>Reject</button>
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
</body>

</html>