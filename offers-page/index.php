<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    session_start();
    $et_id = $_SESSION['et_id'];
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
               $query = "SELECT of_id, of_sujet, of_duree, of_description,image FROM offre where of_status = 1 ";
                $stmt = $conn-> prepare($query);
                $result = $stmt->execute();

                $sqlselect = "SELECT count(*) from offre";


                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
            } 
            catch (PDOException $e) {
                die("Impossible de se connecter à la base de données $dbname :" );
            }

            // header("location: http://yas/Student_demands/index.php?of_id=". $row['of_id'] ." &et_id=". $et_id);
        
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

    <title> All Offers</title>
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


<div class="main">
    <h1> Offers  </h1>
    <ul class="cards">
    <?php  
            $res = $conn -> query($sqlselect);
            if ($res -> fetchColumn()>0){
                foreach ($contacts as $row){
            
    ?>    

                    <li class="cards_item">
                <!-- <form method="POST"> -->
                        <div class="card">
                            <div class="card_image">
                                <img src="../Company_offer/info-img/uploads/<?php echo $row['image']; ?>"> 
                                     <!--  <img src="https://images.pexels.com/photos/221164/pexels-photo-221164.jpeg">        width="100" height="100" 361.983×241.317-->
                            </div>
                            <div class="card_content">
                                <tbody>
                                        <tr>
                                            <h2 class="card_title"><td> <?php  echo $row['of_sujet']?></td></h2>
                                            <h2 class="card_title"><td> <?php  echo $row['of_duree']?></td></h2>
                                            <p class="card_text"><td> <?php  echo $row['of_description']?></td></p>
                                            
                                            <!-- <td> <button type="submit">  </button> </td> -->
                                            <!-- <td> <input class="btn card_btn" type="submit" value="Postuler" name="post"/> </td> -->
                                            <td>
                                                <a href="../Student_demands/index.php?of_id=<?php echo $row['of_id']?>&et_id=<?php echo $et_id ?>" name="submit" type="submit" class="btn card_btn">Postuler</a>
                                           </td>
                                        </tr>
                                </tbody>


                            </div>
                        </div>
                <!-- </form> -->
                    </li>


    <?php
                }
              
         }
    ?>
    </ul>
      
   
        
</div>

</body>
</html>