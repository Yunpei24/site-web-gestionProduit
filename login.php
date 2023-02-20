<?php
    if(trim($_POST['username'])== null|| trim($_POST['password']) == null){
        echo "<script>alert('Please fill in information.')</script>";
        header("Refresh:0 , url =  index.php");
        exit();

    }
    else{
         require_once "./db.php";
         $username = mysqli_real_escape_string($conn,$_POST['username']);
         $password = mysqli_real_escape_string($conn,md5($_POST['password']));
         $sql = "SELECT username, password FROM user WHERE username ='". $username ."' and password = '".$password."'";
         //$name = "SELECT name FROM user WHERE username ='". $username ."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query , MYSQLI_ASSOC);

         $name = "SELECT name FROM user WHERE username ='". $username ."' and password = '".$password."'";
         $queryn = mysqli_query($conn,$name);
         $resultn = mysqli_fetch_array($queryn , MYSQLI_ASSOC);

         if(!$result){
             echo "<script>alert('Username or Password , Invalid.')</script>";
             header("Refresh:0 , url = logout.php");
             exit();

         }
         else{
             session_start();
             $_SESSION['username'] = $result['username'];
             $_SESSION['name'] = $resultn['name'];;
             header("Location: accueil.php");
             session_write_close();
         }
    }
    mysqli_close($conn);
?>