<?php
  include('header.php');
?>

<style>
      /* Slider */
      .container-slider
      {
        margin: 0;
        position: relative;
        overflow: hidden;
      }

      .slider 
      {
        display: flex;
        width: 400%;
        height: 450px;
        margin-left: -100%;
        position: relative;
      }

      /*.slider:before
      {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background: rgba(0,0,0,0.5);
        height: 100%;
      }*/

      /* check*/
      .slider__section 
      {
        width: 100%;
        position: relative;
      }

      .slider__img 
      {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .slider__btn 
      {
        position: absolute;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.7);
        top: 50%;
        transform: translateY(-50%);
        font-size: 30px;
        font-weight: bold;
        font-family: monospace;
        text-align: center;
        border-radius: 50%;
        cursor: pointer;
        z-index: 1;
      }

      .slider__btn:hover 
      { 
        background: #fff;
      }

      .slider__btn--left
      {
        left: 10px;
      }

      .slider__btn--right 
      {
        right: 10px;
      }

      .slider__content
      {
        position: absolute;
        top: 50%;
        left: 50%;
        color: white;
        transform: translate(-50%, -50%);
        width: 60%;
        text-align: center;
        z-index: -2;
      }

      @media screen and (min-width:1280px) 
      { 
        .slider
        {
          height: 500px;
          font-size: 1.5em;
        }
      }

      @media screen and (min-width:1600px) 
      { 
        .slider
        {
          height: 600px;
        }
      }

      h1 
      {
        text-align: center;
        padding: 10px;
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


    </style>

    <header>

      <div class="container-slider">
        <div class="slider" id="slider">
          <div class="slider__section">
            <img src="https://images.pexels.com/photos/2097085/pexels-photo-2097085.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="slider__img">
          </div>
          <div class="slider__section">
            <img src="https://images.pexels.com/photos/3414327/pexels-photo-3414327.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="slider__img">
          </div>
          <div class="slider__section">
            <img src="https://images.pexels.com/photos/2846815/pexels-photo-2846815.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="slider__img">
          </div>
          <div class="slider__section">
            <img src="https://snappygoat.com/b/e031d75f5c05484c31a2e3eb0dcc218b4268620a" alt="" class="slider__img">
          </div>
        </div>
        <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
        <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
      </div>

      <script>
        const slider = document.querySelector("#slider");
        let sliderSection = document.querySelectorAll(".slider__section");
        let sliderSectionLast = sliderSection[sliderSection.length -1];

        const btnLeft = document.querySelector("#btn-left");
        const btnRight = document.querySelector("#btn-right");

        slider.insertAdjacentElement('afterbegin', sliderSectionLast);

        function Next() {
          let sliderSectionFirst = document.querySelectorAll(".slider__section")[0];
          slider.style.marginLeft = "-200%";
          slider.style.transition = "all 0.5s";
          setTimeout(function(){
            slider.style.transition = "none";
            slider.insertAdjacentElement('beforeend', sliderSectionFirst);
            slider.style.marginLeft = "-100%";
          }, 500);
        }

        function Prev() {
          let sliderSection = document.querySelectorAll(".slider__section");
          let sliderSectionLast = sliderSection[sliderSection.length -1];
          slider.style.marginLeft = "0";
          slider.style.transition = "all 0.5s";
          setTimeout(function(){
            slider.style.transition = "none";
            slider.insertAdjacentElement('afterbegin', sliderSectionLast);
            slider.style.marginLeft = "-100%";
          }, 500);
        }

        btnRight.addEventListener('click', function(){
          Next();
        });

        btnLeft.addEventListener('click', function(){
          Prev();
        });

        setInterval(function(){
          Next();
        }, 5000);

      </script>

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
            <div class="product">
              <img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Lentes_del_Ojo_de_cristal..jpg" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Farenheit (Grey)</h3>
                <span class="product__price">$575.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
            <div class="product">
              <img src="https://www.nunsarangoptical.com/blog/wp-content/uploads/2019/03/nunsarang-usar-lentes-de-sol-mas-seguido.jpg" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Opium (Grey)</h3>
                <span class="product__price">$575.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
            <div class="product">
              <img src="https://c.pxhere.com/photos/91/35/glasses_accessoirs_fashion_sunglasses_sun_modern_backgrounds_elegance-1042997.jpg!d" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Kenneth Cole</h3>
                <span class="product__price">$575.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
            <div class="product">
              <img src="https://upload.wikimedia.org/wikipedia/commons/b/b6/Gafas_de_sol_Rayban_Aviador.jpg" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Farenheit Oval</h3>
                <span class="product__price">$325.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
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
          <p style="text-align: right;"><a href="" style=" text-decoration: none; ">View More</a></p>
          <section class="container-products">
            <div class="product2">
              <img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Lentes_del_Ojo_de_cristal..jpg" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Farenheit (Grey)</h3>
                <span class="product__price2" style="text-decoration: line-through;color: black; ">$111 </span> 
                <span class="product__price2"> $575.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
            <div class="product2">
              <img src="https://www.nunsarangoptical.com/blog/wp-content/uploads/2019/03/nunsarang-usar-lentes-de-sol-mas-seguido.jpg" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Opium (Grey)</h3>
                <span class="product__price2" style="text-decoration: line-through;color: black; ">$111 </span> 
                <span class="product__price2">$575.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
            <div class="product2">
              <img src="https://c.pxhere.com/photos/91/35/glasses_accessoirs_fashion_sunglasses_sun_modern_backgrounds_elegance-1042997.jpg!d" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Kenneth Cole</h3>
                <span class="product__price2" style="text-decoration: line-through;color: black; ">$111 </span> 
                <span class="product__price2">$575.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
            <div class="product2">
              <img src="https://upload.wikimedia.org/wikipedia/commons/b/b6/Gafas_de_sol_Rayban_Aviador.jpg" alt="" class="product__img">
              <div class="product__description">
                <h3 class="product__title">Farenheit Oval</h3>
                <span class="product__price2" style="text-decoration: line-through;color: black; ">$111 </span> 
                <span class="product__price2">$325.00</span>
              </div>
              <i class="product__icon fas fa-cart-plus"></i>
            </div>
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

<?php include 'footer.php';?>