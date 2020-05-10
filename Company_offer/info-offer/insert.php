<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

    if(isset($_POST['submit'])){

            try {
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
              echo "Connecté à $dbname sur $host avec succès.";
            } 

            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

    
            // insert query
            $sql = "INSERT INTO offre(of_sujet, of_description, of_datedebut, of_datefin, of_duree) values (:of_sujet, :of_description, :of_datedebut, :of_datefin, :of_duree)   ";
            // prepare query for execution
            $stmt = $conn->prepare($sql);
            // posted values
            $of_sujet = $_POST['of_sujet']; 
            $of_datedebut= $_POST['of_datedebut'];
            $of_datefin = $_POST['of_datefin'];
            $of_duree = $_POST['of_duree'];
            $of_description = $_POST['of_description'];

            // bind the parameters
            $stmt->bindParam(':of_sujet', $of_sujet);
            $stmt->bindParam(':of_datedebut', $of_datedebut);
            $stmt->bindParam(':of_datefin', $of_datefin);
            $stmt->bindParam(':of_duree', $of_duree);
            $stmt->bindParam(':of_description', $of_description);

            // Execute the query
            if($stmt->execute()){
                echo json_encode(array('result'=>'success'));
            }else{
                echo json_encode(array('result'=>'fail'));
            }
            var_dump($stmt);
            print_r($stmt->errorInfo());
    }
         
        
    
    ?>