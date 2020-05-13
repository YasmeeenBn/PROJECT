<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
               $query = "SELECT en_nom, en_ville, en_tele, en_email,en_web FROM entreprise ;";
               $stmt = $conn-> prepare($query);
                $result = $stmt->execute();

                $sqlselect = "SELECT count(*) from etudiant";


                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
    
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

        
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
            <div class="avatarName">Welcome,<br> Mr. Zellou</div>
        </div>

        <ul class="sideMenu">
            <!-- <li><a href="javascript:void(0)" class="has-submenu"><span class="fa fa-table"></span>Students</a>
                <ul class="submenu">
                    <li><a href="Ad_Students_Active\index.php?c=product&a=list01"><span class="fa fa-list"></span>Active Students</a></li>
                    <li><a href="Ad_Students_Suspended\index.php?c=product&a=list02"><span class="fa fa-tags"></span>Suspended Students</a></li>
                </ul>
            </li> -->
            <li><a href="http://yas/Ad_Students_Active/"><span class="fa fa-money"></span>Active Students</a></li>
            <li><a href="http://yas/Ad_Students_Suspended/"><span class="fa fa-money"></span>Suspended Stud</a></li>
            <li><a href="http://yas/Ad_offers/"><span class="fa fa-money"></span>Offers</a></li>
            <li><a href="http://yas/Ad_demands/"><span class="fa fa-user-o"></span>Demands</a></li>
            <li><a href="http://yas/Ad_entreprise/"><span class="fa fa-envelope-o"></span>All Companies</a></li>
            <li><a href="log_out.php"><span class="fa fa-envelope-o"></span>Log Out</a></li>
        </ul>
        
      </div>

    </div>

    <div class="table-responsive-md">
        <table class="table table-hover bot-container">
            <thead>
                <tr class="table-primary">
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Name</th>
                    <!-- <th scope="col">Last name</th> -->
                    <th scope="col">City</th>
                    <th scope="col">Phone Number</th>
                    <!-- <th scope="col">Phone Number</th> -->
                    <th scope="col">Email</th>
                    <th scope="col">WebSite</th>
                </tr>
            </thead>

            <?php  
                $res = $conn -> query($sqlselect);
                if ($res -> fetchColumn()>0){
                    foreach ($contacts as $row){
            ?> 


            <tbody>
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td><?php  echo $row['en_nom']?> </td>
                    <td><?php  echo $row['en_ville']?></td>
                    <td><?php  echo $row['en_tele']?></td>
                    <td><?php  echo $row['en_email']?></td>
                    <td><?php  echo $row['en_web']?></td>

                    <!-- <td>
                        <a href="editstatus.php?update=" class="btn btn-primary btn-sm"> Suspend </a>
                    </td> -->
                    <!-- <td><button type="submit" class="btn btn-primary btn-sm">Suspend</button></td>   -->
                </tr>
               
            </tbody>

            <?php
                }
              
         }
    ?>
        </table>
    </div>
      
  </body>
</html>