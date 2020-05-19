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

            // Requête mysql pour insérer des données
            //$sql = "INSERT INTO etudiant SET et_nom=:et_nom, et_prenom=:et_prenom, et_email=:et_email, et_mdp=:et_mdp, et_annee=:et_annee, et_naissance=:et_naissance, et_tele=:et_tele)";
            $sql = "INSERT INTO etudiant (et_nom, et_prenom,et_email, et_mdp,et_annee,et_naissance,et_tele,et_cne, et_link, et_cv) values (:et_nom, :et_prenom, :et_email, :et_mdp, :et_annee,:et_naissance, :et_tele, :et_cne, :et_link, :et_cv)";
            // prepare query for execution
            $stmt = $conn->prepare($sql);
            
             // récupérer les valeurs 
             $et_nom = $_POST['et_nom']; 
             $et_prenom= $_POST['et_prenom'];
             $et_email = $_POST['et_email'];
             $et_mdp = $_POST['et_mdp'];
             $et_annee = $_POST['et_annee'];
             $et_naissance = $_POST['et_naissance'];
             $et_tele = $_POST['et_tele'];
             $et_cne = $_POST['et_cne'];
             $et_link = $_POST['et_link'];
             $et_link = $_POST['et_cv'];

             // bind the parameters
            $stmt->bindParam(':et_nom', $et_nom);
            $stmt->bindParam(':et_prenom', $et_prenom);
            $stmt->bindParam(':et_email', $et_email);
            $stmt->bindParam(':et_mdp', $et_mdp);
            $stmt->bindParam(':et_annee', $et_annee);
            $stmt->bindParam(':et_naissance', $et_naissance);
            $stmt->bindParam(':et_tele', $et_tele);
            $stmt->bindParam(':et_cne', $et_cne);
            $stmt->bindParam(':et_link', $et_link);
            $stmt->bindParam(':et_cv', $et_cv);
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