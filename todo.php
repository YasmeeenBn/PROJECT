
 <!-- to do :
 ************************ -->
Compte d'entreprise 
Profile entreprise
Decline n offres admin



<!-- ************************************
afficher la liste des etudiants avec les infos completes
 *********************************** -->
             echo '<table width="70%" border="1" cellpadding="5" cellspacing="5">
                <tr>
                    <th> name </th>
                    <th> id </th>
                </tr>' ;

  
            foreach($data as $row ){
                echo '<tr>
                        <td>'.$row["id"].'</td>   
                        <td>'.$row["name"].'</td> 
                    </tr>' ;   
            }

            echo '</table>';
        }

        //select single record using statement : on aura uniquement 
        case avec id=1 :

        $statement = $conn -> prepare ("select * from table)
        $statement ->execute(array(
            ':id'  => 1
        ))
<!-- ************************************ PROFIL
************************************ -->
    <body>
        <p>Dans le formulaire précédent, vous avez fourni les
        informations suivantes :</p>
        
        <?php
            echo 'Prénom : '.$_POST["prenom"].'<br>';
            echo 'Email : ' .$_POST["mail"].'<br>';
            echo 'Age : ' .$_POST["age"].'<br>';
            echo 'Sexe : ' .$_POST["sexe"].'<br>';
            echo 'Pays : ' .$_POST["pays"].'<br>';
        ?>
    </body>