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
            header("location: Student_contact/index.php/");

?>
