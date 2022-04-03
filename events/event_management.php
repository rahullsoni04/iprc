<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/event_management.css">
  <title>Event Management</title>
</head>

<body>
  <?php
  require_once '../requirements.php';
  ?>
  <!-- Navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <div class="logo">
        <img src="../images/IPR logo.png">
      </div>&nbsp;
      &nbsp;<a class="navbar-brand" href="#">SAKEC IPR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Manage Event</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addevent.html">
              Add Event
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="index.php"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
          </li>
        </ul>
        <form class="example" action="action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </nav>

  <!-- navbar ends -->

  <div class="text-center content">
    <h2>Event Management</h2>
    <div id="notification"></div>
    <div class="row">
      <div class="main-buttons">
        <div class="table">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Event Date</th>
                <th scope="col">Live</th>
                <th scope="col">Feedback</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <?php
            function Edit($sql, $conn)
            {
              $status = "";
            }
            ?>
            <?php
            $sql = "SELECT * FROM `ipr_events` order by `from_date` and `from_time`";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tbody>
                <tr>
                  <td> <a href="admin_eventdetails.php"> <?php echo $row["title"]; ?> </a></td>

                  <td><?php echo (strtotime($row["from_date"]) == strtotime($row["to_date"])) ? ($row["from_date"]) : ($row["from_date"]) . " to " . ($row["to_date"]); ?> </td>
                  <td>
                    <?php
                    //Below btn works through ajax check below jquery code and crud.php page for more details
                    //Caution : do not modify id,value and class
                    ?>
                    <button type="button" value="<?php echo $row["status"]  ?>" id="<?php echo $row["id"]; ?>" class="btn btn-success live"><i class="fa-solid fa-signal-stream"></i>&nbsp; <?php echo (($row["status"]) ? "Disable" : "Enable");  ?></button>
                  </td>
                  <td>
                    <button type="button" name="<?php echo $row["id"]; ?>" value="<?php echo $row["feedback"]; ?>" id="feedback<?php echo $row["id"]; ?>" class="btn btn-success feedback <?php echo "feedback".$row["id"]; ?>"><i class="fa-solid fa-signal-stream"></i>&nbsp;<?php echo (($row["feedback"]) ? "Disable" : "Enable");  ?></button>
                  </td>
                  <td>
                    <button type="submit" name="" class="btn btn-danger"><i class="far fa-trash-alt"></i>&nbsp; Delete</button>
                  </td>
                </tr>
              </tbody>
            <?php
            }
            ?>
          </table>
        </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(function() {
          $(document).scroll(function() {
            var $nav = $(".bg-dark");
            var $navbtn = $(".btn-outline-info");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            $navbtn.toggleClass('scrolled', $(this).scrollTop() > $navbtn.height());
          });
        });

        function addTextArea(textID) {
          var x = document.getElementById('textArea' + textID);
          if (x.style.display == 'none') {
            x.style.display = 'block';
          } else {
            x.style.display = 'none';
          }
        }
        $(document).ready(function() {
          $('.live').click(function() {
            let id = $(this).attr('id');
            let value = document.getElementById(id).value;
            console.log(document.getElementById(id).value);
            let sql = (value == 1) ? "UPDATE `ipr_events` SET `status`=0 WHERE `id`=" + id : "UPDATE `ipr_events` SET `status`=1 WHERE `id`=" + id;
            $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: {
                'id': $(this).attr('id'),
                'sql': sql,
              },
              success: function(response) {
                let result=JSON.parse(response);
                if(result.status){
                  document.getElementById(id).value = ((value == 1) ? 0 : 1);
                  document.getElementById(id).innerText = ((value == 0) ? "Disable" : "Enable");
                }
                let notifyAt = document.querySelector('#notification')
                notifyAt.innerText = result.message;
                setTimeout(() => {
                  notifyAt.innerText = '';
                }, 3000);
              }
            });
          });
          $('.feedback').click(function() {
            //event id
            let id = $(this).attr('name');
            let value = $(this).attr('value');
            console.log(document.getElementById("feedback"+id).value);
            let sql = (value == 1) ? "UPDATE `ipr_events` SET `feedback`=0 WHERE `id`=" + id : "UPDATE `ipr_events` SET `feedback`=1 WHERE `id`=" + id;
            // console.log(sql);
            $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: {
                'id': $(this).attr('id'),
                'sql': sql,
              },
              success: function(response) {
                let result=JSON.parse(response);
                if(result.status){
                  document.getElementById("feedback"+id).innerText = ((value == 0) ? "Disable" : "Enable");
                  document.getElementById("feedback"+id).value = ((value == 1) ? 0 : 1);
                  console.log(document.getElementById("feedback"+id).value);
                }
                let notifyAt = document.querySelector('#notification')
                notifyAt.innerText = result.message;
                setTimeout(() => {
                  notifyAt.innerText = '';
                }, 3000);
              }
            });
          });
        });
      </script>

</body>

</html>