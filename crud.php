<?php 
require_once 'requirements.php';
$result=array(
    'status'=>false,
    'message'=>'Inapporipriate request found contact admin',
    );
if( $_SERVER['REQUEST_METHOD']=='POST'){
    $sql=$_POST['sql'];
    $query=mysqli_query($conn,$sql);
    if($query){
        $result['status']=true;
        $result['message']='Upated successfully';
    }
    else{
        $result['message']='Updation Failed';
    }
    echo json_encode($result);
}
?>