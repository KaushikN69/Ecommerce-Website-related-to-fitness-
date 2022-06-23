<?php

session_start();

if(!isset($_SESSION['firstname'])){
  header('location:login.php');
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <nav class="navbar">
    <div class="content">
      <div class="logo">
        <a href="blazefit.php"> Blaze<span style="color: #f5634b;">Fit</span></a>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="blazefit.php">Home</a></li>
        <li><a href="#about">about</a></li>
        <li><a href="#gallery">products</a></li>
        <li><a href="index.php">shop</a></li>
        <li><a href="#footer">contact</a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
  <header>    
    <div class = "title">
        <h1>WELCOME TO <span style="color: #f5634b;">BlazeFit</span>
        </h1>
    </div>
    <div class="button">
            <a href="#about" class="bttn">LEARN MORE</a>
    </div>
</header>
  
<div class="block" >
            
    <div class="advice">
        <span class="number">01</span>
        <h1 class="advice-h3">MODERN EQUIPMENT</h1>
        <h2 class="advice-text"><span class="discount">get discount upto 40% on </span>dumbells and weights</h2>
        <a href="index.php" class="advice-more"><h3>MORE DETAILS</h3></a>
</div>

    <div class="advice">
        <span class="number">02</span>
        <h1 class="advice-h3">SUPPLEMENTS</h1>
        <h2 class="advice-text"><span class="discount">get discount upto 30% on </span> whey protein and pro vitamins</h2>
        <a href="index.php" class="advice-more"><h3>MORE DETAILS</h3></a>
</div>

</div>

<section id="about">

<div class="image">
<img src="about-img.jpg" alt="image"/>
</div>

<div class="content">
    <h1 class="about-h1">WHY YOU SHOULD CHOOSE US?</h1>
      <p><strong>Our equipment :</strong> when BlazeFit equipment arrives at your door or the setting of your choice, we provide equipment that's clean and sanitized<br><br>
      <strong>400+ Healthy, Happy, Fit customers </strong> your satisfaction is our satisfaction<br><br>
      <strong>We're perfect for beginners:</strong> Interested in getting fit, but don't know where to start? send a mail to blazefit@gmail.com with subject "get fit beginner" We'll introduce you to fun, effective routines and valuable fitness knowledge. </p>
</div>

</section>

<section id="gallery">

  <h1>OUR LATEST PRODUCTS</h1>

<div class="image-container">

  <div class="image">
    <img src="im1.jpg" alt="">
    <div class="info">
      <a href="index.php"><button>view more!</button></a>
    </div>
  </div>

  <div class="image">
    <img src="im2.jpg" alt="">
    <div class="info">
      <a href="index.php"><button>view more!</button></a>
    </div>
  </div>

  <div class="image">
    <img src="im3.png" alt="">
    <div class="info">
      <a href="index.php"><button>view more!</button></a>
    </div>
  </div>

  <div class="image">
    <img src="im4.jpg" alt="">
    <div class="info">
      <a href="index.php"><button>view more!</button></a>
    </div>
  </div>

  <div class="image">
    <img src="im5.jpeg" alt="">
    <div class="info">
      <a href="index.php"><button>view more!</button></a>
    </div>
  </div>

  <div class="image">
    <img src="im6.jpg" alt="">
    <div class="info">
      <a href="index.php"><button>view more!</button></a>
    </div>
  </div>

</div>

</section>

<section id="footer">

  <div class="footer-container">

    <div class="brand">
      <div class="logo">
        <a href="#"><h1><span>Blaze</span>Fit</h1></a>
      </div>
      <div class="icons">
        <a href="#" class="fab fa-facebook" data-text="facebook"></a>
        <a href="#" class="fab fa-twitter" data-text="twitter"></a>
        <a href="#" class="fab fa-instagram" data-text="instagram"></a>
        <a href="#" class="fab fa-pinterest" data-text="pinterest"></a>
      </div>
    </div>

    <div class="contact-info">
      <div class="info">
        <a href="#" class="fas fa-map-marker-alt" data-text="Bengaluru"></a>
        <a href="#" class="fas fa-envelope" data-text="blazefit@gmail.com"></a>
        <a href="#" class="fas fa-phone" data-text="+918095382791"></a>
      </div>
    </div>

    <div class="letter">
      <h1>newsletter</h1>
      <p>Do you want to get latest updates</p>
      <form method="POST">
      <input type="submit" value="accept" name="accept"/>
</form>
    </div>

  </div>

</section>

<?php

if(isset($_POST['accept'])){
  ?>

<script>
  alert('thank you, we will provide you the latest updates.');
</script>
<?php
}

?>


  <script>
    const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    menuBtn.onclick = ()=>{
      navbar.classList.add("show");
      menuBtn.classList.add("hide");
      body.classList.add("disabled");
    }
    cancelBtn.onclick = ()=>{
      body.classList.remove("disabled");
      navbar.classList.remove("show");
      menuBtn.classList.remove("hide");
    }
    window.onscroll = ()=>{
      this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
    }
  </script>
