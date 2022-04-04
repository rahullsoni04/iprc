<?php
require_once 'requirements.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/query.css?v=<?php echo time(); ?>">
  <title>Query</title>
</head>

<body>

  <!-- Navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <div class="logo">
        <img src="/images/IPR logo.png">
      </div>&nbsp;
      &nbsp;<a class="navbar-brand" href="#">SAKEC IPR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Query</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#">
              Events
            </a>

          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#">
              Our Team
            </a>

          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#">
              Contact Us
            </a>

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
    <h2>Query</h2>
    <div class="row">
      <div class="main-buttons">
        <button type="button" class="btn"><i class="fas fa-arrow-left"></i>&nbsp; Back</button>
        <button type="button" class="btn" onclick="<?php echo "window.location='queryReplyLog.php'" ?>"><i class="fas fa-file-alt"></i>&nbsp; Log</button>
      </div>
    </div>
    <div class="table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Query</th>
            <th scope="col">Reply</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

          <!-- <tr>
            <td>1</td>
            <td></td>
            <td></td>
            <td></td>
            <td><button type="button" class="btn"><i class="far fa-comment-dots"></i>&nbsp; Reply</button></td>
            <td><button type="button" class="btn"><i class="far fa-trash-alt"></i>&nbsp; Delete</button></td>

          </tr> -->
          <?php
          $id = 1;
          $sql = "SELECT * FROM `ipr_contact_us` WHERE replyStatus=0";
          $query = mysqli_query($conn, $sql);
          if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
              $rid = $row['id'];
          ?>
              <tr>
                <td><?php echo $id++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['emailId']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['query']; ?></td>
                <td>
                  <div id="<?php echo 'reply' . $id; ?>">
                    <button type="button" name="<?php echo 'reply' . $id; ?>" onClick="<?php echo 'addTextArea(' . $id . ');'; ?>" class="btn">Reply</button>
                  </div>
                  <div id="<?php echo 'textArea' . $id; ?>" style="display : none;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                      <textarea rows='5' cols='50' name='Msg'></textarea>
                      <br>
                      <input type="hidden" name="reply_id" value="<?php echo $id; ?>">
                      <button type="submit" name="<?php echo 'send' . $id; ?>" class="btn btn-success">Send</button>

                      <button type="button" onClick="<?php echo 'addTextArea(' . $id . ');'; ?>" class="btn btn-danger">Cancel</button>
                    </form>
                    <?php
                    if (isset($_POST['send' . $id])) {
                      $msg = $_POST['Msg'];
                      
                      $sql5 = "update ipr_contact_us set replyMsg='$msg',replyStatus='1' where id = '$rid';";
                      mysqli_query($conn, $sql5);
                      echo "<script>alert('Query replied'); window.location='query.php'</script>";
                    }
                    ?>

                  </div>
                </td>
                <td>
                  <form method="POST"><button type="submit" name="<?php echo 'delete' . $id; ?>" class="btn"><i class="far fa-trash-alt"></i>&nbsp; Delete</button></form>
                </td>
              </tr>
          <?php
              if (isset($_POST['delete' . $id])) {
                $sql6 = "DELETE FROM `ipr_contact_us` WHERE id = $rid";
                mysqli_query($conn, $sql6);
                echo "<script>window.location='query.php'</script>";
              }
            }
          }
          ?>

        </tbody>
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
  </script>

  <script>
    function addTextArea(textID) {
      var x = document.getElementById('textArea' + textID);
      if (x.style.display == 'none') {
        x.style.display = 'block';
      } else {
        x.style.display = 'none';
      }
    }
  </script>

</body>

</html>