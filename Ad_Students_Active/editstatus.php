<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $query = "SELECT et_id, et_nom, et_prenom,et_email, et_annee FROM etudiant where et_status = 0;";

                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
                    
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            if(isset($_GET['update'])){
                $id = $_GET['update'];
                $query1 = "UPDATE etudiant SET et_status = 0 WHERE et_id = :id ";

                $sth=$conn->prepare($query1);
                      $sth->bindParam(':id',$id);
                      $sth->execute();

                      header("location:index.php");
            }   
?>

