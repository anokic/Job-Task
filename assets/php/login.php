<?php

  // LOGIN SIMPLE REGEX FOR WORD ADMIN CHECKING FOR ERRORS THEN SENDING BACK TO INDEX OR ADMIN PAGE

  session_start();

  if(isset($_POST['btn-login'])){

    $name = $_POST['email-login'];
    $pass = $_POST['password-login'];

    $admin = '/^admin$/i';
    if(preg_match($admin, $name) && preg_match($admin, $pass)){

      $query = 'SELECT * FROM users WHERE name = ? AND password = ?';
      include('connection.php');

      $output = $connection->prepare($query);
      $result = $output->execute([$name,$pass]);

      if($result){
         $user = $output->fetch(PDO::FETCH_OBJ);

         if($user){
           $_SESSION['user'] = $user;
           $connection = null;
           echo "evo";

           if($user->name == 'admin'){
             header('Location: ../../admin.php');
           }

         } else {
           session_destroy();
           header('Location: ../../index.php');
         }
      }
    } else {
      $_SESSION['error'] = 'Error';
      header('Location: ../../index.php');
    }


  }
