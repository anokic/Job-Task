<?php

  // DATABASE CONNECTION

  try {
    $connection = new PDO('mysql:host=localhost;dbname=juniorPHP', 'root', '');
  }
  catch (PDOException $e){
    echo $e->getMessage();
  }
