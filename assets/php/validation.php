<?php

  // WHEN ADMIN CLICKS ONE OF THE CLICKS IT SENDS THE USERS MESSAGE FOR ACCEPT OR DECLINE
  session_start();



    if(isset($_POST['btn-accept'])){
        $query = "UPDATE comments SET is_checked = 1, is_valid = 1 WHERE id = ?";
        connect($query);

    } elseif(isset($_POST['btn-decline'])){
        $query = "UPDATE comments SET is_checked = 1, is_valid = 0 WHERE id = ?";
        connect($query);
    }


function connect($query){

  $id = $_POST['comment-id'];
  include('connection.php');
  $output = $connection->prepare($query);
  $result = $output->execute([$id]);
  header('Location: ../../admin.php');
}
