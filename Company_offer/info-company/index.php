<!DOCTYPE html>

<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Font Styles-->
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Kalam:wght@300&family=Lato&display=swap" rel="stylesheet"> <!--Courgette-->
    <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>  <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&family=Lobster+Two&display=swap" rel="stylesheet"> <!--Losbter Two & Baloo 2-->

    <!--CSS stylesheets-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/6a5ed842d1.js" crossorigin="anonymous"></script>

    <!--Favicon-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <title> Send Offers</title>
  </head>

<body>

  <div class="header">

    <nav class="navbar navbar-expand-lg navbar-dark">

      <a class="navbar-brand" href="">IwimStages</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="">About</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="">Companies</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="">Offers</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="">Contact Us</a>
          </li>
        </ul>

      </div>

    </nav>

  </div>



  <div class="bg" >

    <div class="container" >

      <form id="contact" action="insert.php" method="post">

        <div class="title">
          <h3>Send Us Your Offers</h3>
        </div>

        <fieldset>
          <label for="en_nom"></label><input placeholder="Name of the company" name="en_nom" type="text" tabindex="1" required autofocus>
        </fieldset>

        <fieldset>
          <label for="en_ville">  </label><input placeholder="Your city" name="en_ville" type="text" tabindex="1" required autofocus>
        </fieldset>
        
        <fieldset>
          <label for="en_tele">  </label><input placeholder="Your Phone Number " name="en_tele" type="tel" tabindex="3" required>
        </fieldset>

        <fieldset>
          <label for="en_email">  </label><input placeholder="Your Email Address" name="en_email"  type="email" tabindex="2" required>
        </fieldset>


        <fieldset>
          <label for="en_web">  </label><input placeholder="Your Web Site (optional)" name="en_web" type="url" >
        </fieldset>

        <!-- <fieldset>
          <textarea placeholder="Describe your offer here...." tabindex="5" required></textarea>
        </fieldset> -->

        <fieldset>
          <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">NEXT <a href="Company_offer\info-offer\index.php"></a></button>
        </fieldset>

        <p class="other">Plateform ENSIAS <a href="" target="_blank" title="IWIMSTAGES">IWIMSTAGES</a></p>
      </form>

    </div>

  </div>
    
</body>

</html>