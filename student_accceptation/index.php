<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    // $of_id = $_GET['of_id'];
    // $et_id=" . $et_id . ";
    session_start();
    $et_id = $_SESSION['et_id'];
    // $of_sujet = $_GET['of_sujet'];
    // if(isset($_POST['submit'])){
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
              //   echo "Connecté à $dbname sur $host avec succès.";
                // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               //$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            // `lettres_motivation`(`id`, `et_id`, `of_id`, `objet`, `lettre`, `e_id`, `et_acc`
            // SELECT f.of_sujet, objet, lettre, et_acc from lettres_motivation l, offre f where l.et_id = 29 and f.of_id = l.of_id 

            $query = "SELECT f.of_sujet, objet, lettre, et_acc from lettres_motivation l, offre f where et_id = :et_id and f.of_id = l.of_id";
            
            $stmt = $conn-> prepare($query);
            // $stmt->bindParam(':of_id', $of_id);
            $stmt->bindParam(':et_id', $et_id);
            $stmt->execute();

            // $contacts = $conn -> query($query);
            $sqlselect = "SELECT count(*) from lettres_motivation where et_id = ".$et_id;
            
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // header("location :http://yas/Student_demands/index.php?of_id=". $row['of_id'] ." &et_id=". $et_id );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Font Styles-->
    <!-- <link href='https://fonts.googleapis.com/css?family=Indie Flower' roazdkpoakdpoaapozdkpoakzdpoakdpkapzdpoazdpoel='stylesheet'>  -->

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
    <p>

    </p>
    <p>

    </p>

    <title> Acceptation Page</title>
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
                  <a class="nav-link" href="http://yas/contact_Admin/">Contact Us</a>
              </li>
            </ul>
        </div>
      </nav>
    </div>

<h1><span class="blue">&lt;</span>demands<span class="blue">&gt;</span> <span class="yellow">Companies ==> <?php echo $et_id ?> </pan></h1>
<p> </p>
<p> </p>
<table class="container">
	<thead>
		<tr>
			<th><h1>Offer's Subject</h1></th>
			<th><h1>Object</h1></th>
      <!-- <th><h1>End Date</h1></th> -->
      <th><h1>Letter</h1></th>
      <th><h1>Status</h1></th>


		</tr>
    </thead> 

        <tbody>
        <?php  
                $res = $conn -> query($sqlselect);
                if ($res -> fetchColumn()>0){
                    foreach ($contacts as $row){
    ?> 
    <form action="" method="post">
            <tr>
                <td> <?php  echo $row['of_sujet'] ?> </td>
                <td>  <?php  echo $row['objet'] ?> </td>

                <td> <?php  echo $row['lettre'] ?> </td>
                <td> <?php  echo $row['et_acc'] ?> </td>
                <!-- <td><a href="../Student_contact/index.php?of_id=" name="submit" type="submit" class="btn card_btn">Postuler</a></td> -->
            </tr>
    </form>
        </tbody>
        <?php
                    }
                  }
        ?>

</table>
</body>
</html>

