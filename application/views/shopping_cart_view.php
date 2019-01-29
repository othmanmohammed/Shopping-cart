<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <br><br>
      <div class="col-lg-6 col-md-6">
        <div class="table-responsive">
          <h3 align="center">Shopping cart</h3> <br>
          <?php
          foreach ($product as $row) {
            echo '

              <div class="col-md-4" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc;
              margin-bottom:20px; height:400px" align:"center">

                <img src="'.base_url(). 'assets/images/' .$row->product_image.'" class="img-thumbnail"> <br>

                <h4>'.$row->product_name.'</h4>

                <h3 class="text-danger">$ '.$row->product_price.'</h3>

                <input type="text" name="quantity" class="quantity" id="'.$row->product_id.'" >

                <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->product_name.'
                "data-productid="'.$row->product_id.'" data-productprice="'.$row->product_price.'">Add to cart</button>

              </div>
            ';
          }
          ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div id="cart_details">
          <h3 align="center">Cart is empty</h3>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
  $(document).ready(function(){

    $('.add_cart').click(function(){
    // we are checking if the button of class add to cart is CLICKED and if it is then the funtion will be executed
      var product_id       = $(this).data("productid");
      var product_name     = $(this).data("productname");
      var product_price    = $(this).data("productprice");
      var quantity = $('#' + product_id).val();

      if (quantity !='' && quantity > 0 ) {
        $.ajax({

          url:"<?php echo base_url(); ?>index.php/shopping_cart/add",
          method:"POST",
          data:{product_id:product_id, product_name:product_name,
             product_price:product_price, quantity:quantity},

          success:function(data){
            alert("Successfuly added in the cart");
            console.log(data);

            $('#cart_details').html(data);
            $('#' + product_id).val('');
          }
        });
      } else {
        alert("Please Enter quantity");
      }
    });
    $('#cart_details').load("<?php base_url(); ?>index.php/shopping_cart/load");
  });
</script>
