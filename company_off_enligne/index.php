<?php
    $host = 'localhost';        
    $dbname = 'pfa';
    $username = 'root';
    $password = '';
    // include "insert.php";
    // $of_id = $_GET['of_id'];
    session_start();
    $e_id = $_SESSION['e_id'];
    
    // $of_id = $_GET['of_id'];

          try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          }
          catch (PDOException $e) {
            die("Impossible de se connecter à la base de données $dbname :" );
          }

            // if(isset($_POST['postuler'])){
              // lettres_motivation

              $query = "SELECT  of_id, of_sujet, of_description, of_status from offre  where e_id = :e_id ";  //pour avoir les offres qu'a mis la company sur la plateforme !
              $stmt = $conn-> prepare($query);
              $stmt->bindParam(':e_id', $e_id);
              $stmt->execute();
              // $contacts = $conn -> query($query);
              $sqlselect = "SELECT count(*) from offre where e_id = ".$e_id;
              $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Company</title>
    
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
            <div class="avatarName">Welcome<br> </div>
        </div>

        <ul class="sideMenu">
            <!-- <li><a href="javascript:void(0)" class="has-submenu"><span class="fa fa-table"></span>Students</a>
                <ul class="submenu">
                    <li><a href="Ad_Students_Active\index.php?c=product&a=list01"><span class="fa fa-list"></span>Active Students</a></li>
                    <li><a href="Ad_Students_Suspended\index.php?c=product&a=list02"><span class="fa fa-tags"></span>Suspended Students</a></li>
                </ul>
            </li> -->
            <li><a href="http://yas/company_demands/"><span class="fa fa-money"></span>Candidatures</a></li>
            <li><a href="http://yas/company_off_enligne/"><span class="fa fa-money"></span>Offers Posted</a></li>
            <li><a href="http://yas/company_off_id/"><span class="fa fa-money"></span>Accepted Students</a></li>
            <li><a href=""><span class="fa fa-money"></span></a></li>
            
    <li> ID ==> <?php echo $e_id; ?> </li>

            
        </ul>
      
      </div>

    </div>

    <div class="table-responsive-md">
        <table class="table table-hover bot-container">
        <!-- <caption>Students Demands</caption> -->
        <thead>
              <tr class="table-primary">
                <!-- <th scope="col">Student's ID</th> -->
                <th scope="col">Offer's ID</th>
                <th scope="col">Subject</th>
                <th scope="col">Description</th>
                <th scope="col">Offer's Status</th>
              </tr>
        </thead>
            <tbody>
        <?php  
                $res = $conn -> query($sqlselect);
                if ($res -> fetchColumn()>0){
                    foreach ($contacts as $row){
            ?> 
            <form action="" method="post">
              <tr>
                <!-- <td data-label="Student's ID">  </td> -->
                <td data-label="Offer's ID"> <?php  echo $row['of_id'] ?> </td>
                <td data-label="Subject"> <?php  echo $row['of_sujet'] ?> </td>
                <td data-label="Description"> <?php  echo $row['of_description'] ?> </td>
                <td data-label="Offer's Status"> <?php  echo $row['of_status'] ?> </td>

              </tr>
          </form>
            <?php
                }
         } 
         ?>
         </tbody>
    </table>
</body>
</html>
<!-- 
<td>
                        <a href="editstatus.php?update=" class="btn btn-primary btn-sm"> Suspend </a>
                    </td> -->