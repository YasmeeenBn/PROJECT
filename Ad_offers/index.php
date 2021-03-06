<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    include "editstatus.php";

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
               $query = "SELECT of_sujet, image, of_id, of_duree FROM offre where of_status = 1";
                $stmt = $conn-> prepare($query);
                $result = $stmt->execute();

                $sqlselect = "SELECT count(*) from offre";


                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
    
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }
          // var_dump($stmt);
          // print_r($stmt->errorInfo());  
?>


<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    
    <!-- stylesheet css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/master.css">
  </head>

  <body>

    <div class="top-container">
      <!--     SIDE AREA -->
      <div class="sideArea">

        <div class="avatar">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCNOdyoIXDDBztO_GC8MFLmG_p6lZ2lTDh1ZnxSDawl1TZY_Zw" alt="">
            <div class="avatarName">Welcome,<br>Mr.Zellou</div>
        </div>

        <ul class="sideMenu">
        <li><a href="http://yas/Ad_Students_Active/"><span class="fa fa-money"></span>Active Students</a></li>
            <li><a href="http://yas/Ad_Students_Suspended/"><span class="fa fa-money"></span>Suspended Stud</a></li>
            <li><a href="http://yas/Ad_Company_Active/"><span class="fa fa-money"></span>Active Companies</a></li>
            <li><a href="http://yas/Ad_Company_Suspended/"><span class="fa fa-money"></span>Suspended Comp</a></li>
            <li><a href="http://yas/Ad_offers/"><span class="fa fa-money"></span>Offers Accepted</a></li>
            <li><a href="http://yas/Ad_demands/"><span class="fa fa-user-o"></span>Demands Offers</a></li>
            <li><a href="http://yas/Admin_Contact/"><span class="fa fa-envelope-o"></span>Contact Users</a></li>
            <li><a href="log_out.php"><span class="fa fa-envelope-o"></span>Log Out</a></li>
        </ul>
        
      </div>

    </div>

    <div class="card-deck bot-container">

    <?php  
                $res = $conn -> query($sqlselect);
                if ($res -> fetchColumn()>0){
                    foreach ($contacts as $row){
    ?> 

      <div class="card text-white bg-primary border-primary mb-3 text-center">
        <div class="card_image">
        <img src="../Company_offer/info-img/uploads/<?php echo $row['image']; ?>"> 
        </div>
        <!-- <form action="" method="post"> -->
        <tbody>
            <div class="card-body">
              <h5 class="card-title"><?php  echo $row['of_sujet']?></h5>
            </div>
            <ul class="list-group list-group-flush" style="color: royalblue;">
              <li class="list-group-item"><?php  echo 'Duree en mois :' .$row['of_duree']?></li>
 
              
            </ul>
            <div class="card-body" style="color: white;">
              
            </div>
        </tbody>

      </div>

      <?php
                }
              
         }
    ?>
    </div>
  
  </body>
</html>