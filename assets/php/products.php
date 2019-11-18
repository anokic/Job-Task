<?php
  // PRODUCTS FOR INDEX PAGE
  $query = 'SELECT * FROM items';

  include('assets/php/connection.php');

  $output = $connection->query($query);
  $result = $output->execute();

  if($result){
    $products = $output->fetchAll(PDO::FETCH_OBJ);

    if($products){
      $html = '<div class="margin-bottom-grid">
                  <div class="container-fluid">';
      foreach($products as $index => $product){

      if(!($index % 3)){

          if($index > 2){
            $html .= '</div>';
          }

          $html .= '<div class="row margin-bottom-grid">';
      }

      $html .= '
                <div class="col-md-4 competencesboxes"><img src="' . $product->image_src . '" style="width: 220px;">
                     <h1 class="competencestitles"><strong>' . $product->product_title . '</strong></h1>
                     <p class="competencesparagraph">' . $product->description . '</p><i class="far fa-square squareicons"></i>
                 </div>
              ';


    }
    $html .= '</div></div></div>';

    echo $html;
  }

  }
