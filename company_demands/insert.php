<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

    // $of_id = $_GET['of_id'];
    // $et_id = $_GET['et_id'];

    session_start();
    $e_id = $_SESSION['e_id'];

          try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          }
          catch (PDOException $e) {
            die("Impossible de se connecter à la base de données $dbname :" );
          }
            // ***************************************** pour prendre id de l'entreprise
            $select = " SELECT of_id from offre where e_id = :e_id";
            $stmt1 = $conn-> prepare($select);
            $stmt1->bindParam(':e_id', $e_id);
            $stmt1->execute();
            header("location: company_demands/index.php/");

?>
