<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

    session_start();
    $e_id = $_SESSION['e_id']; 
            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
               $query = "SELECT et_id, of_id, objet, lettre from lettres_motivation where et_acc = 0;";

               // $contacts = $stmt->fetchAll();
               $contacts = $conn -> query($query);
                   
           }
           catch (PDOException $e) {
             die("Impossible de se connecter à la base de données $dbname :" );
           }

           if(isset($_GET['update'])){
               $id = $_GET['update'];
               $query1 = "UPDATE lettres_motivation SET et_acc = 2 WHERE lettre = :id ";

               $sth=$conn->prepare($query1);
                     $sth->bindParam(':id',$id);
                     $sth->execute();

                     header("location:index.php");
           }   
                
?>