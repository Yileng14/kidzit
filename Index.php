<?php
  include('header.php');
?>

<style>
      h1 
      {
        text-align: center;
        padding: 10px;
      }
      h2
      {
            letter-spacing: 5px;
    font-family: 'Candara';
    font-size: 23px;
      }

      .container p {
        letter-spacing: 2.5px;
      }
      /* hr */

      hr.pacman {
  border: 0;
  height: 25px;
  background-image: url('http://www.formget.com/wp-content/uploads/2014/12/type_3.png');
  background-repeat: no-repeat;
    background-position: center;
}

      /* Top Selling Product */
      .main-title 
      {
        text-align: center;
        padding: 20px;
      }

      .container-products 
      {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 15px;
      }

      .product, .product2
      {
        border: 1px solid #ccc;
        padding: 20px;
        text-align: center;
        position: relative;
        background-color: #fff;
      }

.product:before {
    content: "Best Seller";
    background: #FF4E00;
    /* padding: 0px; */
    width: 60px;
    position: absolute;
    top: 6px;
    right: 10px;
    transform: rotate(-90deg);
    color: white;
}
.product2:before {
    content: "Sales";
    background: #FF4E00;
    padding: 10px;
    width: 60px;
    position: absolute;
    top: 8px;
    right: 10px;
    transform: rotate(-90deg);
    color: white;
}

      .product__img
      {
        width: 100%;
        height: 120px;
        object-fit: cover;
      }

      .product__title
      {
        text-align: center;
      }

      .product__price 
      {
        color: #FF4E00;
        font-weight: bold;
      }

      .product__price2 
      {
        color: #FF4E00;
        font-weight: bold;
        display: inline-block;
        margin: 0 3px;   
      }

      .product__icon 
      {
        display: block;
        margin-top: 10px;
      }

      .product:hover .product__icon, .product2:hover .product__icon  
      {
        color: #FF4E00;
      }

      @media screen and (min-width:1024px) { 
        .container{
          width: 1000px;
          margin: auto;
        }
        .container-products {
          grid-template-columns: repeat(4, 1fr);
          grid-gap: 15px;
        }
        .product__img {
          height: 150px;
        }
      }

      @media screen and (min-width:1280px) { 
        .container{
          width: 1200px;
        }
      }

      @media screen and (min-width:1600px) { 
        .container{
          width: 1500px;
        }
        .product__img {
          height: 200px;
        }
      }

      @media screen and (max-width:600px) 
      { 
        h2
        {
          font-size: 16px;
        }

        .tip h2
        {

          font-size: 13px;

        }

        .container p 
        {
          font-size: 6.5px;
        }
        h3
        {
              font-size: 1.17em;

        }

      }

      /* Tip */

      table.tip {
  table-layout: fixed;
  width: 100%;  
  text-align: center;
  background-color:  #ff8080;
  color: #fff;
}
th {
      padding: 10px;
}


      .tip i
      {
        font-size: 2em;
          color: #fff;
        padding: 20px 0;
      }

  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  .carousel-indicators li {
  width: 10px;
  height: 10px;
  border-radius: 100%;
}

    </style>

    <header>

<div id="slider" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/banner1.png">
    </div>
    <div class="carousel-item">
      <img src="image/banner2.png">
    </div>
    <div class="carousel-item">
      <img src="image/banner3.png">
    </div>
  </div>
</div>

    </header>

    <body>

      <main class="main">
        <br>
        <div class="container">
          <section class="main-title">
            <h2>TOYS MUST-HAVES</h2>
            <p>Meet the toys you've made best sellers.</p>
          </section>
          <br>
          <section class="container-products">
                      <?php 
          $qryProduct = mysqli_query($conn, "SELECT * FROM kidit_product WHERE product_status = 1 AND product_sales_price = 0 LIMIT 4");
          $no = 1;
            while($showProduct = mysqli_fetch_array($qryProduct))
            {
                  echo' <div class="product">
                    <img src="admin/'.$showProduct['product_image'].'" alt="" class="product__img">
                    <div class="product__description">
                      <h3 class="product__title">'.$showProduct['product_name'].'</h3>
                      <span class="product__price">'.$showProduct['product_price'].'</span>
                    </div>';

                                  if(isset($_SESSION['user_id']) == null)
                {
                    echo'<a data-toggle="modal" data-target="#modalLogin" data-tip="Add to Cart"><i class="product__icon fas fa-cart-plus"></i></a>';
                }
                else
                {
                    echo'<form class="form-submit">
                                    <input type="hidden" class="pid" name="pid" id="pid" value="'.$showProduct['product_id'].'">
                                    <input type="hidden" name="uid" id="uid" value="'.$_SESSION['user_id'].'">   
                                    <button class="addItemBtn"><i class="product__icon fas fa-cart-plus"></i></button>
                                </form>';
                }
                      
                  echo'</div>';

            }
          ?>
          </section>
        </div>

        <br><br><br>

        <hr class="pacman">

        <br>

        <div class="container">
          <section class="main-title">
            <h2>SALES OF THE MONTH</h2>
            <p>Fill up your cart with all kinds of goodies!</p>
          </section>
          <p style="text-align: right;"><a href="sales.php" style=" text-decoration: none; ">View More</a></p>
                    <section class="container-products">
          <?php 
          $qryProduct = mysqli_query($conn, "SELECT * FROM kidit_product WHERE product_status = 1 AND product_sales_price > 0 LIMIT 4");
          $no = 1;
            while($showProduct = mysqli_fetch_array($qryProduct))
            {

                  echo'<div class="product2">
                  <img src="admin/'.$showProduct['product_image'].'" alt="" class="product__img">
                  <div class="product__description">
                    <h3 class="product__title">'.$showProduct['product_name'].'</h3>
                    <span class="product__price2" style="text-decoration: line-through;color: black; ">RM '.$showProduct['product_price'].' </span> 
                    <span class="product__price2">RM '.$showProduct['product_sales_price'].'</span>
                  </div>';

                if(isset($_SESSION['user_id']) == null)
                {
                    echo'<a data-toggle="modal" data-target="#modalLogin" data-tip="Add to Cart"><i class="product__icon fas fa-cart-plus"></i></a>';
                }
                else
                {
                    echo'<form class="form-submit">
                                    <input type="hidden" class="pid" name="pid" id="pid" value="'.$showProduct['product_id'].'">
                                    <input type="hidden" name="uid" id="uid" value="'.$_SESSION['user_id'].'">   
                                    <button class="addItemBtn"><i class="product__icon fas fa-cart-plus"></i></button>
                                </form>';
                }
                         
                echo'</div>';

            }
          ?>
            
          </section>
        </div>
      </main>

      <br><br><br>


      <table class="tip">
      <tr>
        <th><i class="far fa-hand-paper"></i> 
              <h2>Best-Loved Toy Shop</h2></th>
        <th><i class="fas fa-rocket"></i>
              <h2>Trusted 30+ years</h2></th>
        <th> <i class="fas fa-ship"></i>
              <h2>Shipping Service</h2></th>
      </tr>
      
    </table>

    </body>
<!-- JavaScript file -->
    <script src="script.js"></script>
 
    <!-- jQuery Ajax CDN -->
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

<script type="text/javascript">


    $(document).ready(function(){
        $(".addItemBtn").click(function(e){

            e.preventDefault();
            //var pid= $("input[name='pid']").val();   
                var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();


        $.ajax({
        method:"POST",
        url: "action.php",
        data:{
          pid:pid
        },
            success: function(response){
        //alert( "Data Saved: " + msg );
        $("#message").html(response);
                        window.scrollTo(0,0); //click add to cart, it will auto scroll to the top
                        load_cart_item_number();

          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
             alert("some error");
          }
          });
            });
            
            load_cart_item_number();
            
            function load_cart_item_number(){
                $.ajax({
                    url:'action.php',
                    method: 'get',
                    data: {cartItem:"cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
        });
</script>
<?php
include 'footer.php';
?>