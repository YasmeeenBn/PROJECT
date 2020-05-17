<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    include "Student_Log_In/insert.php";
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

            $query = "SELECT et_email, et_cne from etudiant where et_id = :et_id";
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
    <title> Contact Admin</title>
    
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
      <h1>Send an email to Your ADMIN using our interface</h1>
    </div>

    <div class="contact">
      <form id="contact" action="" method="post">

        <div class="form-group" style="width: 35%;">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="To" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">
                <fieldset>
                    <label for="et_email"> </label> <?php echo "First Name: " . $row['et_email']?>
                </fieldset>
          </small>
        </div>
        <!-- <div class="form-group" style="width: 35%;">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="To" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Email of your contact</small>
        </div> -->
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