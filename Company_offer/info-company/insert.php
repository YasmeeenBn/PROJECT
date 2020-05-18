<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

    if(isset($_POST['submit'])){

            try {
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
             // echo "Connecté à $dbname sur $host avec succès.";
            } 

            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            // insert query
            $sql = "INSERT INTO entreprise (en_nom, en_ville, en_tele, en_email,en_mdp, en_web) values (:en_nom, :en_ville, :en_tele, :en_email, :en_mdp, :en_web)";
            // prepare query for execution
            $stmt = $conn->prepare($sql);
            // posted values
            $en_nom = $_POST['en_nom']; 
            $en_ville= $_POST['en_ville'];
            $en_tele = $_POST['en_tele'];
            $en_email = $_POST['en_email'];
            $en_mdp = $_POST['en_mdp'];
            $en_web = $_POST['en_web'];

            // bind the parameters
            $stmt->bindParam(':en_nom', $en_nom);
            $stmt->bindParam(':en_ville', $en_ville);
            $stmt->bindParam(':en_tele', $en_tele);
            $stmt->bindParam(':en_email', $en_email);
            $stmt->bindParam(':en_mdp', $en_mdp);
            $stmt->bindParam(':en_web', $en_web);

            // Execute the query
            if($stmt->execute()){
                echo json_encode(array('result'=>'success'));
            }
            else{
                echo json_encode(array('result'=>'fail'));
            } 
            var_dump($stmt);
            print_r($stmt->errorInfo());

            header("location:../info-offer/index.php?");



    }

?>
