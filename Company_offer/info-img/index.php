<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    $of_id = $_GET['id'];
    // echo $of_id;
        try {
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            //echo "Connecté à $dbname sur $host avec succès.";
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
        }
        
        if(isset($_POST['ok'])){
                $folder ="uploads/"; 
                $image = $_FILES['image']['name']; 
                $path = $folder . $image ; 
                $target_file=$folder.basename($_FILES["image"]["name"]);
                $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
                $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 
                $ext=pathinfo($filename, PATHINFO_EXTENSION);

                if(!in_array($ext,$allowed) ) 
                { 
                      echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
                }

                else{ 
                      move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
                      // UPDATE `offre` SET `image` = 'ciel.jpgioaiozdj' WHERE `offre`.`offre_id` = 4 
                      $sth=$conn->prepare("UPDATE offre SET image = :image WHERE of_id = :of_id "); 
                      $sth->bindParam(':of_id',$of_id);
                      $sth->bindParam(':image',$image);
                      $sth->execute();
                } 

}    

?> 
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
    <title> Image's upload</title>

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

    <form id="contact" method="POST" enctype="multipart/form-data" action = "">

        <div class="title">
          <h3> Last STEP - Your Company's LOGO </h3>
        </div>

        <fieldset>
              <div class="title">     
                <h2>  yas </h2>   <!-- just to have space -->
                <h5> Upload Your LOGO </h5>
              </div>
        </fieldset>
        <fieldset></fieldset>
        <fieldset>

        <form method="POST" enctype="multipart/form-data"> 
              <input type="file" name="image" /> 
            <input type="submit" name="ok"/>  

        </form>
        </fieldset>

    </form>

    </div>

  </div>
    
</body>

</html>