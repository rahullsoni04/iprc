<?php
require_once '../requirements.php';
// Admin role to be added here
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
    <link rel="stylesheet" href="../css/addevent.css?v=<?php echo time(); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Add Event</title>
</head>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <div class="logo">
        <img src="../images/IPR logo.png">
      </div>&nbsp;
      &nbsp;<a class="navbar-brand" href="../index.php">SAKEC IPR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
       
       
          <li class="nav-item ">
            <a class="nav-link " href="event_management.php"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
          </li>
        </ul>
     
      </div>
    </div>
  </nav>

  <!-- navbar ends -->
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        $banner = file_get_contents($_FILES['banner']['tmp_name']);
        // $banner = 1;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $venue = $_POST['venue'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];
        $reg_link = $_POST['reg_link'];
        $event_sql = "INSERT INTO `ipr_events`(`title`, `description`, `from_date`, `to_date`, `from_time`, `to_time`, `venue`, `banner`, `reg_link`, `status`) VALUES ('$title','$description','$from_date','$to_date','$from_time','$to_time','$venue','$banner','$reg_link','0')";
        $event_query = mysqli_query($conn, $event_sql);
        echo $event_sql;
        $event_id = mysqli_insert_id($conn);
        Notify("Event Added Successfully $event_sql $event_id");

        if (isset($_POST['name'])) {
            $cord_type = $_POST['type'];
            $cord_contact = $_POST['contact'];
            $cord_name = $_POST['name'];
            for ($i = 0; $i < count(array($cord_name)); $i++) {
                if ($cord_name[$i] !== "" && $cord_contact[$i] !== "" && $cord_type[$i] !== "") {
                    $cord_sql = "INSERT INTO `ipr_event_coordinator`(`event_id`, `name`, `contact`, `type`)
                                                    VALUES ('$event_id','$cord_name[$i]','$cord_contact[$i]','$cord_type[$i]')";
                    $cord_query = mysqli_query($conn, $cord_sql);
                }
            }
        }

        if (isset($_POST['speaker_name'])) {
            $speak_name = $_POST['speaker_name'];
            $designation = $_POST['designation'];
            $speak_img = 1;
            // $speak_img = file_get_contents($_FILES['img']);
            $speak_description = $_POST['description'];
            $speak_email = $_POST['email'];
            $linkedin = $_POST['linkedin'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            for ($i = 0; $i < count(array($speak_name)); $i++) {
                $speak_sql = "INSERT INTO `ipr_speakers`(`event_id`, `name`, `designation`, `description`, `email`, `linkedin`, `facebook`, `instagram`, `img`)
                                        VALUES ('$event_id','$speak_name[$i]','$designation[$i]','$speak_description[$i]','$speak_email[$i]','$linkedin[$i]','$facebook[$i]','$instagram[$i]','0')";
                $speak_query = mysqli_query($conn, $speak_sql);
            }
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="container my-4 new-section">
            <div class="text-center heading">
                <h2>Add a New Event</h2>
            </div>
            <hr>
            <div class="spacer" style="height: 20px;"></div>
            <div class="container-upload">
                <p> Event Banner :</p>
                <div class="button-wrap">
                    <label class="button" for="upload">Upload File</label>
                    <input id="upload" type="file" name="banner" accept="image/*" style="display: none;" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0">
                    <p> Event Title :</p>
                </div>
                <div class="col ps-0">
                    <input type="text" class="txt" placeholder="Enter Title" name="title" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">Event Description :</p>
                </div>
                <div class="col ps-0">
                    <textarea placeholder="Write description here..." rows="1" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" name="description" required></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">Venue :</p>
                </div>
                <div class="col ps-0">
                    <textarea placeholder="Venue of the event..." rows="1" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" name="venue" required></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">Event Start Date :</p>
                </div>
                <div class="col ps-0">
                    <input type="date" class="txt" name="from_date" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">Event End Date :</p>
                </div>
                <div class="col ps-0">
                    <input type="date" class="txt" name="to_date" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">Start Time :</p>
                </div>
                <div class="col ps-0">
                    <input type="time" class="txt" name="from_time" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">End Time :</p>
                </div>
                <div class="col ps-0">
                    <input type="time" class="txt" name="to_time" required>
                </div>
            </div>
            <div class="my-3" id="newRow"></div>
            <button id="addCord" type="button" class="btnp mb-3">Add Coordinator</button>
            <div id="newRowspeaker"></div>
            <button id="addSpeak" type="button" class="btnp">Add Speaker</button>
            <div class="row mt-3">
                <div class="col-auto pe-0 align-self-center">
                    <p class="mb-0">Registeration Link :</p>
                </div>
                <div class="col ps-0">
                    <input type="url" placeholder="Enter Link" class="txt" name="reg_link">
                    <button class="btnp" name="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="plugins/slick-master/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        // Add Coordinator  
        let count = 0;
        $("#addCord").click(function() {
            var html = '';
            // count++;
            html += `
                <div id="inputFormRow">
                <hr>
                <div class="row">
                    <div class="col pe-0 align-self-center">
                        <h5 class="mb-0">Coordinator Details</h5>
                    </div>
                    <div class="col-auto">
                        <div class="input-group-append ">
                            <button id="removeRow" type="button" class="btnp">Remove</button>
                        </div> 
                    </div>
                </div>
                <hr>
                <div class="form__group field">
                    <p>
                        Coordinator Type :
                        <select id="type_coordinator" class="txt form__field" name="type" required>
                            <option value="" disabled selected hidden>Select your Type</option>
                            <option value="Author" style="color:black;">Staff</option>
                            <option value="Applicant" style="color:black;">Student</option>
                        </select>
                    </p>
                </div>
                <div class="form__group field">
                    <p>Phone Number : <input type="input" name="contact" class="txt form__field" placeholder="Phone Number" autocomplete="off" required></p>
                </div>
                <div class="form__group field">
                    <p>Contact Name : <input type="input" name="name" class="txt form__field" placeholder="Contact Name" autocomplete="off" required></p>
                </div>
                
            </div>`
            $('#newRow').append(html);
        });
        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
            count--;
        });
        // Add speakers
        let countSpeak = 0;
        $("#addSpeak").click(function() {
            var html = '';
            // count++;
            html += `
                <div id="inputFormRow">
                <hr>
                <h5>Speaker Details</h5>
                <hr>
                <div class="form__group field">
                    <p> Name of Speaker : <input type="text" name="speaker_name" placeholder="Speaker Name" class="txt" required></p>
                    <br>
                    <br>
                </div>
                <div class="form__group field">
                    <p> Designation of Speaker :
                        <input type="input" name="designation" class="txt form__field" placeholder="Speaker Description" autocomplete="off" required>
                    </p>
                </div>
                <div class="container-upload">
                    <p> 
                        Speaker Image :
                        <label class="button" for="upload${count}">Upload File</label>
                        <input id="upload${count}" type="file" class="img">
                    </p>
                </div>
                <div class="form__group field">
                    <p> 
                        Speaker Description :
                        <input type="input" name="description" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off" required>
                    </p>
                </div>
                <div class="form__group field">
                    <p> 
                        Speaker Email :
                        <input type="email" name="email" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off" required>
                    </p>
                </div>
                <div class="form__group field">
                    <p> 
                        Speaker LinkedIn :
                        <input type="url" name="linkedin" class="txt form__field" placeholder="Speaker LinkedIn" autocomplete="off" required>
                    </p>
                </div>
                <div class="form__group field">
                    <p> 
                        Speaker Facebook :
                        <input type="text" name="facebook" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off">
                    </p>
                </div>
                <div class="form__group field">
                    <p> 
                        Speaker Instagram :
                        <input type="text" name="instagram" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off">
                    </p>
                </div>
                <div class="input-group-append mb-3">
                    <button id="removeRow" type="button" class="btnp">Remove</button>
                </div>
            </div>`
            $('#newRowspeaker').append(html);
        });
        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
            countSpeak--;
        });
    </script>
</body>

</html>