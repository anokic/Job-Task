<?php

  // LOGING THE USER OF
  // THERE IS ONLY ONE USER THE ADMIN

  session_start();
  session_destroy();
  header('Location: ../../index.php');
