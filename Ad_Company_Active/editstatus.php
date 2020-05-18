<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                $query = "SELECT e_id, en_nom ,et_email, en_tele, en_web FROM entreprise where en_status = 0;";


                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
                    
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            if(isset($_GET['update'])){
                $id = $_GET['update'];
                $query1 = "UPDATE entreprise SET en_status = 0 WHERE e_id = :id ";

                $sth=$conn->prepare($query1);
                      $sth->bindParam(':id',$id);
                      $sth->execute();

                      header("location:index.php");
            }   
?>

