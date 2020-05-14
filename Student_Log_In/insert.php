<?php
    
            $host = 'localhost';
            $dbname = 'pfa';
            $username = 'root';
            $password = '';

            include_once '../Classes/Class_admin.php';
            include_once '../Classes/ClasseEtudiant.php';

            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $erreur = null;

            if($conn){
                // cette varaiable va contenir (admin,etudiant) selon la presonne qui veut se connecter
                $personne;
                // connecter un boolean (true : connexion reusssit, false : connexion a echoue).
                $connecter=false;
                $etudiant;
                $admin;
                if(isset($_POST['et_email']) and isset($_POST['et_mdp'])){
                    // recuperer les donnees de l'admin pour savoir est ce que c'est lui qui veut se connecter
                    $result = $conn->query('SELECT et_email,et_mdp from administrateur');
                    foreach($result as $row) {
                        if($row['et_email']==$_POST['et_email'] and $row['et_mdp']==$_POST['et_mdp']){
                          // $admin = Class_admin::construct1($row['ad_id'], $row['ad_nom'], $row['ad_prenom'], $row['et_email'], $row['et_mdp']);
                            $admin = Class_admin::construct1($row['et_email'], $row['et_mdp']);

                            $connecter=true;
                            $personne='administrateur';
                            break;
                        }
                    }
                    if(!$connecter){
                        $result = $conn->query('SELECT et_email, et_mdp from etudiant');
                        foreach($result as $row) {
                            if($row['et_email']==$_POST['et_email'] and $row['et_mdp']==$_POST['et_mdp']){
                               // $etudiant = ClasseEtudiant::construct2($row['et_id'], $row['et_nom'], $row['et_prenom'], $row['et_email'], $row['et_mdp'], $row['et_naissance'], $row['et_annee']);
                                $etudiant = ClasseEtudiant::construct2($row['et_email'], $row['et_mdp']);
                                $connecter=true;
                                $personne='etudiant';
                                // special partie syivant
                            $select = "SELECT et_id from etudiant where et_email = ? and et_mdp = ?  LIMIT 0,1;";
            
                            $stmt2 = $conn->prepare($select);
                            // $stmt2 -> bindParam(1, $et_id);
                            $stmt2 -> bindParam(1, $et_email);
                            $stmt2 -> bindParam(2, $et_mdp);
                            
                            $stmt2->execute();
                            $results = $stmt2->fetch();
                            // $json = json_encode($results);
                            echo $results['et_id'];
                         
                            header("location:http://yas/student_profile/index.php?id=". $results['et_id'] ."");
                                break;
                            } 
                    }
                
                    if($connecter){
                        session_start();
                        // la personne qui veut se connecter est'un admin.
                        if($personne == 'administrateur'){
                            $_SESSION['administrateur'] = $administrateur;
                            header('location:http://yas/Ad_Students_Active/');
                        }
                        // la personne qui veut se connecter est un etudiant.
                        else if($personne == 'etudiant'){
                            $_SESSION['etudiant'] = $etudiant;
                            header("location:http://yas/student_profile/index.php?id=". $results['et_id'] ."");

                    }      
                        }
                      
                                             
                    }
                    else{
                        $erreur = 'Les champs (mail, password) ne doivent pas etre vides!' ;
                        header("location:http://yas/student_log_in/index.php?erreur=$erreur");
                    }

                }
            }
                        

            
            

?>

<?php if($erreur): ?>
<div class="alert alert-danger">
  <?= $erreur ?>
</div>


<?php endif ?>

