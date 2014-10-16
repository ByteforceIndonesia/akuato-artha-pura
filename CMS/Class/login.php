<?php 
include('db.php');
session_start();
{	
    $user=mysql_real_escape_string($_POST['username']);
    $pass=mysql_real_escape_string($_POST['password']);
    $fetch=mysql_query("SELECT id FROM `users` WHERE 
                         username='$user' and password='$pass'");
    $count=mysql_num_rows($fetch);
    if($count!="")
    {
    $_SESSION['login_username']=$user;
    header("Location:../index.php?admin=2"); 
    }
    else
    {
       header('Location:../index.php');
    }

}
?>