 <?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    // if(isset($_POST['submit'])){

            try {
              $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
             //  echo "Connecté à $dbname sur $host avec succès.";
            } 

            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            $query = "SELECT of_id, of_sujet,of_datedebut,of_datefin,of_description from offre where of_id = :of_id";
            $stmt = $conn-> prepare($query);
            $stmt->bindParam(':et_id', $et_id);
            $stmt->execute();
            // $contacts = $conn -> query($query);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // *************************************************************************************************
            // header("http://yas/Student_demands/");
        // } 
        