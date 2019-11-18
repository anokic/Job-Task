<?php

  // CATHING DATA FROM DATABASE AND CREATING HTML WITH INFORMATION FROM DATABASE INDEX.PHP IS CATHING DATA FROM HERE

  $query = 'SELECT * FROM comments';

  include('assets/php/connection.php');

  $output = $connection->query($query);
  $result = $output->execute();

  if($result){
    $comments = $output->fetchAll(PDO::FETCH_OBJ);

    if($comments){
      $commentsHtml = '<div class="margin-bottom-grid">
                        <div class="container-fluid center-fluid">';
      foreach($comments as $comment){

        if($comment->is_valid == 1 && $comment->is_checked == 1){

          $commentsHtml .= ' <div class="card comment-container">
                                <div class="card-body">
                                    <div class="row comment-div">
                                        <div class="col-md-2">
                                            <div class="collumn-comment">
                                              <h4 class="comment-name">' . $comment->name . '</h4>
                                              <p style="font-weight: bold" class="comment-name">' . $comment->email . '</p>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                           <div class="clearfix"></div>
                                            <p class="comment-text">' . $comment->message . '</p>
                                            <p>
                                           </p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            ';

        }


    }

    $commentsHtml .= '</div></div></div>';

    echo $commentsHtml;
  }

  }
