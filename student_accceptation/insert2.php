<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

    // $of_id = $_GET['of_id'];
    // $et_id=" . $et_id . ";
    session_start();
    $et_id = $_SESSION['et_id'];

    // $of_id = $_GET['of_id'];
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

            $query = "SELECT of_id from lettres_motivation where of_id = :of_id";
            $stmt = $conn-> prepare($query);
            $stmt->bindParam(':of_id', $of_id);
            $stmt->execute();
            // $contacts = $conn -> query($query);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            header("location : student_acceptation/insert.php?of_id=".$of_id);

?>