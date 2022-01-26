<?php
//To display errors (Use this if the php.ini settings is not set)
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'iprc';
$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
  Notify("Database connectivity failed contat admin");
  die();
}
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

 function confirmation($msg){
   $x="<script>
   let x = confirm('$msg');
   </script>";
   return $x;
  //  Notify(var_dump($x));
 }

 function Alert($msg){
    echo "<script>
    alert('s');
    document.getElementById('notify').innerHTML='Test';
    </script>";
 }

//  To create word from html
// https://phppot.com/javascript/how-to-export-html-to-word-document-with-javascript/