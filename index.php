<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow:300,400,500,600,700,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animated-form-in-a-modalbutton-1.css">
    <link rel="stylesheet" href="assets/css/animated-form-in-a-modalbutton-2.css">
    <link rel="stylesheet" href="assets/css/animated-form-in-a-modalbutton-3.css">
    <link rel="stylesheet" href="assets/css/animated-form-in-a-modalbutton-4.css">
    <link rel="stylesheet" href="assets/css/animated-form-in-a-modalbutton.css">
    <link rel="stylesheet" href="assets/css/Button-modal-ecommerce-1.css">
    <link rel="stylesheet" href="assets/css/Button-modal-ecommerce.css">
    <link rel="stylesheet" href="assets/css/Comment.css">
    <link rel="stylesheet" href="assets/css/Competences-Grid---3-Columns---Hover-Effect-Float-Up.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="assets/css/Pulse-Button-on-Hover-1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section>
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-dark navbar-expand-md" id="app-navbar">
                    <div class="container-fluid"><a class="navbar-brand" href="#"><i class="icon ion-ios-infinite" id="brand-logo"></i></a>
                        <div>
                          <?php
                            if(isset($_SESSION['user'])){
                              ?>
                                <a href="assets/php/logout.php"><button type="button" name="button">Log out</button></a>
                                <a href="admin.php"><h3><?php echo $_SESSION['user']->name ?></h3></a>
                              <?php
                            } else {
                                ?>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalLogin" type="button">MODAL LOGIN</button>
                                    <?php if( isset($_SESSION['error'])){  if($_SESSION['error'] == 'Error'){
                                      ?>
                                        <h5 style='color: #4c0000;'>Please try again</h5>
                                      <?php
                                    } } ?>
                                <?php
                            }
                          ?>
                            <div class="modal fade" role="dialog" tabindex="-1" id="modalLogin">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-primary"><i class="fa fa-edit"></i>&nbsp;LOGIN</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                            <form class="form-inline p-4" method="post" action="assets/php/login.php">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><input class="form-control" type="text" name="email-login" placeholder="name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><input class="form-control" type="password" name="password-login" placeholder="password" style="margin-left: 5px;"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row" style="margin-top: 10px;">
                                                    <div class="col">
                                                        <div class="form-group"><button class="btn btn-primary btn-block" name='btn-login' type="submit" style="margin-top: 5px;">SING IN</button></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <section class="grid-system">

      <?php  include('assets/php/products.php'); ?>

    </section>
    <div class="row"><div class="container">
	<h2 class="text-center comment">Comments</h2>

  <?php include('assets/php/comments.php'); ?>

</div>
        <div class="col">
            <section class="d-flex flex-column justify-content-center align-items-center">
                <form method='post' action='assets/php/on_validation.php' class="d-flex flex-column" style="height: 317px;background: transparent;width: 77%;">
                    <div class="form-row width-100">
                        <div class="col">
                            <h1 class="text-left" style="font-family: Barlow, sans-serif;color: rgb(227,65,65);padding-left: 0px;">Add a comment</h1>
                        </div>
                        <?php
                          if(isset($_SESSION['comment_error'])){
                            ?>
                            <div class="col">
                                <h1 class="text-left" style="font-family: Barlow, sans-serif;color: rgb(227,65,65);padding-left: 0px;">Error in typing comment</h1>
                            </div>
                            <?php
                          }
                        ?>
                    </div>
                    <div class="form-row width-100">
                        <div class="col d-flex" style="margin-top: 0px;">
                          <input name='comment-name'  class="form-control password" type="text" placeholder="Name">
                          <input name='comment-email' style="margin-left: 96px;"  class="form-control" type="text" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row width-100">
                        <div class="col">
                          <textarea name='comment-message'  class="form-control" style="height: 76px;margin-top: 20px;" placeholder="Comment"></textarea>
                        </div>
                    </div>
                    <div class="form-row baseline"><div>
                      <input type="submit" name="btnSubmitComment" value="Comment" class=pulseBtn>
              </div></div>
                </form>
            </section>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="assets/js/animated-form-in-a-modalbutton.js"></script>
    <script src="assets/js/Button-modal-ecommerce.js"></script>
    <script src="assets/js/Grid-and-List-view-V10.js"></script>
</body>

</html>
