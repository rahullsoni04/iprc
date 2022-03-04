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
  <title>IPR</title>
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
<?php
if(isset($_POST['addnews'])){
  $headline=$_POST['headline'];
  $link=$_POST['link'];
  echo $headline;
  $sql="INSERT INTO `ipr_news`(`headlines`, `links`) VALUES ('$headline','$link')";
  mysqli_query($conn,$sql);
  echo "<script>window.location='news.php'</script>";
}
?>
  <div class="text-center content">
    <h2>Manage News</h2>
    <button class="btn my-2" id="add_news" onclick="add_news()">Add</button>
    <div id="addsection" style="display : none;">
      <div class=" offset-md-4 col-md-4">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
          <div class="form-row">
            <div class="col my-2">
              <input type="text" class="form-control" placeholder="Headline" name="headline">
            </div>
            <div class="col my-2">
              <input type="text" class="form-control" placeholder="Link" name="link">
            </div>
          </div>
          <button id="addnews" class="btn btn-primary my-2 " name="addnews">Submit</button>
        </form>
      </div>
    </div>
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
    <div class="table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">Headlines</th>
            <th scope="col">Date</th>


            <th scope="col">Live</th>
            <th scope="col">Dislive</th>
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
          $sql = "SELECT * FROM `ipr_news`";
          $query = mysqli_query($conn, $sql);
          if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
              $rid = $row['id'];
          ?>
              <tr>
                <td><?php echo $id++; ?></td>
                <td><?php echo $row['headlines']; ?></td>
                <td><?php echo $row['date']; ?></td>

                <td>
                  <form method="POST"><button type="submit" name="<?php echo 'live'. $id; ?>" class="btn" >Live</button></form>

                </td>
                <td>
                  <form method="POST"><button type="submit" name="<?php echo 'dislive' .$id; ?>" class="btn">Dislive</button></form>

                </td>

                <td>
                  <form method="POST"><button type="submit" name="<?php echo 'delete' . $id; ?>" class="btn"><i class="far fa-trash-alt"></i>&nbsp; Delete</button></form>
                </td>
              </tr>
          <?php

              if (isset($_POST['delete' . $id])) {
                $sql6 = "DELETE FROM `ipr_news` WHERE id = $rid";
                mysqli_query($conn, $sql6);
                echo "<script>window.location='news.php'</script>";
              } elseif (isset($_POST['live' . $id])) {
              
                $sql = "UPDATE `ipr_news` SET`live`='yes' WHERE id=$rid";
                mysqli_query($conn, $sql);
                echo "<script>window.location='news.php'</script>";
              
              }
              elseif(isset($_POST['dislive' . $id])){
                $sql = "UPDATE `ipr_news` SET`live`='no' WHERE id=$rid";
                mysqli_query($conn, $sql);
                echo "<script>window.location='news.php'</script>";

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
    function add_news() {
      var x = document.getElementById('addsection');
      if (x.style.display == 'none') {
        x.style.display = 'block';
      document.getElementById('add_news').innerText="Cancel";
      } else {
        x.style.display = 'none';
        document.getElementById('add_news').innerText="Add";
      }
    }
    
  
  </script>

</body>

</html>