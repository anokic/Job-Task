<?php
session_start();
?>

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
                    <div class="container-fluid"><a class="navbar-brand" href="index.php"><i class="icon ion-ios-infinite" id="brand-logo"></i></a>
                        <div>
                          <?php
                            if (isset($_SESSION['user'])) {
                          ?>
                               <a href="assets/php/logout.php"><button type="button" name="button">Log out</button></a>
                                <h3><?php
                                        echo $_SESSION['user']->name;
                                    ?></h3>
                                    <?php
                                    } else {
                                    ?>
                                   <button class="btn btn-primary" data-toggle="modal" data-target="#modalLogin" type="button">MODAL LOGIN</button>
                                    <?php
                                        if (isset($_SESSION['error'])) {
                                            if ($_SESSION['error'] == 'Error') {
                                    ?>
                                       <h5 style='color: #4c0000;'>Please try again</h5>
                                      <?php
                                              }
                                          }
                                      ?>
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
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Validation</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $query = 'SELECT * FROM comments';

        include('assets/php/connection.php');

        $output = $connection->query($query);
        $result = $output->execute();

        if($result){
          $comments = $output->fetchAll(PDO::FETCH_OBJ);

          if($comments){
            $commentsHtml = '';
            foreach($comments as $comment){

              if($comment->is_valid == 0 && $comment->is_checked == 0){

                $commentsHtml .= '<tr>
                                    <th scope="row">' . $comment->id . '</th>
                                    <td>' . $comment->name . '</td>
                                    <td>' . $comment->email . '</td>
                                    <td class="message-width">' . $comment->message . '</td>
                                    <td>
                                      <form class="admin-comment-valid" action="assets/php/validation.php" method="post">
                                        <button class="accept" name="btn-accept" type="submit">Accept</button>
                                        <button class="decline" name="btn-decline" type="submit">Decline</button>
                                        <input style="display:none" type="text" value="'. $comment->id . '"  name="comment-id" .>
                                      </form>
                                    </td>
                                    </tr>
                              ';
              }

          }

          $commentsHtml .= '</div></div></div>';

          echo $commentsHtml;
        }

        }
        ?>

      </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="assets/js/animated-form-in-a-modalbutton.js"></script>
    <script src="assets/js/Button-modal-ecommerce.js"></script>
    <script src="assets/js/Grid-and-List-view-V10.js"></script>
</body>

</html>
