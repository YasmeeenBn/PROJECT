<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    $of_id = $_GET['of_id'];
    // $et_id=" . $et_id . ";
    session_start();
    $et_id = $_SESSION['et_id'];
          try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          }
          catch (PDOException $e) {
            die("Impossible de se connecter à la base de données $dbname :" );
          }
            // ***************************************** pour prendre id de l'entreprise
            $select = " SELECT e_id from offre where of_id = :of_id";
            $stmt1 = $conn-> prepare($select);
            $stmt1->bindParam(':of_id', $of_id);
            $stmt1->execute();
            $e_id = $_GET['e_id'];
            // ***************************************** je prends email de l'entreprise et le sjt de l'offre 
            $query = "SELECT e.et_email as emailcomp, o.of_sujet from entreprise e, offre o where o.e_id = :e.e_id";
            $stmt = $conn-> prepare($query);
            $stmt->bindParam(':e_id', $e_id);
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Contact Company</title>
    
    <!-- stylesheet css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/master.css">
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
            <a class="nav-link" href="">Contact Us</a>
        </li>
      </ul>
  </div>
</nav>
</div>

    <div class="header">
      <h1>Send an email to This Company using our interface</h1>
    </div>

    <div class="contact">
      <form id="contact" action="" method="post">

        <div class="form-group" style="width: 35%;">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="From" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted"> Your Name
                <!-- <fieldset>
                    <label for=""> </label> 
                </fieldset> -->
          </small>
        </div>
        <div class="form-group" style="width: 35%;">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="To" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Email of your contact</small>
        </div>
        <div class="form-group" style="width: 60%;">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Subject">
          <small id="emailHelp" class="form-text text-muted">Subject of your email</small>
        </div>
        <div class="form-group" style="width: 60%;">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
      
  </body>

</html>