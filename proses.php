<?php
session_start();
    if($_GET['proses']=='login'){
        $user=$_POST['username'];
    $pass=$_POST['pass'];
    $data=array(array('Admin','123','Admin'),
    array('Alvin','123','Customer'));
                $x=0;
    for($i=0;$i<count($data);$i++){
            if($user==$data[$i][0]&& $pass==$data[$i][1]){
                 $username=$data[$i][0];
                 $status=$data[$i][2];
                 $_SESSION['status']=$data[$i][2];
                $x++;
            }
    }
    if($x>0){
        header('location:index.php');
    }else{
        header('location:error.php');
    }
    }
?>