<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    $et_id = $_GET['id'];
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
               $query = "SELECT et_nom, et_prenom, et_naissance, et_tele, et_email, et_annee from etudiant where et_id:=et_id";
               $stmt = $conn-> prepare($query);
                $result = $stmt->execute();

                // $sqlselect = "SELECT count(*) from etudiant";
                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
    
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Font Styles-->
    <!-- <link href='https://fonts.googleapis.com/css?family=Indie Flower' rel='stylesheet'>  -->

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

    <title> Student Page</title>
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
                  <a class="nav-link" href="  ">Home</a>
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
                  <a class="nav-link" href="  ">Contact Us</a>
              </li>
            </ul>
        </div>
      </nav>
    </div>

<div class="bg">

<div class="container">

    <form id="contact" action="" method="post">

        <div class="title">
            <h3>Personal Informations</h3>
        </div>
        <?php  
                $res = $conn -> query($query);
                if ($res -> fetchColumn()>0){
                    foreach ($contacts as $row){
        ?> 
        <fieldset>
             <label for="et_nom"> </label> <?php  echo $et_nom?>
            <!-- <input placeholder="Last Name" name="et_nom" type="text" tabindex="1" required autofocus>  -->
        </fieldset>

        <fieldset>
            <label for="et_prenom"> </label> <?php  echo $row['et_prenom']?>
        </fieldset>

        <fieldset>
            <label for="et_email"> </label><input placeholder="Your Email Address" name="et_email" type="email" tabindex="3" required>
        </fieldset>

        <fieldset>
            <label for="et_mdp"> </label><input placeholder="Your password" name="et_mdp" type="text" tabindex="2" required>
        </fieldset>

        <fieldset>
            <label for="et_annee"> </label><input placeholder="Are you in First/Second/third year ?" name="et_annee" type="text" tabindex="2"
                required>
        </fieldset>

        <fieldset>
            <label for="et_naissance"> Your birth date </label> :<input placeholder="Your birth date" name="et_naissance" type="date" tabindex="2" required>
        </fieldset>

        <fieldset>
            <label for="et_tele"> </label><input placeholder="Your Phone Number" name="et_tele" type="tel" tabindex="4" required>
        </fieldset>

        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">SIGN UP <a
                    href=""></a></button>
        </fieldset>

        <p class="other">Plateform ENSIAS <a href="homepage\index.html" target="_blank" title="IWIMSTAGES">IWIMSTAGES</a></p>
    </form>

</div>

</div>
   
<?php
                }
              
         }
?>



</body>
</html>