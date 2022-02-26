<?php
//To display errors (Use this if the php.ini settings is not set)
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

define('hostname', 'localhost');
define('username','root');
define('password','');
define('database','iprc');

$conn = mysqli_connect(hostname, username, password, database);

if (!$conn) {
  Notify("Database connectivity failed contat admin");
  die();
}


// Start session 
if(!session_id()) session_start(); 
 

//To send pop up msg to user
function Notify($message)
{
  echo "<SCRIPT>
        alert('$message');
    </SCRIPT>";
}
//To redirect user after the msg
function RedirectAfterMsg($message, $location)
{
  Notify($message);
  echo "<SCRIPT>window.location = '$location';</SCRIPT>";
}
//To filter the input data
function Filter($data)
{
  return $data;
}

//To execute queries in database
function dbquery($conn, $sql)
{
  return  mysqli_query($conn, $sql);
}

function confirmation($msg)
{
  $x = "<script>
   let x = confirm('$msg');
   </script>";
  return $x;
  //  Notify(var_dump($x));
}

function Alert($msg)
{
  echo "<script>
    alert('$msg');
    document.getElementById('notify').innerHTML='Test';
    </script>";
}

function UploadImage($dir, $fileName)
{
  $target_dir = $dir;/*directory where file will get uploaded*/
  $target_file = $target_dir . basename($_FILES[$fileName]['name']);
  $fileInfo = array(
    "msg" => null,
    "uploadOk" => true,
    "fileName" => ""
  );
  /*Errors that can occur while processing the file it will get stored in ($_FILES[$fileName]['error']*/
  $phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
  );
  //validations
  /*
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $fileInfo["msg"] .= "Only jpg,jpeg and png File Formats are accepted";
    $fileInfo["uploadOk"] = false;
  }
  */
  //Optional validations
  /*
// Check file size
if ($_FILES[$fileName]["size"] > 500000) {
  echo "Sorry, your file is too large.";
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
}
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES[$fileName]["tmp_name"]);
  if ($check !== false) {
    $fileInfo["msg"] .= "The uploaded file is not an image";
    $fileInfo["uploadOk"] = false;
  }
*/
  // Check if $uploadOk is set to 0 by an error
  if ($fileInfo['uploadOk']) {
    if (move_uploaded_file($_FILES[$fileName]['tmp_name'], $target_file)) {
      $fileInfo['fileName'] = htmlspecialchars(basename($_FILES[$fileName]['name']));
    } else {
      $fileInfo['uploadOk'] = false;
      $error = $_FILES[$fileName]['error'];
      $fileInfo['msg'] = $phpFileUploadErrors[$error];
    }
  }

  return $fileInfo;
}
function deleteFile($folder_location, $filename)
{
  if (file_exists($folder_location . $filename)) {
    gc_collect_cycles();
    return unlink($folder_location . $filename);
  } else {
    return false;
  }
}
function UploadFile($conn, $sql, $fileName, $dir)
{
  //to specify the status of the file and execition of the query
  $fileInfo = array(
    "msg" => null,
    "uploadOk" => false,
    "fileName" => ""
  );
    /*Errors that can occur while processing the file it will get stored in ($_FILES[$fileName]['error']*/
    $phpFileUploadErrors = array(
      0 => 'There is no error, the file uploaded with success',
      1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
      2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
      3 => 'The uploaded file was only partially uploaded',
      4 => 'No file was uploaded',
      6 => 'Missing a temporary folder',
      7 => 'Failed to write file to disk.',
      8 => 'A PHP extension stopped the file upload.',
    );
  $image = $_FILES[$fileName]['name'];
  $image_temp = $_FILES[$fileName]['tmp_name'];
  $image_size = $_FILES[$fileName]['size'];
  $image_ext = explode('.', $image);
  $image_ext = strtolower(end($image_ext));
  $allowed = array('jpg', 'jpeg', 'png');
  if (in_array($image_ext, $allowed)) {
    if ($image_size < 5000000) {
      $image = uniqid('', true) . '.' . $image_ext;
      $destination = $dir . $image;
      if(!move_uploaded_file($image_temp, $destination)){
        $fileInfo['msg'] = $_FILES[$fileName]['error'];
        return $fileInfo;
      }
      //Set the file name as #### in the query will sending query to this function
      $sqldb=str_replace("####",$image,$sql);
      $query = mysqli_query($conn, $sqldb);
      if ($query) {
        $fileInfo['uploadOk'] = true;
        $fileInfo['fileName'] = $image;
        $fileInfo['msg'] = "File Uploaded Successfully";
      } else {
        $error = $_FILES[$fileName]['error'];
        $fileInfo['msg'] = $phpFileUploadErrors[$error];
      }
    } else {
      echo "<script>alert('Image size is too large');</script>";
      $error = "Image size is too large";
      $fileInfo['msg'] = $phpFileUploadErrors[$error];
    }
  } else {
    echo "<script>alert('Image type is not supported');</script>";
    $error = 'Image type is not supported';
    $fileInfo['msg'] = $phpFileUploadErrors[$error];
  }
  //filinfo  contains about the data about uploading the file into the db like statua filename,etc
  return $fileInfo;
}

//Push notification will displaed the msg into the div tag with id notification
function PushNotification($msg){
  echo "<script>
  let msg = '$msg';
    let notifyMsg=(msg)=>{
      console.warn(msg);
        let notifyAt=document.querySelector('#notification')
        notifyAt.innerHTML=msg;
        setTimeout(()=>{
            notifyAt.innerHTML='';
        },5000);
    }
    notifyMsg(msg);
    </script>";
}