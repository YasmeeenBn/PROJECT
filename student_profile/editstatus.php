<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    $et_id = $_GET['id'];

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // echo "Connecté à $dbname sur $host avec succès.";

        // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $query = "SELECT et_nom, et_prenom, et_naissance, et_tele, et_email, et_annee from etudiant where et_id:=et_id";

            // $contacts = $stmt->fetchAll();
            $contacts = $conn -> query($query);
                
        }
        catch (PDOException $e) {
        die("Impossible de se connecter à la base de données $dbname :" );
        }   
?>