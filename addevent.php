<?php
require_once 'requirements.php';
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
    <link rel="stylesheet" href="css/addevent.css?php echo time(); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Add Event</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
        // $banner = file_get_contents($_FILES['banner']['name']);
        $banner = 1;
        $title = $_POST['title'];
        $description = $_POST['description'];
        $venue = $_POST['venue'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];
        $reg_link = $_POST['reg_link'];


        $event_sql = "INSERT INTO `ipr_events`(`title`, `description`, `from_date`, `to_date`, `from_time`, `to_time`, `venue`, `banner`, `reg_link`, `status`) 
                                        VALUES ('$title','$description','$from_date','$to_date','$from_time','$to_time','$venue','$banner','$reg_link','0')";
        $event_query = mysqli_query($conn, $event_sql);

        $event_id = mysqli_insert_id($conn);

        if (isset($_POST['name'])) {
            $cord_type = $_POST['type'];
            $cord_contact = $_POST['contact'];
            $cord_name = $_POST['name'];
            for ($i = 0; $i < count(array($cord_name)); $i++) {
                if ($cord_name[$i] != "" && $cord_contact[$i] != "" && $cord_type[$i] != "") {
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

                <p> Event Banner :
                <div class="button-wrap">

                    <label class="button" for="upload">Upload File</label>
                    <input id="upload" type="file" name="banner" required></p>
                </div>
            </div>

            <div class="spacer" style="height: 20px;"></div>
            <p>Event Title :
                <input type="text" class="txt" placeholder="Enter Title" name="title" required>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <p>Event Description :
                <textarea placeholder="Write description here..." rows="20" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" name="description" required></textarea>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <p>Venue :
                <textarea placeholder="Venue of the event..." rows="15" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" name="venue" required></textarea>
            </p>
            <div class="spacer" style="height: 20px;"></div>
            <p>Event Start Date :
                <input type="date" class="txt" name="from_date" required>
            </p>
            <div class="spacer" style="height: 20px;"></div>

            <p>Event End Date :
                <input type="date" class="txt" name="to_date" required>
            </p>
            <div class="spacer" style="height: 20px;"></div>

            <p>Start Time :
                <input type="time" class="txt" name="from_time" required>
            </p>
            <div class="spacer" style="height: 20px;"></div>


            <p>End Time :
                <input type="time" class="txt" name="to_time" required>
            </p>

            <div id="newRow"></div>
            <button id="addCord" type="button" class="btnp">Add Coordinator</button>

            <div class="spacer" style="height: 40px;"></div>

            <div id="newRowspeaker"></div>
            <button id="addSpeak" type="button" class="btnp">Add Speaker</button>

            <div class="spacer" style="height: 40px;"></div>
            <p>Registeration Link : <input type="url" placeholder="Enter Link" class="txt" name="reg_link"></p>
            <button class="btnp" name="submit">Submit</button>
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
            // count++;
            var html = '';

            html += `<div id="inputFormRow">
                    <hr><h5>Coordinator Details</h5><hr>
                        <div class="form__group field"><p>Coordinator Type : 
                        <select id="type_coordinator" class="txt form__field" name="type" required>
                            <option value="" disabled selected hidden>Select your Type</option>
                            <option value="Author" style="color:black;">Staff</option>
                            <option value="Applicant" style="color:black;">Student</option>                            
                        </select></p>
                        </div>
                        <div class="form__group field">
                            <p>Phone Number : <input type="input" name="contact" class="txt form__field" placeholder="Phone Number" autocomplete="off" required></p>
                        </div>
                        <div class="form__group field">
                            
                            <p>Contact Name : <input type="input" name="name" class="txt form__field" placeholder="Contact Name" autocomplete="off" required></p>
                            
                        </div>

                        <div class="input-group-append mb-3">                
                            <button id="removeRow" type="button" class="btnp" >Remove</button>
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
            // count++;
            var html = '';

            html += `<div id="inputFormRow">
        <hr><h5>Speaker Details</h5><hr>
                <div class="form__group field">
                    <p> Name of Speaker : <input type="text" name="speaker_name" placeholder="Speaker Name" class="txt" required></p><br><br>
                    </div>

                <div class="form__group field">
                <p> Designation of Speaker : 
                    <input type="input" name="designation" class="txt form__field" placeholder="Speaker Description" autocomplete="off" required>
                </div></p>

                <div class="container-upload">
                <div> 
                <p> Speaker Image :         
                <label class="button" for="upload">Upload File</label>
                <input id="upload" type="file" class="img" ></p>
                </div> 
                </div>

                <div class="form__group field">
                <p> Speaker Description : 
                    <input type="input" name="description" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off" required>
                </div></p>

                <div class="form__group field">
                <p> Speaker Email : 
                    <input type="email" name="email" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off"required>
                </div></p>

                <div class="form__group field">
                <p> Speaker LinkedIn : 
                    <input type="url" name="linkedin" class="txt form__field" placeholder="Speaker LinkedIn" autocomplete="off" required>
                </div></p>

                <div class="form__group field">
                <p> Speaker Facebook : 
                    <input type="text" name="facebook" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off">
                </div></p>

                <div class="form__group field">
                <p> Speaker Instagram : 
                    <input type="text" name="instagram" class="txt form__field" placeholder="Designation of Speaker" autocomplete="off">
                </div></p>

                <div class="input-group-append mb-3">                
                    <button id="removeRow" type="button" class="btnp" >Remove</button>
                </div>
                </div> `

            $('#newRowspeaker').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
            countSpeak--;
        });
    </script>


    </script>

</body>

</html>