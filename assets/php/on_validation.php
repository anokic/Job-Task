<?php

  // WHEN COMMENT IS SEND ITS SENT FOR VALIDATION HERE
  /// REGULAR EXPRESSION FOR THE USERS THAT ARE COMMENTING
  //// INSERTING DATA AND WAITING FOR FURTHER VALIDATION FROM ADMIN FROM ADMIN PAGE

  session_start();

  if(isset($_POST['btnSubmitComment'])){

    $name = $_POST['comment-name'];
    $email = $_POST['comment-email'];
    $message = $_POST['comment-message'];

    $nameReg = '/[A-z]{0,25}(\s[A-z]{0,25})+/';
    $messageReg = '/[ A-Za-z0-9_@.\/#&+-]*/';

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if(preg_match($nameReg, $name)){
            if(preg_match($messageReg, $message)){

              $query = 'INSERT INTO comments (id, name, email, message, is_checked, is_valid) VALUES (NULL, ?, ?, ?, 0, 0 )';
              include('connection.php');

              $output = $connection->prepare($query);
              $result = $output->execute([$name,$email,$message]);
              header('Location: ../../index.php');
            } else {
                header('Location: ../../index.php');
            }
          } else {
              header('Location: ../../index.php');
          }

      } else {
          header('Location: ../../index.php');
      }

    // } else {
    //   $_SESSION['error'] = 'Error';
    //   header('Location: ../../index.php');
    // }


  }
