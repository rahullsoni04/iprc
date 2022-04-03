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
    <div class="text-center content">
        <h2>Users</h2>
        <div class="row">
          
        </div>
        <div class="table">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>                
                <th scope="col">Department</th> 
                <th scope="col">Reg No.</th> 
                <th scope="col">Role</th>                                                              
              </tr>
            </thead>
            <tbody>
            <?php
          $sql = "SELECT * FROM `ipr_users`";
          $query = mysqli_query($conn, $sql);
          if (mysqli_num_rows($query) > 0) {
            $i=1;
            while ($row = mysqli_fetch_assoc($query)) {              
          ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email_id']; ?></td>                    
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['reg_no']; ?></td>                           
                    <td><select>
                      <?php 
                        $role_sql = "SELECT * FROM `ipr_role` WHERE `id`=".$row['role'];
                        $role_query = mysqli_query($conn, $role_sql);
                        $role_row = mysqli_fetch_assoc($role_query);
                      ?>
                        <option value="none" selected disabled hidden><?php echo $role_row['role']; ?></option>
                        <option value="staff">Staff</option>
                        <option value="cord">Cordinator</option>
                        <option value="student">Student</option>
                    </select></td>
                  </tr>
                  <?php }
                  } ?>
                </tbody>
            </table>
          </div>
</body>
</html>                