<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    $et_id = $_GET['id'];
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
              //   echo "Connecté à $dbname sur $host avec succès.";
                // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               //$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            $query = "SELECT et_nom, et_prenom, et_naissance, et_tele, et_email, et_annee, et_cne from etudiant where et_id = :et_id";
            $stmt = $conn-> prepare($query);
            $stmt->bindParam(':et_id', $et_id);
            $stmt->execute();
            // $contacts = $conn -> query($query); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
                  
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
    <p>

    </p>
    <p>

    </p>

    <title> Demands Page</title>
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

<h1><span class="blue">&lt;</span>demands<span class="blue">&gt;</span> <span class="yellow">Companies</pan></h1>

<table class="container">
	<thead>
		<tr>
			<th><h1>Name of Company</h1></th>
			<th><h1>Offer's Subject</h1></th>
			<th><h1>Start Date</h1></th>
            <th><h1>End Date</h1></th>
            <th><h1>Duration</h1></th>
		</tr>
    </thead>

    <form action="" method="post">
        <tbody>
            <tr>
                <td>Google</td>
                <td>9518</td>
                <td>6369</td>
                <td>01:32:50</td>
            </tr>
        </tbody>
    </form>
</table>